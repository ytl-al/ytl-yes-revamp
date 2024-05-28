<?php

namespace WPDeveloper\BetterDocsPro\Editors\Elementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use WPDeveloper\BetterDocs\Editors\Elementor\BaseWidget;

class BetterdocsEncyclopedia extends BaseWidget
{

    public function get_name()
    {
        return 'betterdocs-encyclopedia';
    }

    public function get_title()
    {
        return __('BetterDocs Encyclopedia', 'betterdocs-pro');
    }

    public function get_icon()
    {
        return 'eicon-archive-posts';
    }

    public function get_categories()
    {
        return ['betterdocs-elements', 'docs-archive'];
    }

    public function get_keywords()
    {
        return ['betterdocs-elements', 'betterdocs-popular-view', 'betterdocs', 'docs', 'betterdocs-encyclopedia'];
    }

    public function get_style_depends()
    {
        return ['betterdocs-encyclopedia'];
    }

    public function get_script_depends()
    {
        return ['betterdocs-encyclopedia'];
    }

    public function get_custom_help_url()
    {
        return 'https://betterdocs.co/#pricing';
    }

    protected function register_controls()
    {
        /**
         * Query Popular Articles
         */
        $this->start_controls_section(
            'encyclopedia_section_controls',
            [
                'label' => __('Encyclopedia Controls', 'betterdocs-pro')
            ]
        );

        $this->add_control(
            'encyclopedia_doc_style',
            [
                'label'    => __('Select Layout', 'betterdocs-pro'),
                'type'     => \Elementor\Controls_Manager::SELECT,
                'options'  => [
                    'doc-list' => __('Classic Layout', 'betterdocs-pro'),
                    'doc-grid' => __('Modern Layout', 'betterdocs-pro'),
                ],
                'default'  => 'doc-grid',
                'priority' => 15,
            ]
        );

        $this->add_control(
            'encyclopedia_start_letter_style',
            [
                'label'    => __('Letter Appearance', 'betterdocs-pro'),
                'type'     => \Elementor\Controls_Manager::SELECT,
                'options'  => [
                    'alphabet-list-view'      => __('Simple', 'betterdocs-pro'),
                    'alphabet-big-view'       => __('Large Cap', 'betterdocs-pro'),
                    'alphabet-big-round-view' => __('Rounded Cap', 'betterdocs-pro'),
                ],
                'default'  => 'alphabet-big-round-view',
                'conditions'     => [
                    'terms' => [
                        [
                            'name'     => 'encyclopedia_doc_style',
                            'operator' => '==',
                            'value'    => 'doc-grid',
                        ],
                    ],
                ],
                'priority' => 16,
            ]
        );

        $this->add_control(
            'encyclopedia_start_letter_style_',
            [
                'label'    => __('Letter Appearance', 'betterdocs-pro'),
                'type'     => \Elementor\Controls_Manager::SELECT,
                'options'  => [
                    'alphabet-list-view' => __('Simple', 'betterdocs-pro'),
                ],
                'default'  => 'alphabet-list-view',
                'conditions'     => [
                    'terms' => [
                        [
                            'name'     => 'encyclopedia_doc_style',
                            'operator' => '==',
                            'value'    => 'doc-list',
                        ],
                    ],
                ],
                'priority' => 16,
            ]
        );

        $this->add_control(
            'encyclopedia_alphabet_list_style',
            [
                'label'    => __('Navigation Style', 'betterdocs-pro'),
                'type'     => \Elementor\Controls_Manager::SELECT,
                'options'  => [
                    'box'     => __('Box', 'betterdocs-pro'),
                    'default' => __('Default', 'betterdocs-pro'),
                ],
                'default'  => 'box',
                'priority' => 16,
            ]
        );

        $this->add_control(
            'encyclopedia_dictionary_loadmore',
            [
                'label'          => __('Encyclopedia Page Load More', 'betterdocs-pro'),
                'type'           => \Elementor\Controls_Manager::SWITCHER,
                'label_block'    => false,
                'default'        => 'yes',
                'priority'       => 17,
            ]
        );

        $this->add_control(
            'encyclopedia_dictionary_per_page',
            [
                'label'       => __('Encyclopedia Per Page', 'betterdocs-pro'),
                'type'        => \Elementor\Controls_Manager::NUMBER,
                'label_block' => false,
                'default'     => 5,
                'priority'    => 18,
            ]
        );

        $this->add_control(
            'encyclopedia_dictionary_docs_loadmore',
            [
                'label'          => __('Individual Encyclopedia Page Load More', 'betterdocs-pro'),
                'type'           => \Elementor\Controls_Manager::SWITCHER,
                'label_block'    => false,
                'default'        => 'yes',
                'priority'       => 19,
            ]
        );

        $this->add_control(
            'encyclopedia_dictionary_docs_per_page',
            [
                'label'       => __('Encyclopedia Docs Per Page', 'betterdocs-pro'),
                'type'        => \Elementor\Controls_Manager::NUMBER,
                'label_block' => false,
                'default'     => 10,
                'priority'    => 20,
            ]
        );
        $this->add_control(
            'encyclopedia_dictionary_learn_more_text',
            [
                'label'       => __('Learn More Text', 'betterdocs-pro'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'default'     => 'Learn More',
                'priority'    => 20,
            ]
        );
        $this->add_control(
            'encyclopedia_dictionary_loadmore_button_text',
            [
                'label'       => __('Load More Text', 'betterdocs-pro'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'default'     => 'Load More',
                'priority'    => 20,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'encyclopedia_style_control_sections',
            [
                'label'       => __('Encyclopedia Layout', 'embedpress'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Main Container Background Color Controls
        $this->add_control(
            'encyclopedia_container_background_color',
            [
                'label'     => __('Background Color', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .betterdocs-encyclopedia-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Main Container Padding Controls
        $this->add_control(
            'encyclopedia_container_padding',
            [
                'label'      => __('Padding', 'betterdocs-pro'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .betterdocs-encyclopedia-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Main Container Padding Controls
        $this->add_control(
            'encyclopedia_container_margin',
            [
                'label'      => __('Margin', 'betterdocs-pro'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .betterdocs-encyclopedia-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Letter Start Border Controls
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'encyclopedia_border',
                'label'    => __('Border', 'betterdocs-pro'),
                'selector' => '{{WRAPPER}} .betterdocs-encyclopedia-wrapper',
            ]
        );

        // Tools Card Link Container Margin Controls
        $this->add_control(
            'encyclopedia_border_radius',
            [
                'label'      => __('Border Radius', 'betterdocs-pro'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .betterdocs-encyclopedia-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'alphabets_style_control_sections',
            [
                'label'       => __('Navigation', 'embedpress'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Main Container Heading
        $this->add_control(
            'alphabets_container_heading',
            [
                'label'     => __('Navigation Container', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Main Container Background Color Controls
        $this->add_control(
            'alphabets_container_background_color',
            [
                'label'     => __('Background Color', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .encyclopedia-alphabet-list,{{WRAPPER}} .encyclopedia-alphabets' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Main Container Padding Controls
        $this->add_control(
            'alphabets_container_padding',
            [
                'label'      => __('Padding', 'betterdocs-pro'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .encyclopedia-alphabets' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        // Main Container Margin Controls
        $this->add_control(
            'alphabets_container_margin',
            [
                'label'      => __('Margin', 'betterdocs-pro'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .encyclopedia-alphabets' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Main Container Heading
        $this->add_control(
            'alphabets_link_heading',
            [
                'label'     => __('Navigation Link', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Typography Controls for Alphabet Links
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'alphabet_typography',
                'selector' => '{{WRAPPER}} .encyclopedia-alphabet-list a',

            ]
        );

        // Color Controls for Alphabet Links
        $this->add_control(
            'alphabet_color',
            [
                'label'     => __('Color', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .encyclopedia-alphabet-list a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'alphabet_acitve_color',
            [
                'label'     => __('Active Color', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} li.alphabet-list-item.active a' => 'color: {{VALUE}}!important;',
                ],
            ]
        );
        $this->add_control(
            'alphabet_acitve_bg_color',
            [
                'label'     => __('Active Background Color', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} li.alphabet-list-item.active' => 'background-color: {{VALUE}}!important;',
                ],
            ]
        );
        
        $this->add_control(
            'alphabet_disabled_color',
            [
                'label'     => __('Disabled Color', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .encyclopedia-alphabet-list a.letter-has-no-docs' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Background Color Controls for Alphabet Links
        $this->add_control(
            'alphabet_background_color',
            [
                'label'     => __('Background Color', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .encyclopedia-alphabet-list a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Padding Controls for Alphabet Links
        $this->add_control(
            'alphabet_padding',
            [
                'label'      => __('Padding', 'betterdocs-pro'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .encyclopedia-alphabet-list a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Margin Controls for Alphabet Links
        $this->add_control(
            'alphabet_margin',
            [
                'label'      => __('Margin', 'betterdocs-pro'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .encyclopedia-alphabet-list a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );  

        $this->end_controls_section();

        $this->start_controls_section(
            'start_letter_style_control_sections',
            [
                'label'       => __('Letter Appearance', 'embedpress'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Letter Start Typography Controls
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'letter_start_typography',
                'selector' => '{{WRAPPER}} .letter-start span',
            ]
        );

        // Letter Start Color Controls
        $this->add_control(
            'letter_start_color',
            [
                'label'     => __('Color', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .letter-start span' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Letter Start Background Color Controls
        $this->add_control(
            'letter_start_background_color',
            [
                'label'     => __('Background Color', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .letter-start' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Letter Start Color Controls
        $this->add_control(
            'letter_start_inner_bgcolor',
            [
                'label'     => __('Inner Background Color', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .letter-start span' => 'background-color: {{VALUE}}!important;',
                ],
                'conditions'     => [
                    'terms' => [
                        [
                            'name'     => 'encyclopedia_start_letter_style',
                            'operator' => '==',
                            'value'    => 'alphabet-big-round-view',
                        ],
                    ],
                ],
            ]
        );

        // Letter Start Padding Controls
        $this->add_control(
            'letter_start_padding',
            [
                'label'      => __('Padding', 'betterdocs-pro'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .letter-start' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Letter Start Margin Controls
        $this->add_control(
            'letter_start_margin',
            [
                'label'      => __('Margin', 'betterdocs-pro'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .letter-start' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Letter Start Border Controls
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'letter_start_border',
                'label'    => __('Border', 'betterdocs-pro'),
                'selector' => '{{WRAPPER}} .letter-start',
            ]
        );
        $this->end_controls_section();

        // Encyclopedia Item Section
        $this->start_controls_section(
            'encyclopedia_item_style_control_sections',
            [
                'label' => __('Encyclopedia Item', 'betterdocs-pro'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Tools Card Sample Text Color Controls
        $this->add_control(
            'encyclopedia_item_bgcolor',
            [
                'label'     => __('Item Background Color', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .encyclopedia-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Main Container Heading
        $this->add_control(
            'encyclopedia_item_title_heading',
            [
                'label'     => __('Title', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        // Tools Card Title Typography Controls
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'tools_card_title_typography',
                'selector' => '{{WRAPPER}} .encyclopedia-item .tools-card .top-tools-card .heading-small, {{WRAPPER}} .layout-doc-list .heading-small.tools-card__title-text',

            ]
        );

        // Tools Card Title Color Controls
        $this->add_control(
            'tools_card_title_color',
            [
                'label'     => __('Color', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .encyclopedia-item .tools-card .top-tools-card .heading-small,{{WRAPPER}} .layout-doc-list .heading-small.tools-card__title-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Main Container Heading
        $this->add_control(
            'encyclopedia_item_excerpt_heading',
            [
                'label'     => __('Excerpt', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Tools Card Sample Text Typography Controls
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'tools_card_sample_text_typography',
                'selector' => '{{WRAPPER}} .encyclopedia-item .tools-card .top-tools-card .tools-card__sample-text',

            ]
        );

        // Tools Card Sample Text Color Controls
        $this->add_control(
            'tools_card_sample_text_color',
            [
                'label'     => __('Color', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .encyclopedia-item .tools-card .top-tools-card .tools-card__sample-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Main Container Background Color Controls
        $this->add_control(
            'tools_card_sample_text_bg_color',
            [
                'label'     => __('Background', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .layout-doc-list .top-tools-card' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .layout-doc-list .top-tools-card::before' => 'border-top-color: {{VALUE}};',
                ],
                'condition' => [
                    'encyclopedia_doc_style' => 'doc-list'
                ]
            ]
        );

        // Letter Start Border Controls
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'tools_card_sample_text_border',
                'label'    => __('Border', 'betterdocs-pro'),
                'selector' => '{{WRAPPER}} .layout-doc-list .top-tools-card',
                'condition' => [
                    'encyclopedia_doc_style' => 'doc-list'
                ]
            ]
        );

        // Main Container Heading
        $this->add_control(
            'encyclopedia_item_link_heading',
            [
                'label'     => __('Link', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Tools Card Link Container Margin Controls
        $this->add_control(
            'tools_card_link_container_margin',
            [
                'label'      => __('Margin', 'betterdocs-pro'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .encyclopedia-item .tools-card .tools-card_link-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Tools Card Link Typography Controls
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'tools_card_link_typography',
                'selector' => '{{WRAPPER}} .encyclopedia-item .tools-card .tools-card_link-container .text-style-link',

            ]
        );

        // Tools Card Link Color Controls
        $this->add_control(
            'tools_card_link_color',
            [
                'label'     => __('Color', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .encyclopedia-item .tools-card .tools-card_link-container .text-style-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Tools Card Arrow Link Color Controls
        $this->add_control(
            'tools_card_arrow_link_color',
            [
                'label'     => __('Arrow Color', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .encyclopedia-item .tools-card .tools-card_link-container .tools-card_arrow' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Main Container Heading
        $this->add_control(
            'encyclopedia_item_explore_more_heading',
            [
                'label'     => __('Explore More', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Tools Card Link Typography Controls
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'explore_more_text_typography',
                'selector' => '{{WRAPPER}} .encyclopedia-item.explore-more-docs a span',

            ]
        );

        // Tools Card Link Color Controls
        $this->add_control(
            'explore_more_text_color',
            [
                'label'     => __('Color', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .encyclopedia-item.explore-more-docs a span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .encyclopedia-item.explore-more-docs a svg path' => 'stroke: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        // Encyclopedia Item Section
        $this->start_controls_section(
            'encyclopedia_loadmore_style_control_sections',
            [
                'label' => __('Load More', 'betterdocs-pro'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Tools Card Link Typography Controls
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'loadmore_button_typography',
                'selector' => '{{WRAPPER}} .encyclopedia-loadmore-btn',

            ]
        );

        // Tools Card Link Color Controls
        $this->add_control(
            'loadmore_button_color',
            [
                'label'     => __('Color', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .encyclopedia-loadmore-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'loadmore_button_bg_color',
            [
                'label'     => __('Background Color', 'betterdocs-pro'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .encyclopedia-loadmore-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render_callback()
    {

        $settings = &$this->attributes;

        $default_controls = [
            'doc_style' => isset($settings['encyclopedia_doc_style']) ? $settings['encyclopedia_doc_style'] : '',
            'start_letter_style' => isset($settings['encyclopedia_start_letter_style']) ? $settings['encyclopedia_start_letter_style'] : '',
            'start_letter_style_' => isset($settings['encyclopedia_start_letter_style_']) ? $settings['encyclopedia_start_letter_style_'] : '',
            'alphabet_list_style' => isset($settings['encyclopedia_alphabet_list_style']) ? $settings['encyclopedia_alphabet_list_style'] : '',
            'dictionary_loadmore' => isset($settings['encyclopedia_dictionary_loadmore']) ? $settings['encyclopedia_dictionary_loadmore'] : '',
            'dictionary_per_page' => isset($settings['encyclopedia_dictionary_per_page']) ? $settings['encyclopedia_dictionary_per_page'] : '',
            'dictionary_loadmore_button_text'  => isset($settings['encyclopedia_dictionary_loadmore_button_text']) ? $settings['encyclopedia_dictionary_loadmore_button_text'] : '',
            'dictionary_learn_more_text'       => isset($settings['encyclopedia_dictionary_learn_more_text']) ? $settings['encyclopedia_dictionary_learn_more_text'] : '',
            'dictionary_docs_loadmore' => isset($settings['encyclopedia_dictionary_docs_loadmore']) ? $settings['encyclopedia_dictionary_docs_loadmore'] : '',
            'dictionary_docs_per_page' => isset($settings['encyclopedia_dictionary_docs_per_page']) ? $settings['encyclopedia_dictionary_docs_per_page'] : '',
            'explore_more_text_color' => isset($settings['explore_more_text_color']) ? $settings['explore_more_text_color'] : '',

            'is_customizer' => false

        ];

        betterdocs_pro()->views->get('layouts/encyclopedia/default', $default_controls);
    }

    public function view_params()
    {
        $settings = &$this->attributes;

        $multiple_kb_status = betterdocs()->editor->get('elementor')->multiple_kb_status();

        $class   = ['betterdocs-popular-articles-wrapper'];
        $class[] = $multiple_kb_status ? 'multiple-kb' : 'single-kb';

        return [
            'wrapper_attr'       => [
                'class' => $class
            ],
            'nested_subcategory' => false,
            'list_icon_name'     => 'list',
            'title_tag'          => $settings['popular-layout-title-tag'],
            'title'              => $settings['popular_docs_name'],
            'query_args'         => $this->betterdocs('query')->docs_query_args([
                'post_type'      => 'docs',
                'posts_per_page' => $settings['popular_posts_number'],
                'meta_key'       => '_betterdocs_meta_views',
                'orderby'        => 'meta_value_num',
                'order'          => $settings['articles_sort']
            ], ['tax_query'])
        ];
    }
}
