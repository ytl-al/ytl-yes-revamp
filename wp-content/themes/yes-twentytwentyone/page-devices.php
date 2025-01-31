<?php 
    get_header(); 

    $lang               = get_bloginfo('language');
    $abs_path           = 'template-parts/store-devices';
    $page_template_path = "$abs_path/content-en";

    if ($lang == 'ms-MY') {
        $page_template_path = "$abs_path/content-bm";
    } else if ($lang == 'zh-CN') {
        $page_template_path = "$abs_path/content-ch";
    }


    if (post_password_required()) { 
        echo get_the_password_form();
    } else { 
       
        get_template_part($page_template_path);
    }
?>

<?php get_footer(); ?>