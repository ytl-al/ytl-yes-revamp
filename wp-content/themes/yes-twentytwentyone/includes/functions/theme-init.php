<?php

/**
 * Function yes_enqueue_scripts()
 * Function to enqueue the stylesheets and javascripts files
 * 
 * @since    1.0.0
 */
if (!function_exists('yes_enqueue_scripts')) {
    function yes_enqueue_scripts()
    {
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.1.0');
        wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.8.0');
        wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), '1.8.0');
        wp_enqueue_style('yes-styles', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0');
        wp_enqueue_style('yes-styles-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0.0');

        wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '3.5.1', true);
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.js', array(), '5.1.0', true);
        wp_enqueue_script('iconify', get_template_directory_uri() . '/assets/js/iconify.min.js', array(), '2.0.0', true);
        wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.js', array(), '1.8.0', true);
        wp_enqueue_script('yes-js', get_template_directory_uri() . '/assets/js/yes.js', array(), '1.0.0', true);
    }
    add_action('wp_enqueue_scripts', 'yes_enqueue_scripts');
}


/**
 * Function yes_twentytwentyone_setup()
 * Function for Yes.my TwentyTwentyOne theme setup
 * 
 * @since    1.0.0
 */
if (!function_exists('yes_twentytwentyone_setup')) {
    function yes_twentytwentyone_setup()
    {
        if (function_exists('add_theme_support')) {
            /** To add the theme support for title tag for the website */
            add_theme_support('title-tag');
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

        if (function_exists('register_sidebar')) {
            /** Register widget - Top Page Banner */
            register_sidebar(array(
                'name'          => 'Top Page Banner',
                'id'            => 'yes_widget_top_page_banner',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '',
                'after_title'   => ''
            ));
            /** Register widget - Page Modal */
            register_sidebar(array(
                'name'          => 'Page Modal',
                'id'            => 'yes_widget_page_modal',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '',
                'after_title'   => ''
            ));
            /** Register widget - Footer FAQ */
            register_sidebar(array(
                'name'          => 'Footer FAQ',
                'id'            => 'yes_widget_footer_faq',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '',
                'after_title'   => ''
            ));
            /** Register widget - Footer Newsletter */
            register_sidebar(array(
                'name'          => 'Footer Newsletter',
                'id'            => 'yes_widget_footer_newsletter',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '',
                'after_title'   => ''
            ));
            /** Register widget - Footer Top */
            register_sidebar(array(
                'name'          => 'Footer Top',
                'id'            => 'yes_widget_footer_top',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '',
                'after_title'   => ''
            ));
            /** Register widget - Footer Bottom */
            register_sidebar(array(
                'name'          => 'Footer Bottom',
                'id'            => 'yes_widget_footer_bottom',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '',
                'after_title'   => ''
            ));
        }

        if (function_exists('add_image_size')) {
            add_image_size('page-background-image', 1920, 1080);
        }
    }
    add_action('after_setup_theme', 'yes_twentytwentyone_setup');
}


/**
 * Function yes_change_logo_class()
 * Function to change the logo class when using the 'the_custom_logo()' function to display logo image
 * 
 * @since    1.0.0
 * 
 * @param    string     $html      The default HTML for the the_custom_logo() function
 * @return   string     Returning the manipulated HTML string
 */
if (!function_exists('yes_change_logo_class')) {
    function yes_change_logo_class($html)
    {
        $html = str_replace('custom-logo', 'navbar-brand', $html);
        $html = str_replace('custom-logo-link', 'navbar-brand', $html);
        return $html;
    }
    add_filter('get_custom_logo', 'yes_change_logo_class');
}


/**
 * Function yes_register_menus()
 * Function to register custom menus for yes.my theme
 * 
 * @since    1.0.0
 */
if (!function_exists('yes_register_menus')) {
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


/**
 * Function yes_nav_add_li_class()
 * Function to add args in wp_nav_menu() to add custom class in <li>
 * 
 * @since    1.0.0
 */
if (!function_exists('yes_nav_add_li_class')) {
    function yes_nav_add_li_class($classes, $item, $args)
    {
        if (property_exists($args, 'li_class')) {
            $classes[] = $args->li_class;
        }
        return $classes;
    }
    add_filter('nav_menu_css_class', 'yes_nav_add_li_class', 1, 3);
}


/**
 * Function yes_nav_add_link_class()
 * Function to add args in wp_nav_menu() to add custom class in <a>
 * 
 * @since    1.0.0
 */
if (!function_exists('yes_nav_add_link_class')) {
    function yes_nav_add_link_class($atts, $item, $args)
    {
        if (property_exists($args, 'link_class')) {
            $atts['class'] = $args->link_class;
        }
        return $atts;
    }
    add_filter('nav_menu_link_attributes', 'yes_nav_add_link_class', 1, 3);
}


/**
 * Function display_yes_logo()
 * Function to display custom logo in custom markup
 * 
 * @since    1.0.0
 */
if (!function_exists('display_yes_logo')) {
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


/**
 * Function yes_language_switcher()
 * Function to get the languages from WPML and return the custom switcher
 * 
 * @since    1.0.0
 */
if (!function_exists('yes_language_switcher') && function_exists('icl_get_languages')) {
    function yes_language_switcher($classes = [])
    {
        $languages      = icl_get_languages('skip_missing=0&orderby=custom&order=asc');
        $langs          = '';
        $active_lang    = '';
        if (1 < count($languages)) {
            foreach ($languages as $language) {
                switch ($language['code']) {
                    case 'ms':
                        $language_name  = 'Bahasa Malaysia';
                        break;
                    case 'zh-hans':
                        $language_name  = '中文';
                        break;
                    default:
                        $language_name  = 'English';
                }
                $langs  .= '<li><a href="' . $language['url'] . '" language="' . $language['code'] . '" class="dropdown-item" >' . $language_name . '</a></li>';

                ($language['active']) ? $active_lang = $language_name : '';
            }
        }
        $exp_class  = join(' ', $classes);
        $html       = " <div class='dropdown language-drop float-end $exp_class'>
                            <a class='btn btn-secondary btn-sm dropdown-toggle' href='javascript:void(0)' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'><span class='iconify' data-icon='bi:globe'></span> $active_lang</a>
                            <ul class='dropdown-menu dropdown-menu-start' aria-labelledby='dropdownMenuLink'>$langs</ul>
                        </div>";
        return $html;
    }
}


/**
 * Function get_menu_by_location()
 * Function to get nav object
 * 
 * @since    1.0.0
 */
if (!function_exists('get_menu_by_location')) {
    function get_menu_by_location($location)
    {
        if (empty($location)) return false;

        $locations = get_nav_menu_locations();
        if (!isset($locations[$location])) return false;

        $menu_obj = get_term($locations[$location], 'nav_menu');

        return $menu_obj;
    }
}


/**
 * Function yes_admin_remove_pages()
 * Function to remove certain pages in admin
 * 
 * @since    1.0.0
 */
if (!function_exists('yes_admin_remove_pages')) {
    function yes_admin_remove_pages()
    {
        remove_menu_page('edit-comments.php');
    }
    add_action('admin_menu', 'yes_admin_remove_pages');
}


/**
 * Function disable_wp_auto_p()
 * Function to prevent WP from adding <p> tags on all post types
 * 
 * @since    1.0.0
 */
if (!function_exists('disable_wp_auto_p')) {
    function disable_wp_auto_p($content)
    {
        remove_filter('the_content', 'wpautop');
        remove_filter('the_excerpt', 'wpautop');
        remove_filter('widget_text_content', 'wpautop');
        return $content;
    }
    add_filter('the_content', 'disable_wp_auto_p', 0);
}


/**
 * Function yes_breadcrumbs()
 * Function to display custom breadcrumbs
 * 
 * @since    1.0.0
 */
if (!function_exists('yes_custom_breadcrumbs')) {
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
                $html   .= '<li class="breadcrumb-item page-home"><a href="' . get_home_url() . '" title="' . $home_title . '">Home</a></li>';
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


/**
 * Function remove_css_js_version()
 * Function to remove the version number in CSS and JS enqueue; Only to be used during development to get the latest changes on stylesheet and javascripts
 */
if (!function_exists('remove_css_js_version')) {
    function remove_css_js_version($src)
    {
        if (strpos($src, '?ver='))
            $src = remove_query_arg('ver', $src);
        return $src;
    }
    add_filter('style_loader_src', 'remove_css_js_version', 9999);
    add_filter('script_loader_src', 'remove_css_js_version', 9999);
}
