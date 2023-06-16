<?php
/**
 * This class is responsible for all settings things happening in Betterdocs Plugin
 *
 * @link       https://wpdeveloper.com
 * @since      1.0.0
 *
 * @package    BetterDocs
 * @subpackage BetterDocs/admin
 */
class BetterDocs_Settings {
    public static function init(){
        add_action( 'betterdocs_settings_header', array( __CLASS__, 'header_template' ), 10 );
        add_action( 'wp_ajax_betterdocs_general_settings', array( __CLASS__, 'general_settings_ac' ), 10 );
    }

    /**
     * This function is responsible for settings page header
     *
     * @hooked betterdocs_settings_header
     * @return void
     */
    public static function header_template(){
        ?>
            <div class="betterdocs-settings-header">
                <div class="betterdocs-header-full">
                    <img src="<?php echo BETTERDOCS_ADMIN_URL ?>assets/img/betterdocs-icon.svg" alt="">
                    <h2 class="title"><?php _e( 'BetterDocs Settings', 'betterdocs' ); ?></h2>
                </div>
            </div>
        <?php
    }
    /**
	 * Get all settings fields
	 *
	 * @param array $settings
	 * @return array
	 */
	public static function get_settings_fields( $settings ){
        $new_fields = [];

        foreach( $settings as $setting ) {
            $sections = isset( $setting['sections'] ) ? $setting['sections'] : [];
            if( ! empty( $sections ) ) {
                foreach( $sections as $section ) {
                    $fields = isset( $section['fields'] ) ? $section['fields'] : [];
                    if( empty( $fields ) ) {
                        $tabs = isset( $section['tabs'] ) ? $section['tabs'] : [];
                        if( ! empty( $tabs ) ) {
                            foreach( $tabs as $id => $tab ) {
                                $fields = isset( $tab['fields'] ) ? $tab['fields'] : [];
                                if( ! empty( $fields ) ) {
                                    foreach( $fields as $id => $field ) {
                                        $new_fields[ $id ] = $field;
                                    }
                                }
                            }
                        }
                    } else {
                        if( ! empty( $fields ) ) {
                            foreach( $fields as $id => $field ) {
                                $new_fields[ $id ] = $field;
                            }
                        }
                    }
                }
            }
        }

        return apply_filters( 'betterdocs_settings_fields', $new_fields );
	}
	/**
	 * Get the whole settings array
	 *
	 * @return void
	 */
	public static function settings_args(){
        if (!function_exists( 'betterdocs_settings_args')) {
            require BETTERDOCS_ADMIN_DIR_PATH . 'includes/betterdocs-settings-page-helper.php';
        }
        do_action( 'betterdocs_before_settings_load' );

        if (!empty($_GET['page']) && !empty($_GET['saved']) && $_GET['page'] === 'betterdocs-settings' && $_GET['saved'] == true) {
            flush_rewrite_rules();
        }
        return betterdocs_settings_args();
	}
	/**
     * Render the settings page
	 *
     * @return void
	 */
    public static function settings_page(){
        $settings_args = self::settings_args();
        $value = BetterDocs_DB::get_settings();

		include_once BETTERDOCS_ADMIN_DIR_PATH . 'partials/betterdocs-settings-display.php';
	}

