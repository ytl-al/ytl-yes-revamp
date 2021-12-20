<?php

if (!function_exists('yes_enqueue_scripts')) {
    /**
     * Function yes_enqueue_scripts()
     * Function to enqueue the stylesheets and javascripts files
     * 
     * @since    1.0.0
     */
    function yes_enqueue_scripts()
    {
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.1.0');
        wp_enqueue_style('aos', get_template_directory_uri() . '/assets/css/aos.css', array(), '2.3.1');
        wp_enqueue_style('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.0/slick.min.css', array(), '1.8.0');
        wp_enqueue_style('slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.0/slick-theme.min.css', array(), '1.8.0');
        wp_enqueue_style('yes-styles', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0');
        wp_enqueue_style('yes-styles-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0.0');

        wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '3.5.1', true);
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.js', array(), '5.1.0', true);
        wp_enqueue_script('iconify', get_template_directory_uri() . '/assets/js/iconify.min.js', array(), '2.0.0', true);
        wp_enqueue_script('aos', get_template_directory_uri() . '/assets/js/aos.js', array(), '2.3.1', true);
        wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.0/slick.min.js', array(), '1.8.0', true);
        wp_enqueue_script('yes-js', get_template_directory_uri() . '/assets/js/yes.js', array(), '1.0.0', true);
    }
    add_action('wp_enqueue_scripts', 'yes_enqueue_scripts');
}


if (!function_exists('yes_twentytwentyone_setup')) {
    /**
     * Function yes_twentytwentyone_setup()
     * Function for Yes.my TwentyTwentyOne theme setup
     * 
     * @since    1.0.0
     */
    function yes_twentytwentyone_setup()
    {
        if (function_exists('add_theme_support')) {
            /** To add the theme support for title tag for the website */
            // add_theme_support('title-tag');
            /** To add the theme support for custom logo */
            add_theme_support(
                'custom-logo',
                array(
                    'height'               => 52,
                    'width'                => 100,
                    'flex-width'           => true,
                    'flex-height'          => true,
                    'unlink-homepage-logo' => false,
                )
            );
            /** To add the theme support for post thumbnails */
            add_theme_support('post-thumbnails');
        }

        if (function_exists('yes_register_widgets')) {
            yes_register_widgets();
        }

        if (function_exists('add_image_size')) {
            add_image_size('page-background-image', 1920, 1080);
        }

        // remove_theme_support( 'widgets-block-editor' );
    }
    add_action('after_setup_theme', 'yes_twentytwentyone_setup');
}


$exclude_language_widgets   = ['yes_widget_page_modal', 'yes_widget_footer_bottom'];

if (!function_exists('yes_register_widgets')) {
    /**
     * Function yes_register_widgets()
     * Function for register widgets for Yes.my TwentyTwentyOne theme
     * 
     * @since    1.0.0
     */
    function yes_register_widgets()
    {
        global $exclude_language_widgets;

        if (function_exists('register_sidebar')) {
            $arr_widgets    = [
                ['name' => 'Top Page Banner',   'id' => 'yes_widget_top_page_banner'],
                ['name' => 'Page Modal',        'id' => 'yes_widget_page_modal'],
                // ['name' => 'Footer FAQ',        'id' => 'yes_widget_footer_faq'],
                ['name' => 'Footer Newsletter', 'id' => 'yes_widget_footer_newsletter'],
                ['name' => 'Footer Top',        'id' => 'yes_widget_footer_top'],
                ['name' => 'Footer Bottom',     'id' => 'yes_widget_footer_bottom']
            ];
            foreach ($arr_widgets as $arr_widget) {
                /** Register widget for all */
                register_sidebar(array(
                    'name'          => $arr_widget['name'],
                    'id'            => $arr_widget['id'],
                    'before_widget' => '',
                    'after_widget'  => '',
                    'before_title'  => '',
                    'after_title'   => ''
                ));
                if (!in_array($arr_widget['id'], $exclude_language_widgets)) {
                    /** Register widget for Bahasa Malaysia */
                    register_sidebar(array(
                        'name'          => $arr_widget['name'] . ' (Bahasa Malaysia)',
                        'id'            => $arr_widget['id'] . '_ms',
                        'before_widget' => '',
                        'after_widget'  => '',
                        'before_title'  => '',
                        'after_title'   => ''
                    ));
                    /** Register widget for Simplified Chinese */
                    register_sidebar(array(
                        'name'          => $arr_widget['name'] . ' (Simplified Chinese)',
                        'id'            => $arr_widget['id'] . '_ch',
                        'before_widget' => '',
                        'after_widget'  => '',
                        'before_title'  => '',
                        'after_title'   => ''
                    ));
                }
            }
        }
    }
}


