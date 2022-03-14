<div class="row">
    <?php
    $default_thumb_url = '/wp-content/themes/yes-twentytwentyone/assets/images/ctm.png';
    $arr_posts  = $args['arr_posts'];
    $i = 0;
    foreach ($arr_posts as $post) :
        $thumb_img = get_the_post_thumbnail_url($post->ID, 'large');
        $thumb_url = empty($thumb_img) ? $default_thumb_url : $thumb_img;
        $theme_class = get_post_meta($post->ID, 'yes_theme_class', true);
        $theme_bg_image = get_post_meta($post->ID, 'yes_theme_background_image', true);
        $post_date = get_the_date('d M Y');
        $post_year = get_the_date('Y');

        $post_categories = get_the_terms($post->ID, 'news-room-category');
        $post_category = '';
        if ($post_categories) {
            foreach ($post_categories as $category) :
                if ($category->slug != 'featured') :
                    $post_category  = $category->name;
                    break;
                endif;
            endforeach;
        }

        /*
        <div class="col-12 col-lg-6 <?= $theme_class ?>" category="<?= $post_category ?>" year="<?= $post_year ?>">
            <div class="inner" <?php if ($theme_class != 'none') : ?>style="background-image: url('<?php echo ($theme_bg_image) ? $theme_bg_image['url'] : ''; ?>');" <?php endif; ?>>
                <p><?= $post_date ?>, <?= $post_category ?></p><br>
                <p class="shoutout-note"><?php the_title(); ?></p><br>
                <a class="<?= ($theme_class && $theme_class != 'none') ? $theme_class : 'accent'; ?>" href="<?php the_permalink(); ?>"><u><b>Read more</b></u></a>
            </div>
        </div>
        */

        if (in_array($i % 5, array(2, 3, 4))) {
            $col_class = 'col-12 col-lg-4';
        } else {
            $col_class = 'col-12 col-lg-6';
        }
    ?>
        <div class="<?php echo $col_class ?> mt-3 aos-init aos-animate <?= $theme_class ?>" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100" category="<?= $post_category ?>" year="<?= $post_year ?>">
            <div class="news-box">
                <img src="<?php echo $thumb_url ?>" class="img-fluid" alt="<?php the_title(); ?>">
                <div class="news-content">
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_excerpt() ?></p>
                </div>
                <div class="news-footer">
                    <div class="row">
                        <div class="col-6">
                            <a class="pink-link <?= ($theme_class && $theme_class != 'none') ? $theme_class : 'accent'; ?>" href="<?php the_permalink(); ?>"><u><b>Read more</b></u></a>
                        </div>
                        <div class="col-6 text-end">
                            <div class="date">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:calendar-week">
                                    <g fill="currentColor">
                                        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"></path>
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
                                    </g>
                                </svg><?= $post_date ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        $i++;
    endforeach;
    ?>
</div>