<?php

/**
 * Displays the FWM site header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yes-twentytwentyone
 */
$parent_post_id = wp_get_post_parent_id();
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
                        <?php 
                            if( has_nav_menu('fwm-ms2-header') && ( $parent_post_id == 38593 || get_the_ID() == 38593  || $parent_post_id == 38594 || get_the_ID() == 38594 ) ) {
                                wp_nav_menu(['theme_location' => 'fwm-ms2-header', 'container' => false, 'items_wrap' => '%3$s']); 
                            }else if ( has_nav_menu('fwm-header') ) {
                                wp_nav_menu(['theme_location' => 'fwm-header', 'container' => false, 'items_wrap' => '%3$s']); 
                            }
                        ?>
                        <?php echo yes_language_switcher(['language_main_btn_header_ytl'], 'fwm'); ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- main Header end -->
</header>