    /**
     * Render the analytics page
	 *
     * @return void
	 */
    public static function analytics_page(){
        /*$settings_args = self::settings_args();
        $value = BetterDocs_DB::get_settings();

		include_once BETTERDOCS_ADMIN_DIR_PATH . 'partials/betterdocs-settings-display.php';*/
        ?>
        <div class="betterdocs-settings-wrap">
            <?php do_action( 'betterdocs_settings_header' ); ?>
            <div class="betterdocs-left-right-settings">
                <?php do_action( 'betterdocs_before_settings_left' ); ?>
                <div class="betterdocs-settings">
                    <div class="betterdocs-settings-menu">
                        <ul>
                            <li class="active" data-tab="overview"><a href="#overview"><?php esc_html_e('Overview', 'betterdocs'); ?></a></li>
                            <li class="" data-tab="reactions"><a href="#reactions"><?php esc_html_e('Reactions', 'betterdocs'); ?></a></li>
                            <li class="" data-tab="keyword_search"><a href="#keyword_search"><?php esc_html_e('Keyword Search', 'betterdocs'); ?></a></li>
                        </ul>
                    </div>

                    <div class="betterdocs-settings-content betterdocs-analytics-teaser">
                        <div class="betterdocs-settings-content">
                            <div class="betterdocs-settings-form-wrapper">
                                <form method="post" id="betterdocs-settings-form" action="#">
                                    <div id="betterdocs-overview" class="betterdocs-settings-tab active">
                                        <img src="<?php echo plugins_url( '/', __FILE__ ).'../assets/img/analytics-overview.png'; ?>" alt="">
                                        <div class="overlay">
                                            <?php self::overlay_content() ?>
                                        </div>
                                    </div>
                                    <div id="betterdocs-reactions" class="betterdocs-settings-tab">
                                        <img src="<?php echo plugins_url( '/', __FILE__ ).'../assets/img/analytics-reactions.png'; ?>" alt="">
                                        <div class="overlay">
                                            <?php self::overlay_content() ?>
                                        </div>
                                    </div>
                                    <div id="betterdocs-keyword_search" class="betterdocs-settings-tab">
                                        <img src="<?php echo plugins_url( '/', __FILE__ ).'../assets/img/analytics-search.png'; ?>" alt="">
                                        <div class="overlay">
                                            <?php self::overlay_content() ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php //include BETTERDOCS_ADMIN_DIR_PATH . 'partials/betterdocs-settings-blocks.php'; ?>
                </div>
                <?php
                do_action( 'betterdocs_after_settings_left' );
                ?>
            </div>
        </div>
<?php
	}

    /**
     * Render the faq builder page
	 *
     * @return void
	 */
    public static function faq_page() {
        ?>
        <div class="betterdocs-settings-wrap">
            <div id="betterdocsFaqBuilder"></div>
        </div>
<?php
	}

    public static function overlay_content() {
        ?>
        <div class="overlay-content">
            <h3><?php esc_html_e('Unlock Analytics With BetterDocs PRO', 'betterdocs'); ?><img src="<?php echo plugins_url( '/', __FILE__ ).'../assets/img/analytics-lock.png'; ?>" id="img-teaser" alt=""></h3>
            <p class="teaser-text teaser-desc"><?php esc_html_e('Scale your support tickets tracking the performance of your knowledge base BetterDocs Analytics.', 'betterdocs'); ?></p>
            <ul class="analytics-list">
                <li>
                    <div class="analytics-item">
                        <img src="<?php echo plugins_url( '/', __FILE__ ).'../assets/img/group-icon-1.png'; ?>" id="img-teaser-1" alt="">
                        <p class="teaser-text"><?php esc_html_e('Measure performance of your knowledge base', 'betterdocs'); ?></p>
                    </div>
                </li>
                <li>
                    <div class="analytics-item">
                        <img src="<?php echo plugins_url( '/', __FILE__ ).'../assets/img/analytics-magifier.png'; ?>" id="img-teaser-2" alt="">
                        <p class="teaser-text"><?php esc_html_e('Identify most viewed docs and doc categories', 'betterdocs'); ?></p>
                    </div>
                </li>
                <li>
                    <div class="analytics-item">
                        <img src="<?php echo plugins_url( '/', __FILE__ ).'../assets/img/analytics-globe.png'; ?>" id="img-teaser-4" alt="">
                        <p class="teaser-text"><?php esc_html_e('Identify most used keywords searched by site visitors', 'betterdocs'); ?> </p>
                    </div>
                </li>
            </ul>
            <div class="analytics-upgrade-btn">
                <a href="https://betterdocs.co/upgrade"><?php esc_html_e('Upgrade To BetterDocs PRO','betterdocs') ?></a>
            </div>
        </div>
        <?php
    }
    /**
     * This function is responsible for render settings field
     *
     * @param string $key
     * @param array $field
     * @return void
     */
    public static function render_field( $key = '', $field = [] ) {
        $post_id   = '';
        $name      = $key;
        $id        = BetterDocs_Metabox::get_row_id( $key );
        $file_name = isset( $field['type'] ) ? $field['type'] : 'text';

        if( 'template' === $file_name ) {
            $default = isset( $field['defaults'] ) ? $field['defaults'] : [];
        } else {
            $default = isset( $field['default'] ) ? $field['default'] : '';
        }

        $saved_value = BetterDocs_DB::get_settings( $name );

        if( ! empty( $saved_value ) ) {
            $value = $saved_value;
        } else {
            $value = $default;
        }

        $class  = 'betterdocs-settings-field';
        $row_class = BetterDocs_Metabox::get_row_class( $file_name );

        $attrs = '';

        if( isset( $field['toggle'] ) && in_array( $file_name, array( 'checkbox', 'select', 'toggle', 'theme' ) ) ) {
            $attrs .= ' data-toggle="' . esc_attr( json_encode( $field['toggle'] ) ) . '"';
        }

        if( isset( $field['hide'] ) && $file_name == 'select' ) {
            $attrs .= ' data-hide="' . esc_attr( json_encode( $field['hide'] ) ) . '"';
        }

        $field_id = $name;

        include BETTERDOCS_ADMIN_DIR_PATH . 'partials/betterdocs-field-display.php';
    }
    public static function save_default_settings(){
		$settings_args = self::settings_args();
        $fields = self::get_settings_fields( $settings_args );
        $data = [];
        $saved_settings = BetterDocs_DB::get_settings();
        if( ! empty( $saved_settings ) ) {
            return false;
        }
        if( ! empty( $fields ) ) {
            foreach( $fields as $name => $posted_field ) {
                $data[ $name ] = isset( $posted_field['default'] ) ? $posted_field['default'] : 0;
            }
            return BetterDocs_DB::update_settings( $data );
        }
        return false;
    }

