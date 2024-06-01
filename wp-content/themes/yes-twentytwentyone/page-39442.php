<?php

/**
 * Page to clear store locator page
 */

?>


<?php
    get_header();

    w3tc_flush_post(1053);

    if (function_exists('w3tc_pgcache_flush_post')){
        w3tc_pgcache_flush_post(1053);
    }

    get_footer();
?>