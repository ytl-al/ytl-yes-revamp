<?php

namespace WPDeveloper\BetterDocs\REST;

use WP_Query;
use WP_REST_Request;
use WPDeveloper\BetterDocs\Admin\CSVExporter;
use WPDeveloper\BetterDocs\Admin\Importer\Parsers\CSV_Parser;
use WPDeveloper\BetterDocs\Admin\Importer\WPImport;
use WPDeveloper\BetterDocs\Admin\ReportEmail;
use WPDeveloper\BetterDocs\Admin\WPExporter;
use WPDeveloper\BetterDocs\Core\BaseAPI;
use WPDeveloper\BetterDocs\Dependencies\DI\DependencyException;
use WPDeveloper\BetterDocs\Dependencies\DI\NotFoundException;

class Settings extends BaseAPI {

    public function permission_check(): bool {
        return current_user_can( 'edit_docs_settings' );
    }

    public function register() {
        $this->get( 'settings', [ $this, 'get_settings' ] );
        $this->post( 'dark-mode', [ $this, 'dark_mode' ] );
        $this->post( 'settings', [ $this, 'save_settings' ] );
        $this->post( 'plugin_insights', [ $this, 'plugin_insights' ] );
        $this->post( 'create-sample-docs', [$this, 'sample_docs'] );
        $this->post( 'reporting-test', [ $this, 'test_reporting' ] );
        $this->post( 'export-docs', [ $this, 'export_docs' ] );
        $this->post( 'export-settings', [ $this, 'export_settings' ] );
        $this->post( 'import-docs', [ $this, 'import_docs' ] );
        $this->post( 'import-settings', [ $this, 'import_settings' ] );
        $this->post( 'parse-xml', [ $this, 'parse_xml' ] );
        $this->post( 'parse-csv', [ $this, 'parse_csv' ] );
        $this->post( 'migrate', [ $this, 'migrate_plugins' ] );
        $this->post( 'helpscout-migration', [$this, 'helpscout_migration'] );
    }

    public function dark_mode( WP_REST_Request $request ): bool {
        $dark_mode = rest_sanitize_boolean( $request->get_param( 'mode' ) );

        if ( betterdocs()->settings->save( 'dark_mode', $dark_mode ) ) {
            return true;
        }

        return false;
    }

    public function sample_docs( WP_REST_Request $request ) {
        $action = $request->get_param( 'action' );

        if ( $action == 'create-dummy-data' ) {
            $file  = BETTERDOCS_ABSPATH . 'assets/admin/images/BetterDocs-sample-data.csv';
            $args = [
                'fetch_attachments' => true,
                'action'            => '',
                'existing_slug'     => '',
                'file_type'         => 'text/csv'
            ];
            $wp_import_object = new WPImport( $file, $args );
            return $wp_import_object->run();
        }
    }

    public function export_docs( WP_REST_Request $request ) {
        $data = $request->get_params();
        $args = [
            'include_post_featured_image_as_attachment' => true,
            'status'                                    => 'publish',
            'content'                                   => 'docs',
            'selected_docs'                             => $data['export_docs']
        ];

        if ( $data['export_type'] == 'docs' && $data['export_docs'][0] != 'all' ) {
            $args['post__in'] = $data['export_docs'];
        }

        if ( $data['export_type'] == 'doc_category' && $data['export_categories'][0] != 'all' ) {
            $args['category_terms'] = $data['export_categories'];
        }

        if ( $data['export_type'] == 'knowledge_base' && $data['export_kbs'][0] != 'all' ) {
            $args['kb_terms'] = $data['export_kbs'];
        }

        if ( $data['file_type'] == 'xml' ) {
            $exporter = new WPExporter( $args );
        } else if ( $data['file_type'] == 'csv' ) {
            $exporter = new CSVExporter( $args );
        }

        /**
         * @var WPExporter|CSVExporter $exporter
         */

        return $exporter->run();
    }

    public function export_settings( WP_REST_Request $request ): array {
        $betterdocs_settings = get_option( 'betterdocs_settings' );
        $json_str            = json_encode( $betterdocs_settings, JSON_PRETTY_PRINT );
        $file_name           = 'betterdocs-settings.json';

        return [
            'success' => true,
            'data'    => [
                'filename' => $file_name,
                'filetype' => 'text/json',
                'download' => $json_str,
            ]
        ];
    }

    public function import_settings( WP_REST_Request $request ): array {
        $settings = $request->get_param( 'settings' );
        // Decode the JSON data into a PHP array
        $settings = json_decode( $settings, true );
        $saved    = update_option( 'betterdocs_settings', $settings );

        if ( ! $saved ) {
            return [
                'status' => 'failed'
            ];
        }

        return [
            'status' => 'success'
        ];
    }

