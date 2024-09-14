<?php
namespace WPDeveloper\BetterDocsPro\Editors;

use WPDeveloper\BetterDocs\Editors\BlockEditor\Patterns\BasePattern;
use WPDeveloper\BetterDocs\Editors\BlockEditor as BlockEditorFree;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


class BlockEditor extends BlockEditorFree {

    private $pro_blocks = [];

    /**
     * @var $pro_assets Enqueue
     */
    private $pro_assets;

    public function init() {
        $this->pro_assets = betterdocs_pro()->assets;

        add_filter( 'betterdocs.blocks.path', [$this, 'change_blocks_path'], 11, 3 );

        parent::init();
    }

    /**
     * @param $block_path string
     * @param $name string
     * @param $block BlockEditorFree\Block
     *
     * @return string
     */
    public function change_blocks_path( $block_path, $name, $block ): string {
        if( empty( $name ) ) {
            $name = $block->get_name();
        }

        return $block->is_pro ? BETTERDOCS_PRO_BLOCKS_DIRECTORY . $name : $block_path;
    }

    /**
     * Only for Admin Add/Edit Pages
     */
    public function enqueue( $hook ) {
        parent::enqueue( $hook );

        $editor = 'core/edit-post';
        if ( $hook == 'site-editor.php' || ( $hook == 'themes.php' && isset( $_GET['page'] ) && $_GET['page'] == 'gutenberg-edit-site' ) ) {
            $editor = 'core/edit-site';
        }

        $this->pro_assets->enqueue( 'betterdocs-kbselect', 'blocks/kbselect/kbselect.js' );

        $this->pro_assets->register( 'betterdocs-blocks-editor-controls-pro', 'blocks/controls.css' );
        $this->pro_assets->register( 'betterdocs-pro-blocks-editor', 'blocks/style-editor.css', [ 'betterdocs-blocks-editor-controls-pro' ] );
        $this->pro_assets->register( 'betterdocs-pro-blocks-editor', 'blocks/editor.js', ['betterdocs-blocks-editor'] );
        $this->pro_assets->enqueue( 'advanced-search', 'blocks/advanced-search/advanced-search.js' );
        $this->pro_assets->localize( 'betterdocs-pro-blocks-editor', 'betterDocsProBlocksHelper', [
            'is_pro_active' => betterdocs()->is_pro_active(),
            'resturl'       => get_rest_url(),
            'editorType'    => $editor,
            'totalCategories' => wp_count_terms( [
                'taxonomy' => 'doc_category',
                'hide_empty' => true
            ])
        ] );
    }

    /**
     * Get Blocks
     *
     * @since 2.5.0
     * @return array<array>
     */
    public function get_blocks(): array {
        $blocks = parent::get_blocks();
        $config_array = require_once BETTERDOCS_PRO_ABSPATH . 'includes/blocks.php';

        $this->pro_blocks = $config_array;

        return apply_filters( 'betterdocs_pro_blocks_config', array_merge( $blocks, $config_array ) );
    }

    public function register_blocks( $enqueue = false ) {
        $blocks = $this->get_blocks();

        if ( empty( $blocks ) ) {
            return;
        }

        foreach ( $blocks as $block_name => $block ) {
            if ( isset( $block['object'] ) ) {
                $assets = $this->assets;

                try {
                    $block_object = betterdocs()->container->get( $block['object'] );
                } catch (\Exception $e) {
                    continue;
                }

                if( in_array( $block_object->get_name(), array_keys( $this->pro_blocks ) ) ) {
                    $assets = betterdocs_pro()->assets;
                }

                if ( ! $block_object->can_enable() ) {
                    continue;
                }

                if ( method_exists( $block_object, 'load_dependencies' ) ) {
                    $block_object->load_dependencies();
                }

                if ( $enqueue && method_exists( $block_object, 'enqueue' ) ) {
                    $block_object->enqueue( $assets );
                    continue;
                }

                if ( method_exists( $block_object, 'inner_blocks' ) ) {
                    $_inner_blocks = $block_object->inner_blocks();
                    foreach ( $_inner_blocks as $inner_block ) {
                        $inner_block->register( $assets );
                    }
                }

                $block_object->register( $assets );
            }
        }
    }

    /**
     * Get all the Pattrens initialized.
     * @return void
     */
    public function pattern_initialization() {
        parent::pattern_initialization();
        $_api_classes = scandir( __DIR__ . DIRECTORY_SEPARATOR . 'BlockEditor' . DIRECTORY_SEPARATOR . 'Patterns' );

        if ( ! empty( $_api_classes ) && is_array( $_api_classes ) ) {
            foreach ( $_api_classes as $class ) {
                if ( $class == '.' || $class == '..' || $class == 'BasePattern.php' || strpos( $class, '.' ) === 0)  {
                    continue;
                }

                $classname  = basename( $class, '.php' );
                $classname  = '\\' . __NAMESPACE__ . "\\BlockEditor\\Patterns\\$classname";
                $patterns_class = betterdocs()->container->get( $classname );

                if ( $patterns_class instanceof BasePattern ) {
                    $patterns_class->pattern_category();
                    $patterns_class->register();
                }
            }
        }
    }
}
