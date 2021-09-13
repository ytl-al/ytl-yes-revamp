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
                    <ul class="tabnav">
                        <li><a href="#" class="active">Personal</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Education</a></li>
                    </ul>
                </div>
                <div class="col-2">
                    <div class="dropdown language-drop float-end">
                        <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="iconify" data-icon="bi:globe"></span> English
                        </a>

                        <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Bhasa Malay</a></li>
                            <li><a class="dropdown-item" href="#">中文</a></li>
                        </ul>
                    </div>
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

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shops</a>
                                    <ul class="dropdown-menu mega-dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li>
                                            <ul>
                                                <li class="dropdown-header">Mobile Plans</li>
                                                <?php if (has_nav_menu('shop-mobile-plans')) wp_nav_menu(['theme_location' => 'shop-mobile-plans', 'container' => false, 'items_wrap' => '%3$s']); ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li class="dropdown-header">Broadband</li>
                                                <?php if (has_nav_menu('shop-broadband')) wp_nav_menu(['theme_location' => 'shop-broadband', 'container' => false, 'items_wrap' => '%3$s']); ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li class="dropdown-header">Existing Customers</li>
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
                                            'items_wrap'        => '<ul class="navbar-nav me-auto mb-2 mb-lg-0">%3$s</ul>',
                                        )
                                    );
                                endif;
                            ?>
                            <div class="d-flex align-items-center">
                                <a href="#" class="pink-btn me-3">Get Started</a>
                                <a href="#" class="login-btn"><span class="iconify" data-icon="carbon:user-avatar-filled-alt"></span> Log In</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header ENDS -->