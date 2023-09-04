<?php
    if( ! $show_description || empty( $description )) {
        return;
    }
?>
<p class="betterdocs-category-description">
    <?php echo esc_html($description); ?>
</p>
