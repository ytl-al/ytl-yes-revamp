<?php
namespace WPDeveloper\BetterDocs\Editors\Elementor\Widget;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use ElementorPro\Base\Base_Widget_Trait;
use WPDeveloper\BetterDocs\Editors\Elementor\BaseWidget;

class ArchiveList extends BaseWidget {

    use Base_Widget_Trait;

    public function get_name() {
        return 'betterdocs-category-archive-list';
    }

    public function get_title() {
        return __( 'Doc Category Archive List', 'betterdocs' );
    }

    public function get_icon() {
        return 'eicon-post-list betterdocs-eicon-post-list';
    }

    public function get_categories() {
        return ['betterdocs-elements', 'docs-archive'];
    }

    public function get_style_depends() {
        return ['betterdocs-el-articles-list', 'betterdocs-fontawesome', 'betterdocs-category-archive-doc-list'];
    }

    public function get_keywords() {
        return ['betterdocs-elements', 'title', 'heading', 'betterdocs', 'docs', 'doc-category', 'doc-category-archive'];
    }

    public function get_custom_help_url() {
        return 'https://betterdocs.co/docs/docs-archive-in-elementor/';
    }

    protected function register_controls() {
        $this->section_content();
        $this->container_wrapper_section();
        $this->list_settings();
        $this->subcat_list_settings();

        $this->container_wrapper_section_layout_2();
        $this->list_settings_layout_2();
    }