    public function import_docs( WP_REST_Request $request ): array {
        $existing_slug = $request->get_param( 'existing_slug' );
        $action        = $request->get_param( 'action' );

        $files = $request->get_file_params();

        $file = $files['file']['tmp_name'];

        $args = [
            'fetch_attachments' => true,
            'existing_slug'     => $existing_slug,
            'action'            => $action,
            'file_type'         => $files['file']['type']
        ];

        $wp_importer = new WPImport( $file, $args );

        return $wp_importer->run();
    }

    public function parse_xml( WP_REST_Request $request ): array {
        $data                = $request->get_params();
        $existing_post_slugs = $this->get_existing_slugs( $data['posts'] );

        // Output the array of existing post slugs
        return [
            'status' => 'success',
            'data'   => $existing_post_slugs,
        ];
    }

    public function parse_csv( WP_REST_Request $request ): array {
        $files = $request->get_file_params();

        $file = $files['file']['tmp_name'];

        $parser = new CSV_Parser();
        $parsed = $parser->parse( $file );

        $existing_post_slugs = [];

        if ( isset( $parsed['posts'] ) && is_array( $parsed['posts'] ) ) {
            $post_names = array_map( function ( $post ) {
                return $post['post_name'];
            }, $parsed['posts'] );

            $existing_post_slugs = $this->get_existing_slugs( $post_names );
        }


        return [
            'status' => 'success',
            'data'   => $existing_post_slugs,
        ];
    }

    public function migrate_plugins( WP_REST_Request $request ): array {
        betterdocs()->kbmigration->migrate();

        return [
            'status' => 'success'
        ];
    }

    public function helpscout_migration( WP_REST_Request $request ) {
        $api_key = $request->get_param('helpscout_api_key');
        $collection_id = $request->get_param('helpscout_collection_id');

        if ( ! $api_key || ! $collection_id ) {
            return [
                'status' => 'error',
                'message' => esc_html__('Please provide both API Key and Collection ID', 'betterdocs')
            ];
        }

        $api_endpoint = 'https://docsapi.helpscout.net/v1/collections/' . $collection_id . '/articles?pageSize=1';

        $headers = array(
            'Authorization' => 'Basic ' . base64_encode($api_key . ':X'),
            'Content-Type'  => 'application/json',
        );

        $initial_response = wp_remote_get($api_endpoint, array('headers' => $headers));

        if ( $initial_response['response']['code'] == '404' ) {
            return [
                'status' => 'error',
                'message' => esc_html__('Unauthorized API Key or Collection ID', 'betterdocs')
            ];
        }

        // Enqueue migration task
        betterdocs()->backgroundProccessor->push_to_queue( array(
            'headers' => $headers,
            'initial_response' => $initial_response,
            'api_key' => $api_key,
            'collection_id' => $collection_id
        ) )->save();

        // Start processing the queue
        betterdocs()->backgroundProccessor->dispatch();

        return [
            'status' => 'success',
            'message' => esc_html__('Migration process has started in the background.', 'betterdocs')
        ];
    }

    public function get_existing_slugs( $slugs ) {
        // Initialize the array for existing post slugs
        $existing_post_slugs = [];

        // Initialize the query arguments
        $args = [
            'post_type'      => 'docs', // Change 'post' to your custom post type if applicable
            'post_status'    => 'publish',
            'posts_per_page' => -1, // Retrieve all posts
            'fields'         => 'ids', // Retrieve only post IDs to reduce memory usage
        ];

        // Create a new instance of WP_Query
        $query = new WP_Query( $args );

        // Get an array of post slugs from the query
        $all_post_slugs = array_map( function ( $post_id ) {
            return get_post_field( 'post_name', $post_id );
        }, $query->posts );

        // Restore original post data
        wp_reset_postdata();

        // Find the intersection of the two arrays to get existing post slugs
        return array_intersect( $slugs, $all_post_slugs );

    }

    public function insights(): bool {
        return true;
    }

    public function get_settings(): array {
        return betterdocs()->settings->get_all( true );
    }

    public function save_settings( WP_REST_Request $request ) {
        if ( betterdocs()->settings->save_settings( $request->get_params() ) ) {
            return $this->success( __( 'Settings Saved!', 'betterdocs' ) );
        }

        return $this->error( 'nothing_changed', __( 'There are no changes to be saved.', 'betterdocs' ), 200 );
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     */
    public function test_reporting( $request ) {
        return $this->container->get( ReportEmail::class )->test_email_report( $request );
    }

    public function do_wizard_tracking(): bool {
        $insights = betterdocs()->admin->plugin_insights( true );
        // Get our data
        $insights->schedule_tracking();
        $insights->set_is_tracking_allowed( true, 'betterdocs' );
        if ( $insights->do_tracking( true ) ) {
            $insights->update_block_notice( 'betterdocs' );
        }

        return true;
    }

    public function plugin_insights( $request ) {
        if ( $this->do_wizard_tracking() ) {
            wp_send_json_success( 'done' );
        }
        wp_send_json_error( 'Something went wrong.' );
    }
}
