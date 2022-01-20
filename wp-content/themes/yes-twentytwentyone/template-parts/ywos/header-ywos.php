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
<link href="<?php echo get_template_directory_uri() ?>/template-parts/ywos/assets/css/ywos.css" rel="stylesheet" />

<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <a href="javascript:void(0)" class="back-btn" onclick="history.back()"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/back-icon.png" /> Back to Cart</a>
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