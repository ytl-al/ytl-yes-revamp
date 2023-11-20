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
        wp_enqueue_style('betterdocs-overwrite', get_template_directory_uri() . '/assets/css/betterdocs-overwrite.css', array(), '1.0.0');
        wp_enqueue_style('yes-styles-reskin', get_template_directory_uri() . '/assets/css/yes-overwrite.css', array(), '1.0.0');

        wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '3.5.1', true);
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.js', array(), '5.1.0', true);
        wp_enqueue_script('iconify', get_template_directory_uri() . '/assets/js/iconify.min.js', array(), '2.0.0', true);
        wp_enqueue_script('aos', get_template_directory_uri() . '/assets/js/aos.js', array(), '2.3.1', true);
        wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.0/slick.min.js', array(), '1.8.0', true);
        wp_enqueue_script('moment', 'https://momentjs.com/downloads/moment.min.js', array(), '1.8.0', true);
        wp_register_script('yes-js', get_template_directory_uri() . '/assets/js/yes.js', array(), '1.0.0', true);
        $data = array(
            'nonce' => wp_create_nonce("yes_nonce_key"),
        );
        wp_localize_script('yes-js', 'yesObj', $data);
        wp_enqueue_script('yes-js');
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

        remove_theme_support('widgets-block-editor');
    }
    add_action('after_setup_theme', 'yes_twentytwentyone_setup');

    function yes_twentytwentyone_customizer_setting($wp_customize)
    {
        // add a setting 
        $new_setting_id = 'custom_top_logo';
        $wp_customize->add_setting($new_setting_id);
        // Add a control to upload the hover logo
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                $new_setting_id,
                array(
                    'label' => esc_html__('Top Logo', 'yes.my'),
                    'section' => 'title_tagline',
                    //this is the section where the custom-logo from WordPress is
                    'settings' => $new_setting_id,
                    'priority' => 8 // show it just below the custom-logo
                )
            )
        );
    }

    add_action('customize_register', 'yes_twentytwentyone_customizer_setting');
}


$exclude_language_widgets = ['yes_widget_page_modal', 'yes_widget_footer_bottom'];

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
            $arr_widgets = [
                ['name' => 'Top Page Banner', 'id' => 'yes_widget_top_page_banner'],
                ['name' => 'Page Modal', 'id' => 'yes_widget_page_modal'],
                ['name' => 'Footer FAQ', 'id' => 'yes_widget_footer_faq'],
                ['name' => 'Footer Newsletter', 'id' => 'yes_widget_footer_newsletter'],
                ['name' => 'Footer Top', 'id' => 'yes_widget_footer_top'],
                ['name' => 'Footer Bottom', 'id' => 'yes_widget_footer_bottom'],
                ['name' => 'Popular Deals', 'id' => 'yes_widget_popular_deals'],
                ['name' => 'FWM Social Media', 'id' => 'yes_fwm_widget_social_media'],
            ];
            foreach ($arr_widgets as $arr_widget) {
                /** Register widget for all */
                register_sidebar(
                    array(
                        'name' => $arr_widget['name'],
                        'id' => $arr_widget['id'],
                        'before_widget' => '',
                        'after_widget' => '',
                        'before_title' => '',
                        'after_title' => ''
                    )
                );
                if (!in_array($arr_widget['id'], $exclude_language_widgets)) {
                    /** Register widget for Bahasa Malaysia */
                    register_sidebar(
                        array(
                            'name' => $arr_widget['name'] . ' (Bahasa Malaysia)',
                            'id' => $arr_widget['id'] . '_ms',
                            'before_widget' => '',
                            'after_widget' => '',
                            'before_title' => '',
                            'after_title' => ''
                        )
                    );
                    /** Register widget for Simplified Chinese */
                    register_sidebar(
                        array(
                            'name' => $arr_widget['name'] . ' (Simplified Chinese)',
                            'id' => $arr_widget['id'] . '_ch',
                            'before_widget' => '',
                            'after_widget' => '',
                            'before_title' => '',
                            'after_title' => ''
                        )
                    );
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
                    'primary' => esc_html__('Primary', 'yes.my'),
                    'shop-mobile-plans' => esc_html__('Mobile Plans', 'yes.my'),
                    'shop-broadband' => esc_html__('Broadband', 'yes.my'),
                    'shop-existing-customers' => esc_html__('Existing Customers', 'yes.my'),
                    'shop-device-plans' => esc_html__('Device Plans', 'yes.my'),
                    'shop-wireless-fibre' => esc_html__('Wireless Fibre 5G', 'yes.my'),

                    'support-help-support' => esc_html__('Support - Help & Support', 'yes.my'),
                    'support-tools-services' => esc_html__('Support - Tools & Services', 'yes.my'),
                    'support-contact-us' => esc_html__('Support - Contact Us', 'yes.my'),
                    'bs-support-contact-us' => esc_html__('Business - Support - Contact Us', 'yes.my'),

                    'bs-internet-access' => esc_html__('Business - Internet Access', 'yes.my'),
                    'bs-private-network' => esc_html__('Business - Private Network', 'yes.my'),
                    'bs-voice-communication' => esc_html__('Business - Voice Communication', 'yes.my'),

                    'fwm-header' => esc_html__('FWM Header Menu', 'yes.my'),
                    'fwm-ms2-header' => esc_html__('FWM Header Menu 2', 'yes.my'),

                    // 'footer-column-1'   => esc_html__('Footer - Column 1', 'yes.my'),
                    // 'footer-column-2'   => esc_html__('Footer - Column 2', 'yes.my'),
                    // 'footer-column-3'   => esc_html__('Footer - Column 3', 'yes.my'),
                    // 'footer-column-4'   => esc_html__('Footer - Column 4', 'yes.my'),


                    'prepaid-feb' => esc_html__('Prepaid Feb', 'yes.my')
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
        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
        $site_url = get_home_url();

        if (has_custom_logo()) {
            echo '<a href="' . $site_url . '" class="navbar-brand d-block"><img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" title="' . get_bloginfo('name') . '" class="logo-top" /></a>';
        } else {
            echo '<h1><a href="' . $site_url . '">' . get_bloginfo('name') . '</a></h1>';
        }
    }
}

