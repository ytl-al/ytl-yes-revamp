<?php

/**
 * Displays the site footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yes-twentytwentyone
 */

?>

<!-- Footer STARTS -->
<footer class="footer">
    <div class="container g-lg-0">
        <div class="row position-relative">
            <div class="col-12 col-md-2">
                <img src="/wp-content/themes/yes-twentytwentyone/assets/images/logo.svg" class="footer-logo mb-4" />
                <div class="row mb-2">
                    <?php 
                        if (is_active_sidebar('yes_widget_footer_social_icons')) :
                            dynamic_sidebar('yes_widget_footer_social_icons');
                        endif;
                    ?>
                </div>
                <div class="row">
                    <p class="mb-2">Get The MyYes App</p>
                    <?php 
                        if (is_active_sidebar('yes_widget_footer_app_icons')) :
                            dynamic_sidebar('yes_widget_footer_app_icons');
                        endif;
                    ?>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="row g-0 row-cols-2 row-cols-sm-1 row-cols-md-5">
                    <?php 
                        for ($i = 1; $i <= 5; $i++) :
                            $menu_location	= "footer-column-$i";
                    ?>
                    <div class="col">
                        <?php 
                            if (has_nav_menu($menu_location)) :
                                $menu_obj	= get_menu_by_location($menu_location);
                                wp_nav_menu(['theme_location' => $menu_location, 'container' => false, 'items_wrap' => '<h3 class="menu-heading">'.esc_html($menu_obj->name).'</h3><ul id="%1$s" class="%2$s menulist">%3$s</ul>']);
                            endif;
                        ?>
                    </div>
                    <?php
                        endfor;
                    ?>
                </div>
            </div>
            <div class="col-12 col-md-1">
                <img src="/wp-content/themes/yes-twentytwentyone/assets/images/ctm.png" class="img-fluid ctm-logo" />
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 d-flex align-items-center justify-content-md-start justify-content-sm-center">
                    <p><?php echo esc_html__('POWERED BY YTL, YTL Communications Sdn. Bhd. (793634-V)', 'yes.my'); ?></p>
                </div>
                <div class="col-12 col-md-6 d-flex align-items-center justify-content-md-end justify-content-sm-center">
                    <img src="/wp-content/themes/yes-twentytwentyone/assets/images/footer-icons.png" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer ENDS -->