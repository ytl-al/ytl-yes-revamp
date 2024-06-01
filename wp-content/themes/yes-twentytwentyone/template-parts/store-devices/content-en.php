<?php get_template_part('template-parts/store-devices/styles'); ?>

<!-- Slider Start -->
<section class="hero-slider-section">
    <div class="hero-slider slider">

<div>
 <img src="/wp-content/uploads/2024/05/lightningspeed-honorx7b-web-scaled.webp" class="w-100 d-none d-lg-block" alt="...">
 <img src="/wp-content/uploads/2024/05/lightningspeed-honorx7b-mobile.webp" class="w-100 d-block d-md-block d-lg-none" alt="...">           
</div>
   
<div class="slick-slide">  
            <img src="/wp-content/uploads/2024/05/superjimat-power35webbanner-mayupdate-desktop-scaled.webp" class="w-100 d-none d-lg-block"
                alt="...">
            <img src="/wp-content/uploads/2024/05/superjimat-power35webbanner-mayupdate-mobile.webp"
                class="w-100 d-block d-md-block d-lg-none" alt="...">

            <div class="inner-content-sec">
                <h1 style="text-align:left">5G plans with<br>
                    BIG savings!</h1>
                <div class="btn-sec d-flex align-items-center">
                    <div class="pricing-2" style="margin:0">
                        <h4 class="d-block">
                            <sup><span>From<br><b>RM</b></span></sup>35<span class="month-sec"> / mth</span>
                        </h4>
                    </div>
                </div>
                <!-- <div class="btn-sec" style="text-align: left;">
                    <a href="/promo/pakej-super-jimat/" class="btn pink-btn">Buy Now</a>
                </div> -->
            </div>
</div>

<!-- <div class="slick-slide">    
        <img src="/wp-content/uploads/2024/04/raya-infintephonelaunch-march-desktop-scaled.webp" width="3841" height="810"
            class="w-100 d-none d-lg-block" alt="...">
        <img src="/wp-content/uploads/2024/04/raya-infintephonelaunch-march-mobile.webp" width="750" height="700"
            class="w-100 d-block d-md-block d-lg-none" alt="...">            
        <div class="inner-content-sec">
            <div class="title-sec">
                <img decoding="async" src="/wp-content/uploads/2024/03/infinite-plus-icon.webp" style="margin:0 0 15px; width:150px" alt="...">
                <h1 style="color: #ffffff;">Celebrate Raya with
                a 5G Phone!</h1>
            </div>
            <div class="btn-sec d-flex align-items-center">
                <div class="pricing-2 mt-0 mt-lg-0 align-items-center">
                    <div class="mt-0">
                        <h4 class="d-block">
                            <sup><span>From<br><b>RM</b></span></sup>58<span class="month-sec">/mth</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
   </div> -->   
        
        
    </div>
</section>
<!-- Slider End -->


