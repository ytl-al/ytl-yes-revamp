<?php 
    get_header(); 

    // $lang               = get_bloginfo('language');
   


    if (post_password_required()) { 
        echo get_the_password_form();
    }
?>

<?php get_footer(); ?>