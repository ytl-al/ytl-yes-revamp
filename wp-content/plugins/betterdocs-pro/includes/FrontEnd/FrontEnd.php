<?php

namespace WPDeveloper\BetterDocsPro\FrontEnd;

use Elementor\Plugin;
use WPDeveloper\BetterDocs\Utils\Base;
use WPDeveloper\BetterDocs\Core\Settings;
use WPDeveloper\BetterDocs\Utils\Database;
use WPDeveloper\BetterDocsPro\Core\InstantAnswer;
use WPDeveloper\BetterDocsPro\Core\Encyclopedia;
use WPDeveloper\BetterDocs\Dependencies\DI\Container;
use WPDeveloper\BetterDocsPro\Core\ContentRestrictions;
use WPDeveloper\BetterDocsPro\Core\Glossaries;    

class FrontEnd extends Base {
    private $container;
    private $database;
    private $settings;

    public function __construct( Container $container ) {
        $this->container = $container;
        $this->database  = $this->container->get( Database::class );
        $this->settings  = $this->container->get( Settings::class );

        add_action( 'wp_enqueue_scripts', [$this, 'enqueue_scripts'] );

        if( is_plugin_active('elementor/elementor.php') ) {
            add_action( 'template_redirect', [$this, 'set_cookie_for_last_kb'], 10 );
        }

        // add_filter( 'betterdocs_not_eligible_archive', [$this, 'is_archive'] );
        add_filter( 'betterdocs_archives_template', [$this, 'archives_template'], 10, 4 );
        add_filter( 'betterdocs_template_params', [$this, 'layout_3_template_params'], 11, 3 );
        if ( $this->settings->get( 'advance_search', false ) ) {
            add_filter( 'betterdocs_search_shortcode_attributes', [$this, 'search_shortcode_attributes'], 11, 1 );
        }
        add_filter( 'betterdocs_search_form_attr', [$this, 'search_form_attr'], 11, 1 );
        add_filter( 'betterdocs_live_search_form_footer', [$this, 'advance_search_form'], 11, 1 );
        add_filter( 'betterdocs_after_live_search_form', [$this, 'popular_search_keyword'], 11, 1 );

        $this->container->get( ContentRestrictions::class );
        if ( $this->settings->get( 'enable_disable', false ) ) {
            $this->container->get( InstantAnswer::class );
        }

        if ( $this->settings->get( 'show_attachment' ) ) {
            add_action( 'betterdocs_docs_before_social', [$this, 'render_attachment_markup'], 11 );
        }

        if ( $this->settings->get( 'show_related_docs' ) ) {
            add_action( 'betterdocs_docs_before_social', [$this, 'render_related_docs_shortcode'], 12 );
        }

        if ( $this->settings->get( 'enable_encyclopedia', false ) ) {
            $this->container->get( Encyclopedia::class );
        }
        if ( $this->settings->get( 'enable_glossaries', false ) ) {
            $this->container->get( Glossaries::class );
        }

        add_filter('the_content', [$this, 'wrap_glossaries']);

    }

    public function render_attachment_markup() {
        echo do_shortcode( '[betterdocs_attachments]' );
    }

    public function render_related_docs_shortcode() {
        echo do_shortcode( '[betterdocs_related_docs]' );
    }

    public function set_cookie_for_last_kb() {
        $post_type = get_post_type( get_the_ID() );
        if ( $post_type != 'docs' ) {
            $document = Plugin::$instance->documents->get( get_the_ID() ) != false ? Plugin::$instance->documents->get( get_the_ID() ) : [];
            $document_element_data = ! empty( $document ) ? $document->get_elements_data() : [];
            $kb_slug  = $this->recursively_search_for_kb_slug_in_elementor_content( $document_element_data, 'selected_knowledge_base', 'betterdocs-category-grid' );
            if ( $kb_slug != false ) {
                setcookie( 'last_knowledge_base', $kb_slug, time() + ( YEAR_IN_SECONDS * 2 ), "/" );
            }
        }
    }

