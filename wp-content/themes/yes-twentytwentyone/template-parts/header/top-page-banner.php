<?php if (display_widget_by_position('yes_widget_top_page_banner', true)) : ?>
<!-- Top Page Banner STARTS -->
<div class="top-pink-bar" style="display: none;">
    <div class="row g-0 text-center">
        <p><?php display_widget_by_position('yes_widget_top_page_banner', false, true); ?></p>
    </div>
    <a href="javascript:void(0)" class="close-btn" onClick="closeTopPageBanner()"><span class="iconify" data-icon="eva:close-fill"></span></a>
</div>
<!-- Top Page Banner ENDS -->
<?php endif;?>