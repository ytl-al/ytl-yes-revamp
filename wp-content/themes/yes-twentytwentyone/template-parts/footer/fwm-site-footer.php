<!-- Footer start -->
<footer class="">
    <div class="container-fluid bg-white px-4 py-3">
        <div class="d-flex align-items-center justify-content-md-between justify-content-center">
            <div class="footer_logo_main_ytl_dev">
                <a href="<?php echo get_home_url() ?>" class="navbar-brand d-block"><img src="/wp-content/uploads/2022/12/logo.png" alt="<?php echo get_bloginfo('name') ?>" title="<?php echo get_bloginfo('name') ?>" class="fwm-logo-top" /></a>
            </div>
            <div class="footer_main_social_media_ytl_dev">
                <?php if (function_exists('display_widget_by_position') ) {
                    display_widget_by_position('yes_fwm_widget_social_media'); 
                } ?>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->