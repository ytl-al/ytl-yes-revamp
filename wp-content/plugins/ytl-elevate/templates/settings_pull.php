<?php
 $last_pull_time = get_option('elevate_product_pull_date');
 $products = \Inc\Base\Model::getProductsData();
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap layer-ytlpdAdmin">
    <div class="page-header">
        <h1>Elevate API</h1>
    </div>
    <div class="nav-tab-wrapper">
        <a href="?page=ytl-pull-data" class="nav-tab">API Settings</a>
        <a href="javascript:void(0)" class="nav-tab nav-tab-active">Pull Products</a>
    </div>

    <div class="wrapper-ytlpdAdmin">
        <div class="layer-section">
            <h2>Pull Plans</h2>

            <?php settings_errors('elevate_messages'); ?>

            <h3>Last Pull Time: <?php echo ($last_pull_time)?$last_pull_time :'Not pull yet'?></h3>

            <form action="" method="post">
                <input type="submit" name="submit" value="Pull Data">
            </form>
        </div>


            <div class="layer-section">
                <div class="layer-preCode">
                    <h2>Products</h2>
                    <pre><?php print_r($products); ?></pre>
                </div>
            </div>

    </div>
</div>

<script type="text/javascript">
    (function($) {

    })(jQuery);
</script>