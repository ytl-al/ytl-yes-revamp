<?php

/**
 * Role Management Class Lite
 */
class Betterdocs_Role_Management_Lite {

    /**
     * Default Roles Capabilities
     *
     * @var array
     */
    protected $default_capabilities = [
        'administrator' => [
            'edit_docs',
            'edit_others_docs',
            'delete_docs',
            'publish_docs',
            'read_private_docs',
            'delete_private_docs',
            'delete_published_docs',
            'delete_others_docs',
            'edit_private_docs',
            'edit_published_docs',
            'manage_doc_terms',
            'edit_doc_terms',
            'delete_doc_terms',
            'manage_knowledge_base_terms',
            'edit_knowledge_base_terms',
            'delete_knowledge_base_terms'
        ],
        'editor' => [
            'edit_docs',
            'edit_others_docs',
            'publish_docs',
            'edit_published_docs',
            'edit_private_docs',
            'read_private_docs',
            'delete_published_docs',
            'delete_private_docs',
            'delete_docs',
            'delete_others_docs',
            'manage_doc_terms',
            'edit_doc_terms',
            'delete_doc_terms',
            'manage_knowledge_base_terms',
            'edit_knowledge_base_terms',
            'delete_knowledge_base_terms'
        ],
        'author' => [
            'edit_docs',
            'edit_published_docs',
            'publish_docs',
            'delete_docs',
            'delete_published_docs'
        ],
        'contributor' => [
            'edit_docs',
            'delete_docs'
        ],
        'other_roles' => [
            'edit_docs',
            'delete_docs',
        ]
    ];

    /**
     * Run The Constructor When Class Is Initialized
     *
     * @since 2.0.7
     */
    public function __construct() {
        $this->betterdocs_capabilities_migrator();
        $this->filters();
        $this->actions();
    }

    /**
     * Contains Filter Hook Callback Methods
     *
     * @since 2.0.7
     * @return void
     */
    public function filters() {
        add_filter( 'user_has_cap', array( $this, 'default_capabilities_for_admin' ), 10, 4 );
    }

    /**
     * Contains Action Hook Callback Methods
     *
     * @since 2.0.7
     * @return void
     */
    public function actions() {
        add_action( 'betterdocs_add_capabilities', array( $this, 'default_capabilities_for_roles' ), 10, 1 );
        add_action( 'betterdocs_settings_before_save', array( $this, 'remove_capabilities_for_roles' ), 10, 1 );
    }

    /**
     * Assign Betterdocs Default Capabilities To Admin, And When Pro Version Is Deactivated, Assign Default Capabilities To Default Users
     *
     * @since 2.0.7
     * @param array $allcaps
     * @return array
     */
    public function default_capabilities_for_admin( $allcaps, $caps, $args, $user ) {
        $admin_capabilities = array_merge( $this->default_capabilities['administrator'], array('edit_docs_settings'), array('read_docs_analytics') );
        foreach( $admin_capabilities as $cap ) {
            if( ! empty( $allcaps['administrator'] ) && ! array_key_exists( $cap, $allcaps ) ) {
                $allcaps[$cap] = true;
            }
        }

        //When betterdocs pro is deactivated, assign the only default write docs caps for roles like e.g:-editor, author, contributor betterdocs custom caps. If a role has analytics, settings cap, remove it
        if( ! is_plugin_active('betterdocs-pro/betterdocs-pro.php') ) {
            foreach( $this->default_capabilities as $role => $capabilities ) {
                if( $role != 'administrator' && $role != 'other_roles' ) {
                    $role_object  = get_role($role);
                    if( is_null( $role_object ) || ! $role_object instanceof \WP_Role ) {
                        continue;
                    }
                    foreach( $capabilities as $capability ) {
                        if( ! isset( $allcaps[ $capability ] ) ) {
                            $role_object->add_cap($capability);
                        }
                    }

                    if( $role_object->has_cap('edit_docs_settings') ) {
                        $role_object->remove_cap('edit_docs_settings');
                    }
                    if( $role_object->has_cap('read_docs_analytics') ) {
                        $role_object->remove_cap('read_docs_analytics');
                    }
                }
            }

            // Now Remove The Default Capabilities For Other Roles, Except For Users Like e.g:- administrator, author, editor, contributor
            $existing_article_roles   =  ( BetterDocs_DB::get_settings('article_roles') == 'off' || BetterDocs_DB::get_settings('article_roles') == 'administrator'  ) ? array('administrator') : BetterDocs_DB::get_settings('article_roles');
            $existing_settings_roles  =  ( BetterDocs_DB::get_settings('settings_roles') == 'off' || BetterDocs_DB::get_settings('settings_roles') == 'administrator' ) ? array('administrator') : BetterDocs_DB::get_settings('settings_roles');
            $existing_analytics_roles =  ( BetterDocs_DB::get_settings('analytics_roles') == 'off' || BetterDocs_DB::get_settings('analytics_roles') == 'administrator' ) ? array('administrator') : BetterDocs_DB::get_settings('analytics_roles');

            $selected_roles = array(
                'article_roles'   => $existing_article_roles,
                'settings_roles'  => $existing_settings_roles,
                'analytics_roles' => $existing_analytics_roles
            );

            $map_selected_roles     = BetterDocs_Settings::get_role_cap_mapper( $selected_roles );

            foreach( $map_selected_roles as $key => $values ) {
                $roles = ! empty( $values['roles'] ) ? $values['roles'] : '' ;
                if( ! empty( $roles ) ) {
                    foreach( $roles as $role ) {
                        if( ! in_array( $role, array( 'administrator', 'editor', 'author', 'contributor' ) ) ) {
                            $role_object = get_role( $role );
                            if( is_null( $role_object ) || ! $role_object instanceof \WP_Role ) {
                                continue;
                            }
                            if( $key == 'write_docs' ) {
                                $role_default_caps = ! empty( $this->default_capabilities[$role] ) ? $this->default_capabilities[$role] : $this->default_capabilities['other_roles'];
                                foreach( $role_default_caps as $cap ) {
                                    $role_object->remove_cap( $cap );
                                }
                            } else {
                                $role_object->remove_cap( $key );
                            }
                        }
                    }
                }
            }

        }

        //Hook to assign default capabilities to other roles like e.g:-editor, author, contributor when pro is active. Only if the selected roles exists in database.(Hook Is Called When Pro Version Is Active)
        do_action('betterdocs_assign_default_caps');

        return $allcaps;
    }

