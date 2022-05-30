<section id="supported-device">
    <div class="d-none d-sm-block nav-wrapper d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
        <ul class="nav nav-pills d-md-flex align-items-center justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active c-cat" data-cat="All" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="true">All</button>
            </li>
            <?php
            $args_brands    = [
                'hide_empty' => false,
                'taxonomy'  => 'supported-device-category',
                'type'      => 'supported-device',
                'exclude'   => [],
                'orderby'   => 'name',
                'order'     => 'ASC'
            ];
            $brands = get_categories($args_brands);
            foreach ($brands as $brand) :
            ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link c-cat" data-cat="<?= $brand->slug ?>" id="nav-<?= $brand->slug ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?= $brand->slug ?>" type="button" role="tab" aria-controls="nav-<?= $brand->slug ?>" aria-selected="false"><?= $brand->name ?></button>
                </li>
            <?php
            endforeach;
            ?>
        </ul>
    </div>

    <div class="container d-block d-sm-none">
        <div class="dropdown xs-filter-container">
            <button class="btn filter-drop dropdown-toggle" type="button" id="dropdownStates" data-bs-toggle="dropdown" aria-expanded="false">Filter by Phone Brand</button>
            <ul class="dropdown-menu states" aria-labelledby="dropdownStates" data-filter-type="state">
                <li>
                    <div class="form-check">
                        <label>
                            <input class="cardCheckBox c-cat" type="radio" name="xs-c-cat" data-cat="All" value="All"> <span>All</span>
                        </label>
                    </div>
                </li>
                <?php
                foreach ($brands as $brand) :
                ?>
                    <li>
                        <div class="form-check">
                            <label>
                                <input class="cardCheckBox c-cat" type="radio" name="xs-c-cat" data-cat="<?= $brand->slug ?>" value="<?= $brand->slug ?>"> <span><?= $brand->name ?></span>
                            </label>
                        </div>
                    </li>
                <?php
                endforeach;
                ?>
            </ul>
        </div>
    </div>

    <div class="text-end mt-4 mb-4">
        <div class="dropdown filter-drop">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Sort by <span id="sd-current_sort">Latest</span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item sd-sort" href="#" data-direct="ASC">Oldest</a></li>
                <li><a class="dropdown-item sd-sort d-none" href="#" data-direct="DESC">Latest</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row row-cols-2 row-cols-xl-5 row-cols-lg-4 row-cols-md-3" id="sd-con">
            <?php
            $args   = [
                'post_type' => 'supported-device',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'meta_key' => 'yes_release_date',
                'orderby' => 'meta_value',
                'order' => 'DESC'
            ];
            $loop   = new WP_Query($args);

            while ($loop->have_posts()) :
                $loop->the_post();
                $post_release_date = get_post_meta($post->ID, 'yes_release_date', true);
                $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                $post_brands    = get_the_terms($post->ID, 'supported-device-category');
                $post_brand     = '';
                if ($post_brands) {
                    foreach ($post_brands as $brand) {
                        if ($brand->slug != 'uncategorized') {
                            $post_brand = $brand->slug;
                            break;
                        }
                    }
                }
                $post_supports  = get_the_terms($post->ID, 'supported-device-tag');
                $post_support   = '';
                if ($post_supports) {
                    foreach ($post_supports as $support) {
                        $post_support   = $support->slug;
                        break;
                    }
                }
            ?>
                <div class="col mb-4 storegrid" type="<?= $post_support ?>" brand="<?= $post_brand ?>" data-sort="<?= $post_release_date ?>">
                    <div class="phone-box">
                        <img src="<?= $post_thumbnail[0] ?>" alt="" class="phone-img">
                        <p><?= esc_html(strtoupper($post_brand)) ?></p>
                        <h2><?php the_title(); ?></h2>
                    </div>
                </div>
            <?php
            endwhile;

            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>