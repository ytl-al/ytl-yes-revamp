<?php

/**
 * Displays the site header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yes-twentytwentyone
 */
$path = plugin_basename(__DIR__).'/menu.json';
?>

<!-- Header STARTS -->
<header class="page-header sticky-top">
    <?php get_template_part('template-parts/header/top-page-banner'); ?>

    <div class="top-tabs-container">
        <div class="container g-0">
            <div class="row g-0">
                <div class="col-10">
                    <?php /*
                    $lang           = get_bloginfo('language');
                    $personalLink   = '/';
                    $bizLink        = '/biz/plans';
                    if ($lang == 'ms-MY') {
                        $personalLink   = '/ms' . $personalLink;
                        $bizLink        = '/ms' . $bizLink;
                    } else if ($lang == 'zh-CN') {
                        $personalLink   = '/zh-hans' . $personalLink;
                        $bizLink        = '/zh-hans' . $bizLink;
                    }
                    ?>
                    <ul class="tabnav">
                        <?php /*
                        <li><a href="<?php echo $personalLink; ?>" class="active"><?php echo esc_html__('Personal', 'yes.my'); ?></a></li>
                        <li><a href="<?php echo $bizLink; ?>"><?php echo esc_html__('Business', 'yes.my'); ?></a></li>
                        <li><a href="https://www.ytlfoundation.org/learnfromhome/" target="_blank"><?php echo esc_html__('Education', 'yes.my'); ?></a></li>
                        *//* ?>
                        <?php if (function_exists('display_yes_toplogo')) display_yes_toplogo(); ?>
                        <li><a href="<?php echo $personalLink; ?>" class="active">Personal</a></li>
                        <li><a href="<?php echo $bizLink; ?>">Business</a></li>
                        <li><a href="https://www.ytlfoundation.org/learnfromhome/" target="_blank">Education</a></li>
                    </ul>
                    */ ?>

                    <?php 
                        $is_business_child = (function_exists('is_child_of_business')) ? is_child_of_business() : false;
                    ?>

                    <ul class="nav tabnav" id="tabNav" role="tablist">
                        <?php if (function_exists('display_yes_toplogo')) display_yes_toplogo(); ?>
                        <li class="" role="presentation"><a href="javascript:void(0)" class="nav-link<?php echo (!$is_business_child) ? ' active' : ''; ?>" id="tabNav-personal" data-bs-toggle="tab" data-bs-target="#tabNavContent-personal" role="tab" aria-controls="tabNavContent-personal" aria-selected="true"><?php echo esc_html__('Personal', 'yes.my'); ?></a></li>
                        <li class="" role="presentation"><a href="/business" class="nav-link<?php echo ($is_business_child) ? ' active' : ''; ?>" id="tabNav-business" data-bs-target="#tabNavContent-business" role="tab" aria-controls="tabNavContent-business" aria-selected="false"><?php echo esc_html__('Business', 'yes.my'); ?></a></li>
                        <li class="" role="presentation"><a href="https://www.ytlfoundation.org/learnfromhome/" target="_blank"><?php echo esc_html__('Learning', 'yes.my'); ?></a></li>
                    </ul>
                </div>
                <div class="col-2">
                    <?php if (function_exists('yes_language_switcher')) echo yes_language_switcher(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-container">
        <div class="container-fluid container-lg g-lg-0 mobile-container">
            <div class="row g-0">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid" id="overlay-section-div">
                        <?php if (function_exists('display_yes_logo')) display_yes_logo(); ?>

                        <button class="navbar-toggler collapsed yes_toggle" type="button" data-bs-toggle="collapse" data-bs-target="#tabNavContent" aria-controls="tabNavContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse tab-content" id="tabNavContent">
                            <div class="tab-pane me-auto mb-2 mb-lg-0<?php echo (!$is_business_child) ? ' show active' : ''; ?>" id="tabNavContent-personal" role="tabpanel" aria-labelledby="tabNav-personal" <?php echo (isset($_GET['newMenu']) && $_GET['newMenu'] == true) ? "style='display:none !important;'": "";?> >
                                <!-- <ul class="navbar-nav"> -->
                                    <?php
                                    yes_menu($path);
                                    ?>
                                <!-- </ul> -->
                            </div>
                            <div class="tab-pane me-auto mb-2 mb-lg-0<?php echo (!$is_business_child) ? ' show active' : ''; ?>" id="tabNavContent-personal" role="tabpanel" aria-labelledby="tabNav-personal" <?php echo (isset($_GET['newMenu']) && $_GET['newMenu'] == true) ? "": "style='display:none !important;'"; ?> >
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown mega-dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo esc_html__('Shop', 'yes.my'); ?></a>
                                        <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a> -->
                                        <ul class="dropdown-menu mega-dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li>
                                                <ul>
                                                    <li class="dropdown-header"><?php echo esc_html__('Mobile Plans', 'yes.my'); ?></li>
                                                    <!-- <li class="dropdown-header">Mobile Plans</li> -->
                                                    <?php if (has_nav_menu('shop-mobile-plans')) wp_nav_menu(['theme_location' => 'shop-mobile-plans', 'container' => false, 'items_wrap' => '%3$s']); ?>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="dropdown-header"><?php echo esc_html__('Wireless Fibre 5G', 'yes.my'); ?></li>
                                                    <!-- <li class="dropdown-header">Device Plans</li> -->
                                                    <?php if (has_nav_menu('shop-wireless-fibre')) wp_nav_menu(['theme_location' => 'shop-wireless-fibre', 'container' => false, 'items_wrap' => '%3$s']); ?>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="dropdown-header"><?php echo esc_html__('Device Plans', 'yes.my'); ?></li>
                                                    <!-- <li class="dropdown-header">Device Plans</li> -->
                                                    <?php if (has_nav_menu('shop-device-plans')) wp_nav_menu(['theme_location' => 'shop-device-plans', 'container' => false, 'items_wrap' => '%3$s']); ?>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="dropdown-header"><?php echo esc_html__('Broadband', 'yes.my'); ?></li>
                                                    <!-- <li class="dropdown-header">Broadband</li> -->
                                                    <?php if (has_nav_menu('shop-broadband')) wp_nav_menu(['theme_location' => 'shop-broadband', 'container' => false, 'items_wrap' => '%3$s']); ?>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="dropdown-header"><?php echo esc_html__('Existing Customers', 'yes.my'); ?></li>
                                                    <!-- <li class="dropdown-header">Existing Customers</li> -->
                                                    <?php if (has_nav_menu('shop-existing-customers')) wp_nav_menu(['theme_location' => 'shop-existing-customers', 'container' => false, 'items_wrap' => '%3$s']); ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <?php
                                if (has_nav_menu('primary')) :
                                    wp_nav_menu(
                                        array(
                                            'theme_location'    => 'primary',
                                            'container'         => false,
                                            'li_class'          => 'nav-item',
                                            'link_class'        => 'nav-link',
                                            'items_wrap'        => '<ul class="navbar-nav">%3$s</ul>',
                                        )
                                    );
                                endif;
                                ?>
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown mega-dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo esc_html__('Support', 'yes.my'); ?></a>
                                        <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Support</a> -->
                                        <ul class="dropdown-menu mega-dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li>
                                                <ul>
                                                    <li class="dropdown-header"><?php echo esc_html__('Help & Support', 'yes.my'); ?></li>
                                                    <!-- <li class="dropdown-header">Help & Support</li> -->
                                                    <?php if (has_nav_menu('support-help-support')) wp_nav_menu(['theme_location' => 'support-help-support', 'container' => false, 'items_wrap' => '%3$s']); ?>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="dropdown-header"><?php echo esc_html__('Tools & Services', 'yes.my'); ?></li>
                                                    <!-- <li class="dropdown-header">Tools & Services</li> -->
                                                    <?php if (has_nav_menu('support-tools-services')) wp_nav_menu(['theme_location' => 'support-tools-services', 'container' => false, 'items_wrap' => '%3$s']); ?>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="dropdown-header"><?php echo esc_html__('Contact Us', 'yes.my'); ?></li>
                                                    <!-- <li class="dropdown-header">Contact Us</li> -->
                                                    <?php if (has_nav_menu('support-contact-us')) wp_nav_menu(['theme_location' => 'support-contact-us', 'container' => false, 'items_wrap' => '%3$s']); ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane me-auto mb-2 mb-lg-0<?php echo ($is_business_child) ? ' show active' : ''; ?>" id="tabNavContent-business" role="tabpanel" aria-labelledby="tabNav-business">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown mega-dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown-businessSolution" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo esc_html__('Business Solutions', 'yes.my'); ?></a>
                                        <ul class="dropdown-menu mega-dropdown-menu default-top-menu" aria-labelledby="navbarDropdown">
                                            <li>
                                                <ul>
                                                    <li class="dropdown-header"><?php echo esc_html__('Internet Access', 'yes.my'); ?></li>
                                                    <?php if (has_nav_menu('bs-internet-access')) wp_nav_menu(['theme_location' => 'bs-internet-access', 'container' => false, 'items_wrap' => '%3$s']); ?>
                                                </ul>
                                            </li>
                                            <li class="nav-item dropdown mega-dropdown">
                                                <ul>
                                                    <li class="dropdown-header"><?php echo esc_html__('Private Network', 'yes.my'); ?></li>
                                                    <?php if (has_nav_menu('bs-private-network')) wp_nav_menu(['theme_location' => 'bs-private-network', 'container' => false, 'items_wrap' => '%3$s']); ?>
                                                </ul>
                                            </li>
                                            <li class="nav-item dropdown mega-dropdown">
                                                <ul>
                                                    <li class="dropdown-header"><?php echo esc_html__('Voice Communication', 'yes.my'); ?></li>
                                                    <?php if (has_nav_menu('bs-voice-communication')) wp_nav_menu(['theme_location' => 'bs-voice-communication', 'container' => false, 'items_wrap' => '%3$s']); ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown mega-dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo esc_html__('Support', 'yes.my'); ?></a>
                                        <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Support</a> -->
                                        <ul class="dropdown-menu mega-dropdown-menu default-top-menu" aria-labelledby="navbarDropdown">
                                            <li>
                                                <ul>
                                                    <li class="dropdown-header"><?php echo esc_html__('Help & Support', 'yes.my'); ?></li>
                                                    <!-- <li class="dropdown-header">Help & Support</li> -->
                                                    <?php if (has_nav_menu('support-help-support')) wp_nav_menu(['theme_location' => 'support-help-support', 'container' => false, 'items_wrap' => '%3$s']); ?>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="dropdown-header"><?php echo esc_html__('Tools & Services', 'yes.my'); ?></li>
                                                    <!-- <li class="dropdown-header">Tools & Services</li> -->
                                                    <?php if (has_nav_menu('support-tools-services')) wp_nav_menu(['theme_location' => 'support-tools-services', 'container' => false, 'items_wrap' => '%3$s']); ?>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="dropdown-header"><?php echo esc_html__('Contact Us', 'yes.my'); ?></li>
                                                    <!-- <li class="dropdown-header">Contact Us</li> -->
                                                     <?php if (has_nav_menu('bs-support-contact-us')) wp_nav_menu(['theme_location' => 'bs-support-contact-us', 'container' => false, 'items_wrap' => '%3$s']); ?>
                                                </ul>
                                            </li>
                                        </ul>
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
                                    <img src="/wp-content/uploads/2023/03/Coverage.svg" alt="...">
                                    <div class="">
                                        <h6> <a href="<?php echo get_site_url() . '/coverage/' ?>"><?php echo esc_html__('Coverage Checker  ', 'yes.my'); ?></a></h6>
                                        <p>Check Yes network coverage in Malaysia.</p>
                                    </div>
                                </li>

                            </div>
                            <div class="col-6 col-md-6">
                                <li class="mega-get-help">
                                    <img src="/wp-content/uploads/2023/03/Speed.svg" alt="...">
                                    <div class="">
                                        <h6><a href="<?php echo get_site_url() . '/speed-test/' ?>"><?php echo esc_html__('Speed Test', 'yes.my'); ?></a></h6>
                                        <p>Measure your internet connection speed.</p>
                                    </div>
                                </li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6">

                                <li class="mega-get-help">
                                    <img src="/wp-content/uploads/2023/03/Supported-Devices.svg" alt="...">
                                    <div class="">
                                        <h6><a href="<?php echo get_site_url() . '/supported-devices/' ?>"><?php echo esc_html__('Supported Devices', 'yes.my'); ?></a></h6>
                                        <p>Browse devices compatible with 4G LTE and 5G
                                            technology.</p>
                                    </div>
                                </li>

                            </div>
                            <div class="col-6 col-md-6">
                                <li class="mega-get-help">
                                    <img src="/wp-content/uploads/2023/03/Track-Order.svg" alt="...">
                                    <div class="">
                                        <h6><a href="<?php echo get_site_url() . '/trackorder/' ?>"><?php echo esc_html__('Track Order', 'yes.my'); ?></a></h6>
                                        <p>Check the status of a Yes order.</p>
                                    </div>
                                </li>
                            </div>
                            <div class="col-6 col-md-6">
                                <li class="mega-get-help">
                                    <img src="/wp-content/uploads/2023/03/Track-Order.svg" alt="...">
                                    <div class="">
                                        <h6><a href="<?php echo get_site_url() . '/a3-charger-replacement/' ?>"><?php echo esc_html__('Product Notice', 'yes.my'); ?></a></h6>

                                    </div>
                                </li>
                            </div>
                        </div>

                        <li class="mt-3 dropdown-header">LOCATE us</li>
                        <div class="row">
                            <div class="col-6 col-md-6">

                                <li class="mega-get-help">
                                    <img src="/wp-content/uploads/2023/03/Store-Locator.svg" alt="...">
                                    <div class="">
                                        <h6><a href="<?php echo get_site_url() . '/store-locator/' ?>"><?php echo esc_html__('Store Locator', 'yes.my'); ?></a></h6>
                                        <p>Find the nearest Yes store.</p>
                                    </div>
                                </li>

                            </div>
                            <div class="col-6 col-md-6">
                                <li class="mega-get-help">
                                    <img src="/wp-content/uploads/2023/03/Roadshow-Locations.svg" alt="...">
                                    <div class="">
                                        <h6><a href="<?php echo get_site_url() . '/roadshow/' ?>"><?php echo esc_html__('Roadshow Locations', 'yes.my'); ?></a></h6>
                                        <p>Location of the Yes Roadshow.</p>
                                    </div>
                                </li>
                            </div>
                        </div>
                        <div class="box">
                            <li><img src="/wp-content/uploads/2023/04/email.svg" alt="..."><a href="mailto:yescare@yes.my"> Email us</a></li>
                            <li><img src="/wp-content/uploads/2023/04/message.svg" alt="..."><a href="https://www.facebook.com/messages/t/242365937676/"> Chat to Support</a></li>
                            <li><img src="/wp-content/uploads/2023/04/message.svg" alt="..."> Talk to Us</a></li></li>
                        </div>
                    </div>
                    <div class="col-auto get_help-mobile dasktop-none">
                        <ul>
                            <li class="dropdown-header-mobile">tools & services</li>
                            <li><a href="<?php echo get_site_url() . '/coverage/' ?>"><img src="/wp-content/uploads/2023/03/Coverage.svg" alt="..."> Coverage Checker</a></li>
                            <li><a href="<?php echo get_site_url() . '/speed-test/' ?>"><img src="/wp-content/uploads/2023/03/Speed.svg" alt="..."> Speed Test</a></li>
                            <li><a href="<?php echo get_site_url() . '/supported-devices/' ?>"><img src="/wp-content/uploads/2023/03/Supported-Devices.svg" alt="..."> Supported Devices</a></li>
                            <li><a href="<?php echo get_site_url() . '/trackorder/' ?>"><img src="/wp-content/uploads/2023/03/Track-Order.svg" alt="..."> Track Order</a></li>
                            <li><a href="<?php echo get_site_url() . '/a3-charger-replacement/' ?>"><img src="/wp-content/uploads/2023/03/Track-Order.svg" alt="..."> Product Notice</a></li>
                        </ul>
                        <ul>
                            <li class="mt-3 dropdown-header-mobile">LOCATE us</li>
                            <li><a href="<?php echo get_site_url() . '/store-locator/' ?>"><img src="/wp-content/uploads/2023/03/Store-Locator.svg" alt="..."> Store Locator</a></li>
                            <li><a href="<?php echo get_site_url() . '/roadshow/' ?>"><img src="/wp-content/uploads/2023/03/Roadshow-Locations.svg" alt="..."> Roadshow Locations</a></li>
                        </ul>
                        <div class="box">
                            <ul>
                                <li><img src="/wp-content/uploads/2023/04/email.svg" alt="..."><a href="mailto:yescare@yes.my"> Email us</a></li>
                                <li><img src="/wp-content/uploads/2023/04/message.svg" alt="..."><a href="https://www.facebook.com/messages/t/242365937676/"> Chat to Support</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-md-12 gethelp_right_sec">
                        <li class="dropdown-header">most asked questions</li>
                        <li class="mega-get-help img-box">
                            <img src="/wp-content/uploads/2023/03/Rectangle-1393.png" alt="...">
                            <div>
                                <h6>Keep Your Number</h6>
                                <p>Switch to Yes while keeping your number.</p>
                            </div>
                        </li>
                        <li class="mega-get-help">
                            <h6><a href="<?php echo get_site_url() . '/faq/howtoactivatesim/' ?>">Activate SIM card</a></h6>
                        </li>
                        <li class="mega-get-help">
                            <h6><a href="<?php echo get_site_url() . '/support/payment-methods/' ?>">Payment method</a></h6>
                        </li>
                        <li class="mega-get-help">
                            <h6><a href="<?php echo get_site_url() . '/shop/existing-customers/how-to-get-databack/' ?>">Get databack</a></h6>
                        </li>
                        <li class="mega-get-help"><a href="#">GO TO HELP CENTRE <i class="fas fa-chevron-right"></i></a></li>
                    </div>
                </div>


            </ul>
        </li>
    </ul>
                            </div>
                            <!-- <div class="d-flex align-items-center">
                                <a href="/selfcare" class="pink-btn" target="_blank"><?php echo esc_html__('Get Started', 'yes.my'); ?></a>
                                <a href="/selfcare" class="pink-btn" target="_blank">Get Started</a>
                                <a href="#" class="login-btn"><span class="iconify" data-icon="carbon:user-avatar-filled-alt"></span> <?php echo esc_html__('Log In', 'yes.my'); ?></a>
                            </div> -->
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header ENDS -->

<style type="text/css">
    @media (min-width: 992px) {
        .nav-container .tab-content>.active {
            display: flex !important;
            flex-basis: auto;
        }
    }
</style>