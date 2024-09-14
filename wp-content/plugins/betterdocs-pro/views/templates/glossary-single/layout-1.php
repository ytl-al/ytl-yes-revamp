<?php echo betterdocs()->settings->get('enable_estimated_reading_time') ? do_shortcode('[betterdocs_reading_time]') : ''; ?>
<div class="betterdocs-entry-content" data-postid="<?php echo esc_attr(get_the_id()); ?>">
    <?php

    // Get the current term object
    $term = get_queried_object();

    // Display the term description
    $custom_description = get_term_meta( $term->term_id, 'glossary_term_description', true );

    if (!empty($term->description) || !empty($custom_description)) {
        $description = $term->description; 
        if(!empty($custom_description)) {
            $description = $custom_description;
        }

        echo '<div class="term-description">' . wp_kses_post(wpautop($description)) . '</div>';

    }
    ?>
</div>