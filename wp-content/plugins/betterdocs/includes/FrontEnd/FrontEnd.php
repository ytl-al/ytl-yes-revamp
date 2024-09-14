<?php

namespace WPDeveloper\BetterDocs\FrontEnd;

use WPDeveloper\BetterDocs\Utils\Base;
use WPDeveloper\BetterDocs\Core\Settings;
use WPDeveloper\BetterDocs\Utils\Enqueue;
use WPDeveloper\BetterDocs\Utils\Database;
use WPDeveloper\BetterDocs\Utils\Helper;
use WPDeveloper\BetterDocs\Dependencies\DI\Container;

class FrontEnd extends Base {
    private $container;
    private $database;
    /**
     * Enqueue
     * @var Enqueue
     */
    private $assets;
    /**
     * Settings
     * @var Settings
     */
    private $settings;
    private $widget_attributes = [];
    private $widget_type       = '';

    public function __construct( Container $container, Database $database, Settings $settings ) {
        $this->container = $container;
        $this->database  = $database;
        $this->settings  = $settings;

        $this->assets = $this->container->get( Enqueue::class );

        add_action( 'init', [$this, 'init'] );
        add_action( 'wp_enqueue_scripts', [$this, 'enqueue_scripts'] );

        /**
         * Update The 'Edit Site' Url In FSE Mode For Betterdocs Templates Only
         */
        if( Helper::is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' ) && wp_is_block_theme() ) {
            add_action( 'admin_bar_menu', [$this, 'fse_url_update'], 41, 1 );
        }

        add_filter( 'betterdocs_layout_filename', [$this, 'layout_filename'], 10, 2 );

        add_action( 'betterdocs_docs_before_social', [$this, 'article_reactions'] );

        add_action( 'betterdocs_before_render', [$this, 'before_render'], 11, 2 );
        add_action( 'betterdocs_after_render', [$this, 'after_render'], 11, 2 );

        //Remove Saliant Theme Script For (Delay Javascript Exection), which causes issue with betterdocs sidebar toggle, issue number (#1234)
        add_action( 'nectar_hook_before_body_close', [$this, 'dequeue_saliant_theme_script'], 99999 );

        //Remove our search selector from from Searchanise plugin for woocommerce, conflicts with betterdocs search (Bug Fix Card -> https://trello.com/c/lXzrtv2f/1313-client-issue-betterdocs-is-conflicting-with-the-searchanise-plugin)
        add_filter( 'se_load_search_widgets', [$this, 'exclude_betterdocs_search'], 10, 1 );

        //Fix Betterdocs Search Issue With HostCluster Theme
        if( function_exists('hostcluster_search_filter') ) {
            remove_filter('pre_get_posts', 'hostcluster_search_filter');
        }
    }

    public function fse_url_update( &$wp_admin_bar ) {
        $site_edit_node = $wp_admin_bar->get_node('site-editor');

        if( empty( $site_edit_node ) ) {
            return;
        }

        if( is_post_type_archive('docs') || is_tax( 'knowledge_base' ) || is_tax( 'doc_category' ) || is_tax( 'doc_tag' ) || is_singular( 'docs' ) ) {
            $href = isset( $site_edit_node->href ) ? $site_edit_node->href : '';
            if( ! empty( $href ) ) {
               $href = $href . '&lang='.ICL_LANGUAGE_CODE;
               $site_edit_node->href = $href;
               $wp_admin_bar->add_node( $site_edit_node );
            }
        }
    }

    public function exclude_betterdocs_search( $options ) {
        $options['search_input'] = $options['search_input'] . ':not(.betterdocs-search-field)';
        return $options;
    }
    public function before_render( $widget, $widget_type ) {
        $this->widget_attributes = isset( $widget->attributes ) ? $widget->attributes : [];
        $this->widget_type       = $widget_type;

        /**
         * This line of code will run for reactions shortcode, elementor widget and blocks
         */
        if ( strpos( $widget->get_name(), 'reactions' ) !== false ) {
            $this->localize_reactions_data();
        }

        /**
         * This line of code will run for Feedback form Shortcode, Elementor widget and blocks
         */
        if ( strpos( $widget->get_name(), 'feedback_form' ) ) {
            $this->localize_feedback_form_data();
        }

        add_filter( 'betterdocs_nested_terms_args', [$this, 'terms_args'], 11, 1 );
        add_filter( 'betterdocs_nested_docs_args', [$this, 'docs_args'], 11, 1 );
    }

    public function dequeue_saliant_theme_script() {
        if ( is_singular( 'docs' ) || is_tax( 'doc_category' ) || is_tax( 'doc_tag' ) ) {
            wp_dequeue_script( 'salient-delay-js' );
        }
    }

    public function after_render( $widget, $widget_type ) {
        remove_filter( 'betterdocs_nested_terms_args', [$this, 'terms_args'], 11 );
        remove_filter( 'betterdocs_nested_docs_args', [$this, 'docs_args'], 11 );

        $this->widget_attributes = [];
        $this->widget_type       = '';
    }

