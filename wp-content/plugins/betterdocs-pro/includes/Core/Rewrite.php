<?php

namespace WPDeveloper\BetterDocsPro\Core;
use WPDeveloper\BetterDocs\Core\Rewrite as FreeRewrite;
use WPDeveloper\BetterDocsPro\Traits\MKB;

class Rewrite extends FreeRewrite {
    use MKB;
    public function init() {
        parent::init();

        add_action( 'term_link', [$this, 'term_link'], 10, 3 );
    }

    public function remove_knowledge_base_placeholder( $permalink ) {
        $permalink_array = $this->permalink_structure( $permalink, 'arraywithpercent' );
        $permalink_array = array_filter( $permalink_array, function ( $item ) {
            return $item !== '%knowledge_base%';
        } );

        return trailingslashit( implode( '/', $permalink_array ) );
    }

    /**
     * This method is hooked with an action called 'betterdocs::settings::saved'
     * also an override function Of
     *
     * @since 2.5.0
     *
     * @param bool $_saved
     * @param array $_settings
     * @param array $_old_settings
     *
     * @return void
     */
    public function save_permalink_structure( $_saved, $_settings, $_old_settings ) {
        if ( isset( $_settings['multiple_kb'] ) && $_settings['multiple_kb'] == false ) {
            $_settings['permalink_structure'] = $this->remove_knowledge_base_placeholder( $_settings['permalink_structure'] );
        }

        parent::save_permalink_structure( $_saved, $_settings, $_old_settings );

        /**
         * This block of code decides whether it needs to be flushed or not.
         * Flush happens after register the post type.
         */

        $old_mkb_setting = isset( $_old_settings['multiple_kb'] ) ? $_old_settings['multiple_kb'] : '';
        $new_mkb_setting = isset( $_settings['multiple_kb'] ) ? $_settings['multiple_kb'] : '';
        switch ( true ) {
            case $new_mkb_setting !==  $old_mkb_setting:
                $this->database->set_transient( 'betterdocs_flush_rewrite_rules', true );
                break;
        }
    }

    public function rules() {
        $base = $this->get_base_slug();

        if ( betterdocs()->settings->get( 'multiple_kb', false ) ) {
            $this->add_rewrite_rule( $base . '/(feed|rdf|rss|rss2|atom)/?$', 'index.php?post_type=docs&feed=$matches[1]' );
            $this->add_rewrite_rule(
                $base . '/([^/]+)/(feed|rdf|rss|rss2|atom)/?$',
                'index.php?knowledge_base=$matches[1]&feed=$matches[2]'
            );

            $this->add_rewrite_rule(
                $base . '/([^/]+)/([^/]+)/(feed|rdf|rss|rss2|atom)/?$',
                'index.php?knowledge_base=$matches[1]&doc_category=$matches[2]&feed=$matches[3]'
            );

            $this->add_rewrite_rule( $base . '/([^/]+)/?$', 'index.php?knowledge_base=$matches[1]' );

            $this->add_rewrite_rule(
                $base . '/([^/]+)/([^/]+)/?$',
                'index.php?knowledge_base=$matches[1]&doc_category=$matches[2]'
            );
        }

        parent::rules();
    }

    public function term_link( $termlink, $term, $taxonomy ) {
        if ( $taxonomy != 'doc_category' ) {
            return $termlink;
        }

        $_kb_terms = $this->kb_terms($term, $taxonomy);
        $_kb_slug = betterdocs_pro()->multiple_kb->get_kb_slug();

        if ( empty( $_kb_slug ) || ( is_array( $_kb_terms) && ! in_array( $_kb_slug, $_kb_terms )) ) {
            $_kb_slug = $this->get_first_kb_slug( $term, $taxonomy );
        }

        return str_replace( '%knowledge_base%', $_kb_slug, $termlink );
    }
}
