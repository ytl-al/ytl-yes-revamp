<?php

/**
 * Template part for displaying page content in page.php
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
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
	</header>
	<!-- Entry Header ENDS -->

	<!-- Entry Content STARTS -->
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<!-- Entry Content ENDS -->
</article>
<!-- #post-<?php the_ID(); ?> -->
<!-- Article ENDS -->