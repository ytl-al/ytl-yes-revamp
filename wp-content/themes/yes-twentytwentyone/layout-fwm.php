<?php
/*
Template Name: FWM Pages (Free WiFi Micro-site)
Template Post Type: post, page
*/

get_header('fwm');
?>

<main class="clearfix site-main" id="primary" role="main">
	<?php 
		if (have_posts()) :
	?>
	
	<?php 
			while (have_posts()) :
				the_post();
				
				$custom_code_css    = rwmb_meta('yes_custom_css');
				$custom_code_js     = rwmb_meta('yes_custom_js');
				
				if ($custom_code_css) :
					if (strpos($custom_code_css, '<style type="text/css">') === false) echo '<style type="text/css">';
					echo $custom_code_css;
					if (strpos($custom_code_css, '<style type="text/css">') === false) echo '</style>';
				endif;
		
				get_template_part('template-parts/content/content', 'ywos');

				if ($custom_code_js) :
					if (strpos($custom_code_js, '<script type="text/javascript">') === false) echo '<script type="text/javascript">';
					echo $custom_code_js;
					if (strpos($custom_code_js, '<script type="text/javascript">') === false) echo '</script>';
				endif;
				
			endwhile;
		else :
			get_template_part('template-parts/content/content', 'none');
		endif;
	?>
</main>

<?php
get_footer('fwm');