    public function terms_args( $args ) {
        switch ( $this->widget_type ) {
            case 'shortcode':
                if ( isset( $this->widget_attributes['terms_orderby'] ) ) {
                    $args['orderby'] = $this->widget_attributes['terms_orderby'];
                }

                if ( isset( $this->widget_attributes['terms_order'] ) ) {
                    $args['order'] = $this->widget_attributes['terms_order'];
                }
                break;
            case 'blocks':
                if ( isset( $this->widget_attributes['orderBy'] ) ) {
                    if ( $this->widget_attributes['orderBy'] == 'doc_category_order' ) {
                        $args['orderby']  = 'meta_value_num';
                        $args['meta_key'] = $this->widget_attributes['orderBy'];
                    } else {
                        $args['orderby'] = $this->widget_attributes['orderBy'];
                    }
                }
                if ( isset( $this->widget_attributes['order'] ) ) {
                    $args['order'] = $this->widget_attributes['order'];
                }
                break;
            case 'elementor':
                $args['orderby'] = $this->widget_attributes['orderby'];
                $args['order']   = $this->widget_attributes['order'];
                break;
        }

        return $args;
    }

    public function docs_args( $args ) {
        switch ( $this->widget_type ) {
            case 'shortcode':
                if ( isset( $this->widget_attributes['orderby'] ) ) {
                    $args['orderby'] = $this->widget_attributes['orderby'];
                }

                if ( isset( $this->widget_attributes['order'] ) ) {
                    $args['order'] = $this->widget_attributes['order'];
                }
                break;
            case 'blocks':
                if ( isset( $this->widget_attributes['postsOrderBy'] ) ) {
                    $args['orderby'] = $this->widget_attributes['postsOrderBy'];
                }
                if ( isset( $this->widget_attributes['postsOrder'] ) ) {
                    $args['order'] = $this->widget_attributes['postsOrder'];
                }

                //This is for archive category block only
                if ( isset( $this->widget_attributes['orderby'] ) ) {
                    $args['orderby'] = $this->widget_attributes['orderby'];
                }
                if ( isset( $this->widget_attributes['order'] ) ) {
                    $args['order'] = $this->widget_attributes['order'];
                }
                break;
            case 'elementor':
                $args['orderby'] = $this->widget_attributes['post_orderby'];
                $args['order']   = $this->widget_attributes['post_order'];
                break;
        }

        return $args;
    }

    public function article_reactions() {
        if ( $this->database->get_theme_mod( 'betterdocs_post_reactions', true ) ) {
            echo do_shortcode( '[betterdocs_article_reactions]' );
        }
    }

    public function enqueue_scripts() {
        if ( is_singular( 'docs' ) ) {
            wp_enqueue_style( 'betterdocs-single' );
            wp_enqueue_style( 'betterdocs-encyclopedia' );
            wp_enqueue_style( 'betterdocs-glossaries' );
            wp_enqueue_script( 'clipboard' );
            wp_enqueue_script( 'betterdocs-glossaries' );
        }

        if ( is_post_type_archive( 'docs' ) ) {
            wp_enqueue_style( 'betterdocs-category-grid' ); //category grid shortcode is supposed to enqueue this style, but this is called again to fix flicking of UI on Docs Page
            wp_enqueue_style( 'betterdocs-docs' );
        }

        if ( is_tax( 'doc_category' ) || is_tax( 'doc_tag' ) ) {
            wp_enqueue_style( 'betterdocs-doc_category' );
        }

        if ( is_tax( 'doc_category' ) || is_tax( 'doc_tag' ) || is_singular( 'docs' ) ) {
            wp_enqueue_style( 'simplebar' );
            wp_enqueue_script( 'simplebar' );
            wp_enqueue_script( 'betterdocs-category-grid' );
        }

        if ( is_post_type_archive( 'docs' ) || is_singular( 'docs' ) || is_tax( 'doc_category' ) || is_tax( 'doc_tag' ) || is_tax( 'knowledge_base' ) ) {
            wp_enqueue_script( 'betterdocs' );
        }
    }

    public function layout_filename( $filename, $origin_layout ) {
        $filename = ( $origin_layout === 'layout-2' ) ? 'default' : $filename;
        return $filename;
    }

    public function init() {
        $this->container->get( TemplateLoader::class )->init();

        add_filter( 'betterdocs_articles_args', [$this, 'article_args'], 11, 3 );
    }

    public function article_args( $args, $term_id, $_origin_args ) {
        if ( null == $term_id || isset( $args['orderby'] ) ) {
            return $args;
        }

        $post__in = betterdocs()->query->get_docs_order_by_terms( $term_id );

        if ( ! empty( $post__in ) ) {
            $args['orderby']  = 'post__in';
            $args['post__in'] = $post__in;
        }

        return $args;
    }

    public function localize_reactions_data() {
        $this->assets->localize( 'betterdocs-reactions', 'betterdocsReactionsConfig', [
            'post_id'  => get_the_ID(),
            'FEEDBACK' => [
                'DISPLAY' => true,
                'TEXT'    => esc_html__( 'How did you feel?', 'betterdocs' ),
                'SUCCESS' => betterdocs()->settings->get( 'reaction_feedback_text', __( 'Thanks for your feedback', 'betterdocs' ) ),
                'URL'     => get_rest_url( null, '/betterdocs/v1/feedback' )
            ]
        ] );
    }

    public function localize_feedback_form_data() {
        $this->assets->localize( 'betterdocs', 'betterdocsSubmitFormConfig', [
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'post_id'  => get_the_ID(),
            'nonce'    => wp_create_nonce( 'betterdocs_submit_data' )
        ] );
    }
}
