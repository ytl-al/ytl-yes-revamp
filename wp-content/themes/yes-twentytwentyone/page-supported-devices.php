<?php get_header(); ?>

<?php 
    $lang       = get_bloginfo('language');

    $abs_path           = 'templates/supported-devices';
    $page_template_path = "$abs_path/content-en";
    if ($lang == 'ms-MY') {
        $page_template_path = "$abs_path/content-bm";
    } else if ($lang == 'zh-CN') {
        $page_template_path = "$abs_path/content-ch";
    }

    get_template_part($page_template_path);
?>

<?php get_footer(); ?>