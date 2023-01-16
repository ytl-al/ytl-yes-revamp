<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yes-twentytwentyone
 */

?>

	<?php 
        // get_template_part('template-parts/footer/site-footer'); 
    ?>
	</div>
	<!-- Layer Page ENDS -->
	
	<div class="layer-overlay"></div>
	<?php 
        get_template_part('template-parts/footer/fwm-site-footer'); 
    ?>
	<?php wp_footer(); ?>

</body>

</html>