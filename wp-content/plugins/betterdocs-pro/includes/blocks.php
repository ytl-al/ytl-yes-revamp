<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

use WPDeveloper\BetterDocsPro\Editors\BlockEditor\Blocks\Attachment;
use WPDeveloper\BetterDocsPro\Editors\BlockEditor\Blocks\MultipleKB;
use WPDeveloper\BetterDocsPro\Editors\BlockEditor\Blocks\AdvancedSearch;
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
    ]
];
