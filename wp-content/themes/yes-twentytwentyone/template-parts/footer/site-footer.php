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
            <?php 
                if (is_active_sidebar('yes_widget_footer_top')) :
                    dynamic_sidebar('yes_widget_footer_top');
                endif;
            ?>
        </div>
    </div>
    <div class="copyright">
        <div class="container g-lg-0">
            <div class="row">
                <?php 
                    if (is_active_sidebar('yes_widget_footer_bottom')) :
                        dynamic_sidebar('yes_widget_footer_bottom');
                    endif;
                ?>
            </div>
        </div>
    </div>
</footer>
<!-- Footer ENDS -->