    public static function has_administrator( &$roles ){
        if( $roles === 'off' || empty( $roles ) ) {
            $roles = [ 'administrator' ];
        }

        if( ! is_array( $roles ) ) {
            $roles = [ $roles ];
        }

        if( ! in_array( 'administrator', $roles, true ) ) {
            $roles[] = 'administrator';
        }

        return array_unique( $roles );
    }

    public static function get_selected_roles( $settings = array() ) {
        $article_roles   =  isset( $settings['article_roles'] ) ? $settings['article_roles'] : Betterdocs_DB::get_settings('article_roles') ;
        $settings_roles  =  isset( $settings['settings_roles'] ) ? $settings['settings_roles'] : Betterdocs_DB::get_settings('settings_roles');
        $analytics_roles =  isset( $settings['analytics_roles'] ) ? $settings['analytics_roles'] : BetterDocs_DB::get_settings('analytics_roles');

        $article_roles   = self::has_administrator( $article_roles );
        $settings_roles  = self::has_administrator( $settings_roles );
        $analytics_roles = self::has_administrator( $analytics_roles );

        return array(
            'article_roles'   => $article_roles,
            'settings_roles'  => $settings_roles,
            'analytics_roles' => $analytics_roles
        );
    }

    public static function get_role_cap_mapper( $settings = array() ) {
        if( empty( $settings ) ) {
            $settings = self::get_selected_roles();
        }

        return array(
            'write_docs' =>  array(
                'roles' => $settings['article_roles']
            ),
            'edit_docs_settings' => array(
                'roles' => $settings['settings_roles']
            ),
            'read_docs_analytics' => array(
                'roles' => $settings['analytics_roles']
            )
        );
    }

