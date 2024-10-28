<?php
    if ( ! isset( $current_category ) ) {
        return;
    }

    $count_suffix_singular = betterdocs()->settings->get( 'count_text_singular' );
    $count_suffix   = betterdocs()->settings->get( 'count_text' );
    $_counts = [
        'counts'          => $found_posts,
        'prefix'          => ! empty( $count_prefix ) ? $count_prefix : '',
        'suffix'          => ! empty( $count_suffix ) ? $count_suffix : '',
        'suffix_singular' => ! empty( $count_suffix_singular ) ? $count_suffix_singular : ''
    ];
?>

<div class="betterdocs-main-category-folder">
    <div class="betterdocs-category-header">
        <div class="betterdocs-category-header-inner">
            <?php
                $view_object->get( 'template-parts/category-icon', [
                    'show_icon'     => $show_icon,
                    'category_icon' => 'folder-open',
                    'term_id'       => $current_category->term_id
                ] );

                $view_object->get( 'template-parts/category-title', [
                    'title' => $current_category->name,
                    'tag'   => $title_tag
                ] );

                $view_object->get( 'template-parts/sub-category-counter', [
                    'show_count' => $show_count,
                    'counts'     => $_counts
                ] );
            ?>
        </div>
    </div>
</div>
