<?php

    /*
     * Functions to create custom post types
     */
    
    /**
     * Register custom post types.
     * 
     * @link https://developer.wordpress.org/reference/functions/register_post_type/
     */
     
    if (!class_exists('Yes_custom_post_types_config')) {

        class Yes_custom_post_types_config {

            public function __construct() 
            {

            }

            public function register_post_types($arr_post_types_args = []) 
            {
                if (!empty($arr_post_types_args)) {
                    foreach ($arr_post_types_args as $arr_post_type_args) {
                        $name           = $arr_post_type_args['name'];
                        $singular_name  = $arr_post_type_args['singular_name'];
                        $slug           = $arr_post_type_args['slug'];
                        $menu_icon      = $arr_post_type_args['menu_icon'];
                        $supports       = $arr_post_type_args['supports'];
                        $reg_taxonomy   = (isset($arr_post_type_args['reg_taxonomy']) && !empty($arr_post_type_args['reg_taxonomy'])) ? $arr_post_type_args['reg_taxonomy'] : false;
                        $reg_tags       = (isset($arr_post_type_args['reg_tags']) && !empty($arr_post_type_args['reg_tags'])) ? $arr_post_type_args['reg_tags'] : false;
                        $rewrite        = (isset($arr_post_type_args['rewrite']) && !empty($arr_post_type_args['rewrite'])) ? $arr_post_type_args['rewrite'] : false;
                        $capabilities   = (isset($arr_post_type_args['capabilities']) && !empty($arr_post_type_args['capabilities']) && is_array($arr_post_type_args['capabilities']))? $arr_post_type_args['capabilities']: array();

                        $labels         = [
                            'name'              => _x($name, 'post type general name'), 
                            'singular_name'     => _x($singular_name, 'post type singular name'), 
                            'menu_name'         => _x($name, 'admin menu'), 
                            'name_admin_bar'    => _x($singular_name, 'add new on admin bar'), 
                            'add_new'           => _x('Add New', $slug), 

                            'add_new_item'      => __("Add New $singular_name", 'yes.my'), 
                            'new_item'          => __("New $singular_name", 'yes.my'), 
                            'edit_item'         => __("Edit $singular_name", 'yes.my'), 
                            'view_item'         => __("View $singular_name", 'yes.my'), 
                            'all_items'         => __("All $name", 'yes.my'), 
                            'search_items'      => __("Search $name", 'yes.my'), 
                            'parent_item_colon' => __("Parent $name:", 'yes.my'), 
                            'not_found'         => __("No ".strtolower($name)." found", 'yes.my'), 
                            'not_found_in_trash'=> __("No ".strtolower($name)." found in trash", 'yes.my') 
                        ];

                        $args           = [
                            'labels'                => $labels, 
                            'public'                => true, 
                            'publicly_queryable'    => true, 
                            'show_ui'               => true, 
                            'show_in_menu'          => true, 
                            'query_var'             => true, 
                            'rewrite'               => ['slug', $slug], 
                            'capability_type'       => 'post', 
                            'capabilities'          => $capabilities,
                            'has_archive'           => true, 
                            'hierarchical'          => false, 
                            'menu_position'         => 25, 
                            'menu_icon'             => $menu_icon, 
                            'supports'              => $supports 
                        ];

                        register_post_type($slug, $args);

                        if ($reg_taxonomy) $this->reg_taxonomy($arr_post_type_args);
                        if ($reg_tags) $this->reg_tags($arr_post_type_args);
                    }
                } else {
                    return;
                }
            }

            public function reg_taxonomy($arr_tax_args = []) 
            {
                $singular_name  = $arr_tax_args['singular_name'];
                $slug           = $arr_tax_args['slug'];
                $rewrite        = $arr_tax_args['rewrite'];

                $category_names = $arr_tax_args['category_names'];
                $category_name_plural   = ($category_names && isset($category_names['plural'])) ? $category_names['plural'] : 'Categories';
                $category_name_singular = ($category_names && isset($category_names['singular'])) ? $category_names['singular'] : 'Category';

                $labels         = [
                    'name'              => _x("$singular_name $category_name_plural", 'taxonomy general name'), 
                    'singular_name'     => _x("$singular_name $category_name_singular", 'taxonomy singular name'), 

                    'search_items'      => __("Search $singular_name $category_name_plural", 'yes.my'), 
                    'all_items'         => __("All $singular_name $category_name_plural", 'yes.my'), 
                    'parent_item'       => __("Parent $category_name_singular", 'yes.my'), 
                    'parent_item_colon' => __("Parent $category_name_singular:", 'yes.my'), 
                    'edit_item'         => __("Edit $singular_name $category_name_singular", 'yes.my'), 
                    'update_item'       => __("Update $singular_name $category_name_singular", 'yes.my'), 
                    'add_new_item'      => __("Add New $singular_name $category_name_singular", 'yes.my'), 
                    'new_item_name'     => __("New $singular_name $category_name_singular", 'yes.my'), 
                    'menu_name'         => __("$singular_name $category_name_plural", 'yes.my'), 
                    'not_found'         => __("No ".strtolower($singular_name)." ".strtolower($category_name_plural)." found", 'yes.my'), 
                    'not_found_in_trash'=> __("No ".strtolower($singular_name)." ".strtolower($category_name_plural)." found in trash", 'yes.my') 
                ];

                $args           = [
                    'hierarchical'      => true, 
                    'labels'            => $labels, 
                    'show_ui'           => true, 
                    'show_admin_column' => true, 
                    'query_var'         => true, 
                    'rewrite'           => array('slug' => "$rewrite", 'hierarchical' => true),
                    'capabilities'      => array(
                        'manage_terms' => "manage_$slug-$category_name_plural",
                        'edit_terms'   => "edit_$slug-$category_name_plural",
                        'delete_terms' => "delete_$slug-$category_name_plural",
                        'assign_terms' => "assign_$slug-$category_name_plural",
                    )
                ];

                register_taxonomy("$slug-category", array($slug), $args);

                // $this->reg_default_taxonomy($arr_tax_args);
            }

            public function reg_default_taxonomy($arr_tax_args = []) 
            {
                $slug           = $arr_tax_args['slug'];
                $reg_taxonomy   = $arr_tax_args['reg_taxonomy'];

                foreach ($reg_taxonomy as $term) {
                    $arr_term   = ['slug' => strtolower($term)];

                    if (!term_exists($term, "$slug-category", $arr_term)) wp_insert_term($term, "$slug-category", $arr_term);
                }
            }

            public function reg_tags($arr_tag_args = []) 
            {
                $singular_name  = $arr_tag_args['singular_name'];
                $slug           = $arr_tag_args['slug'];
                $rewrite        = $arr_tag_args['rewrite'];
                
                $tag_names      = $arr_tag_args['tag_names'];
                $tag_name_plural    = ($tag_names && isset($tag_names['plural'])) ? $tag_names['plural'] : 'Tags';
                $tag_name_singular  = ($tag_names && isset($tag_names['singular'])) ? $tag_names['singular'] : 'Tag';

                $labels         = [
                    'name'              => _x("$singular_name $tag_name_plural", 'taxonomy general name'), 
                    'singular_name'     => _x("$singular_name $tag_name_singular", 'taxonomy singular name'), 

                    'search_items'      => __("Search $singular_name $tag_name_plural", 'yes.my'), 
                    'all_items'         => __("All $singular_name $tag_name_plural", 'yes.my'), 
                    'parent_item'       => null, 
                    'parent_item_colon' => null, 
                    'edit_item'         => __("Edit $singular_name $tag_name_singular", 'yes.my'), 
                    'update_item'       => __("Update $singular_name $tag_name_singular", 'yes.my'), 
                    'add_new_item'      => __("Add New $singular_name $tag_name_singular", 'yes.my'), 
                    'new_item_name'     => __("New $singular_name $tag_name_singular", 'yes.my'), 
                    'menu_name'         => __("$singular_name $tag_name_plural", 'yes.my'), 
                    'not_found'         => __("No ".strtolower($singular_name)." ".strtolower($tag_name_plural)." found", 'yes.my'), 
                    'not_found_in_trash'=> __("No ".strtolower($singular_name)." ".strtolower($tag_name_plural)." found in trash", 'yes.my') 
                ];

                $args           = [
                    'hierarchical'      => false, 
                    'labels'            => $labels, 
                    'show_ui'           => true, 
                    'show_admin_column' => true, 
                    'query_var'         => true, 
                    'rewrite'           => array('slug' => "$rewrite"),
                    'capabilities'      => array(
                        'manage_terms' => "manage_$slug-$tag_name_plural",
                        'edit_terms'   => "edit_$slug-$tag_name_plural",
                        'delete_terms' => "delete_$slug-$tag_name_plural",
                        'assign_terms' => "assign_$slug-$tag_name_plural",
                    )
                ];

                register_taxonomy("$slug-tag", array($slug), $args);

                // $this->reg_default_tag_terms($arr_tag_args);
            }

            public function reg_default_tag_terms($arr_tags_args = []) 
            {
                $slug           = $arr_tags_args['slug'];
                $reg_taxonomy   = $arr_tags_args['reg_tags'];

                foreach ($reg_taxonomy as $term) {
                    $arr_term   = ['slug' => strtolower($term)];

                    if (!term_exists($term, "$slug-tag", $arr_term)) wp_insert_term($term, "$slug-tag", $arr_term);
                }
            }

        }
        // Register Brand Taxonomy
        function register_brand_taxonomy() {
            $labels = array(
                'name'              => _x( 'Brands', 'taxonomy general name', 'textdomain' ),
                'singular_name'     => _x( 'Brand', 'taxonomy singular name', 'textdomain' ),
                'search_items'      => __( 'Search Brands', 'textdomain' ),
                'all_items'         => __( 'All Brands', 'textdomain' ),
                'parent_item'       => __( 'Parent Brand', 'textdomain' ),
                'parent_item_colon' => __( 'Parent Brand:', 'textdomain' ),
                'edit_item'         => __( 'Edit Brand', 'textdomain' ),
                'update_item'       => __( 'Update Brand', 'textdomain' ),
                'add_new_item'      => __( 'Add New Brand', 'textdomain' ),
                'new_item_name'     => __( 'New Brand Name', 'textdomain' ),
                'menu_name'         => __( 'Brands', 'textdomain' ),
            );

            $args = array(
                'hierarchical'      => true,
                'labels'            => $labels,
                'show_ui'           => true,
                'show_admin_column' => true,
                'query_var'         => true,
                'rewrite'           => array( 'slug' => 'brand' ),
            );

            register_taxonomy( 'brand', 'store-device', $args );
        }

        // Hook into the init action and call register_brand_taxonomy when it fires
        add_action( 'init', 'register_brand_taxonomy', 0 );




                // Register Promotion Taxonomy
                function register_promotion_taxonomy() {
                    $labels = array(
                        'name'              => _x( 'Promotions', 'taxonomy general name', 'textdomain' ),
                        'singular_name'     => _x( 'Promotion', 'taxonomy singular name', 'textdomain' ),
                        'search_items'      => __( 'Search Promotions', 'textdomain' ),
                        'all_items'         => __( 'All Promotions', 'textdomain' ),
                        'parent_item'       => __( 'Parent Promotion', 'textdomain' ),
                        'parent_item_colon' => __( 'Parent Promotion:', 'textdomain' ),
                        'edit_item'         => __( 'Edit Promotion', 'textdomain' ),
                        'update_item'       => __( 'Update Promotion', 'textdomain' ),
                        'add_new_item'      => __( 'Add New Promotion', 'textdomain' ),
                        'new_item_name'     => __( 'New Promotion Name', 'textdomain' ),
                        'menu_name'         => __( 'Promotions', 'textdomain' ),
                    );
        
                    $args = array(
                        'hierarchical'      => true,
                        'labels'            => $labels,
                        'show_ui'           => true,
                        'show_admin_column' => true,
                        'query_var'         => true,
                        'rewrite'           => array( 'slug' => 'promotion' ),
                    );
        
                    register_taxonomy( 'promotion', 'store-device', $args );
                }
        
                // Hook into the init action and call register_brand_taxonomy when it fires
                add_action( 'init', 'register_promotion_taxonomy', 0 );


			// Register plan Taxonomy
                function register_plan_taxonomy() {
                    $labels = array(
                        'name'              => _x( 'Plans', 'taxonomy general name', 'textdomain' ),
                        'singular_name'     => _x( 'Plan', 'taxonomy singular name', 'textdomain' ),
                        'search_items'      => __( 'Search Plans', 'textdomain' ),
                        'all_items'         => __( 'All Promotions', 'textdomain' ),
                        'parent_item'       => __( 'Parent Plan', 'textdomain' ),
                        'parent_item_colon' => __( 'Parent Plan:', 'textdomain' ),
                        'edit_item'         => __( 'Edit Plan', 'textdomain' ),
                        'update_item'       => __( 'Update plan', 'textdomain' ),
                        'add_new_item'      => __( 'Add New Plan', 'textdomain' ),
                        'new_item_name'     => __( 'New Plan Name', 'textdomain' ),
                        'menu_name'         => __( 'Plans', 'textdomain' ),
                    );
        
                    $args = array(
                        'hierarchical'      => true,
                        'labels'            => $labels,
                        'show_ui'           => true,
                        'show_admin_column' => true,
                        'query_var'         => true,
                        'rewrite'           => array( 'slug' => 'plan' ),
                    );
        
                    register_taxonomy( 'plan', 'store-device', $args );
                }
        
                // Hook into the init action and call register_brand_taxonomy when it fires
                add_action( 'init', 'register_plan_taxonomy', 0 );

    }
    
?>