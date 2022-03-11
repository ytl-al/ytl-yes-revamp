<?php

    /*
     * Functions to create custom post types
     */
    
    /**
     * Register custom post types.
     * 
     * @link https://developer.wordpress.org/reference/functions/register_post_type/
     */
     
    if (!class_exists('Yesmy_custom_post_types_config')) {

        class Yesmy_custom_post_types_config {

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
                    'rewrite'           => array('slug' => "$rewrite", 'hierarchical' => true) 
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
                    'rewrite'           => array('slug' => "$rewrite") 
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

    }
    
?>