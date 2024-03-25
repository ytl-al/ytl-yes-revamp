<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

use WPDeveloper\BetterDocsPro\Editors\BlockEditor\Blocks\MultipleKBTab;
use WPDeveloper\BetterDocsPro\Editors\BlockEditor\Blocks\Attachment;
use WPDeveloper\BetterDocsPro\Editors\BlockEditor\Blocks\MultipleKB;
use WPDeveloper\BetterDocsPro\Editors\BlockEditor\Blocks\PopularDocs;
use WPDeveloper\BetterDocsPro\Editors\BlockEditor\Blocks\AdvancedSearch;
use WPDeveloper\BetterDocsPro\Editors\BlockEditor\Blocks\Handbook;
use WPDeveloper\BetterDocsPro\Editors\BlockEditor\Blocks\RelatedDocs;

add_filter( 'betterdocs_pro_blocks_config', function ( $blocks ) {
    $blocks['searchform']['object'] = AdvancedSearch::class;
    return $blocks;
} );

return [
    'related-docs' => [
        'label'      => __( 'BetterDocs Related Docs', 'betterdocs-pro' ),
        'value'      => 'related-docs',
        'visibility' => true,
        'object'     => RelatedDocs::class,
        'demo'       => '',
        'docs'       => ''
    ],
    'attachment'       => [
        'label'      => __( 'BetterDocs Attachment', 'betterdocs-pro' ),
        'value'      => 'attachment',
        'visibility' => true,
        'object'     => Attachment::class,
        'demo'       => '',
        'docs'       => ''
    ],
    'multiple-kb'      => [
        'label'      => __( 'BetterDocs Multiple KB', 'betterdocs-pro' ),
        'value'      => 'multiple-kb',
        'visibility' => true,
        'object'     => MultipleKB::class,
        'demo'       => '',
        'docs'       => ''
    ],
    'popular-docs' => [
        'label'      => __( 'Betterdocs Popular Docs', 'betterdocs-pro' ),
        'value'      => 'popular-docs',
        'visibility' => true,
        'object'     => PopularDocs::class,
        'demo'       => '',
        'docs'       => ''
    ],
    'multiple-kb-tab' => [
        'label'      => __( 'Betterdocs Multiple KB Tab', 'betterdocs-pro' ),
        'value'      => 'multiple-kb-tab',
        'visibility' => true,
        'object'     => MultipleKBTab::class,
        'demo'       => '',
        'docs'       => ''
    ],
    'handbook'       => [
        'label'      => __( 'BetterDocs Category Handbook', 'betterdocs-pro' ),
        'value'      => 'handbook',
        'visibility' => true,
        'object'     => Handbook::class,
        'demo'       => '',
        'docs'       => ''
    ]
];