    public function section_content() {
        $this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Controls', 'betterdocs' )
            ]
        );

        $this->add_control(
            'section_betterdocs_archive_list_layout',
            [
                'label'       => esc_html__( 'Select layout', 'betterdocs' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'layout-1',
                'label_block' => false,
                'options'     => [
                    'layout-1' => esc_html__( 'Layout 1', 'betterdocs' ),
                    'layout-2' => esc_html__( 'Layout 2', 'betterdocs' )
                ]
            ]
        );

        $this->add_control(
            'alphabetic_order',
            [
                'label'   => __( 'Order By', 'betterdocs' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'none'             => __( 'No order', 'betterdocs' ),
                    'title'            => __( 'Title', 'betterdocs' ),
                    'slug'             => __( 'Slug', 'betterdocs' ),
                    'term_group'       => __( 'Term Group', 'betterdocs' ),
                    'term_id'          => __( 'Term ID', 'betterdocs' ),
                    'id'               => __( 'ID', 'betterdocs' ),
                    'description'      => __( 'Description', 'betterdocs' ),
                    'parent'           => __( 'Parent', 'betterdocs' ),
                    'betterdocs_order' => __( 'BetterDocs Order', 'betterdocs' )
                ],
                'default' => 'title'
            ]
        );

        $this->add_control(
            'order',
            [
                'label'   => __( 'Order', 'betterdocs' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => 'Ascending',
                    'desc' => 'Descending'
                ],
                'default' => 'asc'

            ]
        );

        $this->add_control(
            'nested_subcategory',
            [
                'label'        => __( 'Nested Subcategory', 'betterdocs' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'betterdocs' ),
                'label_off'    => __( 'Hide', 'betterdocs' ),
                'return_value' => '1',
                'default'      => '1'
            ]
        );

        $this->add_control(
            'important_note',
            [
                'type'            => Controls_Manager::RAW_HTML,
                'raw'             => __( 'Note: This is the preview only for Elementor Editor. You will see the real view in the archive page itself.', 'betterdocs' ),
                'content_classes' => 'betterdocs-elementor-note elementor-panel-alert elementor-panel-alert-info'
            ]
        );

        $this->end_controls_section();
    }

    public function container_wrapper_section() {
        $this->start_controls_section(
            'archive_list_container_section',
            [
                'label' => __( 'Container Section', 'betterdocs' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'       => [
                    'section_betterdocs_archive_list_layout' => ['layout-1']
                ]
            ]
        );

        $this->add_responsive_control(
            'archive_list_container_padding',
            [
                'label'      => __( 'Padding', 'betterdocs' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .betterdocs-articles-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'archive_list_container_margin',
            [
                'label'      => __( 'Margin', 'betterdocs' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .betterdocs-articles-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }

    public function container_wrapper_section_layout_2() {
        $this->start_controls_section(
            'archive_list_container_section_layout_2',
            [
                'label' => __( 'Container Section', 'betterdocs' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'       => [
                    'section_betterdocs_archive_list_layout' => ['layout-2']
                ]
            ]
        );

        $this->add_responsive_control(
            'archive_list_container_padding_layout_2',
            [
                'label'      => __( 'Padding', 'betterdocs' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .betterdocs-title-excerpt-lists' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'archive_list_container_margin_layout_2',
            [
                'label'      => __( 'Margin', 'betterdocs' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .betterdocs-title-excerpt-lists' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }

    public function list_settings() {
        /**
         * ----------------------------------------------------------
         * Section: List Settinggs
         * ----------------------------------------------------------
         */
        $this->start_controls_section(
            'section_article_settings',
            [
                'label' => __( 'Category List', 'betterdocs' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'       => [
                    'section_betterdocs_archive_list_layout' => ['layout-1']
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'list_item_typography',
                'selector' => '{{WRAPPER}} .betterdocs-articles-list li a'
            ]
        );

        $this->add_control(
            'list_word_wrap',
            [
                'label'     => __( 'Word Wrap', 'betterdocs' ),
                'type'      => Controls_Manager::SELECT2,
                'multiple'  => false,
                'options'   => [
                    'normal'     => 'normal',
                    'break-word' => 'break-word',
                    'initial'    => 'initial',
                    'inherit'    => 'inherit'
                ],
                'default'   => 'normal',
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-articles-list li a' => 'word-wrap: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'list_color',
            [
                'label'     => esc_html__( 'Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-articles-list li a' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'list_hover_color',
            [
                'label'     => esc_html__( 'Hover Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-articles-list li a:hover' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'list_margin',
            [
                'label'      => esc_html__( 'List Item Spacing', 'betterdocs' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .betterdocs-articles-list li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'icon_settings_heading',
            [
                'label'     => esc_html__( 'List Icon', 'betterdocs' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'list_icon',
            [
                'label'   => __( 'Icon', 'betterdocs' ),
                'type'    => Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'far fa-file-alt',
                    'library' => 'fa-regular'
                ]
            ]
        );

        $this->add_control(
            'list_icon_color',
            [
                'label'     => esc_html__( 'Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-articles-list li svg' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .betterdocs-articles-list li i' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'list_icon_size',
            [
                'label'      => __( 'Size', 'betterdocs' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range'      => [
                    '%' => [
                        'max'  => 100,
                        'step' => 1
                    ]
                ],
                'selectors'  => [
                    '{{WRAPPER}} .betterdocs-articles-list li svg' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .betterdocs-articles-list .betterdocs-nested-category-title svg' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .betterdocs-articles-list li i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .betterdocs-articles-list .betterdocs-nested-category-title i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .betterdocs-articles-list li img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .betterdocs-articles-list .betterdocs-nested-category-title img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'list_icon_spacing',
            [
                'label'      => esc_html__( 'Spacing', 'betterdocs' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
					'top' => 0,
					'right' => 5,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
                'selectors'  => [
                    '{{WRAPPER}} .betterdocs-articles-list li svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .betterdocs-articles-list li i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section(); # end of 'Column Settings'
    }

    public function list_settings_layout_2() {
         /**
         * ----------------------------------------------------------
         * Section: List Settinggs
         * ----------------------------------------------------------
         */
        $this->start_controls_section(
            'section_article_settings_layout_2',
            [
                'label' => __( 'Category List', 'betterdocs' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'       => [
                    'section_betterdocs_archive_list_layout' => ['layout-2']
                ]
            ]
        );


        $this->add_control(
            'list_color_layout_2',
            [
                'label'     => esc_html__( 'List Background Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-title-excerpt-lists .betterdocs-title-excerpt-list' => 'background-color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'list_hover_color_layout_2',
            [
                'label'     => esc_html__( 'List Background Hover Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-title-excerpt-lists .betterdocs-title-excerpt-list:hover' => 'background-color: {{VALUE}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'list_margin_layout_2',
            [
                'label'      => esc_html__( 'List Item Spacing', 'betterdocs' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .betterdocs-title-excerpt-lists .betterdocs-title-excerpt-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'list_icon_layout_2',
            [
                'label'     => esc_html__( 'List Icon', 'betterdocs' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'list_icon_layout_2_size',
            [
                'label'      => __( 'Size', 'betterdocs' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range'      => [
                    '%' => [
                        'max'  => 100,
                        'step' => 1
                    ]
                ],
                'selectors'  => [
                    '{{WRAPPER}} .betterdocs-title-excerpt-lists .betterdocs-title-excerpt-list h2 span' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'list_title_layout_2',
            [
                'label'     => esc_html__( 'List Title', 'betterdocs' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'list_title_typography_layout_2',
                'selector' => '{{WRAPPER}} .betterdocs-title-excerpt-lists .betterdocs-title-excerpt-list h2 a'
            ]
        );

        $this->add_control(
            'list_title_word_wrap_layout_2',
            [
                'label'     => __( 'Word Wrap', 'betterdocs' ),
                'type'      => Controls_Manager::SELECT2,
                'multiple'  => false,
                'options'   => [
                    'normal'     => 'normal',
                    'break-word' => 'break-word',
                    'initial'    => 'initial',
                    'inherit'    => 'inherit'
                ],
                'default'   => 'normal',
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-title-excerpt-lists .betterdocs-title-excerpt-list h2 a' => 'word-wrap: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'list_title_color_layout_2',
            [
                'label'     => esc_html__( 'Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-title-excerpt-lists .betterdocs-title-excerpt-list h2 a' => 'color: {{VALUE}};'
                ]
            ]
        );
        $this->add_control(
            'list_title_hover_color_layout_2',
            [
                'label'     => esc_html__( 'Hover Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-title-excerpt-lists .betterdocs-title-excerpt-list h2 a:hover' => 'color: {{VALUE}};'
                ]
            ]
        );


        $this->add_control(
            'list_excerpt_title',
            [
                'label'     => esc_html__( 'List Excerpt', 'betterdocs' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );


        $this->add_control(
            'list_excerpt_color',
            [
                'label'     => esc_html__( 'Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-title-excerpt-lists .betterdocs-title-excerpt-list p' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'list_excerpt_color_hover',
            [
                'label'     => esc_html__( 'Hover Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-title-excerpt-lists .betterdocs-title-excerpt-list p:hover' => 'color: {{VALUE}};'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'list_excerpt_typography',
                'selector' => '{{WRAPPER}} .betterdocs-title-excerpt-lists .betterdocs-title-excerpt-list p'
            ]
        );

        $this->add_control(
            'list_excerpt_last_update_time_title',
            [
                'label'     => esc_html__( 'List Updated Time', 'betterdocs' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'list_excerpt_last_update_time_color',
            [
                'label'     => esc_html__( 'Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-title-excerpt-lists .betterdocs-title-excerpt-list .update-date' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'list_excerpt_last_update_time_hover_color',
            [
                'label'     => esc_html__( 'Hover Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-title-excerpt-lists .betterdocs-title-excerpt-list .update-date:hover' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'list_excerpt_last_update_time_background_color',
            [
                'label'     => esc_html__( 'Background Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-title-excerpt-lists .betterdocs-title-excerpt-list .update-date' => 'background-color: {{VALUE}};'
                ]
            ]
        );


        $this->add_control(
            'list_excerpt_last_update_time_background_color_hover',
            [
                'label'     => esc_html__( 'Background Hover Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-title-excerpt-lists .betterdocs-title-excerpt-list .update-date:hover' => 'background-color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'list_excerpt_last_update_time_typography',
                'selector' => '{{WRAPPER}} .betterdocs-title-excerpt-lists .betterdocs-title-excerpt-list .update-date'
            ]
        );

        $this->end_controls_section(); # end of 'Column Settings'
    }

    public function subcat_list_settings() {
        /**
         * ----------------------------------------------------------
         * Section: List Settinggs
         * ----------------------------------------------------------
         */
        $this->start_controls_section(
            'section_list_title_layout_2',
            [
                'label' => __( 'List Title', 'betterdocs' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'       => [
                    'section_betterdocs_archive_list_layout' => ['layout-1']
                ]
            ]
        );

        $this->add_control(
            'subcat_color',
            [
                'label'     => esc_html__( 'Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#3f5876',
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-articles-list li .betterdocs-nested-category-title > a' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'subcat_hover_color',
            [
                'label'     => esc_html__( 'Hover Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#3f5876',
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-articles-list li .betterdocs-nested-category-title > a:hover' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'subcat_font_size',
            [
                'label'      => __( 'Font Size', 'betterdocs' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range'      => [
                    '%' => [
                        'max'  => 100,
                        'step' => 1
                    ]
                ],
                'selectors'  => [
                    '{{WRAPPER}} .betterdocs-articles-list li .betterdocs-nested-category-title > a' => 'font-size: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'subcat_icon_color',
            [
                'label'     => esc_html__( 'Icon Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#3f5876',
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-articles-list li .betterdocs-nested-category-title > svg.toggle-arrow' => 'fill: {{VALUE}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'subcat_icon_size',
            [
                'label'      => __( 'Icon Size', 'betterdocs' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range'      => [
                    '%' => [
                        'max'  => 100,
                        'step' => 1
                    ]
                ],
                'selectors'  => [
                    '{{WRAPPER}} .betterdocs-articles-list li .betterdocs-nested-category-title > svg.toggle-arrow' => 'font-size: {{SIZE}}{{UNIT}}; width: auto;'
                ]
            ]
        );

        $this->add_control(
            'subcategory_list_heading',
            [
                'label'     => esc_html__( 'Subcategory List', 'betterdocs' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'subcat_list_item_typography',
                'selector' => '{{WRAPPER}} .betterdocs-articles-list .betterdocs-nested-category-list li:not(.betterdocs-nested-category-wrapper) a'
            ]
        );

        $this->add_control(
            'subcat_list_word_wrap',
            [
                'label'     => __( 'Word Wrap', 'betterdocs' ),
                'type'      => Controls_Manager::SELECT2,
                'multiple'  => false,
                'options'   => [
                    'normal'     => 'normal',
                    'break-word' => 'break-word',
                    'initial'    => 'initial',
                    'inherit'    => 'inherit'
                ],
                'default'   => 'normal',
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-articles-list .betterdocs-nested-category-list li:not(.betterdocs-nested-category-wrapper) a' => 'word-wrap: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'subcat_list_color',
            [
                'label'     => esc_html__( 'Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-articles-list .betterdocs-nested-category-list li:not(.betterdocs-nested-category-wrapper) a' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'subcat_list_hover_color',
            [
                'label'     => esc_html__( 'Hover Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-articles-list li:not(.betterdocs-nested-category-wrapper) a:hover' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'subcat_list_margin',
            [
                'label'      => esc_html__( 'List Item Spacing', 'betterdocs' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .betterdocs-articles-list .betterdocs-nested-category-list li:not(.betterdocs-nested-category-wrapper)' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'subcat_icon_settings_heading',
            [
                'label'     => esc_html__( 'List Icon', 'betterdocs' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'subcat_list_icon_color',
            [
                'label'     => esc_html__( 'Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-articles-list .betterdocs-nested-category-list li svg:not(.toggle-arrow)' => 'fill: {{VALUE}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'subcat_list_icon_size',
            [
                'label'      => __( 'Size', 'betterdocs' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range'      => [
                    '%' => [
                        'max'  => 100,
                        'step' => 1
                    ]
                ],
                'selectors'  => [
                    '{{WRAPPER}} .betterdocs-articles-list .betterdocs-nested-category-list li svg:not(.toggle-arrow)' => 'width: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'subcat_list_icon_spacing',
            [
                'label'      => esc_html__( 'Spacing', 'betterdocs' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .betterdocs-articles-list .betterdocs-nested-category-list li svg:not(.toggle-arrow)' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section(); # end of 'Column Settings'
    }

    public function reset_attributes(){
        $this->attributes['orderby']      = $this->attributes['alphabetic_order'];
        $this->attributes['post_orderby'] = $this->attributes['alphabetic_order'];
        $this->attributes['post_order']   = $this->attributes['order'];
    }

    protected function render_callback() {
        $this->views( 'widgets/archive-list' );
    }

    public function view_params() {
        global $wp_query;

        $_term_slug = '';
        if ( isset( $wp_query->query ) && array_key_exists( 'doc_category', $wp_query->query ) ) {
            $_term_slug = $wp_query->query['doc_category'];
        }

        $term = get_term_by( 'slug', $_term_slug, 'doc_category' );

        $_docs_query = [
            'term_id'        => isset( $term->term_id ) ? $term->term_id : 0,
            'orderby'        => $this->attributes['alphabetic_order'] == 'slug' ? 'name' : $this->attributes['alphabetic_order'],
            'order'          => $this->attributes['order'],
            'kb_slug'        => '',
            'posts_per_page' => $term == false ? 5 : -1,
            'term_slug'      => isset( $term->slug ) ? $term->slug : ''
        ];

        $term_params = [
            'term'                   => $term,
            'list_icon_url'          => '',
            'nested_subcategory'     => (bool) $this->attributes['nested_subcategory'],
            'list_icon_name'         => $this->attributes['list_icon'],
            'query_args'             => betterdocs()->query->docs_query_args( $_docs_query ),
            'nested_docs_query_args' => [
                'orderby' => $this->attributes['alphabetic_order'],
                'order'   => $this->attributes['order']
            ],
            'nested_terms_query'     => [
                'orderby' => $this->attributes['alphabetic_order'],
                'order'   => $this->attributes['order']
            ],
            'layout_type' => 'widget',
            'archive_layout' => $this->attributes['section_betterdocs_archive_list_layout']
        ];

        if( $this->attributes['section_betterdocs_archive_list_layout'] == 'layout-2' ){
            $term_params = [
                'current_category'  => $term,
                'orderby'           => $this->attributes['alphabetic_order'],
                'order'             => $this->attributes['order'],
                'posts_per_page'    => -1,
                'archive_layout'    => $this->attributes['section_betterdocs_archive_list_layout']
            ];
        }

        return $term_params;
    }

    public function render_plain_content() {}
}
