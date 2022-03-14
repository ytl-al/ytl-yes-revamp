<?php get_template_part('templates/news-room/styles'); ?>

<section id="newsroom-top-banner">
    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-12 d-flex align-items-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div>
                    <h1>Newsroom</h1>
                    <p>Read about all things happening at YES.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
/*
$mc_page_id = MEDIA_CENTRE_EN;
$lang       = get_bloginfo('language');

if ($lang == 'ms-MY') {
    $mc_page_id = MEDIA_CENTRE_BM;
} else if ($lang == 'zh-CN') {
    $mc_page_id = MEDIA_CENTRE_CH;
}

$mc_page    = get_post($mc_page_id);

$content    = $mc_page->post_content;
$content    = apply_filters('the_content', $content);
$content    = str_replace(']]>', ']]&gt;', $content);

echo $content;
*/

$args   = [
    'post_type'     => 'news-room',
    'post_status'   => 'publish',
    'posts_per_page' => -1,
    'orderby'       => 'date',
    'order'         => 'DESC'
];

$loop   = new WP_Query($args);

$arr_posts          = [];
$arr_featured_posts = [];
$arr_years          = [];

while ($loop->have_posts()) :
    $loop->the_post();
    $arr_posts[]    = $post;
    $post_categories = get_the_terms($post->ID, 'news-room-category');

    foreach ($post_categories as $category) :
        if ($category->slug == 'featured') :
            $arr_featured_posts[]   = $post;
        endif;
    endforeach;

    $post_year      = get_the_date('Y');
    $arr_years[]    = $post_year;
endwhile;
wp_reset_postdata();

$arr_years  = array_unique($arr_years);

get_template_part('templates/news-room/filter', '', ['arr_years' => $arr_years]);
?>

<section class="dblock flexbox">
    <div class="filter-noresults">
        <div class="container newsResults">
            <?php get_template_part('templates/news-room/no-results', '', ['arr_posts' => $arr_featured_posts]); ?>
        </div>
    </div>

    <div class="filter-hasresults">
        <div class="container newsResults">
            <?php get_template_part('templates/news-room/has-results', '', ['arr_posts' => $arr_posts]); ?>
        </div>
    </div>
    <div>
        <?php
        the_posts_pagination();
        ?>
    </div>
</section>

<?php get_template_part('templates/news-room/scripts'); ?>