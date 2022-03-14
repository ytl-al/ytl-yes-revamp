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
//constant
$POSTS_PER_PAGE = 10;

$paged = get_query_var('paged', 1);
if ($paged < 1) {
    $paged = 1;
}
$query_args = [
    'post_type' => 'news-room',
    'post_status' => 'publish',
    'posts_per_page' => $POSTS_PER_PAGE,
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC'
];

$current_cat = trim($_GET['cat']);
if ($current_cat && isset($current_cat[1])) {
    //$query_args['category_name'] = $current_cat;
    $query_args['tax_query'] = array(
        array(
            'taxonomy' => 'news-room-category',
            'field' => 'slug',
            'terms' => array($current_cat)
        ),
    );
}

$current_yr = intval($_GET['yr']);
$current_mo = intval($_GET['mo']);
if ($current_yr > 0 || $current_mo > 0) {
    $query_args['date_query'] = array();
    if ($current_yr > 0) {
        $query_args['date_query']['year'] = $current_yr;
    };
    if ($current_mo > 0) {
        $query_args['date_query']['month'] = $current_mo;
    };
}

$query = new WP_Query($query_args);

$arr_posts = [];
$arr_featured_posts = [];
$arr_years = [];
while ($query->have_posts()) :
    $query->the_post();
    $arr_posts[] = $post;
    $post_categories = get_the_terms($post->ID, 'news-room-category');
    if ($post_categories) {
        foreach ($post_categories as $category) :
            if ($category->slug == 'featured') :
                $arr_featured_posts[]   = $post;
            endif;
        endforeach;
    }

    $post_year = get_the_date('Y');
    $arr_years[] = $post_year;
endwhile;
wp_reset_postdata();

$arr_years  = array_unique($arr_years);
$arr_months = array(
    'All',
    'January',
    'Febuary',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
);
get_template_part('templates/news-room/filter', '', ['arr_years' => $arr_years, 'arr_months' => $arr_months]);
?>

<section id="news-section" class="mb-5">
    <div class="container">
        <h1>Latest News</h1>

        <div class="row gy-3">
            <?php get_template_part('templates/news-room/no-results', '', ['arr_posts' => $arr_featured_posts]); ?>

            <?php get_template_part('templates/news-room/has-results', '', ['arr_posts' => $arr_posts]); ?>
        </div>

        <div class="pagination mt-5">
            <?php
            echo paginate_links(array(
                'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                'total'        => $query->max_num_pages,
                'current'      => max(1, get_query_var('paged')),
                'format'       => '?paged=%#%',
                'show_all'     => false,
                'type'         => 'plain',
                'end_size'     => 2,
                'mid_size'     => 1,
                'prev_next'    => true,
                'prev_text'    => sprintf('<i></i> %1$s', __('Newer Posts', 'text-domain')),
                'next_text'    => sprintf('%1$s <i></i>', __('Older Posts', 'text-domain')),
                'add_args'     => false,
                'add_fragment' => '',
            ));
            ?>
        </div>
    </div>
</section>

<?php get_template_part('templates/news-room/scripts'); ?>