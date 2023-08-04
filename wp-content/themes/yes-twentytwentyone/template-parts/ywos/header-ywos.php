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
                            $back_link = '/ywos/cart';
                            $back_page = 'Cart';
                            $back_page_id = 'cart';
                            break;
                        case 'sim-type':
                            $back_link = '/ywos/verification';
                            $back_page = 'Verification';
                            $back_page_id = 'verification';
                            break;
                        case 'delivery':
                            $back_link = '/ywos/sim-type';
                            $back_page = 'Sim Type';
                            $back_page_id = 'sim type';
                            break;
                        case 'review':
                            $back_link = '/ywos/delivery';
                            $back_page = 'Delivery Details';
                            $back_page_id = 'delivery';
                            break;
                        case 'payment':
                            $back_link = '/ywos/review';
                            $back_page = 'Review';
                            $back_page_id = 'review';
                            break;
                        case 'roving-review': 
                            $back_link  = '/ywos/roving-delivery';
                            $back_page  = 'Delivery';
                            $back_page_id = 'roving-delivery';
                            break;
                        default:
                            $back_link = '/ywos/cart';
                            $back_page = 'Cart';
                            $back_page_id = 'cart';
                    }
                ?>
                <a href="<?php echo $back_link; ?>" class="back-btn"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/back-icon.png" /> <span id="span-strBackTo"></span> <span id="span-pageTitle" class="pageTitle-Back"></span></a>
            </div>
            <div class="col-lg-4 col-6 text-lg-center text-end1">
                <h1 id="heading-"></h1>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>
</header>
<main class="clearfix site-main" id="primary" role="main">