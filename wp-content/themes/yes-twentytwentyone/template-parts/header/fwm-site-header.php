<?php

/**
 * Displays the FWM site header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yes-twentytwentyone
 */

?>

<header class="yes_main_header">
    <!-- main Header start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-3">
        <div class="container-fluid">
            <a href="<?php echo get_home_url() ?>" class="navbar-brand d-block"><img src="/wp-content/uploads/2022/12/logo.png" alt="<?php echo get_bloginfo('name') ?>" title="<?php echo get_bloginfo('name') ?>" class="fwm-logo-top" /></a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkups" aria-controls="navbarNavAltMarkups" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end main_header_ytl_dev" id="navbarNavAltMarkups">
                <div class="navbar-nav">
                    <ul class="d-flex list-unstyled flex-lg-row flex-column mb-0">
                        <?php if (has_nav_menu('fwm-header')) wp_nav_menu(['theme_location' => 'fwm-header', 'container' => false, 'items_wrap' => '%3$s']); ?>
                        <?php echo yes_language_switcher(['language_main_btn_header_ytl'], 'fwm'); ?>
                        <div class="dropdown pb-md-0 pb-3 d-none">
                            <button class="btn btn-secondary dropdown-toggle p-0 mx-4 language_main_btn_header_ytl" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/wp-content/uploads/2022/12/language.png"> En
                            </button>
                            <ul class="dropdown-menu language_main_btn_header_ytl_list dropdown-menu-end border-0" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#"><img src="/wp-content/uploads/2022/12/malaysia-flage.png" alt="">MS</a></li>
                                <li><a class="dropdown-item" href="#"><img src="/wp-content/uploads/2022/12/united-kingdom-1.png">BM</a></li>
                            </ul>
                        </div>
                    </ul>

                </div>
            </div>
        </div>
    </nav>
    <!-- main Header end -->
</header>