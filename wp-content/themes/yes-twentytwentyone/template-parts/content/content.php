<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yes-twentytwentyone
 */

?>

<!-- Article STARTS -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- Entry Header STARTS -->
	<header class="entry-header">
		<?php
			if (is_singular()) :
				the_title('<h1 class="entry-title">', '</h1>');
			else :
				the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
			endif;
		?>
	</header>
	<!-- Entry Header ENDS -->

	<!-- Entry Content STARTS -->
	<div class="entry-content">
		<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'yes.my'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);
		?>
	</div>
	<!-- Entry Content ENDS -->
</article>
<!-- #post-<?php the_ID(); ?> -->
<!-- Article ENDS -->Î