if (!function_exists('yes_change_logo_class')) {
    /**
     * Function yes_change_logo_class()
     * Function to change the logo class when using the 'the_custom_logo()' function to display logo image
     * 
     * @param    string     $html      The default HTML for the the_custom_logo() function
     * 
     * @return   string     Returning the manipulated HTML string
     * 
     * @since    1.0.0
     */
    function yes_change_logo_class($html)
    {
        $html = str_replace('custom-logo', 'navbar-brand', $html);
        $html = str_replace('custom-logo-link', 'navbar-brand', $html);
        return $html;
    }
    add_filter('get_custom_logo', 'yes_change_logo_class');
}


if (!function_exists('yes_register_menus')) {
    /**
     * Function yes_register_menus()
     * Function to register custom menus for yes.my theme
     * 
     * @since    1.0.0
     */
    function yes_register_menus()
    {
        if (function_exists('register_nav_menus')) {
            register_nav_menus(
                array(
                    'primary'           => esc_html__('Primary', 'yes.my'),
                    'shop-mobile-plans' => esc_html__('Mobile Plans', 'yes.my'),
                    'shop-broadband'    => esc_html__('Broadband', 'yes.my'),
                    'shop-existing-customers' => esc_html__('Existing Customers', 'yes.my'),

                    // 'footer-column-1'   => esc_html__('Footer - Column 1', 'yes.my'),
                    // 'footer-column-2'   => esc_html__('Footer - Column 2', 'yes.my'),
                    // 'footer-column-3'   => esc_html__('Footer - Column 3', 'yes.my'),
                    // 'footer-column-4'   => esc_html__('Footer - Column 4', 'yes.my'),
                    // 'footer-column-5'   => esc_html__('Footer - Column 5', 'yes.my') 
                )
            );
        }
    }
    add_action('init', 'yes_register_menus');
}


if (!function_exists('yes_nav_add_li_class')) {
    /**
     * Function yes_nav_add_li_class()
     * Function to add args in wp_nav_menu() to add custom class in <li>
     * 
     * @since    1.0.0
     */
    function yes_nav_add_li_class($classes, $item, $args)
    {
        if (property_exists($args, 'li_class')) {
            $classes[] = $args->li_class;
        }
        return $classes;
    }
    add_filter('nav_menu_css_class', 'yes_nav_add_li_class', 1, 3);
}


if (!function_exists('yes_nav_add_link_class')) {
    /**
     * Function yes_nav_add_link_class()
     * Function to add args in wp_nav_menu() to add custom class in <a>
     * 
     * @since    1.0.0
     */
    function yes_nav_add_link_class($atts, $item, $args)
    {
        if (property_exists($args, 'link_class')) {
            $atts['class'] = $args->link_class;
        }
        return $atts;
    }
    add_filter('nav_menu_link_attributes', 'yes_nav_add_link_class', 1, 3);
}


if (!function_exists('display_yes_logo')) {
    /**
     * Function display_yes_logo()
     * Function to display custom logo in custom markup
     * 
     * @since    1.0.0
     */
    function display_yes_logo()
    {
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo       = wp_get_attachment_image_src($custom_logo_id, 'full');
        $site_url   = get_home_url();

        if (has_custom_logo()) {
            echo '<a href="' . $site_url . '" class="navbar-brand"><img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" title="' . get_bloginfo('name') . '" class="logo-top" /></a>';
        } else {
            echo '<h1><a href="' . $site_url . '">' . get_bloginfo('name') . '</a></h1>';
        }
    }
}


