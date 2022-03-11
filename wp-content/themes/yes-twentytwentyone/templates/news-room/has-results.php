<div class="row">
    <?php 
        $arr_posts  = $args['arr_posts'];

        foreach ($arr_posts as $post) : 
            $theme_class    = get_post_meta($post->ID, 'yesmy_media_centre_theme', true);
            $theme_bg_image = get_post_meta($post->ID, 'yesmy_media_centre_bg_image', true);
            $post_date      = get_the_date('d M Y');
            $post_year      = get_the_date('Y');

            $post_categories= get_the_terms($post->ID, 'media-centre-category');
            $post_category  = '';
            foreach ($post_categories as $category) : 
                if ($category->slug != 'featured') : 
                    $post_category  = $category->name;
                    break;
                endif;
            endforeach;
    ?>
    <div class="col-12 col-lg-6 <?=$theme_class?>" category="<?=$post_category?>" year="<?=$post_year?>">
        <div class="inner" <?php if ($theme_class != 'none') : ?>style="background-image: url('<?php echo ($theme_bg_image) ? $theme_bg_image['url'] : ''; ?>');"<?php endif; ?>>
            <p><?=$post_date?>, <?=$post_category?></p><br>
            <p class="shoutout-note"><?php the_title(); ?></p><br>
            <a class="<?= ($theme_class && $theme_class != 'none') ? $theme_class : 'accent'; ?>" href="<?php the_permalink(); ?>"><u><b>Read more</b></u></a>
        </div>
    </div>
    <?php 
        endforeach;
    ?>
</div>