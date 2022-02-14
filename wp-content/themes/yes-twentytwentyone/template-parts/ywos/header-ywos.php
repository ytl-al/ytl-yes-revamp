<?php get_header('ywos'); ?>

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

<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <?php 
                    global $post;
                    $page_slug = $post->post_name;
                    switch ($page_slug) {
                        case 'verification':
                            $back_page = 'Cart';
                            break;
                        case 'delivery': 
                            $back_page = 'Verification';
                            break;
                        case 'review': 
                            $back_page = 'Delivery Details';
                            break;
                        case 'payment': 
                            $back_page = 'Review';
                            break;
                        default: 
                            $back_page = 'Cart';
                    }
                ?>
                <a href="javascript:void(0)" class="back-btn" onclick="history.back()"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/back-icon.png" /> Back to <?php echo $back_page; ?></a>
            </div>
            <div class="col-lg-4 col-6 text-lg-center text-end">
                <h1>Check Out</h1>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>
</header>
<main class="clearfix site-main" id="primary" role="main">