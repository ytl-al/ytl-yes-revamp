<?php
    if ( ! isset( $current_category ) || $current_category === null ) {
        return;
    }
?>

<div class="betterdocs-title-excerpt-lists">
    <?php
        $custom_icon = betterdocs()->customizer->defaults->get( 'betterdocs_archive_list_icon' );
        $settings_list_icon = betterdocs()->settings->get( 'docs_list_icon' );
        if ( ! $custom_icon && $settings_list_icon ) {
            $custom_icon = $settings_list_icon["url"];
        }

        if ( $post_query->have_posts() ):
            while ( $post_query->have_posts() ): $post_query->the_post();
                ?>
                <div class="betterdocs-title-excerpt-list">
                    <h2>
                        <span><?php betterdocs()->template_helper->icon( 'docs-icon', true ); ?></span>
                        <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                            <?php echo esc_html( get_the_title() ); ?>
                        </a>
                    </h2>
                    <?php
                    echo wp_sprintf( '<span class="update-date">%s %s</span>', __( 'Last Updated:', 'betterdocs' ), get_the_modified_date() );

                    add_filter('excerpt_more', function() {
                        return '...'; // Replace '[…]' with '...'
                    });

                    echo '<p>' . esc_html( get_the_excerpt() ) . '</p>';

                    remove_filter('excerpt_more', '__return_empty_string');
                    ?>
                </div>
                <?php
            endwhile;
            wp_reset_query();
        endif;
    ?>
</div>