if (!function_exists('yes_language_switcher') && function_exists('icl_get_languages')) {
    /**
     * Function yes_language_switcher()
     * Function to get the languages from WPML and return the custom switcher
     * 
     * @since    1.0.0
     */
    function yes_language_switcher($classes = [])
    {
        $languages      = icl_get_languages('skip_missing=0&orderby=custom&order=asc');
        $langs          = '';
        $active_lang    = '';
        if (1 < count($languages)) {
            foreach ($languages as $language) {
                switch ($language['code']) {
                    case 'ms':
                        $language_name      = 'Bahasa Malaysia';
                        $lang_name_mobile   = 'BM';
                        break;
                    case 'zh-hans':
                        $language_name      = '中文';
                        $lang_name_mobile   = '中文';
                        break;
                    default:
                        $language_name      = 'English';
                        $lang_name_mobile   = 'EN';
                }
                $langs  .= '<li><a href="' . $language['url'] . '" language="' . $language['code'] . '" class="dropdown-item" >' . $language_name . '</a></li>';

                ($language['active']) ? $active_lang = $language_name : '';
                ($language['active']) ? $active_lang_mobile = $lang_name_mobile : '';
            }
        }
        $exp_class  = join(' ', $classes);
        $html       = " <div class='dropdown language-drop float-end $exp_class'>
                            <a class='btn btn-secondary btn-sm dropdown-toggle' href='javascript:void(0)' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'><span class='iconify' data-icon='bi:globe'></span> <span class='d-lg-none'>$active_lang_mobile</span><span class='d-none d-lg-inline-block'>$active_lang</span></a>
                            <ul class='dropdown-menu dropdown-menu-start' aria-labelledby='dropdownMenuLink'>$langs</ul>
                        </div>";
        return $html;
    }
}


if (!function_exists('get_menu_by_location')) {
    /**
     * Function get_menu_by_location()
     * Function to get nav object
     * 
     * @param    string     $location   The location id for the menu
     * 
     * @return   object     Returning the menu object
     * 
     * @since    1.0.0
     */
    function get_menu_by_location($location)
    {
        if (empty($location)) return false;

        $locations = get_nav_menu_locations();
        if (!isset($locations[$location])) return false;

        $menu_obj = get_term($locations[$location], 'nav_menu');

        return $menu_obj;
    }
}


if (!function_exists('yes_admin_remove_pages')) {
    /**
     * Function yes_admin_remove_pages()
     * Function to remove certain pages in admin
     * 
     * @since    1.0.0
     */
    function yes_admin_remove_pages()
    {
        remove_menu_page('edit-comments.php');
    }
    add_action('admin_menu', 'yes_admin_remove_pages');
}


if (!function_exists('disable_wp_auto_p')) {
    /**
     * Function disable_wp_auto_p()
     * Function to prevent WP from adding <p> tags on all post types
     * 
     * @since    1.0.0
     */
    function disable_wp_auto_p($content)
    {
        remove_filter('the_content', 'wpautop');
        remove_filter('the_excerpt', 'wpautop');
        remove_filter('widget_text_content', 'wpautop');
        return $content;
    }
    add_filter('the_content', 'disable_wp_auto_p', 0);
}


