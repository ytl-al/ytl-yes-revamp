<?php

namespace WPDeveloper\BetterDocs\Editors\Elementor\Widget;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use WPDeveloper\BetterDocs\Editors\Elementor\BaseWidget;

class ReadingTime extends BaseWidget {

    public function get_name() {
        return 'betterdocs-reading-time';
    }

    public function get_style_depends() {
        return ['reading-time'];
    }

    public function get_title() {
        return __( 'Reading Time', 'betterdocs' );
    }

    public function get_icon() {
        return 'eicon-post-list betterdocs-eicon-post-list';
    }

    public function get_categories() {
        return ['betterdocs-elements', 'single-doc'];
    }

    public function get_keywords() {
        return ['betterdocs-elements', 'betterdocs', 'docs', 'single-doc'];
    }

    public function get_custom_help_url() {
        return 'https://betterdocs.co/docs/docs-archive-in-elementor/';
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Content', 'betterdocs' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'ert_reading_title',
            [
                'label'       => __( 'Reading Time Title', 'betterdocs' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( '', 'betterdocs' ),
                'placeholder' => __( 'Type Here' )
            ]
        );

        $this->add_control(
            'ert_reading_text',
            [
                'label'       => __( 'Reading Time Text', 'betterdocs' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'min read', 'betterdocs' ),
                'placeholder' => __( 'Type Here' )
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_reading_style',
            [
                'label' => __( 'Style', 'betterdocs' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_responsive_control(
            'reading_background_color',
            [
                'label'     => esc_html__( 'Background Color', 'betterdocs' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .reading-time' => 'background-color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'reading_text_color',
            [
                'label'     => __( 'Text Color', 'plugin-domain' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .reading-time p' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'reading_text_typo',
                'selector' => '{{WRAPPER}} .reading-time p'
            ]
        );

        $this->add_control(
            'reading_box_width',
            [
                'label'      => __( 'Width', 'betterdocs' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'max'  => 500,
                        'step' => 1
                    ],
                    '%' => [
                        'max'  => 100,
                        'step' => 1
                    ]
                ],
                'selectors'  => [
                    '{{WRAPPER}} .reading-time' => 'width: {{SIZE}}px;'
                ]
            ]
        );

        $this->add_responsive_control(
            'reading_padding',
            [
                'label'      => __( 'Padding', 'betterdocs' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .reading-time' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'reading_margin',
            [
                'label'      => __( 'Margin', 'betterdocs' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .reading-time' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }

    public function view_params() {
        return [
            'attributes' => $this->attributes
        ];
    }

    protected function render_callback() {
        $this->views( 'widgets/reading-time' );
    }
}
