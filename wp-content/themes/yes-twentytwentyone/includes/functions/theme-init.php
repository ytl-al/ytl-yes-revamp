<?php

/**
 * Function to enqueue the stylesheets and javascripts files
 * 
 * @since    1.0.0
 * 
 * @param    array      $plans      Object array of plans which can be retrieved from the database - get_option('genapi_plans_data')
 * @return   array
 */
if (!function_exists('yes_enqueue_scripts')) {
    function yes_enqueue_scripts()
    {
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.1.0');
        wp_enqueue_style('yes-styles', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0');
        wp_enqueue_style('yes-styles-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0.0');

        wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '3.5.1', true);
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.js', array(), '5.1.0', true);
        wp_enqueue_script('iconify', get_template_directory_uri() . '/assets/js/iconify.min.js', array(), '2.0', true);
    }
    add_action('wp_enqueue_scripts', 'yes_enqueue_scripts');
}


/**
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
 * Function for Yes.my TwentyTwentyOne theme setup
 * 
 * @since    1.0.0
 */
if (!function_exists('yes_twentytwentyone_setup')) {
    function yes_twentytwentyone_setup()
    {
        if (function_exists('add_theme_support')) {
            add_theme_support( 'title-tag' );
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
        }
    }
    add_action('after_setup_theme', 'yes_twentytwentyone_setup');
}

/**
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

                    'footer-column-1'   => esc_html__('Footer - Column 1', 'yes.my'),
                    'footer-column-2'   => esc_html__('Footer - Column 2', 'yes.my'),
                    'footer-column-3'   => esc_html__('Footer - Column 3', 'yes.my'),
                    'footer-column-4'   => esc_html__('Footer - Column 4', 'yes.my'),
                    'footer-column-5'   => esc_html__('Footer - Column 5', 'yes.my')
                )
            );
        }
    }
    add_action('init', 'yes_register_menus');
}


/**
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
 * Function to display custom logo in custom markup
 * 
 * @since    1.0.0
 */
if (!function_exists('display_yes_logo')) {
    function display_yes_logo()
    {
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo       = wp_get_attachment_image_src($custom_logo_id, 'full');
        $site_url   = site_url();

        if (has_custom_logo()) {
            echo '<a href="' . $site_url . '" class="navbar-brand"><img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="logo-top" /></a>';
        } else {
            echo '<h1><a href="' . $site_url . '">' . get_bloginfo('name') . '</a></h1>';
        }
    }
}


/**
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