if (!function_exists('yes_custom_breadcrumbs')) {
    /**
     * Function yes_breadcrumbs()
     * Function to display custom breadcrumbs
     * 
     * @since    1.0.0
     */
    function yes_custom_breadcrumbs()
    {
        global $post, $wp_query;

        $html       = null;
        $show_home  = true;
        $home_title = esc_html__('Home', 'yes.my');

        if (!is_front_page()) {
            $html   .= '<div class="container breadcrumb-section">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">';

            if ($show_home) {
                $html   .= '<li class="breadcrumb-item page-home"><a href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
            }

            if (is_page()) {
                if ($post->post_parent) {
                    $ancestors  = get_post_ancestors($post->ID);
                    $ancestors  = array_reverse($ancestors);

                    foreach ($ancestors as $ancestor) {
                        $parent_title   = get_the_title($ancestor);
                        $html   .= '<li class="breadcrumb-item page-parent page-' . $ancestor . '"><a href="' . get_permalink($ancestor) . '" title="' . $parent_title . '">' . $parent_title . '</a></li>';
                    }
                }
                $html   .= '        <li class="breadcrumb-item active page-current page-' . get_the_ID() . '" aria-current="page">' . get_the_title() . '</li>';
            }

            $html   .= '        </ol>
                            </nav>
                        </div>';
        }

        return $html;
    }
}


if (!function_exists('remove_css_js_version')) {
    /**
     * Function remove_css_js_version()
     * Function to remove the version number in CSS and JS enqueue; Only to be used during development to get the latest changes on stylesheet and javascripts
     * 
     * @since    1.0.0
     */
    function remove_css_js_version($src)
    {
        if (strpos($src, '?ver='))
            $src = remove_query_arg('ver', $src);
        return $src;
    }
    add_filter('style_loader_src', 'remove_css_js_version', 9999);
    add_filter('script_loader_src', 'remove_css_js_version', 9999);
}


if (!function_exists('display_widget_by_position')) {
    /**
     * Function display_widget_by_position()
     * Function to display widget content based on site language
     * 
     * @param    string $widget_id              The widget's position ID which to be displayed. Default value is null.
     * @param    bool   $check_active           Flag to check if widget is active. Default value is false.
     * @param    bool   $display_widget_content Flag to only display widget content without checking if content is active or not. Default value is false.
     * 
     * @return  string|bool Return widget based on condition, or true if no $widget_id provided
     * 
     * @since    1.0.0
     */
    function display_widget_by_position($widget_id = null, $check_active = false, $display_widget_content = false)
    {
        global $exclude_language_widgets;

        if ($widget_id !== null) {
            $lang   = get_bloginfo("language");
            if (!in_array($widget_id, $exclude_language_widgets)) {
                if ($lang == 'ms-MY') {
                    $widget_id  = $widget_id . '_ms';
                } else if ($lang == 'zh-CN') {
                    $widget_id  = $widget_id . '_ch';
                }
            }

            if ($check_active) {
                return is_active_sidebar($widget_id);
            } else if ($display_widget_content) {
                return dynamic_sidebar($widget_id);
            } else {
                if (is_active_sidebar($widget_id)) :
                    return dynamic_sidebar($widget_id);
                endif;
            }
        }
        return;
    }
}


if (!function_exists('update_direction_list_domain')) {
    /**
     * Function update_direction_list_domain()
     * Function to update the domain in redirected urls in Redirection plugin
     * 
     * @param    string  $old_domain            The old domain in redirected URLs
     * @param    string  $new_domain            The new domain in redirected URLs
     * @param    integer $redirection_group_id  The redirection group id
     * 
     * @since    1.0.0
     */
    function update_direction_list_domain($old_domain = 'https://my.yes.my/', $new_domain = 'https://site.yes.my/', $redirection_group_id = 3)
    {
        global $wpdb;
        $query      = " SELECT * 
                        FROM yes_redirection_items
                        WHERE group_id = $redirection_group_id 
                            AND action_type = 'url'
                            AND action_data LIKE '" . $old_domain . "%'";
        $results    = $wpdb->get_results($query);

        foreach ($results as $result) {
            $id = $result->id;
            $action_data     = $result->action_data;
            $new_action_data = str_replace($old_domain, $new_domain, $action_data);
            // echo '<pre>'; print_r($result); echo "$id <br />$action_data <br />$new_action_data"; echo '</pre>';

            $wpdb->update('yes_redirection_items', array('action_data' => $new_action_data), array('id' => $id));
        }
    }
    // update_direction_list_domain('https://my.yes.my/', 'https://site.yes.my/', 3);
}