    /**
     * Recursively Search For Betterdocs Elementor Widget Key On Elementor Post Content
     *
     * @param array   $element_data
     * @param string  $key
     * @param string  $widget_type
     * @param boolean $accumulator
     *
     * @return string
     */
    public function recursively_search_for_kb_slug_in_elementor_content( $element_data, $key, $widget_type, $accumulator = false ) {
        foreach ( $element_data as $data ) {
            if ( array_key_exists( $key, $data['settings'] ) && $data['widgetType'] == $widget_type ) {
                $accumulator = $data['settings'][$key];
            } else {
                $accumulator = $this->recursively_search_for_kb_slug_in_elementor_content( $data['elements'], $key, $widget_type, $accumulator );
            }
        }
        return $accumulator;
    }

    public function enqueue_scripts() {
        if ( is_singular( 'docs' ) ) {
            wp_enqueue_style( 'single-doc-attachments' );
            wp_enqueue_style( 'single-doc-related-articles' );
        }

        if ( is_tax( 'knowledge_base' ) ) {
            wp_enqueue_style( 'betterdocs-docs' );
        }

        if ( is_post_type_archive( 'docs' ) || is_singular( 'docs' ) || is_tax( 'doc_category' ) || is_tax( 'knowledge_base' ) ) {
            wp_enqueue_script( 'betterdocs-pro' );
        }
    }

    public function is_archive( $is_archive ) {
        return $is_archive || is_tax( 'knowledge_base' );
    }

    public function archives_template( $template, $layout, $_default_template, $views ) {
        $_is_kb    = is_tax( 'knowledge_base' );
        $_template = $template;

        if ( is_post_type_archive( 'docs' ) ) {
            if ( $this->settings->get( 'multiple_kb' ) ) {
                $kb_layout = $this->database->get_theme_mod( 'betterdocs_multikb_layout_select', 'layout-1' );
                $_template = 'templates/archives/mkb/' . $kb_layout;
            }
        } elseif ( is_tax( 'doc_category' ) ) {
            global $wp_query;
            $_kb_slug = isset( $wp_query->query['knowledge_base'] ) ? $wp_query->query['knowledge_base'] : null;
            if ( $_kb_slug ) {
                setcookie( 'last_knowledge_base', $_kb_slug, time() + ( YEAR_IN_SECONDS * 2 ), "/" );
            }
            $category_layout = $this->database->get_theme_mod( 'betterdocs_archive_layout_select', 'layout-1' );
            $_template       = 'templates/archives/categories/' . $category_layout;
        }

        if ( $_is_kb ) {
            $object = get_queried_object();
            setcookie( 'last_knowledge_base', $object->slug, time() + ( YEAR_IN_SECONDS * 2 ), "/" );
        }

        if ( ! empty( $_template ) ) {
            $eligible_template = $views->path( $_template, $_default_template );

            if ( file_exists( $eligible_template ) ) {
                $template = &$eligible_template;
            }
        }

        return $template;
    }

    public function layout_3_template_params( $params, $layout, $term ) {
        if ( $layout === 'layout-3' ) {
            $params['term_count'] = [
                'count'           => isset( $params['term_count']['count'] ) ? $params['term_count']['count'] : 0,
                'prefix'          => '',
                'suffix'          => __( 'articles', 'betterdocs' ),
                'suffix_singular' => __( 'article', 'betterdocs' )
            ];
        }

        return $params;
    }

    public function layout_3_header_sequence( $_layout_sequence, $layout, $style_type, $term ) {
        $_return_val = $_layout_sequence;

        if ( $layout === 'layout-3' && $style_type == 'box' ) {
            $_count = array_pop( $_return_val );

            $_return_val['description'] = function () use ( $term ) {
                betterdocs()->views->get( 'template-parts/common/description', [
                    'description' => $term->description
                ] );
            };

            $_return_val['count'] = $_count;
        }

        return $_return_val;
    }

    public function layout_filename( $filename, $origin_layout ) {
        $filename = ( $origin_layout === 'layout-3' ) ? 'default' : $filename;
        return $filename;
    }