<!-- Mid-section -->
<section id="device-main-section">
    <div class="cap-search-box-main">
        <div class="container">

            <div class="row">
                <div class="col-12 col-xl-12 col-lg-12 col-md-12">
                    <div class="cap-search-box clearfix">
                        <span class="">Devices</span>
                        <div class="mobile-filter">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);" class="filter">
                                        Filter <img decoding="async" src="/wp-content/uploads/2024/02/filter-icon.png" alt="filter">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="search">
                                        <img decoding="async" src="/wp-content/uploads/2024/02/search-icon.png" alt="search"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="device_cat_search">
                            <input type="text" class="form-control" id="search" placeholder="Search any Devices">
                            <a href="javascript:void(0);" class="btn">
                                <img decoding="async" src="/wp-content/uploads/2024/02/search-icon.png" alt="search"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <div class="container">
        <div class="row mt-5">
            <div class="col col-lg-3" id="filter-section">
                <a href="javascript:void(0);" class="cancel-btn">
                    <img decoding="async" src="/wp-content/uploads/2024/02/cancel-icon.png" alt="cancel"></a>
                <div class="filter-accordion">
                    <h2 class="h2text">Filters</h2>
                    <div class="accordion-item">
                        <h2 id="regularHeadingFirst" class="accordion-header">
                            <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#regularCollapseFirst" aria-expanded="true" aria-controls="regularCollapseFirst">
                                Brand
                            </button>
                        </h2>
                        <div id="regularCollapseFirst" class="accordion-collapse collapse show" aria-labelledby="regularHeadingFirst" data-bs-parent="#regularAccordionRobots">
                            <div class="accordion-body px-2">
                                <ul>
                                    <li class="checkbox">
                                        <label>
                                           <input class="form-check-input filter_option filter_fl-brand_option_all" type="checkbox" name="fl-brand" value="All" id="All" checked />
                                            All
                                        </label>
                                    </li>
                                    <?php
                                    $args_brands    = [
                                        'hide_empty' => false,
                                        'taxonomy'  => 'brand',
                                        'type'      => 'brand',
                                        'exclude'   => [],
                                        'orderby'   => 'name',
                                        'order'     => 'ASC'
                                    ];
                                    $brands = get_categories($args_brands);
                                    foreach ($brands as $brand) :
                                    ?>
                                        <li class="checkbox">
                                            <label>
                                                <input class="form-check-input filter_option" type="checkbox" name="fl-brand" value="<?= $brand->slug ?>" id="<?= $brand->slug ?>" />
                                                <?= $brand->name ?>
                                            </label>
                                        </li>
                                    <?php
                                    endforeach;
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="accordion-item">
                        <h2 id="regularHeadingTwo" class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#regularCollapseTwo" aria-expanded="true" aria-controls="regularCollapseTwo">
                                Phone Model
                            </button>
                        </h2>
                        <div id="regularCollapseTwo" class="accordion-collapse collapse" aria-labelledby="regularHeadingTwo" data-bs-parent="#regularAccordionRobots">
                            <div class="accordion-body px-2">                              
                                <ul>
                                <?php

                                $args = [
                                    'post_type'      => 'store-device',
                                    'post_status'    => 'publish',
                                    'posts_per_page' => -1,
                                    'order'          => 'desc',
                                ];
                                $prefix = 'yes_';
                                $loop = new WP_Query($args);
                                while ($loop->have_posts()) :
                                    $loop->the_post();
                                    $post_id = get_the_ID();
                                    $device_name = get_the_title();

                                    $device_id        = get_post_meta($post_id, $prefix . 'device_id', true);


                                ?>
  
                                        <label>
                                            <input class="form-check-input" type="checkbox" name="fl-model1" value="<?= $device_name ?>" id="<?= $device_name ?>"  />
                                            <?= $device_name ?>
                
            <?php
                                endwhile;

                                wp_reset_postdata();
            ?>                 
                                    
                                </ul>
                            </div>
                        </div>
                    </div> -->

                    <div class="accordion-item">
                        <h2 id="regularHeadingTwo" class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#regularCollapseTwo" aria-expanded="true" aria-controls="regularCollapseTwo">
                                Plans
                            </button>
                        </h2>
                        <div id="regularCollapseTwo" class="accordion-collapse collapse" aria-labelledby="regularHeadingTwo" data-bs-parent="#regularAccordionRobots">
                            <div class="accordion-body px-2">
                                <ul id="check-all-device">
                                    <li class="checkbox">
                                        <label>
                                            <input class="form-check-input plan_filter filter_option filter_plan_option_all device-class" type="checkbox" name="plan" value="All" id="All" checked />
                                            All
                                        </label>
                                    </li>
                                    <?php
                                    $args_plan   = [
                                        'hide_empty' => false,
                                        'taxonomy'  => 'plan',
                                        'type'      => 'plan',
                                        'exclude'   => [],
                                        'orderby'   => 'Description',
                                        'order'     => 'asc'
                                    ];
                                    $plans = get_categories($args_plan);
                                    foreach ($plans as $plan) :
                                    ?>
                                        <li class="checkbox">
                                            <label>
                                                <input class="form-check-input promotion_filter filter_option device-class" type="checkbox" name="plan" value="<?= $plan->name ?>" id="<?= $plan->slug ?>" />
                                                <?= $plan->name ?>
                                            </label>
                                        </li>
                                    <?php
                                    endforeach;
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 id="regularHeadingThree" class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#regularCollapseThree" aria-expanded="true" aria-controls="regularCollapseThree">
                                Promotion
                            </button>
                        </h2>
                        <div id="regularCollapseThree" class="accordion-collapse collapse" aria-labelledby="regularHeadingTwo" data-bs-parent="#regularAccordionRobots">
                            <div class="accordion-body px-2">
                                <ul>
                                    <li class="checkbox">
                                        <label>
                                             <input class="form-check-input promotion_filter filter_option filter_promotion_option_all" type="checkbox" name="promotion" value="All" id="All" checked />
                                            All
                                        </label>
                                    </li>
                                    <?php
                                    $args_promotions   = [
                                        'hide_empty' => false,
                                        'taxonomy'  => 'promotion',
                                        'type'      => 'promotion',
                                        'exclude'   => [],
                                        'orderby'   => 'name',
                                        'order'     => 'desc'
                                    ];
                                    $promotions = get_categories($args_promotions);
                                    foreach ($promotions as $promotion) :
                                    ?>
                                        <li class="checkbox">
                                            <label>
                                                <input class="form-check-input promotion_filter filter_option" type="checkbox" name="promotion" value="<?= $promotion->name ?>" id="<?= $promotion->slug ?>" />
                                                <?= $promotion->name ?>
                                            </label>
                                        </li>
                                    <?php
                                    endforeach;
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-9">
                <div class="row filter-storeitem storeitem-supported-devices" id="device-list-section">
                    <?php get_template_part('template-parts/store-devices/devices'); ?>
                    <div id="noResultMessage" style="display: none; text-align:center">
                        <h3>Uh Oh! We couldn't find any result</h3>
                        <p>We cannot find any matches for selected filter</p>
                    </div>
                    <div class="col col-md-12 col-xl-12 mb-xl-12 mt-5">
                        <a href="javascript:void(0);" id="scroll-top">Back To Top</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Mid-section ENDS -->

<!-- Footer FAQs STARTS -->

<!-- Footer FAQs ENDS -->

<?php get_template_part('template-parts/store-devices/scripts'); ?>