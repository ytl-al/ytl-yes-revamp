<?php get_template_part('template-parts/newsroom/styles'); ?>

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
    /*
    //by post date
    $query_args['date_query'] = array();
    if ($current_yr > 0) {
        $query_args['date_query']['year'] = $current_yr;
    };
    if ($current_mo > 0) {
        $query_args['date_query']['month'] = $current_mo;
    };
    */

    //by release date
    if ($current_yr > 0) {
        if ($current_mo < 1) {
            $start_date = $current_yr . '-01-01';   // First day of the month
            $end_date = date("Y-m-t", strtotime($current_yr . '-12-01'));    // 't' gets the last day of the month
            $query_args['meta_query'] = array(
                array(
                    'key'     => 'yes_release_date',
                    'value'   =>  array($start_date, $end_date),
                    'type'      =>  'date',
                    'compare' =>  'between'
                )
            );
        } else {
            $start_date = $current_yr . '-' . $current_mo . '-01';   // First day of the month
            $end_date = date("Y-m-t", strtotime($start_date));    // 't' gets the last day of the month
            $query_args['meta_query'] = array(
                array(
                    'key'     => 'yes_release_date',
                    'value'   =>  array($start_date, $end_date),
                    'type'      =>  'date',
                    'compare' =>  'between'
                )
            );
        }
    }
}

$query = new WP_Query($query_args);

$arr_posts = [];
$arr_featured_posts = [];
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
endwhile;
wp_reset_postdata();

//get all years from all release date
$arr_years = [];
$query_args = [
    'post_type' => 'news-room',
    'post_status' => 'publish',
    'posts_per_page' => -1
];
$year_query = new WP_Query($query_args);
while ($year_query->have_posts()) :
    $year_query->the_post();
    $post_year_meta = get_post_meta($post->ID, 'yes_release_date', true);
    if (!empty($post_year_meta)) {
        $post_year = intval(date("Y", strtotime($post_year_meta)));
        if ($post_year > 0) {
            $arr_years[] = $post_year;
        }
    }
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
get_template_part('template-parts/newsroom/filter', '', ['arr_years' => $arr_years, 'arr_months' => $arr_months]);
?>

<section id="news-section" class="mb-5">
    <div class="container">
        <h1>Latest News</h1>

        <div class="row gy-3">
            <?php get_template_part('template-parts/newsroom/no-results', '', ['arr_posts' => $arr_featured_posts]); ?>

            <?php get_template_part('template-parts/newsroom/has-results', '', ['arr_posts' => $arr_posts]); ?>
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
                'prev_text'    => sprintf('<i></i> %1$s', __('Newer Posts', 'yes.my')),
                'next_text'    => sprintf('%1$s <i></i>', __('Older Posts', 'yes.my')),
                'add_args'     => false,
                'add_fragment' => '',
            ));
            ?>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/newsroom/scripts'); ?>