if (!function_exists('display_yes_toplogo')) {
    /**
     * Function display_yes_toplogo()
     * Function to display custom logo in custom markup
     * 
     * @since    1.0.0
     */
    function display_yes_toplogo()
    {
        $custom_top_logo_url = get_theme_mod('custom_top_logo');
        if (!empty($custom_top_logo_url)) {
            $site_url = get_home_url();
            echo '<li class="text-center d-none d-lg-block"><a href="' . $site_url . '" class="navbar-brand" style="padding:8px"><img src="' . esc_url($custom_top_logo_url) . '" alt="' . get_bloginfo('name') . '" title="' . get_bloginfo('name') . '" class="logo-top" /></a></li>';
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
    function yes_language_switcher($classes = [], $type = '')
    {
        $languages = icl_get_languages('skip_missing=0&orderby=custom&order=asc');
        $langs = '';
        $active_lang = '';
        $flag_img_url = '';
        $active_lang_mobile = '';
        if (1 < count($languages)) {
            foreach ($languages as $language) {
                if ($language['code'] != 'zh-hans') {
                    switch ($language['code']) {
                        case 'ms':
                            $language_name = 'Bahasa Malaysia';
                            $lang_name_mobile = 'BM';
                            // $flag_img_url = '/wp-content/uploads/2022/12/united-kingdom-1.png';
                            break;
                        case 'zh-hans':
                            $language_name = '中文';
                            $lang_name_mobile = '中文';
                            // $flag_img_url = '';
                            break;
                        default:
                            $language_name = 'English';
                            $lang_name_mobile = 'EN';
                        // $flag_img_url = '/wp-content/uploads/2022/12/malaysia-flage.png';
                    }

                    $flag_image = '';
                    if ($type == 'fwm') {
                        $language_name = $lang_name_mobile;
                        // $flag_image = '<img src="'.$flag_img_url.'" alt="'.$lang_name_mobile.'_flag_image" />';
                    }
                    $langs .= '<li><a href="' . $language['url'] . '" language="' . $language['code'] . '" class="dropdown-item" >' . $flag_image . '' . $language_name . '</a></li>';

                    ($language['active']) ? $active_lang = $language_name : '';
                    ($language['active']) ? $active_lang_mobile = $lang_name_mobile : '';
                }
            }
        }
        $exp_class = join(' ', $classes);
        $html = " <div class='dropdown language-drop float-end $exp_class'>
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
        if (empty($location))
            return false;

        $locations = get_nav_menu_locations();
        if (!isset($locations[$location]))
            return false;

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
        if (!in_array(get_post()->post_type, ['docs'])) {
            remove_filter('the_content', 'wpautop');
        }
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

        $html = null;
        $show_home = true;
        $home_title = esc_html__('Home', 'yes.my');

        if (!is_front_page()) {
            $html .= '<div class="layer-breadcrumb">
                            <div class="container breadcrumb-section">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">';

            if ($show_home) {
                $html .= '<li class="breadcrumb-item page-home"><a href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
            }

            if (is_page()) {
                if ($post->post_parent) {
                    $ancestors = get_post_ancestors($post->ID);
                    $ancestors = array_reverse($ancestors);

                    foreach ($ancestors as $ancestor) {
                        $parent_title = get_the_title($ancestor);
                        $html .= '<li class="breadcrumb-item page-parent page-' . $ancestor . '"><a href="' . get_permalink($ancestor) . '" title="' . $parent_title . '">' . $parent_title . '</a></li>';
                    }
                }
                $html .= '        <li class="breadcrumb-item active page-current page-' . get_the_ID() . '" aria-current="page">' . get_the_title() . '</li>';
            }

            $html .= '            </ol>
                                </nav>
                            </div>
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
            $lang = get_bloginfo("language");
            if (!in_array($widget_id, $exclude_language_widgets)) {
                if ($lang == 'ms-MY') {
                    $widget_id = $widget_id . '_ms';
                } else if ($lang == 'zh-CN') {
                    $widget_id = $widget_id . '_ch';
                }
            }

            if ($check_active) {
                return is_active_sidebar($widget_id);
            } else if ($display_widget_content) {
                return dynamic_sidebar($widget_id);
            } else {
                if (is_active_sidebar($widget_id)):
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
        $query = " SELECT * 
                        FROM yes_redirection_items
                        WHERE group_id = $redirection_group_id 
                            AND action_type = 'url'
                            AND action_data LIKE '" . $old_domain . "%'";
        $results = $wpdb->get_results($query);

        foreach ($results as $result) {
            $id = $result->id;
            $action_data = $result->action_data;
            $new_action_data = str_replace($old_domain, $new_domain, $action_data);
            // echo '<pre>'; print_r($result); echo "$id <br />$action_data <br />$new_action_data"; echo '</pre>';

            $wpdb->update('yes_redirection_items', array('action_data' => $new_action_data), array('id' => $id));
        }
    }
    // update_direction_list_domain('https://my.yes.my/', 'https://site.yes.my/', 3);
}


if (!function_exists('show_most_faq_viewed')) {
    /**
     * Function show_most_faq_viewed()
     * Function to register shortcode for the FAQ in pages
     * 
     * @since    1.0.2
     */
    function show_most_faq_viewed()
    {
        global $post;
        $docsArgs = [
            'post_type' => 'docs',
            'posts_per_page' => 3,
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'meta_key' => '_betterdocs_meta_views',
            'tax_query' => [
                'relation' => 'AND',
                [
                    'taxonomy' => 'knowledge_base',
                    'field' => 'slug',
                    'terms' => ['faq'],
                    'operator' => 'IN',
                    'include_children' => true
                ]
            ],
            'suppress_filters' => false
        ];
        $html_faq = '';
        $post_count = 1;
        $faqs = new WP_Query($docsArgs);
        if ($faqs->have_posts()) {
            while ($faqs->have_posts()) {
                $faqs->the_post();
                $html_faq .= '            <div class="accordion-item">
                                                <h2 class="accordion-header" id="accordion-header-' . $post_count . '">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-content-' . $post_count . '" aria-expanded="true" aria-controls="accordion-content-' . $post_count . '">' . get_the_title() . '</button>
                                                </h2>
                                                <div id="accordion-content-' . $post_count . '" class="accordion-collapse collapse" aria-labelledby="accordion-header-' . $post_count . '" data-bs-parent="#accordion-faqShortcode">
                                                    <div class="accordion-body">' . get_the_content() . '</div>
                                                </div>
                                            </div>';
                $post_count++;
            }
        }
        wp_reset_postdata();

        $lang = get_bloginfo('language');
        $faq_main_text = 'Most Searched Topics';
        $faq_link_text = 'View All FAQ';
        $faq_link = '/faq';
        if ($lang == 'ms-MY') {
            $faq_main_text = 'Topik Paling Dicari';
            $faq_link_text = 'Lihat Semua Soalan Lazim';
            $faq_link = '/ms' . $faq_link;
        } else if ($lang == 'zh-CN') {
            $faq_link = '/zh-hans' . $faq_link;
        }

        $html = ' <!-- FAQs Start -->
                    <section id="faq-section" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="container">
                            <div class="row">
                                <h1 class="mb-4">' . $faq_main_text . '</h1>
                            </div>
                            <div class="row justify-content-lg-center">
                                <div class="col-12 col-lg-9">
                                    <div class="accordion accordion-flush mb-3" id="accordion-faqShortcode">
                                        ' . $html_faq . '
                                    </div>
                                    <p class="text-center"><a href="' . $faq_link . '" class="viewall-btn">' . $faq_link_text . ' <span class="iconify" data-icon="akar-icons:arrow-right"></span></a></p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- FAQs End -->';

        return $html;
    }

    add_shortcode('bd_most_viewed_faq', 'show_most_faq_viewed');
}



if (!function_exists('is_child_of_business')) {
    function is_child_of_business()
    {
        if (is_page()) {
            global $post;
            $parents = get_post_ancestors($post->ID);
            $top_post_id = ($parents) ? end($parents) : $post->ID;
            $post_slug = get_post_field('post_name', $top_post_id);
            if ($post_slug == 'business') {
                return true;
            }
        }
        return false;
    }
}


if (!function_exists('yes_remove_powered_headers')) {
    /**
     * Function yes_remove_powered_headers()
     * Function to remove the 'X-powered-by' in headers
     * 
     * @since    1.0.2
     */
    function yes_remove_powered_headers($headers)
    {
        if (function_exists('header_remove')) {
            header_remove('x-powered-by');
            header_remove('X-Powered-By');
        }
        unset($headers['x-powered-by']);
        unset($headers['X-Powered-By']);
        return $headers;
    }
    add_action('wp_headers', 'yes_remove_powered_headers');
}

if (!function_exists('form_maker_form_data_generate_csv_callback')) {
    // http://yes.my.localhost/wp-admin/admin-ajax.php?action=form_maker_form_data_generate_csv&form_id=6&send_header=1
    add_action('wp_ajax_form_maker_form_data_generate_csv', 'form_maker_form_data_generate_csv_callback');
    add_action('wp_ajax_nopriv_form_maker_form_data_generate_csv', 'form_maker_form_data_generate_csv_callback');
    /**
     * This function is use for generate the the csv data
     * 
     * @since    1.0.2
     */
    function form_maker_form_data_generate_csv_callback()
    {
        try {
            generate_form_data_csv();
        } catch (Exception $e) {
        }
        wp_die();
    }
}
if (!function_exists('generate_form_data_csv')) {
    /**
     * This function is use for generate the the csv data
     * 
     * @since    1.0.2
     */
    function generate_form_data_csv()
    {
        require_once WP_CONTENT_DIR . '/plugins/form-maker/admin/models/model.php';
        require_once WP_CONTENT_DIR . '/plugins/form-maker/admin/models/Submissions_fm.php';
        $model_class = 'FMModelSubmissions_fm';
        $model = new $model_class();
        $form_id = WDW_FM_Library(1)->get('form_id', 0, 'intval');
        $label_parameters = $model->get_labels_parameters($form_id);
        if (isset($label_parameters[8]) && !empty($label_parameters[8]) && is_array($label_parameters[8])) {
            if ($_GET['send_header'] == 1) {
                $_GET['groupids'] = implode(",", $label_parameters[8]);
                $_GET['limitstart'] = 1000;
                $_GET['page_num'] = -1;
            }
        }
        $fm_settings = WDFMInstance(1)->fm_settings;
        // Update export per_page.
        $page_num_update = WDW_FM_Library(1)->get('page_num_update');
        $option_key = (WDFMInstance(1)->is_free == 2 ? 'fmc_settings' : 'fm_settings');
        if ($page_num_update) {
            $fm_settings['ajax_export_per_page'] = WDW_FM_Library(1)->get('page_num');
            update_option($option_key, $fm_settings);
        }
        $csv_delimiter = isset($fm_settings['csv_delimiter']) ? $fm_settings['csv_delimiter'] : ',';

        $limitstart = WDW_FM_Library(1)->get('limitstart', 0, 'intval');
        $send_header = WDW_FM_Library(1)->get('send_header', 0, 'intval');
        $params = WDW_FM_Library(1)->get_submissions_to_export();
        $upload_dir = wp_upload_dir();
        $file_path = $upload_dir['basedir'] . '/form-maker';
        $tempfile = $file_path . '/export' . $form_id . '.txt';
        if (!empty($params)) {
            $data = $params[0];
            $title = $params[1];
            if (!empty($data)) {
                $sorted_label_names_original = $label_parameters[4];
                $sorted_label_names_original = array_merge(
                    array(
                        'ID',
                        "Submit date",
                        "Submitter's IP",
                        "Submitter's Username",
                        "Submitter's Email Address",
                    ),
                    $sorted_label_names_original
                );

                if (($key = array_search('stripe', $sorted_label_names_original)) !== false) {
                    unset($sorted_label_names_original[$key]);
                }

                $sorted_label_names = array();
                function unique_label($sorted_label_names, $label)
                {
                    if (in_array($label, $sorted_label_names)) {
                        return unique_label($sorted_label_names, $label . '(1)');
                    } else {
                        return $label;
                    }
                }
                foreach ($sorted_label_names_original as $key => $label) {
                    $sorted_label_names[] = unique_label($sorted_label_names, $label);
                }

                foreach ($data as $key => $row) {
                    $sorted_data = array();
                    foreach ($sorted_label_names as $label) {
                        if (!array_key_exists($label, $row)) {
                            $sorted_data[$label] = '';
                        } else {
                            $sorted_data[$label] = $row[$label];
                        }
                    }
                    $data[$key] = $sorted_data;
                }
                if (!is_dir($file_path)) {
                    mkdir($file_path, 0777);
                }
                if ($limitstart == 0 && file_exists($tempfile)) {
                    unlink($tempfile);
                }
                $output = fopen($tempfile, "a");
                if ($limitstart == 0) {
                    foreach ($sorted_label_names_original as $i => $rec) {
                        $sorted_label_names_original[$i] = ltrim($rec, '=+-@');
                    }
                    fputcsv($output, $sorted_label_names_original, $csv_delimiter);
                }
                foreach ($data as $index => $record) {
                    foreach ($record as $i => $rec) {
                        $record[$i] = ltrim($rec, '=+-@');
                    }
                    if (!empty($index)) {
                        fputcsv($output, $record, $csv_delimiter);
                    }
                }
                fclose($output);
            }
        }

        if ($send_header == 1) {
            $txtfile = fopen($tempfile, "r");
            $txtfilecontent = fread($txtfile, filesize($tempfile));
            fclose($txtfile);
            $filename = $title . "_" . date('Ymd') . ".csv";
            header('Content-Encoding: UTF-8');
            header('content-type: application/csv; charset=UTF-8');
            header("Content-Disposition: attachment; filename=\"$filename\"");
            // Set UTF-8 BOM
            echo "\xEF\xBB\xBF";
            echo $txtfilecontent;
            unlink($tempfile);
        }
    }
}

function yes_menu($path)
{
    ?>
    <style>
        .navbar-brand {
            display: inline-block;
            padding-top: 10px;
            margin: 0;
        }

        .logo-top {
            width: 60px !important;
            transition: .3s;
        }

        .top-tabs-container {
            background-color: #1A1E47;
        }

        .top-tabs-container .tabnav li {
            font-size: 12px;
            font-weight: 400;
            position: relative;
            display: flex;
            align-items: center;
        }

        .top-tabs-container .tabnav li a {
            color: #FFF;
            padding: 8px 16px;
            background-color: transparent;
        }

        .top-tabs-container .tabnav li a.active::after {
            content: "";
            border-right: 0.5em solid transparent;
            border-bottom: 0.5em solid;
            border-left: 0.5em solid transparent;
            position: absolute;
            left: calc(50% - 10px/2 + 0.5px);
            bottom: 0px;
        }

        .top-tabs-container .language-drop .dropdown-toggle {
            background-color: transparent;
            color: #FFF;
            border: none;
            font-size: 12px;
            font-weight: 700;
        }

        .top-tabs-container .language-drop svg {
            margin-right: 5px;
        }

        .top-tabs-container .language-drop .dropdown-item {
            font-size: 12px;
        }

        .nav-container {
            background-color: #FFF;
        }

        .nav-container .nav-link {
            color: #1A1E47;
            outline: none !important;
        }


        .nav-container .pink-btn {
            background-color: #FF0084 !important;
        }

        .mega-dropdown-menu .dropdown-header {
            color: #1A1E47;
            font-size: 14px;
        }

        .mega-dropdown-menu li ul li a {
            color: #6C6C6C;
            font-size: 12px;
            font-weight: 600 !important;
        }

        .mega-dropdown-menu {
            box-shadow: 0px 3px 4px rgb(0 0 0 / 25%);
        }



        .top-tabs-container .language-drop {
            margin-top: 0px !important;
            display: flex;
            align-items: center;
            justify-content: end;
            height: 100%;
        }

        @media (min-width: 992px) {
            .nav-container .tab-content>.active {
                display: flex !important;
                flex-basis: auto;
            }

            .navbar-expand-lg .navbar-toggler {
                display: none !important;
            }
        }

        /* Nav Bar styling */

        .page-scrolled .logo-top {
            width: 48px !important;
            transition: .3s;
        }

        .nav-container {
            width: 100%;
            display: block;
        }

        .nav-container .navbar {
            padding-top: 0rem;
            padding-bottom: 0rem;
        }

        .nav-container .navbar-brand {
            margin-right: 2.8rem;
            margin-left: 8px;
        }

        .nav-container .nav-link {
            font-size: 16px;
            font-weight: 700;
            padding-right: 0.875rem !important;
            padding-left: 0.875rem !important;
            position: relative;
        }

        .nav-container .nav-link::after {
            vertical-align: 2px !important;
            float: right;
            margin-top: 12px;
        }



        .navbar-toggler:active,
        .navbar-toggler:focus {
            box-shadow: none;
            border: none;
        }

        .nav-container .pink-btn {
            display: inline-block;
            background-color: #ED028C;
            border-radius: 90px;
            font-size: 14px;
            color: #FFF;
            font-weight: 700;
            text-transform: uppercase;
            padding: 6px 38px;
            text-align: center;
        }

        .nav-container .pink-btn:hover {
            /* box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); */
            background-color: #D00072;
        }

        .nav-container .login-btn {
            font-size: 16px;
            color: #FFF;
            font-weight: 700;
            display: inline-block;
        }

        .nav-container .login-btn svg {
            font-size: 19px;
        }

        .mega-dropdown {
            position: static !important;
        }

        .mega-dropdown-menu {
            padding: 0;
            width: 100%;
            box-shadow: none;
            -webkit-box-shadow: none;
            border: none;
            border-radius: 0px 0px 9px 9px;
            box-shadow: 0px 1px 4px rgb(0 0 0 / 25%);
            margin-top: 0px !important;
        }

        .mega-dropdown-menu>li {
            float: left;
        }

        .mega-dropdown-menu>li>ul {
            padding: 0;
            margin: 0;
        }

        /* .mega-dropdown-menu li ul li {
            list-style: none;
            margin-right: 30px;
        } */

        .mega-dropdown-menu .card {
            border: none !important;
            margin: 0 25px;
            width: 19rem;
            float: right;
        }

        .mega-dropdown-menu .card-box {
            height: 165px;
            background: #CBCEFD;
            border-radius: 8px;
            overflow: hidden;
        }

        .mega-dropdown-menu .card-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .mega-dropdown-menu .card-body {
            padding: 0;
        }

        .mega-dropdown-menu .card-text {
            font-style: normal;
            font-weight: 600;
            font-size: 16px;
            line-height: 24px;
            color: #1A1E47;
            margin: 10px 0;
        }

        .mega-dropdown-menu .card-body a {
            font-weight: 700;
            font-size: 14px;
            line-height: 24px;
            letter-spacing: -0.02em;
            color: #2F3BF5;
            text-decoration: none;
        }

        .mega-dropdown-menu .dropdown-header {
            font-size: 16px;
            font-weight: 700;
            padding: 0px;
            /* padding-bottom: 10px; */
        }

        .mega-dropdown-menu li ul li a {
            display: block;
            clear: both;
            font-weight: normal;
            line-height: 22px;
            padding: 8px 0;
            text-transform: uppercase;
            text-decoration: none;
            white-space: normal;
        }

        .custom_menu_nuv {
            font-size: 16px !important;
            font-weight: 700 !important;
            color: #1A1E47 !important;
            text-transform: unset !important;
            text-decoration: none !important;
        }

        .mega-dropdown-menu li ul li a:hover {
            text-decoration: underline;
        }

        .mega-get-help {
            display: flex;
            align-items: center;
            margin: 12px 0;

        }

        .mega-get-help h6 {
            font-weight: 600;
            font-size: 16px;
            line-height: 22px;
            margin-bottom: 0px;
            padding-left: 20px;
            color: #1A1E47;
        }

        .mega-get-help p {
            margin: 0;
            font-weight: 400;
            padding-left: 20px;
            font-size: 14px;
            line-height: 22px;
            color: #2B2B2B;
            margin-top: 4px;
        }

        .mega-get-help h6 a:hover {
            text-decoration: underline;
            color: #FF0084 !important
        }


        .mega-get-help h6 a {
            font-weight: 600;
            font-size: 16px;
            line-height: 22px;
            margin-bottom: 1px;
            color: #1A1E47;
        }

        .mega-get-help a {
            font-weight: 700;
            font-size: 14px;
            line-height: 24px;
            color: #2F3BF5;

        }


        #gethelp .dropdown-header {
            border-bottom: 1px solid #a1a1a14d;
            font-weight: 700;
            font-size: 12px;
            line-height: 16px;
            text-transform: uppercase;
            padding: 10px 0;
            color: #1A1E47;
            margin-bottom: 12px;
        }

        .gethelp_right_sec {
            background: #F8F8FF;
            padding: 40px;
        }

        .gethelp_right_sec .mega-get-help {
            border-bottom: 1px solid #a1a1a14d;
            padding: 16px 0;
            margin: 0 !important;
        }

        .gethelp_right_sec .mega-get-help:last-child {
            border-bottom: none;
        }

        .get_help {
            padding: 40px;
        }

        .box {
            display: flex;
            padding-left: 5px;
            margin-top: 40px;
        }

        .box li {
            font-weight: 600;
            font-size: 16px;
            line-height: 22px;
            color: #1A1E47;
            margin-right: 20px
        }

        .box a {
            color: #1a1e47;
            padding-left: 8px;
        }

        .tab-box-inner ul:nth-child(2) {
            margin-top: 0px;
        }

        .bottom-tabs li {
            margin-bottom: 12px;
        }

        .bottom-tabs .active {
            color: #FF0084;
        }

        .bottom-tabs a {
            font-style: normal;
            font-weight: 700;
            font-size: 18px;
            color: #AEB0C6;
            line-height: 22px;
        }

        .languages-drop a {
            padding: 0 12px;
        }

        .languages-drop svg {
            margin-right: 4px;
        }

        .languages-drop {
            margin-top: 15px;
            border-top: 1px solid #D1D6ED;
            padding: 20px 0 0;
            display: flex;
            align-items: center;
        }

        .languages-drop span {
            padding: 0 0 3px;
            color: #D1D6ED;
        }

        .relative {
            position: relative;
        }


        @media (max-width: 991px) {
            body .page-header .navbar .dropdown-menu {
                min-width: auto !important;
            }

            .mobile-none {
                display: none !important;
            }

            .dasktop-none {
                display: block !important;
            }

            .overlap {
                position: fixed;
                top: 0;
                background: #fff;
                Z-index: 1;
                padding: 0;
                width: 100%;
                height: 100vh;
                overflow: scroll;
                transform: translateX(120%);
                transition: 0.2s;
                display: block !important;
                opacity: 1 !important;
            }

            .flex {
                display: flex;
            }

            .page-header.sticky-top .nav-container .navbar .navbar-collapse {
                padding-top: 70px;
                padding-bottom: 3rem;
                overflow-y: auto !important;
                display: block !important;
                height: 100vh;
                position: fixed;
                top: 82px;
                width: 100%;
                background: #fff;
                right: 0;
                border-top: 1px solid #a1a1a14d;
                z-index: 10000;
            }

            .page-header.sticky-top .nav-container .navbar .navbar-collapse.collapsing {
                right: -100%;
                transition: height 0s ease;
                width: 0;
            }

            .page-header.sticky-top .nav-container .navbar .navbar-collapse.show {
                right: 0;
                transition: right 200ms ease-in-out, width 200ms ease-in-out;
                width: 90%;
                top: 0;
            }

            .page-header.sticky-top .nav-container .navbar .navbar-toggler.collapsed~.navbar-collapse {
                transition: right 200ms ease-in-out, width 200ms ease-in-out;
                right: -100%;
                width: 0;
            }

            .page-header.sticky-top .nav-container .navbar .navbar-collapse.show::-webkit-scrollbar {
                display: none !important;
            }

            .page-header .nav-container .navbar .navbar-collapse .mega-dropdown-menu {
                box-shadow: 0 0 0 transparent;
                padding: 0;
            }

            .mega-dropdown-menu ul:not(:only-child) {
                padding-left: 0;
                margin-bottom: 24px;
            }

            .mega-dropdown-menu .card {
                float: none;
                margin: 0;
            }

            .nav-container .nav-link {
                font-size: 24px;
                padding: 8px 20px !important;
            }

            .nav-link.dropdown-toggle.show,
            .nav-container .nav-link.active {
                color: #FF0084;
            }

            .top-tabs-container {
                display: none;
            }

            .parent {
                margin-top: -14px;
                margin-left: 6px;
            }

            .btn-gradient-2 {
                background: linear-gradient(white, white) padding-box,
                    linear-gradient(to right, #FF0084, #6F29D2) border-box;
                border-radius: 5px;
                font-size: 9px;
                border: 2px solid transparent;
            }

            .badges {

                font-weight: 800;
                border-width: 1px;
                background: linear-gradient(80.9deg, #FF0084 16.48%, #6F29D2 85.6%, #2F3BF5 96.9%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            .cards {
                margin: 18px 0;
            }
        }

        @media (min-width: 992px) {
            .dasktop-none {
                display: none
            }

            .nav-link.dropdown-toggle.show:before,
            .nav-container .nav-link.active:before {
                content: '';
                width: 80%;
                height: 4px;
                background: #ff0084;
                position: absolute;
                left: 0;
                right: 0;
                margin: auto;
                bottom: -18px;
            }

            body.page-scrolled .nav-link.dropdown-toggle.show:before,
            body.page-scrolled .nav-container .nav-link.active:before {
                bottom: -13px;
            }

            .tab-box-inner {
                display: flex;
                gap: 48px
            }

            .tab-box-inner li ul {
                padding: 0 10px;
            }

            .mega-dropdown-menu .cards {
                border: none !important;
                margin: 0 25px;
                width: 19rem;
                float: left;
            }

            .parent {
                    position: absolute;
                    bottom: 20px;
                    right: -27px;
                }

            .btn-gradient-2 {
                background: linear-gradient(white, white) padding-box,
                    linear-gradient(to right, #FF0084, #6F29D2) border-box;
                border-radius: 5px;
                font-size: 9px;
                border: 2px solid transparent;
            }

            .badges {

                font-weight: 800;
                border-width: 1px;
                background: linear-gradient(80.9deg, #FF0084 16.48%, #6F29D2 85.6%, #2F3BF5 96.9%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            .bottom-tabs {
                display: none;
            }
        }

        @media (min-width: 991px) and (max-width:1200px) {

            .mega-dropdown-menu .card {
                width: 12rem;
                /* margin:0; */
            }

            .mr-5 {
                margin-right: 20px !important;
            }
        }

        .tab {
            border-right: 1px solid #e3e3e3;
            padding-right: 0;
        }

        .tab-box {
            display: none;
        }

        .tab-menu li {
            list-style: none;
        }

        .tab-menu .active {
            background: #EEEFFE;
            padding: 12px;
        }

        .tab-menu ul {
            padding-left: 0;
        }

        .tab-menu li a {
            text-decoration: none;
            padding: 20px 40px !important;
        }

        @media screen and (max-width: 991px) {
            body .tab-menu a {
                font-weight: 600 !important;
                background: transparent !important;
                padding: 8px 20px !important;
                font-size: 16px !important;
            }
        }

        @media (max-width: 992px) and (min-width: 768px) {
            .cards {
                max-width: 300px;
            }
        }

        @media (max-width: 992px) and (min-width: 480px) {
            .dropdown-menu .col-auto ul {
                margin-bottom: 0 !important;
            }

            .menu-title {
                margin: 24px 0 !important;
            }

            .mobile-container .yes_toggle:not(.collapsed) {
                background: #fff;
                display: block;
                width: 90%;
                text-align: end;
                height: 70px;
                margin: 0 0 0 auto;
                padding: 0 15px 0 0 !important;
                position: absolute;
                right: 0;
                top: 0;
            }

            .tab-box-inner ul {
                padding: 0;
            }

            body .dropdown-menu .col-auto {
                padding: 12px 20px 28px 20px !important;
            }

            .dropdown-menu .col-auto ul:not(:last-child) {
                margin-bottom: 24px;
            }

            body.page-scrolled .page-header.sticky-top {
                filter: none !important;
            }

            .yes_mobile_menu_overlay {
                width: 100%;
                height: 100%;
                background: #000;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                opacity: 50%;
                z-index: 1000;
            }

            .mega-dropdown-menu .card-box {
                display: none !important;
            }

            .get_help-mobile ul {
                list-style: none;
            }

            .get_help-mobile ul .dropdown-header-mobile {
                font-weight: 700;
                font-size: 12px;
                line-height: 16px;
                text-transform: uppercase;
                padding: 0 0 8px;
                color: #6C6C6C;
            }

            .get_help-mobile ul li a {
                font-weight: 600;
                font-size: 16px;
                line-height: 22px;
                color: #1A1E47;
                padding: 8px 0;
                display: flex;
                gap: 8px;
            }

            .get_help-mobile ul li a img {
                width: 18px;
                display: none;
            }

            .get_help-mobile .box {
                margin: 0 !important;
                padding: 0 !important;
            }

            .get_help-mobile .box ul {
                display: flex;
                margin: 8px 0 !important;
                gap: 10px;
            }

            .get_help-mobile .box li {
                font-weight: 600;
                font-size: 16px;
                color: #1A1E47;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .get_help-mobile .box a {
                color: #1a1e47;
                padding: 0px !important;
            }

            .mobile-container {
                padding: 0 !important;
            }

            .mobile-container a.navbar-brand {
                padding: 10px 0 10px 15px !important;
                margin: 0 !important;
            }

            .mobile-container .yes_toggle {
                padding: 0 15px 0 0 !important;
                z-index: 100000 !important;
            }

            .mobile-container .row>.col-auto {
                width: 100%;
            }

            .mobile-container .overlap {
                padding-left: 20px !important;
                padding-right: 20px !important;
            }

            .mobile-container #gethelp .dropdown-header {
                margin-bottom: 0 !important;
            }

            .mobile-container .mega-get-help.img-box {
                margin: 0 !important;
                flex-direction: row !important;
                gap: 10px;
                align-items: center !important;
            }

            .mobile-container .mega-get-help.img-box img {
                padding: 0 !important;
            }

            .mega-dropdown-menu .card {
                width: 100% !important;
            }

            .get_help {
                padding: 0.7rem !important;
            }

            .mega-get-help {
                margin: 10px 0;
                flex-direction: column;
            }

            .mega-get-help img {
                padding: 20px 0px;
            }

            .mega-get-help h6,
            .mega-get-help p {
                padding: 0 !important;
                margin: 0 !important;
            }

            .gethelp_right_sec {
                padding: 25px 18px;
                width: 100% !important;
            }

            .gethelp_right_sec .mega-get-help .p-2 {
                padding: 0 !important;
            }

            .gethelp_right_sec .mega-get-help {
                padding: 16px 0 !important;
                margin: 0 !important;
                align-items: flex-start !important;
            }

            .tab-menu {
                padding-left: 22px;
                margin-bottom: 8px;
            }

            /* body .tab-menu a {
                font-weight: 600 !important;
                background: transparent !important;
                padding: 8px 20px !important;
                font-size: 16px !important;
            } */

            .tab-menu a::after {
                content: url(/wp-content/uploads/2023/04/arrow_forward.svg);
                float: right;
            }

            .dropdown .show::after {
                border-top: 0em solid;
                border-bottom: 0.3em solid;

            }

            .mega-dropdown-menu.default-top-menu {
                padding: 0px 15px !important;
            }

        }

        @media screen and (max-width: 480px) {
            .dropdown-menu .col-auto ul {
                margin-bottom: 0 !important;
            }

            body .dropdown-menu .col-auto {
                padding: 12px 20px 28px 20px !important;
            }

            .mobile-container .yes_toggle:not(.collapsed) {
                background: #fff;
                display: block;
                width: 90%;
                text-align: end;
                height: 70px;
                margin: 0 0 0 auto;
                padding: 0 15px 0 0 !important;
                position: absolute;
                right: 0;
                top: 0;
            }

            .tab-box-inner ul {
                padding: 0;
            }

            .menu-title {
                margin: 24px 0 !important;
            }

            .dropdown-menu .col-auto ul:not(:last-child) {
                margin-bottom: 24px;
            }

            body.page-scrolled .page-header.sticky-top {
                filter: none !important;
            }

            .yes_mobile_menu_overlay {
                width: 100%;
                height: 100%;
                background: #000;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                opacity: 50%;
                z-index: 1000;
            }

            .mega-dropdown-menu .card-box {
                display: none !important;
            }

            .get_help-mobile ul {
                list-style: none;
            }

            .get_help-mobile ul .dropdown-header-mobile {
                font-weight: 700;
                font-size: 12px;
                line-height: 16px;
                text-transform: uppercase;
                padding: 0 0 8px;
                color: #6C6C6C;
            }

            .get_help-mobile ul li a {
                font-weight: 600;
                font-size: 16px;
                line-height: 22px;
                color: #1A1E47;
                padding: 8px 0;
                display: flex;
                gap: 8px;
            }

            .get_help-mobile ul li a img {
                width: 18px;
                display: none;
            }

            .get_help-mobile .box {
                margin: 0 !important;
                padding: 0 !important;
            }

            .get_help-mobile .box ul {
                display: flex;
                margin: 15px 0 30px;
                gap: 15px;
                flex-wrap: wrap;
            }

            .get_help-mobile .box li {
                font-weight: 600;
                font-size: 16px;
                color: #1A1E47;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .get_help-mobile .box a {
                color: #1a1e47;
                padding: 0px !important;
            }

            .mobile-container {
                padding: 0 !important;
            }

            .mobile-container a.navbar-brand {
                padding: 10px 0 10px 15px !important;
                margin: 0 !important;
            }

            .mobile-container .yes_toggle {
                padding: 0 15px 0 0 !important;
                z-index: 100000 !important;
            }

            .mobile-container .row>.col-auto {
                width: 100%;
            }

            .mobile-container .overlap {
                padding-left: 20px !important;
                padding-right: 20px !important;
            }

            .mobile-container #gethelp .dropdown-header {
                margin-bottom: 0 !important;
            }

            .mobile-container .mega-get-help.img-box {
                margin: 0 !important;
                flex-direction: row !important;
                gap: 10px;
                align-items: center !important;
            }

            .mobile-container .mega-get-help.img-box img {
                padding: 0 !important;
            }

            .mega-dropdown-menu .card {
                width: 100% !important;
            }

            .get_help {
                padding: 0.7rem !important;
            }

            .mega-get-help {
                margin: 10px 0;
                flex-direction: column;
            }

            .mega-get-help img {
                padding: 20px 0px;
            }

            .mega-get-help h6,
            .mega-get-help p {
                padding: 0 !important;
                margin: 0 !important;
            }

            .gethelp_right_sec {
                padding: 25px 18px;
                width: 100% !important;
            }

            .gethelp_right_sec .mega-get-help .p-2 {
                padding: 0 !important;
            }

            .gethelp_right_sec .mega-get-help {
                padding: 16px 0 !important;
                margin: 0 !important;
                align-items: flex-start !important;
            }

            .tab-menu {
                padding-left: 22px;
                margin-bottom: 8px;
            }

            body .tab-menu a {
                font-weight: 600 !important;
                background: transparent !important;
                padding: 8px 20px !important;
                font-size: 16px !important;
            }

            .tab-menu a::after {
                content: url(/wp-content/uploads/2023/04/arrow_forward.svg);
                float: right;
            }

            .dropdown .show::after {
                border-top: 0em solid;
                border-bottom: 0.3em solid;

            }

            .mega-dropdown-menu.default-top-menu {
                padding: 0px 15px !important;
            }

        }

        .navbar-toggler:not(.collapsed) {
            z-index: 1;
            padding: 0 5px 12px 0 !important;
        }

        .navbar-toggler:not(.collapsed) .navbar-toggler-icon {
            background-image: url(https://cdn.yes.my/site/wp-content/uploads/2023/03/cross.svg);

        }

        .back-btn {
            color: #1A1E47;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            gap: 8px;
            margin: 0 0 20px;
            padding: 20px 0 0;
        }

        .menu-title {
            color: #1A1E47;
            font-size: 24px;
            font-weight: 700;
            margin: 10px 0;
            font-family: 'Open Sans';
        }

        .gethelp_right_sec .mega-get-help h6,
        .gethelp_right_sec .mega-get-help p {
            padding: 0;
        }

        .gethelp_right_sec .mega-get-help.img-box {
            gap: 16px;
        }

        .mega-dropdown-menu.default-top-menu {
            padding: 20px 14px;
            width: 100% !important;
        }

        .yes_text_menu_headline {
            color: #6C6C6C;
            font-size: 12px;
            font-weight: 700 !important;
            text-transform: uppercase;
            margin-bottom: 8px !important;
        }

        .navbar-nav.relative li a {
            padding-right: 2.5rem !important;
        }

        .dropdown-menu .col-auto ul:not(:last-child) {
            padding: 0px;
            margin-bottom: 24px;
        }

        .dropdown-menu .col-auto {
            padding: 40px !important;
        }

        .dropdown-menu .col-auto.p-0 {
            padding: 0 !important;
        }

        .postpaid_menu {
            left: 110px !important;
        }

        .prepaid_menu {
            left: 120px !important;
        }

        .broadband_menu {
            left: 270px !important;
        }

        .bottom-tabs {
            padding: 8px 20px;
        }

        .dropdown-menu .col-auto ul {
            padding: 0;
        }

        .dropdown-menu .col-auto ul:not(:last-child),
        .dropdown-menu .col-auto ul:not(:last-child) {
            margin-bottom: 24px;
        }
        .dropdown-menu .promo {
                padding: 20px !important;
            }

            .campagin {
            padding: 0 25px 0 0;
        }
        .campaign_board {
            left: 550px !important;
        }
    </style>

<ul class="navbar-nav">

<li class="nav-item dropdown mega-dropdown">

    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo esc_html__('Postpaid', 'yes.my'); ?></a>



    <ul class="dropdown-menu mega-dropdown-menu postpaid_menu" aria-labelledby="navbarDropdown">

        <div class="row mx-0">

            <div class="col-auto px-2 p-lg-4 py-lg-5">

                <li>

                    <ul>

                        <li id="menu-item-31205" class="dropdown-header menu-item menu-item-type-post_type menu-item-object-page menu-item-31205">

                            <p class="yes_text_menu_headline">explore

                                postpaid Plans</p>

                        </li>



<?php
//  $menus = wp_get_nav_menus();
//  echo "<pre>";
//  print_r($menus);
//  echo "</pre>";
$menu = wp_get_nav_menu_object("Postpaid-Explore Postpaid-Plans");
$primaryNav = wp_get_nav_menu_items($menu);
foreach ($primaryNav as $navItem) {

?>

<?php

$lang = get_bloginfo("language");
$parse = parse_url($navItem->url);
if (!isset($parse['path'])) $parse['path'] = '';
$url = rtrim(get_bloginfo('url'),"/");
if ($lang == "en-US"){

?>

            <li class="dropdown-header">
            <a class="custom_menu_nuv" href="<?php echo $url.$navItem->url; ?>">
            <?php echo $navItem->post_title; ?></a></li>     
<?php

            }else{

                ?>

                <li class="dropdown-header">
                <a class="custom_menu_nuv" href="<?php echo get_site_url().'/ms'.$parse['path']; ?>">
                <?php echo $navItem->post_title; ?></a></li> 
            </a></li>
            <?php
            }      

        }
?>

                    </ul>

                </li>

            </div>

<?php

            $yes_menu_image_postpaid = get_post_meta($navItem->ID, 'ytl_div_img_logo', true);

            if (isset($yes_menu_image_postpaid) && !empty(isset($yes_menu_image_postpaid))) {

                $menu_image_postpaid = wp_get_attachment_image_url($yes_menu_image_postpaid);

            }

            // $dummy_image_url='http://yes.my.localhost/wp-content/uploads/2023/03/dummy_300x165_000000_cbcefd.png';

            // $dummy_image_url=get_site_url().'/wp-content/uploads/2022/05/ft5g-simpack-new2.png';

            // // $menu_image_postpaid= wp_get_attachment_image_url($dummy_image_url);

            // $menu_image_postpaid=($dummy_image_url);



            $yes_menu_desc_postpaid = get_post_meta($navItem->ID, 'menu_item_desc', true);

            if (isset($yes_menu_desc_postpaid) && !empty(isset($yes_menu_desc_postpaid))) {

                $menu_desc_postpaid = $yes_menu_desc_postpaid;

            }

            if ($menu_image_postpaid) {

?>
                <div class="col-auto px-2 p-lg-4 py-lg-5 d-lg-block d-none">
                    <li>
                        <ul>
                            <div class="cards">
                                <div class="postpaid_card_box card-box">
                                    <!-- <img src="/wp-content/uploads/2022/05/ft5g-simpack-new2.png"> -->
                                    <img src="<?php echo $menu_image_postpaid  ?>">
                                </div>
                                <div class="postpaid_card_text card-body">
                                    <p class="card-text"><?php echo $menu_desc_postpaid ?></p>
                                    <a href="#" style="display:none">LEARN MORE <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </ul>
                    </li>
                </div>
                    <?php

            }
                ?>
        </div>
    </ul>
</li>
</ul>
    <ul class="navbar-nav">

    <li class="nav-item dropdown mega-dropdown">

        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <?php echo esc_html__('Prepaid', 'yes.my'); ?>
        </a>

        <ul class="dropdown-menu mega-dropdown-menu prepaid_menu" aria-labelledby="navbarDropdown">

            <div class="row mx-0">
                <div class="col-auto px-2 p-lg-4 py-lg-5">
                    <li>
                        <ul>
                            <li id="menu-item-31205"
                                class="dropdown-header menu-item menu-item-type-post_type menu-item-object-page menu-item-31205">
                                <p class="yes_text_menu_headline">explore
                                    prepaid Plans</p>
                            </li>
                            <?php
                            $prepaid_menu = wp_get_nav_menu_object("Prepaid-explore prepaid Plans");
                            $prepaid_Nav = wp_get_nav_menu_items($prepaid_menu);
                            foreach ($prepaid_Nav as $prepaid_navItem) {
                                ?>
                                <?php
                                $lang = get_bloginfo("language");  
                                $parse = parse_url($prepaid_navItem->url);                            
                                if (!isset($parse['path'])) $parse['path'] = '';
                                $url = rtrim(get_bloginfo('url'), "/");
                                if ($lang == "en-US") {
                                    ?>
                                    <li class="dropdown-header"><a class="custom_menu_nuv"
                                            href="<?php echo $url . $prepaid_navItem->url; ?>">
                                            <?php echo $prepaid_navItem->post_title; ?></a></li>
                                    <?php
                                } else {
                                    ?>
                                    <li class="dropdown-header">
                                        <a class="custom_menu_nuv" href="<?php echo get_site_url() . '/ms' . $parse['path']; ?>">

                                            <?php echo $prepaid_navItem->post_title; ?></a>
                                    </li>

                                    <?php

                                }

                            }

                            ?>

                        </ul>

                    </li>

                </div>

                <?php

                $yes_menu_image_prepaid = get_post_meta($prepaid_navItem->ID, 'ytl_div_img_logo', true);

                if (isset($yes_menu_image_prepaid) && !empty(isset($yes_menu_image_prepaid))) {

                    $menu_image_prepaid = wp_get_attachment_image_url($yes_menu_image_prepaid, 'full');

                }

                if ($menu_image_prepaid) {
                    ?>
                    <div class="col-auto px-2 p-lg-4 py-lg-5 d-lg-block d-none">
                        <li>
                            <ul>
                                <div class="cards">
                                    <div class="postpaid_card_box card-box">
                                        <!-- <img src="/wp-content/uploads/2022/05/ft5g-simpack-new2.png"> -->
                                        <img src="<?php echo $menu_image_prepaid ?>">
                                    </div>
                                    <div class="postpaid_card_text card-body">
                                    </div>
                                </div>
                            </ul>
                        </li>
                    </div>
                    <?php
                }
                ?>
            </div>
        </ul>
    </li>
</ul>
    <ul class="navbar-nav">
        <?php
        $lang = get_bloginfo("language");
        $menu_link = '/yes-postpaid-infinite-5g/';
        if ($lang == "en-US") {
            $menu_link = '/yes-postpaid-infinite-5g/';
        } elseif ($lang == "ms-MY") {
            $menu_link = '/ms/yes-postpaid-infinite-5g/';
        }
        ?>
        <li id="menu-item-20033" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20033 nav-item">
            <a href=<?php echo $menu_link ?> class="nav-link"><?php echo esc_html__('Infinite+', 'yes.my'); ?></a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item dropdown mega-dropdown mobile-none">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo esc_html__('Broadband', 'yes.my'); ?></a>
            <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a> -->
            <ul class="dropdown-menu mega-dropdown-menu broadband_menu" aria-labelledby="navbarDropdown">
                <div class="row mx-0">
                    <div class="col-auto tab p-0">

                        <div class="tab-menu">
                            <ul>
                                <li><a href="#" class="active dropdown-header" data-rel="tab-1">5G Wireless Broadband</a></li>
                                <li><a href="#" data-rel="tab-2" class="dropdown-header">4G Broadband</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-auto px-2 py-lg-4">
                        <div class="tab-main-box">
                            <div class="tab-box" id="tab-1" style="display:block;">
                                <div class="tab-box-inner">
                                    <li>
                                        <ul>
                                            <li id="menu-item-31205" class="dropdown-header menu-item menu-item-type-post_type menu-item-object-page menu-item-31205">
                                                <p class="yes_text_menu_headline">Explore Our Plans</p>
                                            </li>
                                            <?php
                       
                                $Wireless_Fibre_menu = wp_get_nav_menu_object("Broadband - Wireless-Fiber-5G");
								// print_r($Wireless_Fibre_menu);

                                            $WirelessNav = wp_get_nav_menu_items($Wireless_Fibre_menu); 
											// print_r($WirelessNav);                                            
                                     foreach ($WirelessNav as $wirelessItem) {
                        ?>
                                    <li class="dropdown-header"><a class="custom_menu_nuv" href="<?php echo $wirelessItem->url; ?>"><?php echo $wirelessItem->title; ?></a></li>
                                        <?php                    }
                    ?>

                                        </ul>


                                        <ul>
                                            <li id="menu-item-31205" class="dropdown-header menu-item menu-item-type-post_type menu-item-object-page menu-item-31205">
                                                <p class="yes_text_menu_headline">quick options</p>
                                            </li>
                                            <?php
                                            $quick_menu = wp_get_nav_menu_object("Broadband - quick-options");
                                            $quick_menuNav = wp_get_nav_menu_items($quick_menu);

                                            foreach ($quick_menuNav as $quick_menusItem) {
                                                ?>
                                                <?php
                                                $lang = get_bloginfo("language");
                                                $parse = parse_url($quick_menusItem->url);
                                                if (!isset($parse['path'])) $parse['path'] = '';
                                                $url = rtrim(get_bloginfo('url'),"/");
                                                if ($lang == "en-US"){
                                                ?>
                                                <li class="dropdown-header"><a class="custom_menu_nuv" href="<?php echo $url.$quick_menusItem->url; ?>">
                                                <?php echo $quick_menusItem->post_title; ?></a></li>
                                            <?php
                                            }else{
                                                ?>
                                                <li class="dropdown-header">
                                                <a class="custom_menu_nuv" href="<?php echo get_site_url().'/ms'.$parse['path']; ?>">
                                                <?php echo $quick_menusItem->post_title; ?></a></li>
                                            <?php
                                            }
                                            }
                                            ?>
                                            <!-- <li class="dropdown-header">Device Manual
                                        </li> -->


                                        </ul>
                                    </li>
                                </div>
                            </div>
                            <div class="tab-box" id="tab-2">
                                <div class="tab-box-inner">
                                    <li>
                                        <ul>
                                            <li id="menu-item-31205" class="dropdown-header menu-item menu-item-type-post_type menu-item-object-page menu-item-31205">
                                                <p class="yes_text_menu_headline">Home Broadband</p>
                                            </li>
                                            <?php
                                            $Broadband_menu = wp_get_nav_menu_object("Broadband - 4G-Broadband");
                                            $broadband_menuNav = wp_get_nav_menu_items($Broadband_menu);
                                            foreach ($broadband_menuNav as $broadband_menusItem) {
                                                ?>
                                                <?php
                                                $lang = get_bloginfo("language");
                                                $parse = parse_url($broadband_menusItem->url);
                                                if (!isset($parse['path'])) $parse['path'] = '';
                                                $url = rtrim(get_bloginfo('url'),"/");
                                                if ($lang == "en-US"){

                                                ?>
                                                <li class="dropdown-header"><a class="custom_menu_nuv" href="<?php echo $url.$broadband_menusItem->url; ?>">
                                                <?php echo $broadband_menusItem->post_title; ?></a></li>
                                            <?php
                                            }else{
                                                ?>
                                                <li class="dropdown-header">
                                                <a class="custom_menu_nuv" href="<?php echo get_site_url().'/ms'.$parse['path']; ?>">
                                                <?php echo $broadband_menusItem->post_title; ?></a></li>
                                            <?php
                                            }
                                            }
                                            ?>

                                        </ul>
                                        <ul>
                                            <li id="menu-item-31205" class="dropdown-header menu-item menu-item-type-post_type menu-item-object-page menu-item-31205">
                                                <p class="yes_text_menu_headline">Quick Options</p>
                                            </li>
                                            <?php
                                            $quick_menu = wp_get_nav_menu_object("Broadband - quick-options");
                                            $quick_menuNav = wp_get_nav_menu_items($quick_menu);

                                            foreach ($quick_menuNav as $quick_menusItem) {
                                            ?>
                                            <?php
                                            $lang = get_bloginfo("language");                                            
                                            $parse = parse_url($quick_menusItem->url);                                            
                                            if (!isset($parse['path'])) $parse['path'] = '';
                                            $url = rtrim(get_bloginfo('url'),"/");
                                            if ($lang == "en-US"){    
                                            ?>
                                                <li class="dropdown-header"><a class="custom_menu_nuv" href="<?php echo $url.$quick_menusItem->url; ?>">
                                                <?php echo $quick_menusItem->post_title; ?></a></li>
                                            <?php
                                            }else{
                                                ?>
                                                <li class="dropdown-header">
                                                <a class="custom_menu_nuv" href="<?php echo get_site_url().'/ms'.$parse['path']; ?>">
                                                <?php echo $quick_menusItem->post_title; ?></a></li>
                                            <?php
                                            }
                                             }
                                            ?>
                                            <!-- <li class="dropdown-header">Device Manual
                                        </li> -->


                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li id="menu-item-31205" class="dropdown-header menu-item menu-item-type-post_type menu-item-object-page menu-item-31205">
                                                <p class="yes_text_menu_headline">on-the-go broadband</p>
                                            </li>
                                            <?php
                                            $on_the_go_broadband = wp_get_nav_menu_object("Broadband - 4G-Broadband-on-the-go");
                                            $on_the_goNav = wp_get_nav_menu_items($on_the_go_broadband);

                                            foreach ($on_the_goNav as $on_the_broadbandItem) {
                                                ?>
                                    <?php
                                    $lang = get_bloginfo("language");
                                    $parse = parse_url($on_the_broadbandItem->url);
                                    if (!isset($parse['path'])) $parse['path'] = '';
                                    $url = rtrim(get_bloginfo('url'),"/");
                                    if ($lang == "en-US"){
                                                ?>
                                                <li class="dropdown-header"><a class="custom_menu_nuv" href="<?php echo $url.$on_the_broadbandItem->url; ?>">
                                                <?php echo $on_the_broadbandItem->post_title; ?></a></li>
                                            <?php
                                            }else{
                                                ?>
                                                <li class="dropdown-header">
                                                <a class="custom_menu_nuv" href="<?php echo get_site_url().'/ms'.$parse['path']; ?>">
                                                <?php echo $on_the_broadbandItem->post_title; ?></a></li>
                                            <?php
                                            }
                                            }
                                            ?>

                                        </ul>

                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>

 

                </div>
            </ul>
        </li>
        <!-- ----------for mobile------- -->
        <li class="nav-item dropdown mega-dropdown dasktop-none">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownmobile" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo esc_html__('Broadband', 'yes.my'); ?></a>
            <!-- ----------for mobile------- -->
            <ul class="dropdown-menu mega-dropdown-menu" aria-labelledby="navbarDropdownmobile">
                <div class="tab-menu mobile">
                    <ul>
                        <li><a href="#" class="active dropdown-header" data-rel="tab-3">5G Wireless Broadband</a></li>
                        <li><a href="#" data-rel="tab-4" class="dropdown-header">4G Broadband</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-box overlap" id="tab-3">
                    <div class="back-btn" data-rel="tab-3">
                        <img src="https://cdn.yes.my/site/wp-content/uploads/2023/03/arrow_back.svg"> Main Menu
                    </div>
                    <h2 class="menu-title">5G Wireless Broadband</h2>
                    <li>
                        <ul>
                            <li id="menu-item-31205" class="dropdown-header menu-item menu-item-type-post_type menu-item-object-page menu-item-31205">
                                <p class="yes_text_menu_headline">explore postpaid Plans</p>
                            </li>
<?php
                            $Wireless_Fibre_menu = wp_get_nav_menu_object("Broadband - Wireless-Fiber-5G");
                            $WirelessNav = wp_get_nav_menu_items($Wireless_Fibre_menu);

                            if ($WirelessNav) {
                                foreach ($WirelessNav as $wirelessItem) {

                            ?>
                                    <li class="dropdown-header"><a class="custom_menu_nuv" href="<?php echo $wirelessItem->url; ?>"><?php echo $wirelessItem->title; ?></a></li>
                            <?php
                                }
                            }
                            ?>


                        </ul>
                        <ul>
                            <li id="menu-item-31205" class="dropdown-header menu-item menu-item-type-post_type menu-item-object-page menu-item-31205">
                                <p class="yes_text_menu_headline">quick options</p>
                            </li>
                            <?php
                            $quick_menu = wp_get_nav_menu_object("Broadband - quick-options");
                            $quick_menuNav = wp_get_nav_menu_items($quick_menu);

                            foreach ($quick_menuNav as $quick_menusItem) {

                                ?>
                                <li class="dropdown-header"><a class="custom_menu_nuv" href="<?php echo $quick_menusItem->url; ?>"><?php echo $quick_menusItem->post_title; ?></a></li>
                            <?php
                            }
                            ?>
                            <!-- <li class="dropdown-header">Device Manual
                            </li> -->


                        </ul>
                    </li>
                    <!-- <li>
                        <ul>
                            <div class="card">

                                <div class="card-box"></div>
                                <div class="card-body">

                                    <p class="card-text">Be the first in Malaysia to
                                        learn,
                                        play & discover 5G.</p>
                                    <a href="#">LEARN MORE <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>

                        </ul>
                    </li>
                    <li>
                        <ul>
                            <div class="card">

                                <div class="card-box"></div>
                                <div class="card-body">

                                    <p class="card-text">Be the first in Malaysia to
                                        learn,
                                        play & discover 5G.</p>
                                    <a href="#">LEARN MORE <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>

                        </ul>
                    </li> -->
                </div>
                <div class="tab-box overlap" id="tab-4">
                    <div class="back-btn" data-rel="tab-4">
                        <img src="https://cdn.yes.my/site/wp-content/uploads/2023/03/arrow_back.svg"> Main Menu
                    </div>
                    <h2 class="menu-title">4G Broadband</h2>
                    <div class="tab-box-inner">
                        <li>
                            <ul>
                                <li id="menu-item-31205" class="dropdown-header menu-item menu-item-type-post_type menu-item-object-page menu-item-31205">
                                    <p class="yes_text_menu_headline">home broadband</p>
                                </li>
                                <?php
                                $Broadband_menu = wp_get_nav_menu_object("Broadband - 4G-Broadband");
                                $broadband_menuNav = wp_get_nav_menu_items($Broadband_menu);
                                foreach ($broadband_menuNav as $broadband_menusItem) {

                                    ?>
                                    <li class="dropdown-header"><a class="custom_menu_nuv" href="<?php echo $broadband_menusItem->url; ?>"><?php echo $broadband_menusItem->post_title; ?></a></li>
                                <?php
                                }
                                ?>


                            </ul>
                            <ul>
                                <li id="menu-item-31205" class="dropdown-header menu-item menu-item-type-post_type menu-item-object-page menu-item-31205">
                                    <p class="yes_text_menu_headline">quick options</p>
                                </li>
                                <?php
                                $quick_menu = wp_get_nav_menu_object("Broadband - quick-options");
                                $quick_menuNav = wp_get_nav_menu_items($quick_menu);

                                foreach ($quick_menuNav as $quick_menusItem) {

                                    ?>
                                    <li class="dropdown-header"><a class="custom_menu_nuv" href="<?php echo $quick_menusItem->url; ?>"><?php echo $quick_menusItem->post_title; ?></a></li>
                                <?php
                                }
                                ?>
                                <!-- <li class="dropdown-header">Device Manual
                            </li> -->


                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li id="menu-item-31205" class="dropdown-header menu-item menu-item-type-post_type menu-item-object-page menu-item-31205">
                                    <p class="yes_text_menu_headline">on-the-go broadband</p>
                                </li>
                                <?php
                                $on_the_go_broadband = wp_get_nav_menu_object("Broadband - 4G-Broadband-on-the-go");
                                $on_the_goNav = wp_get_nav_menu_items($on_the_go_broadband);

                                foreach ($on_the_goNav as $on_the_broadbandItem) {

                                    ?>
                                    <li class="dropdown-header"><a class="custom_menu_nuv" href="<?php echo $on_the_broadbandItem->url; ?>"><?php echo $on_the_broadbandItem->post_title; ?></a></li>
                                <?php
                                }
                                ?>


                            </ul>

                        </li>
                        <!-- <li>
                            <ul>
                                <div class="card">

                                    <div class="card-box"></div>
                                    <div class="card-body">

                                        <p class="card-text">Be the first in Malaysia to
                                            learn,
                                            play & discover 5G.</p>
                                        <a href="#">LEARN MORE <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>

                            </ul>
                        </li>
                        <li>
                            <ul>
                                <div class="card">

                                    <div class="card-box"></div>
                                    <div class="card-body">

                                        <p class="card-text">Be the first in Malaysia to
                                            learn,
                                            play & discover 5G.</p>
                                        <a href="#">LEARN MORE <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>

                            </ul>
                        </li> -->
                    </div>
                </div>
            </ul>
        </li>
        <!-- ----------for mobile------- -->
    </ul>
    <!-- ----------for WEB------- -->
    <ul class="navbar-nav  campagin">
                            <li class="nav-item dropdown mega-dropdown">
                                <a class="nav-link dropdown-toggle flex" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo esc_html__('Promo/Campaign', 'yes.my'); ?>
                                <div class="parent">
                                        <button class="btn-gradient-2"><span class="badges">HOT</span></button>
                                    </div>
                            </a>
                             
                                <ul class="dropdown-menu mega-dropdown-menu postpaid_menu campaign_board" aria-labelledby="navbarDropdown">
                                    <div class="row mx-0">
                                        <div class="col-auto px-2 p-lg-4 py-lg-5 promo">
                                            <li>
                                                <ul>
                                                    <li id="menu-item-31205" class="dropdown-header menu-item menu-item-type-post_type menu-item-object-page menu-item-31205">
                                        
                                                    </li>

                    <?php
                    // $menus = wp_get_nav_menus();
                   
                    $menu = wp_get_nav_menu_object("Promo/Campaign");
                    $Campaign = wp_get_nav_menu_items($menu);


                    foreach ($Campaign as $navItem) {
                        // echo '<pre>';
                        // print_r($navItem);
                        // echo "</pre>";
                        ?>
                                        <?php
                                        $lang = get_bloginfo("language");
                                        $parse = parse_url($navItem->url);
                                      
                                        $url = rtrim(get_bloginfo('url'), "/");
                                        if ($lang == "en-US") {
                                            ?>
                                                                                <li class="dropdown-header">
                                                                                <a class="custom_menu_nuv" href="<?php echo $navItem->url; ?>">
                                                                                <?php echo $navItem->title; ?></a></li>                    
                                                            <?php
                                        } else {
                                            ?>
                                                                                    <li class="dropdown-header">
                                                                                    <a class="custom_menu_nuv" href="<?php echo $navItem->url ?>">
                                                                                    <?php echo $navItem->title; ?></a></li>
                                                                                <?php
                                        }

                    }
                    ?>
                                                </ul>
                                            </li>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                        </ul>
    <ul class="navbar-nav">
        <?php
        $lang = get_bloginfo("language");
        $menu_link_5G_Gaming = 'http://www.cloudgaming.my';
        if ($lang == "en-US") {
            $menu_link_5G_Gaming = 'http://www.cloudgaming.my';
        } elseif ($lang == "ms-MY") {
            $menu_link_5G_Gaming = 'http://www.cloudgaming.my';
        }
        ?>
        <li id="menu-item-31215" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31215 nav-item">
            <a href="<?php echo $menu_link_5G_Gaming ?>" target="_blank" class="nav-link flex"><?php echo esc_html__('Yes 5G Gaming', 'yes.my'); ?> </a>
        </li>
     </ul>

    <ul class="navbar-nav">
        <li class="nav-item dropdown mega-dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo esc_html__('Get Help', 'yes.my'); ?></a>
            <ul class="dropdown-menu mega-dropdown-menu" aria-labelledby="navbarDropdown" id="gethelp">
                <div class="row mx-0">
                    <div class="col-xl-8 col-lg-12 col-md-12 get_help mobile-none">
                        <li class="dropdown-header">tools & services</li>
                        <div class="row">
                            <div class="col-6 col-md-6">
                                <li class="mega-get-help">
                                    <img src="https://cdn.yes.my/site/wp-content/uploads/2023/03/Coverage.svg" alt="...">
                                    <div class="">
                                 <?php
                                    $lang = get_bloginfo("language");
                                    $site_url_menu = get_site_url();
                                    if ($lang == "en-US") {
                                        $site_url_menu = get_site_url();
                                    } elseif ($lang == "ms-MY") {
                                        $site_url_menu = get_site_url().'/ms';
                                    }
                                    ?>
                                        <h6> <a href="<?php echo $site_url_menu. '/coverage/' ?>"><?php echo esc_html__('Coverage Checker  ', 'yes.my'); ?></a></h6>
                                        <p>Check Yes network coverage in Malaysia.</p>
                                    </div>
                                </li>

                            </div>
                            <div class="col-6 col-md-6">
                                <li class="mega-get-help">
                                    <img src="https://cdn.yes.my/site/wp-content/uploads/2023/03/Speed.svg" alt="...">
                                    <div class="">
                                    <?php
                                    $lang = get_bloginfo("language");
                                    $site_url_menu = get_site_url();
                                    if ($lang == "en-US") {
                                        $site_url_menu = get_site_url();
                                    } elseif ($lang == "ms-MY") {
                                        $site_url_menu = get_site_url().'/ms';
                                    }
                                    ?>
                                        <h6><a href="<?php echo $site_url_menu . '/speed-test/' ?>"><?php echo esc_html__('Speed Test', 'yes.my'); ?></a></h6>
                                        <p>Measure your internet connection speed.</p>
                                    </div>
                                </li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6">

                                <li class="mega-get-help">
                                    <img src="https://cdn.yes.my/site/wp-content/uploads/2023/03/Supported-Devices.svg" alt="...">
                                    <div class="">
                                    <?php
                                    $lang = get_bloginfo("language");
                                    $site_url_menu = get_site_url();
                                    if ($lang == "en-US") {
                                        $site_url_menu = get_site_url();
                                    } elseif ($lang == "ms-MY") {
                                        $site_url_menu = get_site_url().'/ms';
                                    }
                                    ?>
                                        <h6><a href="<?php echo $site_url_menu. '/supported-devices/' ?>"><?php echo esc_html__('Supported Devices', 'yes.my'); ?></a></h6>
                                        <p>Browse devices compatible with 4G LTE and 5G
                                            technology.</p>
                                    </div>
                                </li>

                            </div>
                            <div class="col-6 col-md-6">
                                <li class="mega-get-help">
                                    <img src="https://cdn.yes.my/site/wp-content/uploads/2023/03/Track-Order.svg" alt="...">
                                    <div class="">
                                    <?php
                                    $lang = get_bloginfo("language");
                                    $site_url_menu = get_site_url();
                                    if ($lang == "en-US") {
                                        $site_url_menu = get_site_url();
                                    } elseif ($lang == "ms-MY") {
                                        $site_url_menu = get_site_url().'/ms';
                                    }
                                    ?>
                                        <h6><a href="<?php echo $site_url_menu . '/trackorder/' ?>"><?php echo esc_html__('Track Order', 'yes.my'); ?></a></h6>
                                        <p>Check the status of a Yes order.</p>
                                    </div>
                                </li>
                            </div>
                            <div class="col-6 col-md-6" style="display:none;">
                                <li class="mega-get-help">
                                    <img src="https://www.yes.my/wp-content/uploads/2023/06/Typefi_alert-triangle-Size24-ColorDark.svg " alt="..." style="
    width: 25px;">
                                    <div class="">
                                    <?php
                                    $lang = get_bloginfo("language");
                                    $site_url_menu = get_site_url();
                                    if ($lang == "en-US") {
                                        $site_url_menu = get_site_url();
                                    } elseif ($lang == "ms-MY") {
                                        $site_url_menu = get_site_url().'/ms';
                                    }
                                    ?>
                                        <h6 ><a href="<?php echo $site_url_menu . '/a3-charger-replacement/' ?>"><?php echo esc_html__('Product Notice', 'yes.my'); ?></a></h6>

                                    </div>
                                </li>
                            </div>
                        </div>

                        <li class="mt-3 dropdown-header">LOCATE us</li>
                        <div class="row">
                            <div class="col-6 col-md-6">

                                <li class="mega-get-help">
                                    <img src="https://cdn.yes.my/site/wp-content/uploads/2023/03/Store-Locator.svg" alt="...">
                                    <div class="">
                                    <?php
                                    $lang = get_bloginfo("language");
                                    $site_url_menu = get_site_url();
                                    if ($lang == "en-US") {
                                        $site_url_menu = get_site_url();
                                    } elseif ($lang == "ms-MY") {
                                        $site_url_menu = get_site_url().'/ms';
                                    }
                                    ?>
                                        <h6><a href="<?php echo $site_url_menu . '/store-locator/' ?>"><?php echo esc_html__('Store Locator', 'yes.my'); ?></a></h6>
                                        <p>Find the nearest Yes store.</p>
                                    </div>
                                </li>

                            </div>
                            <div class="col-6 col-md-6">
                                <li class="mega-get-help">
                                    <img src="https://cdn.yes.my/site/wp-content/uploads/2023/03/Roadshow-Locations.svg" alt="...">
                                    <div class="">
                                    <?php
                                    $lang = get_bloginfo("language");
                                    $site_url_menu = get_site_url();
                                    if ($lang == "en-US") {
                                        $site_url_menu = get_site_url();
                                    } elseif ($lang == "ms-MY") {
                                        $site_url_menu = get_site_url().'/ms';
                                    }
                                    ?>
                                        <h6><a href="<?php echo $site_url_menu . '/roadshow/' ?>"><?php echo esc_html__('Roadshow Locations', 'yes.my'); ?></a></h6>
                                        <p>Location of the Yes Roadshow.</p>
                                    </div>
                                </li>
                            </div>
                        </div>
                        <div class="box">
                            <li><img src="https://cdn.yes.my/site/wp-content/uploads/2023/04/email.svg" alt="..."><a href="mailto:yescare@yes.my"> Email us</a></li>
                            <li><img src="https://cdn.yes.my/site/wp-content/uploads/2023/04/message.svg" alt="..."><a href="https://www.facebook.com/messages/t/242365937676/"> Chat to Support</a></li>
                        </div>
                    </div>
                    <div class="col-auto get_help-mobile dasktop-none">
                        <ul>
                            <li class="dropdown-header-mobile">tools & services</li>
                            <li><a href="<?php echo $site_url_menu . '/coverage/' ?>"><img src="https://cdn.yes.my/site/wp-content/uploads/2023/03/Coverage.svg" alt="..."> Coverage Checker</a></li>
                            <li><a href="<?php echo $site_url_menu . '/speed-test/' ?>"><img src="https://cdn.yes.my/site/wp-content/uploads/2023/03/Speed.svg" alt="..."> Speed Test</a></li>
                            <li><a href="<?php echo $site_url_menu . '/supported-devices/' ?>"><img src="https://cdn.yes.my/site/wp-content/uploads/2023/03/Supported-Devices.svg" alt="..."> Supported Devices</a></li>
                            <li><a href="<?php echo $site_url_menu . '/trackorder/' ?>"><img src="https://cdn.yes.my/site/wp-content/uploads/2023/03/Track-Order.svg" alt="..."> Track Order</a></li>
                            <li style="display:none;"><a href="<?php echo $site_url_menu . '/a3-charger-replacement/' ?>"><img src="https://cdn.yes.my/site/wp-content/uploads/2023/03/Track-Order.svg" alt="..."> Product Notice</a></li>
                        </ul>
                        <ul>
                            <li class="mt-3 dropdown-header-mobile">LOCATE us</li>
                            <li><a href="<?php echo $site_url_menu . '/store-locator/' ?>"><img src="https://cdn.yes.my/site/wp-content/uploads/2023/03/Store-Locator.svg" alt="..."> Store Locator</a></li>
                            <li><a href="<?php echo $site_url_menu. '/roadshow/' ?>"><img src="https://cdn.yes.my/site/wp-content/uploads/2023/03/Roadshow-Locations.svg" alt="..."> Roadshow Locations</a></li>
                        </ul>
                        <div class="box">
                            <ul>
                                <li><img src="https://cdn.yes.my/site/wp-content/uploads/2023/04/email.svg" alt="..."><a href="mailto:yescare@yes.my"> Email us</a></li>
                                <li><img src="https://cdn.yes.my/site/wp-content/uploads/2023/04/message.svg" alt="..."><a href="https://www.facebook.com/messages/t/242365937676/"> Chat to Support</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-md-12 gethelp_right_sec">
                        <li class="dropdown-header">most asked questions</li>
                        <li class="mega-get-help img-box">
                            <img src="/wp-content/uploads/2023/05/FT5G_banner-350x350@0.5x.png" alt="..." width="76" height="76" style="border-radius: 10px;">
                            <div>
                                <h6>Keep Your Number</h6>
                                <p>Switch to Yes while keeping your number.</p>
                            </div>
                        </li>
                        <li class="mega-get-help">
                            <h6><a href="<?php echo $site_url_menu . '/faq/howtoactivatesim/' ?>">Activate SIM card</a></h6>
                        </li>
                        <li class="mega-get-help">
                            <h6><a href="<?php echo $site_url_menu . '/support/payment-methods/' ?>">Payment method</a></h6>
                        </li>
                        <li class="mega-get-help">
                            <h6><a href="<?php echo $site_url_menu . '/shop/existing-customers/how-to-get-databack/' ?>">Get databack</a></h6>
                        </li>
                        <li class="mega-get-help"><a href="/faq">GO TO HELP CENTRE <i class="fas fa-chevron-right"></i></a></li>
                    </div>
                </div>


            </ul>
        </li>
    </ul>

    <?php
    $actual_link = $_SERVER['REQUEST_URI'];
    if (strpos($actual_link, 'ms') !== false) {
        $modified_link = str_replace('/ms/', '', $actual_link);
    } else {
        $modified_link = $actual_link;
    }                            
        // print_r($modified_link);
    ?>

    <div class="bottom-tabs mt-5">
        <div class="container-fluid g-0">
            <div class="row m-0">
                <ul class="navbar-nav">
                    <li><a class="active" href="javascript:void(0)">Personal</a></li>
                    <li><a href="<?php echo $site_url_menu . '/business/' ?>">Business</a></li>
                    <li><a href="<?php echo $site_url_menu . '/learnfromhome/' ?>">Learning</a></li>
                </ul>
                <div class="languages-drop">                
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:globe">
                        <path fill="currentColor" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539a6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068c.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539a6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855c.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"></path>
                    </svg>
                    <a class="active" href="<?php echo get_site_url() . $modified_link ?>">EN</a><span>|</span>
                    <a href="<?php echo get_site_url() . '/ms/' . $modified_link ?>">BM</a>

                </div>
            </div>
        </div>
    </div>

    <script>
        jQuery('.tab-menu li a').on('click', function() {
            if (jQuery(window).width() >= 640) {
                var target = $(this).attr('data-rel');
                jQuery('.tab-menu li a').removeClass('active');
                jQuery(this).addClass('active');
                jQuery("#" + target).fadeIn('slow').siblings(".tab-box").hide();
                return false;
            }
        });


        jQuery(document).ready(function() {
            var images = jQuery('.postpaid_card_box img').attr('src');

            if (images != "") {
                var data = jQuery('.postpaid_card_text a').attr('style');
                if (data == 'display:none') {
                    jQuery('.postpaid_card_text a').css('display', 'block');
                }
            }
            if (jQuery("html[lang='ms-MY']").length) {
                jQuery('.languages-drop').find("a:eq(1)").addClass('active');
                jQuery('.languages-drop').find("a:eq(0)").removeClass('active');
            }

            if ((jQuery('body.page-template-default').hasClass('page-id-20027')) || jQuery('body.page-template-default').hasClass('page-id-19782')) {
                jQuery('#menu-item-20033 a').addClass('active');
            }

            if ((jQuery('body.page-template-default').hasClass('page-id-31004')) || jQuery('body.page-template-default').hasClass('page-id-31006')) {
                jQuery('#menu-item-31214 a').addClass('active');
            }

            jQuery(window).resize(function() {
                jQuery('body').css('overflow', 'auto');
                jQuery(".yes_mobile_menu_overlay").remove();
            });
        })

        jQuery('.yes_toggle').on('click', function(e) {

            if (jQuery('.yes_toggle').attr('aria-expanded') === "true") {
                jQuery('body').css('overflow', 'hidden');
                jQuery("<div class='yes_mobile_menu_overlay'></div>").appendTo("#overlay-section-div");
            } else {
                jQuery('body').css('overflow', 'auto');
                jQuery(".yes_mobile_menu_overlay").remove();
            }
        });

        jQuery('.tab-menu.mobile li a').on('click', function() {
            var target = jQuery(this).attr('data-rel');
            jQuery('.tab-menu li a').removeClass('active');
            jQuery(this).addClass('active');
            jQuery("#" + target).css('transform', 'translateX(120%)');
            jQuery("#" + target).css('transform', 'translateX(0)');
            jQuery(".yes_toggle").css('display', 'none');
            return false;
        });

        jQuery('.back-btn, .yes_toggle').on('click', function() {
            //    var target = jQuery(this).attr('data-rel');
            jQuery(".tab-box.overlap").css('transform', 'translateX(120%)');
            jQuery(".yes_toggle").css('display', 'block');
            //    jQuery("#" + target).css('transform', 'translateX(-120%)');
            return false;
        });

        jQuery(".yes_toggle").on('click', function() {
            if ((jQuery('.nav-link.dropdown-toggle').hasClass('show')) && jQuery('.dropdown-menu.mega-dropdown-menu').hasClass('show')) {
                jQuery('.nav-link.dropdown-toggle').removeClass('show')
                jQuery('.dropdown-menu.mega-dropdown-menu').removeClass('show')
            }
        });

        jQuery(document).on('click', '.custom_menu_nuv', function () {
            jQuery('.nav-link.dropdown-toggle').removeClass('show');
            jQuery('body').css('overflow', 'auto');
            jQuery('.yes_toggle').attr('aria-expanded', 'true');
        })
    </script>

<?php
}



function add_file_types_to_uploads($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');