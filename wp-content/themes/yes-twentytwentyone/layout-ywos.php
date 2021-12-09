<?php
/*
Template Name: YWOS Pages
Template Post Type: post, page
*/

get_header('ywos');
?>

<style type="text/css">
    html,
    body {
        height: 100%;
    }

    body {
        background-color: #FFF;
        display: flex;
    }

    .layer-page {
        display: flex;
        flex-direction: column;
        overflow: visible;
        width: 100%;
    }

    main.site-main {
        flex: auto;
    }
</style>

<!-- Header STARTS -->
<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <a href="#" class="back-btn"><img src="/wp-content/themes/yes-twentytwentyone/assets/images/ywos/back-icon.png" alt=""> Back to Cart</a>
            </div>
            <div class="col-lg-4 col-6 text-lg-center text-end">
                <h1>Check Out</h1>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>
</header>
<!-- Header ENDS -->


<main class="clearfix site-main" id="primary" role="main">
    <?php
        if (have_posts()) :
    ?>

    <?php
            while (have_posts()) :
                the_post();

                $custom_code_css    = rwmb_meta('yes_custom_css');
                $custom_code_js     = rwmb_meta('yes_custom_js');

                if ($custom_code_css) :
                    if (strpos($custom_code_css, '<style type="text/css">') === false) echo '<style type="text/css">';
                    echo $custom_code_css;
                    if (strpos($custom_code_css, '<style type="text/css">') === false) echo '</style>';
                endif;

                get_template_part('template-parts/content/content', 'ywos');

                if ($custom_code_js) :
                    if (strpos($custom_code_js, '<script type="text/javascript">') === false) echo '<script type="text/javascript">';
                    echo $custom_code_js;
                    if (strpos($custom_code_js, '<script type="text/javascript">') === false) echo '</script>';
                endif;

            endwhile;
        else :
            get_template_part('template-parts/content/content', 'none');
        endif;
    ?>
</main>

<?php get_footer('ywos'); ?>