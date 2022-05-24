<?php

/**
 * Displays the site header (no menu).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yes-twentytwentyone
 */

?>

<!-- Header STARTS -->
<header class="page-header">
    <div class="nav-container">
        <div class="container g-lg-0">
            <div class="row g-0">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <a class="navbar-brand d-flex justify-content-start" href="/"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/09/logo-2.png" class="logo-top"></a>
                        <div class="justify-content-end" id="navbarSupportedContent">
                            <div class="d-flex align-items-center justify-content-end">
                                <a href="#" class="mx-3">Help</a>
                                <a href="#" class="login-btn"><span class="iconify" data-icon="bx:bxs-cart"></span> 1 item</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <nav class="navbar navbar-expand-lg d-none">
                    <div class="container">
                        <?php if (function_exists('display_yes_logo')) display_yes_logo(); ?>
                        <div class="justify-content-end" id="navbarSupportedContent">
                            <div class="d-flex align-items-center justify-content-end">
                                <a href="#" class="mx-3">Help</a>
                                <!-- <?php if (function_exists('yes_language_switcher')) echo yes_language_switcher(); ?> -->
                                <a href="#" class="login-btn"><span class="iconify" data-icon="bx:bxs-cart"></span> 1 item</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header ENDS -->