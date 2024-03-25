<?php

namespace WPDeveloper\BetterDocsPro\Editors\BlockEditor\Blocks;

use WPDeveloper\BetterDocs\Editors\BlockEditor\Block;

class Handbook extends Block {

    public $is_pro = true;

    protected $editor_scripts = [];

    protected $editor_styles = [
        'betterdocs-category-grid-list',
        'betterdocs-el-articles-list',
        'betterdocs-handbook-block'
    ];

    protected $frontend_styles = [
        'betterdocs-category-grid-list',
        'betterdocs-category-grid',
        'betterdocs-handbook-block'
    ];

    /**
     * unique name of block
     * @return string
     */
    public function get_name() {
        return 'handbook';
    }

    public function get_default_attributes() {
        return [
            'blockId'                 => '',
            'resOption'               => 'Desktop',
            'blockRoot'               => 'better_docs',
            'blockMeta'               => null,
            'includeCategories'       => '',
            'excludeCategories'       => '',
            'terms'                   => '',
            'terms_orderby'           => '',
            'terms_order'             => '',
            'terms_include'           => '',
            'terms_exclude'           => '',
            'terms_offset'            => '',
            'handbookPerPage'         => 9,
            'orderBy'                 => 'name',
            'order'                   => 'asc',
            'postsPerPage'            => 5,
            'postsOrderBy'            => 'date',
            'postsOrder'              => 'asc',
            'enableNestedSubcategory' => false,
            'layout'                  => 'default',
            'layoutMode'              => 'handbook',
            'showIcon'                => true,
            'showThumbnail'           => true,
            'showTitle'               => true,
            'showDescription'         => true,
            'titleTag'                => 'h2',
            'showCount'               => true,
            'showList'                => true,
            'showButton'              => true,
            'buttonText'              => __( 'Explore More', 'betterdocs' ),
            'titleColor'              => '#eeee22',
            'titleHoverColor'         => null,
            'countColor'              => '#ffffff',
            'countHoverColor'         => null,
            'listIcon'                => 'far fa-file-alt',
            'listColor'               => '#566e8b',
            'listHoverColor'          => null,
            'iconColor'               => null,
            'showButtonIcon'          => true,
            'buttonIcon'              => 'fas fa-arrow-right',
            'buttonIconPosition'      => 'after',
            'buttonColor'             => '#528ffe',
            'buttonHoverColor'        => null,
            'buttonPosition'          => 'left'
        ];
    }

    public function render( $attributes, $content ) {
        add_filter( 'betterdocs_header_layout_sequence', [$this, 'header_sequence'], 10, 4 );
        $this->views( 'layouts/base' );
        remove_filter( 'betterdocs_header_layout_sequence', [$this, 'header_sequence'], 10 );
    }

    public function view_params() {
        $attributes = &$this->attributes;

        $default_multiple_kb = betterdocs()->settings->get( 'multiple_kb', false );

        $terms_query = [
            'taxonomy'   => 'doc_category',
            'order'      => $this->attributes['order'],
            'orderby'    => $this->attributes['orderBy'],
            'number'     => $this->attributes['handbookPerPage'],
            'hide_empty' => true
        ];

        if ( $terms_query['orderby'] == 'doc_category_order' ) {
            $terms_query['orderby']  = 'meta_value_num';
            $terms_query['meta_key'] = 'doc_category_order';
        }

        $includes = $this->string_to_array( $this->attributes['includeCategories'] );
        $excludes = $this->string_to_array( $this->attributes['excludeCategories'] );

        if ( ! empty( $includes ) ) {
            $terms_query['include'] = array_diff( $includes, (array) $excludes );
        }

        if ( ! empty( $excludes ) ) {
            $terms_query['exclude'] = $excludes;
        }

        if ( $this->attributes['terms_offset'] ) {
            $terms_query['offset'] = (int) $this->attributes['terms_offset'];
        }

        $object = get_queried_object();

        if ( is_tax( 'knowledge_base' ) && $default_multiple_kb == 1 ) {
            $terms_query['meta_query'] = [
                'relation' => 'OR',
                [
                    'key'     => 'doc_category_knowledge_base',
                    'value'   => $object->slug,
                    'compare' => 'LIKE'
                ]
            ];
        }

        $docs_query = [
            'orderby'            => $this->attributes['postsOrderBy'],
            'order'              => $this->attributes['postsOrder'],
            'posts_per_page'     => $this->attributes['postsPerPage'],
            'nested_subcategory' => $attributes['enableNestedSubcategory']
        ];

        return [
            'wrapper_attr'            => ['class' => ['betterdocs-category-grid-list-wrapper block-shortcode']],
            'inner_wrapper_attr'      => ['class' => 'layout-6 betterdocs-category-grid-list-inner-wrapper'],
            'layout'                  => 'default',
            'widget_type'             => 'category-grid-list',
            'kb_slug'                 => is_tax( 'knowledge_base' ) && $default_multiple_kb == 1 ? $object->slug : '',
            'multiple_knowledge_base' => $default_multiple_kb == 1 ? $default_multiple_kb : false,

            'terms_query_args'        => $terms_query,
            'docs_query_args'         => $docs_query,

            'image_size'              => 'full',
            'show_header'             => true,
            'show_title'              => $this->attributes['showTitle'],

            'show_list'               => $this->attributes['showList'],
            'list_icon_position'      => 'right',
            'list_icon_name'          => 'doc-list-arrow',

            'show_button'             => $this->attributes['showButton'],

            'show_button_icon'        => $this->attributes['showButtonIcon'],
            'show_count'              => $this->attributes['showCount'],
            'show_description'        => $this->attributes['showDescription'],
            'title_tag'               => $this->attributes['titleTag'],
            'button_icon_position'    => $this->attributes['buttonIconPosition'],
            'button_icon'             => 'explore-more',
            'button_text'             => $this->attributes['buttonText'],
            'show_term_image'         => $this->attributes['showThumbnail']
        ];
    }

    public function header_sequence( $_layout_sequence, $layout, $widget_type, $_defined_vars ) {
        $_new_layout_sequence = [
            [
                'class'    => 'betterdocs-category-title-counts',
                'sequence' => ['category_title', 'category_counts']
            ],
            'category_description'
        ];

        return $_new_layout_sequence;
    }
}
