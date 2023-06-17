<?php

/**
 * yes-twentytwentyone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package yes-twentytwentyone
 */



function my_admin_footer_function($menu_item_db_id)
{

?>
	<br />
	<div id="custom_add_field" class="logged-input-holder" style="display: none;">
		<table>

			<tr>
				<span class="description yes_mega_menu_image"><?php _e("Item Description", 'menu-item-desc'); ?></span>
				<input type="text" name="menu_item_desc" id="menu-item-desc" style="width:300px;" value="" />
			</tr>
			<tr>
				<td class="yes_mega_menu_image">
					<label for="ytl_div_img_logo">Upload Image</label>
					<p class="yes_mega_menu_upload_note">Note: Image upload size 300 X 165*</p>
				</td>
				<td id="ytl_img_td">
					<a href="#" class="ytl_upload_img">
						<img src=""  id="ytl_img_id" />
					</a>

					<input type="hidden" id="ytl_upload_img_val" name="ytl_div_img_logo" width="70%" value="">
					<a href="#" class="button ytl_upload_img" id="ytl_upload_img_id" width="70%">Upload image</a>
					<a href="#" class="ytl_img_remove" id="ytl_img_remove_id" style="display:none">Remove image</a>
					<input type="hidden" name="ytl_div_img_logo" value="">

				<td>

			</tr>
		</table>
		<table>
			<!-- <tr>
				<td>
					<lable> Description 2</lable>
					<input type="text" name="menu_item_desc_2" id="menu-item-desc_2" style="width:300px;" value="" />
				</td>
			</tr> -->
			<!-- <tr>
				<td>
					<label for="ytl_div_img_logo2">Upload div image 2</label>
				</td>
				<td id="ytl_img_td2">
					<a href="#" class="ytl_upload_img">
						<img src="" width="70" id="ytl_img_id2" />
					</a>

					<input type="hidden" id="ytl_upload_img_val2" name="ytl_div_img_logo_2" width="70%" value="">
					<a href="#" class="button ytl_upload_img" id="ytl_upload_img_id2" width="70%">Upload image</a>
					<a href="#" class="ytl_img_remove" id="ytl_img_remove_id2" style="display:none">Remove image</a>
					<input type="hidden" name="ytl_div_img_logo_2" value="">

				<td>

			</tr> -->
		</table>
	</div>
	<script type="text/javascript">
		(function($) {
			var html = $('#custom_add_field').html();
			$('#post-body-content').append(html);
			var post_id = document.getElementsByClassName('menu-item-data-db-id')[0].value;
			var data = {
				action: 'ytl_add_custom_menu',
				post_id: post_id,

			};

			jQuery.ajax({
				type: "POST",
				url: 'admin-ajax.php',
				data: data,
				success: function(data) {
					console.log(data);
					var obj = JSON.parse(data);
					if (obj.ytl_desc) {
						var ytl_dec = document.getElementById('menu-item-desc');
						ytl_dec.value += obj.ytl_desc;
					}
					if (obj.ytl_img) {
						document.getElementById("ytl_img_id").src = obj.ytl_img;
						jQuery('[name="ytl_div_img_logo"]').val(obj.ytl_img_id)
						var remove_html = '<a href="#" class="ytl_img_remove"  id="ytl_img_remove_id">Remove image</a>';
						$('#ytl_img_td').append(remove_html);
						jQuery("#ytl_upload_img_id").css({
							display: "none"
						});
					}
				

				}

			});




		})(jQuery);
	</script>
	<script>
		jQuery(function($) {
			// on upload button click
			$('body').on('click', '.ytl_upload_img', function(event) {
				event.preventDefault(); // prevent default link click and page refresh

				const button = $(this)
				const imageId = button.next().next().val();

				const customUploader = wp.media({
					title: 'Insert image', // modal window title
					library: {
						// uploadedTo : wp.media.view.settings.post.id, // attach to the current post?
						type: 'image'
					},
					button: {
						text: 'Use this image' // button label text
					},
					multiple: false
				}).on('select', function() { // it also has "open" and "close" events
					const attachment = customUploader.state().get('selection').first().toJSON();
					button.removeClass('button').html('<img  width="70" src="' + attachment.url + '">'); // add image instead of "Upload Image"
					button.next().show(); // show "Remove image" link
					button.next().next().val(attachment.id); // Populate the hidden field with image ID
				})

				// already selected images
				customUploader.on('open', function() {

					if (imageId) {
						const selection = customUploader.state().get('selection')
						attachment = wp.media.attachment(imageId);
						attachment.fetch();
						selection.add(attachment ? [attachment] : []);
					}

				})

				customUploader.open()

			});
			// on remove button click
			$('body').on('click', '.ytl_img_remove', function(event) {
				event.preventDefault();
				const button = $(this);
				button.next().val(''); // emptying the hidden field
				button.hide().prev().addClass('button').html('Upload image');
				if (event.target.id == "ytl_img_remove_id") {
					//document.getElementById("ytl_img_id").src = '';

					jQuery('#ytl_img_id').attr('src', '');
					jQuery('[name="ytl_div_img_logo"]').val('');
					jQuery("#ytl_upload_img_id").css({
						display: "block"
					});
					

				}
				if (event.target.id == "ytl_img_remove_id2") {
					jQuery('#ytl_img_id2').attr('src', '');
					jQuery('[name="ytl_div_img_logo_2"]').val('');
					jQuery("#ytl_upload_img_id2").css({
						display: "block"
					});
					ytl_img2_id
				}
				// replace the image with text
				// console.log(jQuery('#ytl_img_id2').attr('src', ''));
				// 		$(this).parent().find('ul').empty();
				// return false;
			});
		});
	</script>


<?php
}
add_action('admin_footer', 'my_admin_footer_function');
function save_menu_item_desc($menu_id, $menu_item_db_id)
{



	if (isset($_POST['ytl_div_img_logo']) ) {
		// $ytl_img_data1['ytl_div_img_logo'][0] = $_POST['ytl_div_img_logo'];
		update_post_meta($menu_item_db_id, "ytl_div_img_logo", $_POST['ytl_div_img_logo']);
	}
	if (isset($_POST['ytl_div_img_logo_2']) ) {
		// $ytl_img_data1['ytl_div_img_logo_2'][1] = $_POST['ytl_div_img_logo_2'];
		update_post_meta($menu_item_db_id, "ytl_div_img_logo_2", $_POST['ytl_div_img_logo_2']);
	}
	if (isset($_POST['menu_item_desc'])) {
		// $ytl_img_data1['menu_item_desc'] = $_POST['menu_item_desc'];
		update_post_meta($menu_item_db_id, "menu_item_desc", $_POST['menu_item_desc']);
	}

	if (isset($_POST['menu_item_desc_2'])) {
		// $ytl_img_data1['menu_item_desc_2'] = $_POST['menu_item_desc_2'];
		update_post_meta($menu_item_db_id, "menu_item_desc_2", $_POST['menu_item_desc_2']);
	}
	// update_post_meta($menu_item_db_id, "ytl_img_div_data", $ytl_img_data1);
}
add_action('wp_update_nav_menu_item', 'save_menu_item_desc', 10, 2);


function menu_item_desc($item_id, $item)
{
	return $item_id;
}
add_action('wp_nav_menu_item_custom_fields', 'menu_item_desc', 10, 2);
add_action('wp_ajax_ytl_add_custom_menu', 'ytl_add_custom_menu');
add_action('wp_ajax_nopriv_ytl_add_custom_menu', 'ytl_add_custom_menu');
function ytl_add_custom_menu()
{
	$post_id = $_POST['post_id'];
	
	$ytl_div_img_logo = get_post_meta($post_id, 'ytl_div_img_logo', true);
	$menu_item_desc = get_post_meta($post_id, 'menu_item_desc', true);



	if ($menu_item_desc) {
		$ytl_desc = $menu_item_desc;
	}

	if ($ytl_div_img_logo) {
		$image = wp_get_attachment_image_url($ytl_div_img_logo);
	}

	$data = array(
		'ytl_desc'         => $ytl_desc,
		'ytl_img'       => $image,
		'ytl_img_id' 		=> $ytl_div_img_logo,
	);
	print_r(json_encode($data));

	die();
}
function ytlt_load_media_files()
{
	wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'ytlt_load_media_files');