    public function search_form_attr( $atts ) {
        $search_button_text = betterdocs()->settings->get( 'search_button_text', __( 'Search', 'betterdocs-pro' ) );

        $atts['category_search']      = false;
        $atts['search_button']        = false;
        $atts['popular_search']       = false;
        $atts['popular_search_title'] = '';
        $atts['search_button_text']   = $search_button_text;

        return $atts;
    }

    public function search_shortcode_attributes( $atts ) {
        $atts['category_search']      = betterdocs()->customizer->defaults->get( 'betterdocs_category_search_toggle' );
        $atts['search_button']        = betterdocs()->customizer->defaults->get( 'betterdocs_search_button_toggle' );
        $atts['popular_search']       = betterdocs()->customizer->defaults->get( 'betterdocs_popular_search_toggle' );
        $atts['popular_search_title'] = betterdocs()->customizer->defaults->get( 'betterdocs_popular_search_text' );
        return $atts;
    }

    public function advance_search_form( $attr ) {
        return betterdocs()->views->get( 'template-parts/search/category-button', $attr['params'] );
    }

    public function popular_search_keyword( $attr ) {
        return betterdocs()->views->get( 'template-parts/search/popular-keyword', $attr['params'] );
    }


    public function fetch_glossaries($letter = '') {
        global $wpdb;
    
        // Get settings
        $encyclopedia_source = betterdocs()->settings->get('encyclopedia_source', 'docs');
        $enable_glossaries = betterdocs()->settings->get('enable_glossaries', false);
    
        // Check if glossaries are enabled and the source is 'glossaries'
        if (betterdocs()->is_pro_active() && $enable_glossaries && $encyclopedia_source === 'glossaries') {
            // Prepare the base query
            $query = "
                SELECT t.term_id, t.name, t.slug, '' AS post_excerpt, CONCAT('" . get_home_url() . "/glossaries/', t.slug) AS permalink, tt.description
                FROM {$wpdb->terms} t
                INNER JOIN {$wpdb->term_taxonomy} tt ON t.term_id = tt.term_id
                WHERE tt.taxonomy = 'glossaries'
            ";
    
            // Add letter filtering if a letter is specified
            if (!empty($letter)) {
                $query .= $wpdb->prepare(" AND LEFT(t.name, 1) = %s", $letter);
            }
    
            // Append the ordering clause
            $query .= " ORDER BY t.name ASC";
    
            // Execute the query
            $results = $wpdb->get_results($query, ARRAY_A);
    
            // Retrieve meta data for each term
            $current_glossaries = [];
            foreach ($results as $result) {
                $term_id = $result['term_id'];
                $meta_data = get_term_meta($term_id);
    
                // Include meta data in the result
                $result['meta_data'] = $meta_data;
                $current_glossaries[] = $result;
            }
    
            return $current_glossaries;
        }
    
        return []; // Return an empty array if glossaries are not enabled or source is not 'glossaries'
    }
    
    

    public function wrap_glossaries($content) {

        if ( is_singular( 'docs' ) ) {
            // Fetch glossary terms from the database or any other source
            $glossaries = $this->fetch_glossaries();
            
            // Initialize an array to store glossary terms and their wrapped HTML versions
            $glossary_terms = [];
            foreach ($glossaries as $glossary) {
                $glossary_terms[strtolower($glossary['name'])] = '<span class="glossary-tooltip-container" data-tooltip="' . esc_attr($glossary['description']) . '"><a href="' . esc_url(get_term_link($glossary['slug'], 'glossaries')) . '" target="_blank">' . esc_html($glossary['name']) . '</a></span>';
            }
        
            // Prepare the regex pattern to match glossary terms outside of HTML attributes
            $pattern = '/\b(' . implode('|', array_map('preg_quote', array_keys($glossary_terms))) . ')\b(?![^<>]*>)(?=(?:[^<]*<[^>]*>)*[^<]*$)/i';
        
            // Callback function to replace matched terms
            $callback = function($matches) use ($glossary_terms) {
                $term = strtolower($matches[1]); // Convert matched term to lowercase for lookup
                return isset($glossary_terms[$term]) ? $glossary_terms[$term] : $matches[0];
            };
        
            // Perform the replacement
            $content = preg_replace_callback($pattern, $callback, $content);
        
            return $content;
        }

        return $content;
    }
}