    /**
     * Assign Selected Roles Capabilities From Settings
     *
     * @since 2.0.7
     * @param array $cap_roles
     * @return void
     */
    public function default_capabilities_for_roles( $cap_roles ) {
        foreach( $cap_roles as $key => $values ) {
            $roles = ! empty( $values['roles'] ) ? $values['roles'] : '' ;
            if( ! empty( $roles ) ) {
                foreach( $roles as $role ) {
                    $role_object = get_role( $role );
                    if( is_null( $role_object ) || ! $role_object instanceof \WP_Role ) {
                        continue;
                    }
                    if( $key == 'write_docs' ) {
                        $role_default_caps = ! empty( $this->default_capabilities[$role] ) ? $this->default_capabilities[$role] : $this->default_capabilities['other_roles'];
                        foreach( $role_default_caps as $cap ) {
                            $role_object->add_cap( $cap );
                        }
                    } else {
                        $role_object->add_cap( $key );
                    }
                }
            }
        }
    }

    /**
     * Remove Capabilities From Settings(Unselected Roles Only)
     *
     * @param array $current_data
     * @return void
     */
    public function remove_capabilities_for_roles( $current_data ) {
        $current_datas['article_roles']   = ! empty( $current_data['article_roles'] ) ? $current_data['article_roles'] : array('administrator');
        $current_datas['settings_roles']  = ! empty( $current_data['settings_roles'] ) ? $current_data['settings_roles'] : array('administrator');
        $current_datas['analytics_roles'] = ! empty( $current_data['analytics_roles'] ) ? $current_data['analytics_roles'] : array('administrator');

        $existing_article_roles   =  ( BetterDocs_DB::get_settings('article_roles') == 'off' || BetterDocs_DB::get_settings('article_roles') == 'administrator'  ) ? array('administrator') : BetterDocs_DB::get_settings('article_roles');
        $existing_settings_roles  =  ( BetterDocs_DB::get_settings('settings_roles') == 'off' || BetterDocs_DB::get_settings('settings_roles') == 'administrator' ) ? array('administrator') : BetterDocs_DB::get_settings('settings_roles');
        $existing_analytics_roles =  ( BetterDocs_DB::get_settings('analytics_roles') == 'off' || BetterDocs_DB::get_settings('analytics_roles') == 'administrator' ) ? array('administrator') : BetterDocs_DB::get_settings('analytics_roles');

        $removed_all_roles = array(
            'article_roles'   => array_values( array_diff( $existing_article_roles, $current_datas['article_roles'] ) ),
            'settings_roles'  => array_values( array_diff( $existing_settings_roles, $current_datas['settings_roles'] ) ),
            'analytics_roles' => array_values( array_diff( $existing_analytics_roles, $current_datas['analytics_roles'] ) )
        );

        $map_roles = BetterDocs_Settings::get_role_cap_mapper( $removed_all_roles );

        foreach( $map_roles as $key => $values ) {
            $roles = ! empty( $values['roles'] ) ? $values['roles'] : '' ;
            if( ! empty( $roles ) ) {
                foreach( $roles as $role ) {
                    $role_object = get_role( $role );
                    if( is_null( $role_object ) || ! $role_object instanceof \WP_Role ) {
                        continue;
                    }
                    if( $key == 'write_docs' ) {
                        $role_default_caps = ! empty( $this->default_capabilities[$role] ) ? $this->default_capabilities[$role] : $this->default_capabilities['other_roles'];
                        foreach( $role_default_caps as $cap ) {
                            $role_object->remove_cap( $cap );
                        }
                    } else {
                        $role_object->remove_cap( $key );
                    }
                }
            }
        }
    }

    /**
     * Betterdocs Capabilities Migrator Method
     *
     * @since 2.0.7
     * @return void
     */
    public function betterdocs_capabilities_migrator() {
        if( get_option( 'betterdocs_rm_version', false ) === false ) {
            $settings       = BetterDocs_DB::get_settings();
            $existing_roles = BetterDocs_Settings::get_role_cap_mapper( $settings );
            foreach( $existing_roles as $key => $values ) {
                $roles = ( $values['roles'] == 'off' ) ? array('administrator') : $values['roles'];
                if( ! empty( $roles ) ) {
                    foreach( $roles as $role ) {
                        $role_object = get_role( $role );
                        if( is_null( $role_object ) || ! $role_object instanceof \WP_Role ) {
                            continue;
                        }
                        if( $key == 'write_docs' ) {
                            $role_default_caps = ! empty( $this->default_capabilities[$role] ) ? $this->default_capabilities[$role] : $this->default_capabilities['other_roles'];
                            foreach( $role_default_caps as $cap ) {
                                $role_object->add_cap( $cap );
                            }
                        } else {
                            $role_object->add_cap( $key );
                        }
                    }
                }
            }
            update_option( 'betterdocs_rm_version', '1.0' );
        }
    }
}