    /**
     * This function is responsible for
     * save all settings data, including checking the disable field to prevent
     * users manipulation.
     *
     * @param array $values
     * @return void
     */
    public static function save_settings( $posted_fields = [] ){
		$settings_args = self::settings_args();
        $fields = self::get_settings_fields( $settings_args );
        $data = [];
        $new_posted_fields = [];
        if( ! empty( $posted_fields ) ) {
            foreach( $posted_fields as $posted_field ) {
                preg_match("/(.*)\[(.*)\]/", $posted_field['name'], $matches);
                if( ! empty( $matches ) ) {
                    $name = $matches[1];
                    $sub_name = $matches[2];
                    if( ! empty( $sub_name ) ) {
                        $new_posted_fields[ $name ][ $sub_name ] = $posted_field['value'];
                    } else {
                        $new_posted_fields[ $name ][] = $posted_field['value'];
                    }
                } else {
                    $new_posted_fields[ $posted_field['name'] ] = $posted_field['value'];
                }
            }
        }
        $fields_keys = array_fill_keys( array_keys( $fields ), 'off' );

        $builtin_doc_page = isset($new_posted_fields['builtin_doc_page']) ? $fields_keys['builtin_doc_page'] : '';
        $docs_slug = $new_posted_fields['docs_slug'];
        $docs_page = $new_posted_fields['docs_page'];
        if ($builtin_doc_page == 1 && $docs_slug) {
            $docs_slug = $docs_slug;
        } elseif ($builtin_doc_page != 1 && $docs_page) {
            $post_info = get_post($docs_page);
            $docs_slug = $post_info->post_name;
        } else {
            $docs_slug = 'docs';
        }

        do_action( 'betterdocs_settings_before_save', $new_posted_fields );

		foreach ( $new_posted_fields as $key => $new_posted_field ) {
			if ( array_key_exists( $key, $fields ) ) {
                unset( $fields_keys[ $key ] );
                if( empty( $new_posted_field ) ) {
					$posted_value = isset( $fields[ $key ]['default'] ) ? $fields[ $key ]['default'] : '';
                }
                if( isset( $fields[ $key ]['disable'] ) && $fields[ $key ]['disable'] === true ) {
                    $posted_value = isset( $fields[ $key ]['default'] ) ? $fields[ $key ]['default'] : '';
                }

                $posted_value = BetterDocs_Helper::sanitize_field( $fields[ $key ], $new_posted_field );

                if( $key == 'permalink_structure' ) {
                    $permalink_stracture = explode('%', $posted_value);
                    if ($permalink_stracture[0] == '/') {
                        $posted_value = $docs_slug . $posted_value;
                    } else if ($permalink_stracture[0] == '') {
                        $posted_value = $docs_slug . '/' . $posted_value;
                    }
                }

                if( isset( $data[ $key ] ) ) {
                    if( is_array( $data[ $key ] ) ) {
                        $data[ $key ][] = $posted_value;
                    } else {
                        $data[ $key ] = array( $posted_value, $data[ $key ] );
                    }
                } else {
                    $data[ $key ] = $posted_value;
                }
            }
        }

        $data            = array_merge( $fields_keys, $data );
        $roles_rechecked = self::get_selected_roles($data);
        $data            = array_merge( $data, $roles_rechecked );
		BetterDocs_DB::update_settings( $data );
        do_action( 'bdocs_settings_saved', $data );
    }

    public static function general_settings_ac(){
        /**
         * Verify the Nonce
         */
        if ( ( ! isset( $_POST['nonce'] ) && ! isset( $_POST['key'] ) ) || !
        wp_verify_nonce( $_POST['nonce'], 'betterdocs_'. $_POST['key'] .'_nonce' ) ) {
            return;
        }

        if( isset( $_POST['form_data'] ) ) {
            self::save_settings( $_POST['form_data'] );
            wp_send_json_success("success");
        } else {
            wp_send_json_error("error");
        }

        die;
    }
    /**
     * Get Roles except subscriber
     * dynamically
     * @return array
     */
    public static function get_roles(){
        $roles = wp_roles()->role_names;
        unset( $roles['subscriber'] );
        return $roles;
    }

    /**
     * Get All Roles
     * dynamically
     * @return array
     */
    public static function get_all_user_roles(){
        $users = array(
            'all' => 'All logged in users'
        );
        $roles = wp_roles()->role_names;
        return array_merge($users, $roles);
    }

    /**
     * Get All Registered Texanomy
     * dynamically
     * @return array
     */
    public static function get_texanomy() {
        $taxonomies = get_taxonomies( array (
                'object_type' => array( 'docs' )
            ), 'objects'
        );
        $docs_tax = array(
            'all' => 'All Docs Archive',
            'docs' => 'Docs Page'
        );
        foreach($taxonomies as $key=>$value) {
            $docs_tax[$key] = $value->label;
        }
        unset( $docs_tax['doc_tag'] );
        return $docs_tax;
    }

    /**
     * Get Terms List
     * dynamically
     * @return array
     */
    public static function get_terms_list($texanomy) {
        $get_terms = get_terms(
            array(
                'taxonomy' => $texanomy,
                'hide_empty' => false,
            )
        );
        $terms = array(
            'all' => 'All'
        );
        if (!empty($get_terms) && !is_wp_error($get_terms)) {
            foreach($get_terms as $value) {
                if (isset($value->slug) && isset($value->name)) {
                    $terms[$value->slug] = $value->name;
                }
            }
        }
        return $terms;
    }
}