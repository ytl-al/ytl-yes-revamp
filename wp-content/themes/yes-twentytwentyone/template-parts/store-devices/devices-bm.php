<?php
$store_url = "http://store.yes.my/add-to-cart";
$args = [
    'post_type'      => 'store-device',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'order'          => 'desc',
];
$prefix = 'yes_';
$loop = new WP_Query($args);

$featuredProductData = array();
$deviceData = array();

while ($loop->have_posts()) :
    $loop->the_post();
    $post_id = get_the_ID();
    $device_name = get_the_title();

    // Retrieve meta values using the meta key
    $device_id        = get_post_meta($post_id, $prefix . 'device_id', true);
    $device_price_mth = get_post_meta($post_id, $prefix . 'device_price_mth', true);
    $device_rrp       = get_post_meta($post_id, $prefix . 'device_rrp', true);
    $device_type      = get_post_meta($post_id, $prefix . 'device_type', true);
    $device_source    = get_post_meta($post_id, $prefix . 'device_source', true);
    $device_features_hot    = get_post_meta($post_id, $prefix . 'device_features_hot', true);
    $device_features_free    = get_post_meta($post_id, $prefix . 'device_features_free', true);
    $device_target = get_post_meta($post_id, $prefix . 'device_target', true);
    $featured_device = get_post_meta($post_id, $prefix . 'featured_device', true);

    // Additional variables for your reference
    $post_release_date = get_post_meta($post_id, 'yes_release_date', true);
    $post_thumbnail    = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full');
    $post_brands       = get_the_terms($post_id, 'brand');
    $post_brand        = '';
    if ($post_brands) {
        foreach ($post_brands as $brand) {
            if ($brand->slug != 'uncategorized') {
                $post_brand = $brand->slug;
                break;
            }
        }
    }

    $post_promotions       = get_the_terms($post_id, 'promotion');
    $post_promotion        = '';
    if ($post_promotions) {
        foreach ($post_promotions as $promotion) {
            if ($promotion->slug != 'uncategorized') {
                $post_promotion = $promotion->name;
                $post_promotion_slug = $promotion->slug;
                break;
            }
        }
    }

    $productData = array(
        'post_id' => $post_id,
        'device_id' => $device_id,
        'device_price_mth' => $device_price_mth,
        'device_rrp' => $device_rrp,
        'device_name' => $device_name,
        'post_thumbnail' => $post_thumbnail[0],
        'post_brand' => $post_brand,
        'post_promotion' => $post_promotion,
        'post_promotion_slug' => $post_promotion_slug,
        'device_features_hot' => $device_features_hot,
        'device_features_free' => $device_features_free,
        'device_target' => $device_target
    );

    if (isset($featured_device) && !empty($featured_device) && ($featured_device==='1')) {
        $featuredProductData[] = $productData;
    } else {
        $deviceData[] = $productData;
    }
endwhile;
wp_reset_postdata();

// Sort featuredProductData in descending order based on modification date
usort($featuredProductData, function($a, $b) {
    $date_a = get_the_modified_time('U', $a['post_id']);
    $date_b = get_the_modified_time('U', $b['post_id']);
    return $date_b <=> $date_a;
});

// Merge featuredProductData and deviceData arrays
$mergedProductData = array_merge($featuredProductData, $deviceData);

// Output HTML for merged data
foreach ($mergedProductData as $product) {

    ?>
    <div class="col-lg-4 col-xl-4 col-md-12 mb-4 storegrid" brand="<?= $product['post_brand'] ?>" data-model="<?= $product['post_promotion'] ?>" data-aos="fade-right">
        <div class="layer-planDevice layer-planDevice-bm">
            <?php if (!empty($product['device_features_hot'])) : ?>
                <div class="offer-label-bm"><?= $product['device_features_hot'] == 1 ? 'Tawaran Hangat' : '' ?></div>
            <?php endif; ?>
            <p class="panel-deviceImg">
                <img src="<?= $product['post_thumbnail'] ?>" alt="">
            </p>
            <h3 class="name"><?= esc_html(ucfirst($product['post_promotion'])) ?></h3>
            <h3><?= esc_html(ucfirst($product['post_brand'])) ?></h3>
            <?php if (!empty($product['device_features_free'])) : ?>
                <h2><?= $product['device_features_free'] == 1 ? '<span>FREE</span>' : '' ?> <?= esc_html($product['device_name']) ?></h2>
            <?php else : ?>
                <h2><?= esc_html($product['device_name']) ?></h2>
            <?php endif; ?>

            <p class="price">RRP RM <?= esc_html(number_format($product['device_rrp'])) ?></p>
            <div class="bottom-section">
                <p class="f-price">
                    <span>Dari</span><br>
                    <b class="f-price-rm">RM</b><?= esc_html($product['device_price_mth']) ?><sub>/bln</sub>
                </p>
                <?php if (isset($product['device_target']) && !empty($product['device_target']) && ($product['device_target'] == 'ywos')) : ?>
                    <p class="panel-btn">
                        <a href="javascript:void(0)" class="btn btn-buyInfinityPlan" data-bundleid="<?= $product['device_id'] ?>">
                            DAPATKAn
                        </a>
                    </p>
                <?php else : ?>
                    <p class="panel-btn">
                        <a href="<?= $store_url.'/'.$product['device_id'] ?>" class="btn btn-elevate-buyplan btn-getplan" onclick="toggleOverlay()">
                            DAPATKAn
                        </a>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
}
?>
<script src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/js/ywos.js"></script>
 
 <script>
     $(document).ready(function() {
         $("#search").keyup(function() {
             var searchTerm = $(this).val().toLowerCase();
             var anyDeviceFound = false;
  
             $(".storegrid").each(function() {
                 var brand = $(this).attr("brand").toLowerCase();
                 var name = $(this).find(".name").text().toLowerCase();
                 var sku = $(this).find(".sku").text().toLowerCase();
  
                 if (brand.includes(searchTerm) || name.includes(searchTerm) || sku.includes(searchTerm)) {
                     $(this).removeClass("hide").addClass("show");
                     anyDeviceFound = true;
                 } else {
                     $(this).removeClass("show").addClass("hide");
                 }
             });
  
             if (anyDeviceFound) {
                 $("#noResultMessage").hide();
                 $('#scroll-top').show(); // Hide scroll-top div
             } else {
                 $("#noResultMessage").show();
                 $('#scroll-top').hide(); // Hide scroll-top div
             }
         });
     });
 </script>