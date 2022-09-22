<?php
/*
Template Name: Targeted Promo Pages
Template Post Type: page
*/


$is_valid 	= FALSE;

if (function_exists('ywos_tp_url_check')) {
	global $post;
	$promo_id 	= $post->post_name;
	$unique_id 	= $_GET['id'];

	if ($promo_id && $unique_id) {
		$customer 	= ywos_tp_url_check($promo_id, $unique_id);
		if ($customer) {
			$is_valid = TRUE;
	
			$user_meta 	= $customer->user_meta;
			$has_purchased = $customer->has_purchased;
		}
	}
}

get_header();
?>

<main class="clearfix site-main" id="primary" role="main">
	<?php 
		if (!$is_valid) : 
	?>

	<section class="py-5">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<header class="page-header mb-4">
						<h1 class="page-title">Link Not Valid</h1>
					</header>
					<div class="page-content">
						<p>You have provided the wrong ID. Please check your inbox for the valid link.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<style type="text/css">
		html, body { min-height: 100%; }
		body { display: flex; }
		.layer-page { display: flex; flex-direction: column; width: 100%; }
		main { flex: auto; }
		@media (min-width: 1200px) {
			html, body { height: 100%; }
		}
	</style>

	<?php 
		else: 
			if (have_posts()) :
				while (have_posts()) :
					the_post();
					
					$custom_code_css    = rwmb_meta('yes_custom_css');
					$custom_code_js     = rwmb_meta('yes_custom_js');
					
					if ($custom_code_css) :
						if (strpos($custom_code_css, '<style type="text/css">') === false) echo '<style type="text/css">';
						echo $custom_code_css;
						if (strpos($custom_code_css, '<style type="text/css">') === false) echo '</style>';
					endif;
			
					get_template_part('template-parts/content/content', get_post_type());
	
					if ($custom_code_js) :
						if (strpos($custom_code_js, '<script type="text/javascript"') === false) echo '<script type="text/javascript">';
						echo $custom_code_js;
						if (strpos($custom_code_js, '<script type="text/javascript"') === false) echo '</script>';
					endif;
	?>

	<style type="text/css">
		.pink-btn.btn-purchased { background-color: #D9D9D9; color: #333; cursor: default; font-style: italic; }
		.pink-btn.btn-purchased:hover { background-color: #D9D9D9; color: #333; }
	</style>

	<script type="text/javascript">
		$(document).ready(function() {
			var hasPurchased = "<?php echo $has_purchased; ?>";
			if (hasPurchased == '1') {
				$('.panel-btnBuy').html('<a href="javascript:void(0)" class="btn pink-btn btn-purchased" disabled="disabled">Already Redeemed</a>');
			}
		});
	</script>
	
	<?php 
				endwhile;
			else :
				get_template_part('template-parts/content/content', 'none');
			endif;
		endif;
	?>
</main>

<?php get_footer(); ?>
