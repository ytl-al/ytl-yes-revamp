<?php

/**
 * Displays the site header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yes-twentytwentyone
 */

?>

<!-- Header STARTS -->
<header class="page-header">
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
                        <li class="" role="presentation"><a href="javascript:void(0)" class="nav-link<?php echo ($is_business_child) ? ' active' : ''; ?>" id="tabNav-business" data-bs-toggle="tab" data-bs-target="#tabNavContent-business" role="tab" aria-controls="tabNavContent-business" aria-selected="false"><?php echo esc_html__('Business', 'yes.my'); ?></a></li>
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
        <div class="container g-lg-0">
            <div class="row g-0">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <?php if (function_exists('display_yes_logo')) display_yes_logo(); ?>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#tabNavContent" aria-controls="tabNavContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse tab-content" id="tabNavContent">
                            <div class="tab-pane me-auto mb-2 mb-lg-0<?php echo (!$is_business_child) ? ' show active' : ''; ?>" id="tabNavContent-personal" role="tabpanel" aria-labelledby="tabNav-personal">
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
                                        <ul class="dropdown-menu mega-dropdown-menu" aria-labelledby="navbarDropdown">
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
                            <div class="d-flex align-items-center">
                                <a href="/selfcare" class="pink-btn" target="_blank"><?php echo esc_html__('Get Started', 'yes.my'); ?></a>
                                <!-- <a href="/selfcare" class="pink-btn" target="_blank">Get Started</a> -->
                                <!-- <a href="#" class="login-btn"><span class="iconify" data-icon="carbon:user-avatar-filled-alt"></span> <?php echo esc_html__('Log In', 'yes.my'); ?></a> -->
                            </div>
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