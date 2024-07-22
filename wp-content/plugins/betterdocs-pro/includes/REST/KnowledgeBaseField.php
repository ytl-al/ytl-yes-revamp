<?php

namespace WPDeveloper\BetterDocsPro\REST;
use WPDeveloper\BetterDocs\Core\BaseAPI;

class KnowledgeBaseField extends BaseAPI {
    public function register() {
        $this->register_field( 'doc_category', 'knowledge_base', [
            'get_callback' => [$this, 'knowledge_base_collection']
        ] );

        $this->register_field( 'docs', 'knowledge_base_info', [
            'get_callback' => [$this, 'get_knowledge_base_info']
        ] );

        $this->register_field( 'docs', 'knowledge_base_slug', [
            'get_callback' => [$this, 'get_knowledge_base_slug']
        ] );

        add_filter( 'rest_docs_query', [$this, 'filter_docs_query'], 10, 2 );
    }

    public function knowledge_base_collection( $object ) {
        $knowledgebases = get_term_meta( $object['id'], 'doc_category_knowledge_base', true );
        if ( empty( $knowledgebases ) ) {
            return [];
        }
        return $knowledgebases;
    }

    public function get_knowledge_base_info($object, $field_name, $request) {
        $knowledge_base_terms = [];
        $knowledgebase_categories = ! empty( $object['knowledge_base'] ) ? $object['knowledge_base'] : [];

        foreach ( $knowledgebase_categories as $knowledge_base_category_id ) {
            $term = get_term( $knowledge_base_category_id );
            if ( $term ) {
                $knowledge_base_terms[] = [
                    'term_name' => $term->name,
                    'term_url'  => get_term_link( $term ),
                    'term_slug' => $term->slug
                ];
            }
        }

        return $knowledge_base_terms;
    }

    public function get_knowledge_base_slug($object, $field_name, $request) {
        $knowledge_base_slugs = [];
        $knowledgebase_categories = ! empty( $object['knowledge_base'] ) ? $object['knowledge_base'] : [];

        foreach ( $knowledgebase_categories as $knowledge_base_category_id ) {
            $term = get_term( $knowledge_base_category_id );
            if ( $term ) {
                $knowledge_base_slugs[] = $term->slug;
            }
        }

        return $knowledge_base_slugs;
    }

    /**
     * Filter the docs query by knowledge_base, and knowledge_base_slug parameters.
     *
     * @param array $args The query arguments.
     * @param WP_REST_Request $request The current REST API request.
     * @return array Modified query arguments.
     */
    public function filter_docs_query( $args, $request ) {
        // Filter by knowledge_base
        if ( isset( $request['knowledge_base'] ) ) {
            $knowledge_base = $request['knowledge_base'];

            // Add taxonomy query arguments
            $args['tax_query'][] = [
                'taxonomy' => 'knowledge_base',
                'field'    => 'term_id',
                'terms'    => $knowledge_base,
            ];
        }

        // Filter by knowledge_base_slug
        if ( isset( $request['knowledge_base_slug'] ) ) {
            $knowledge_base_slug = $request['knowledge_base_slug'];

            // Add taxonomy query arguments
            $args['tax_query'][] = [
                'taxonomy' => 'knowledge_base',
                'field'    => 'slug',
                'terms'    => $knowledge_base_slug,
            ];
        }

        return $args;
    }
}

