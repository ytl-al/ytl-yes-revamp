<?php

$tag = betterdocs()->template_helper->is_valid_tag( $tag );

if( isset( $widget_type ) && $widget_type !== 'category-box' ) {
    $title = wp_sprintf( '<a href="%s">%s</a>', $permalink, $title );
}

echo wp_kses_post( '<' . $tag . ' class="betterdocs-category-title">' . $title . '</' . $tag . '>' );
