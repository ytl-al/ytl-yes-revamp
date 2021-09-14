<?php if (is_active_sidebar('yes_widget_top_page_banner')) : ?>
<!-- Top Page Banner STARTS -->
<div class="top-pink-bar" style="display: none;">
    <div class="row g-0 text-center">
        <p><?php dynamic_sidebar('yes_widget_top_page_banner'); ?></p>
    </div>
    <a href="javascript:void(0)" class="close-btn" onClick="closeTopPageBanner()"><span class="iconify" data-icon="eva:close-fill"></span></a>
</div>
<!-- Top Page Banner ENDS -->
<?php endif; ?>