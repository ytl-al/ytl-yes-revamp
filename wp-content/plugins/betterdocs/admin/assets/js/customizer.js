/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Container width
    wp.customize( 'betterdocs_doc_page_background_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-wraper.betterdocs-main-wraper' ).css( 'background-color', to );
        } );
    });

    wp.customize( 'betterdocs_doc_page_background_image', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-wraper.betterdocs-main-wraper' ).css( 'background-image', 'url('+to+')');
        } );
    });
    
    wp.customize( 'betterdocs_doc_page_background_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-wraper.betterdocs-main-wraper' ).css( 'background-size', to);
        } );
    });
    
    wp.customize( 'betterdocs_doc_page_background_repeat', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-wraper.betterdocs-main-wraper' ).css( 'background-repeat', to);
        } );
    });
    
    wp.customize( 'betterdocs_doc_page_background_attachment', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-wraper.betterdocs-main-wraper' ).css( 'background-attachment', to);
        } );
    });
    
    wp.customize( 'betterdocs_doc_page_background_position', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-wraper.betterdocs-main-wraper' ).css( 'background-position', to);
        } );
    });

    wp.customize( 'betterdocs_doc_page_content_padding_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-archive-wrap.betterdocs-archive-main' ).css( 'padding-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_content_padding_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-archive-wrap.betterdocs-archive-main' ).css( 'padding-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_content_padding_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-archive-wrap.betterdocs-archive-main' ).css( 'padding-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_content_padding_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-archive-wrap.betterdocs-archive-main' ).css( 'padding-left', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_doc_page_content_max_width', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb' ).css( 'max-width', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_content_width', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb' ).css( 'width', to + '%' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_column_space', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-single-cat-wrap' ).css( 'margin', to + 'px' );
            $( '.betterdocs-categories-wrap.single-kb.layout-flex .docs-single-cat-wrap' ).css( 'margin', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_column_padding_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-single-cat-wrap .docs-cat-title-wrap,.betterdocs-categories-wrap.betterdocs-category-box .docs-single-cat-wrap,.betterdocs-categories-wrap .docs-single-cat-wrap.docs-cat-list-2-box' ).css( 'padding-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_column_padding_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-single-cat-wrap .docs-cat-title-wrap,.docs-item-container,.betterdocs-categories-wrap.betterdocs-category-box .docs-single-cat-wrap,.betterdocs-categories-wrap .docs-single-cat-wrap.docs-cat-list-2-box' ).css( 'padding-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_column_padding_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.docs-item-container,.betterdocs-category-box.single-kb .docs-single-cat-wrap,.betterdocs-categories-wrap .docs-single-cat-wrap.docs-cat-list-2-box' ).css( 'padding-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_column_padding_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-single-cat-wrap .docs-cat-title-wrap,.docs-item-container,.betterdocs-categories-wrap.betterdocs-category-box .docs-single-cat-wrap,.betterdocs-categories-wrap .docs-single-cat-wrap.docs-cat-list-2-box' ).css( 'padding-left', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_column_padding_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-single-cat-wrap .docs-item-container' ).css( 'padding-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_column_padding_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-single-cat-wrap .docs-item-container' ).css( 'padding-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_column_padding_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-single-cat-wrap .docs-item-container' ).css( 'padding-left', to + 'px' );
        } );
    });


    // Container width
    wp.customize( 'betterdocs_doc_page_column_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-list .white-bg .docs-single-cat-wrap,.betterdocs-category-box.white-bg .docs-single-cat-wrap,.betterdocs-categories-wrap.white-bg .docs-single-cat-wrap' ).css( 'background-color', to );
        } );
    });

    wp.customize( 'betterdocs_doc_page_column_bg_color2', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-box.single-kb.ash-bg .docs-single-cat-wrap' ).css( 'background-color', to );
        } );
    });

    wp.customize( 'betterdocs_doc_page_column_borderr_topleft', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-single-cat-wrap, .betterdocs-categories-wrap.single-kb .docs-single-cat-wrap .docs-cat-title-wrap' ).css( 'border-top-left-radius', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_column_borderr_topright', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-single-cat-wrap, .betterdocs-categories-wrap.single-kb .docs-single-cat-wrap .docs-cat-title-wrap' ).css( 'border-top-right-radius', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_column_borderr_bottomright', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-single-cat-wrap, .betterdocs-categories-wrap.single-kb .docs-single-cat-wrap .docs-item-container' ).css( 'border-bottom-right-radius', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_column_borderr_bottomleft', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-single-cat-wrap, .betterdocs-categories-wrap.single-kb .docs-single-cat-wrap .docs-item-container' ).css( 'border-bottom-left-radius', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_doc_page_cat_icon_size_layout1', function( value ) {
        value.bind( function( to ) {
            $( '.docs-cat-title img' ).css( 'height', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_doc_page_cat_icon_size_layout2', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-box.single-kb .docs-single-cat-wrap img' ).css( 'height', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_doc_page_column_content_space_image', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-box.single-kb .docs-single-cat-wrap img' ).css( 'margin-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_column_content_space_title', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-box.single-kb .docs-single-cat-wrap .docs-cat-title, .pro-layout-4.single-kb .docs-cat-list-2-box-content .docs-cat-title' ).css( 'margin-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_column_content_space_desc', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-box.single-kb .docs-single-cat-wrap p' ).css( 'margin-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_column_content_space_counter', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-box.single-kb .docs-single-cat-wrap span' ).css( 'margin-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_cat_title_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.single-kb .docs-cat-title-inner .docs-cat-heading, .betterdocs-category-box.single-kb .docs-single-cat-wrap .docs-cat-title, .single-kb .docs-cat-list-2-items .docs-cat-title, .single-kb .docs-cat-list-2-box .docs-cat-title' ).css( 'font-size', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_doc_page_cat_title_color', function( value ) {
        value.bind( function( to ) {
            $( '.single-kb .docs-cat-title-inner .docs-cat-heading' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_doc_page_cat_title_color2', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-box.single-kb .docs-single-cat-wrap .docs-cat-title, .single-kb .docs-cat-list-2 .docs-cat-title, .betterdocs-category-grid-layout-6 .betterdocs-term-info .betterdocs-term-title' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'betterdocs_doc_page_cat_title_border_color', function( value ) {
        value.bind( function( to ) {
            $( '.docs-cat-title-inner' ).css( 'border-color', to );
        } );
    });

    wp.customize( 'betterdocs_doc_page_cat_desc_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-box.single-kb .docs-single-cat-wrap p' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'betterdocs_doc_page_item_count_color', function( value ) {
        value.bind( function( to ) {
            $( '.docs-cat-title-inner span' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_doc_page_item_count_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-box.single-kb .docs-single-cat-wrap span, .betterdocs-categories-wrap.single-kb .docs-cat-title-wrap .docs-item-count span, .single-kb .docs-cat-list-2-box .title-count span' ).css( 'font-size', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_item_count_color_layout2', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.betterdocs-category-box .docs-single-cat-wrap span,.docs-cat-list-2-box .title-count span' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'betterdocs_doc_page_item_count_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.docs-item-count' ).css( 'background-color', to );
        } );
    });
    
    wp.customize( 'betterdocs_doc_page_item_count_inner_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.docs-item-count span' ).css( 'background-color', to );
        } );
    });

    wp.customize( 'betterdocs_doc_page_item_counter_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-cat-title-inner .docs-item-count span' ).css( 'width', to + 'px' );
            $( '.betterdocs-categories-wrap.single-kb .docs-cat-title-inner .docs-item-count span' ).css( 'height', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_article_list_button_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container ul' ).css( 'background-color', to );
        } );
    });

    wp.customize( 'betterdocs_doc_page_article_list_color', function( value ) {
        value.bind( function( to ) {
            console.log(to);
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container li a, .betterdocs-popular-list.single-kb ul li a' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_doc_page_article_list_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container li a,.betterdocs-popular-list.single-kb ul li a' ).css( 'font-size', to + 'px' );
            
        } );
    });

    wp.customize( 'betterdocs_doc_page_list_icon_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container li svg,.betterdocs-popular-list.single-kb ul li svg path' ).css( 'fill', to );
        } );
    });

    wp.customize( 'betterdocs_doc_page_list_icon_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container li svg,.betterdocs-popular-list.single-kb ul li svg' ).css( 'font-size', to + 'px' );
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container li svg,.betterdocs-popular-list.single-kb ul li svg' ).css( 'min-width', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_article_subcategory_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container .docs-sub-cat-title a' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_doc_page_article_subcategory_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container .docs-sub-cat-title a' ).css( 'font-size', to + 'px' );
            
        } );
    });

    wp.customize( 'betterdocs_doc_page_subcategory_icon_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container .docs-sub-cat-title svg' ).css( 'fill', to );
        } );
    });

    wp.customize( 'betterdocs_doc_page_subcategory_icon_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container .docs-sub-cat-title svg' ).css( 'font-size', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_article_list_margin_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container li,.betterdocs-popular-list.single-kb ul li' ).css( 'margin-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_article_list_margin_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container li,.betterdocs-popular-list.single-kb ul li' ).css( 'margin-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_article_list_margin_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container li,.betterdocs-popular-list.single-kb ul li' ).css( 'margin-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_article_list_margin_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container li,.betterdocs-popular-list.single-kb ul li' ).css( 'margin-left', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_subcategory_article_list_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container .docs-sub-cat li a' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_doc_page_subcategory_article_list_icon_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container .docs-sub-cat li svg' ).css( 'fill', to );
        } );
    });

    wp.customize( 'betterdocs_doc_page_explore_btn_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.docs-cat-link-btn' ).css( 'background-color', to );
        } );
    });
    
    wp.customize( 'betterdocs_doc_page_explore_btn_color', function( value ) {
        value.bind( function( to ) {
            $( '.docs-cat-link-btn' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'betterdocs_doc_page_explore_btn_border_color', function( value ) {
        value.bind( function( to ) {
            $( '.docs-cat-link-btn' ).css( 'border-color', to );
        } );
    });
    
    wp.customize( 'betterdocs_doc_page_explore_btn_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.docs-cat-link-btn' ).css( 'font-size', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_explore_btn_padding_top', function( value ) {
        value.bind( function( to ) {
            $( '.docs-cat-link-btn' ).css( 'padding-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_explore_btn_padding_right', function( value ) {
        value.bind( function( to ) {
            $( '.docs-cat-link-btn' ).css( 'padding-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_explore_btn_padding_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.docs-cat-link-btn' ).css( 'padding-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_explore_btn_padding_left', function( value ) {
        value.bind( function( to ) {
            $( '.docs-cat-link-btn' ).css( 'padding-left', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_explore_btn_borderr_topleft', function( value ) {
        value.bind( function( to ) {
            $( '.docs-cat-link-btn' ).css( 'border-top-left-radius', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_explore_btn_borderr_topright', function( value ) {
        value.bind( function( to ) {
            $( '.docs-cat-link-btn' ).css( 'border-top-right-radius', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_explore_btn_borderr_bottomright', function( value ) {
        value.bind( function( to ) {
            $( '.docs-cat-link-btn' ).css( 'border-bottom-right-radius', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_explore_btn_borderr_bottomleft', function( value ) {
        value.bind( function( to ) {
            $( '.docs-cat-link-btn' ).css( 'border-bottom-left-radius', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_content_area_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-bg .betterdocs-content-area,.betterdocs-single-layout4 .betterdocs-content-full,.betterdocs-single-layout5 .betterdocs-content-full' ).css( 'background-color', to );
        } );
    });

    // Single Doc Background Image & Background Image Properties
    wp.customize( 'betterdocs_doc_single_content_area_bg_image', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-bg .betterdocs-content-area,.betterdocs-single-layout4 .betterdocs-content-full,.betterdocs-single-layout5 .betterdocs-content-full' ).css( 'background-image', 'url('+to+')' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_content_bg_property_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-bg .betterdocs-content-area,.betterdocs-single-layout4 .betterdocs-content-full,.betterdocs-single-layout5 .betterdocs-content-full' ).css( 'background-size', to );
        } );
    });

    wp.customize( 'betterdocs_doc_single_content_bg_property_repeat', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-bg .betterdocs-content-area,.betterdocs-single-layout4 .betterdocs-content-full,.betterdocs-single-layout5 .betterdocs-content-full' ).css( 'background-repeat', to );
        } );
    });

    wp.customize( 'betterdocs_doc_single_content_bg_property_attachment', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-bg .betterdocs-content-area,.betterdocs-single-layout4 .betterdocs-content-full,.betterdocs-single-layout5 .betterdocs-content-full' ).css( 'background-attachment', to );
        } );
    });

    wp.customize( 'betterdocs_doc_single_content_bg_property_position', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-bg .betterdocs-content-area,.betterdocs-single-layout4 .betterdocs-content-full,.betterdocs-single-layout5 .betterdocs-content-full' ).css( 'background-position', to );
        } );
    });

    wp.customize( 'betterdocs_doc_single_content_area_padding_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-wraper .betterdocs-content-area,.betterdocs-single-layout4 .betterdocs-content-full,.betterdocs-single-layout5 .betterdocs-content-full' ).css( 'padding-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_content_area_padding_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-wraper .betterdocs-content-area,.betterdocs-single-layout4 .betterdocs-content-full,.betterdocs-single-layout5 .betterdocs-content-full' ).css( 'padding-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_content_area_padding_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-wraper .betterdocs-content-area,.betterdocs-single-layout4 .betterdocs-content-full,.betterdocs-single-layout5 .betterdocs-content-full' ).css( 'padding-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_content_area_padding_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-wraper .betterdocs-content-area,.betterdocs-single-layout4 .betterdocs-content-full,.betterdocs-single-layout5 .betterdocs-content-full' ).css( 'padding-left', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_post_content_padding_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-wraper .betterdocs-content-area .docs-single-main' ).css( 'padding-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_post_content_padding_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-wraper .betterdocs-content-area .docs-single-main' ).css( 'padding-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_post_content_padding_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-wraper .betterdocs-content-area .docs-single-main' ).css( 'padding-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_post_content_padding_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-wraper .betterdocs-content-area .docs-single-main' ).css( 'padding-left', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_2_post_content_padding_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-layout2 .docs-content-full-main .doc-single-content-wrapper' ).css( 'padding-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_2_post_content_padding_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-layout2 .docs-content-full-main .doc-single-content-wrapper' ).css( 'padding-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_2_post_content_padding_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-layout2 .docs-content-full-main .doc-single-content-wrapper' ).css( 'padding-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_2_post_content_padding_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-layout2 .docs-content-full-main .doc-single-content-wrapper' ).css( 'padding-left', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_3_post_content_padding_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-layout3 .docs-content-full-main .doc-single-content-wrapper' ).css( 'padding-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_3_post_content_padding_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-layout3 .docs-content-full-main .doc-single-content-wrapper' ).css( 'padding-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_3_post_content_padding_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-layout3 .docs-content-full-main .doc-single-content-wrapper' ).css( 'padding-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_3_post_content_padding_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-layout3 .docs-content-full-main .doc-single-content-wrapper' ).css( 'padding-left', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_single_doc_title_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.docs-single-title .betterdocs-entry-title' ).css( 'font-size', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_single_doc_title_color', function( value ) {
        value.bind( function( to ) {
            $( '.docs-single-title .betterdocs-entry-title' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_single_doc_breadcrumb_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-breadcrumb .betterdocs-breadcrumb-item a' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'betterdocs_single_doc_breadcrumbs_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-breadcrumb .betterdocs-breadcrumb-item a' ).css( 'font-size', to + 'px' );
            $( '.betterdocs-breadcrumb-item.current span' ).css( 'font-size', to + 'px' );
            $( '.betterdocs-breadcrumb .breadcrumb-delimiter' ).css( 'font-size', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_single_doc_breadcrumb_speretor_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-breadcrumb .breadcrumb-delimiter' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'betterdocs_single_doc_breadcrumb_active_item_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-breadcrumb-item.current span' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'betterdocs_sticky_toc_width', function( value ) {
        value.bind( function( to ) {
            $( '.sticky-toc-container' ).css( 'width', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sticky_toc_zindex', function( value ) {
        value.bind( function( to ) {
            $( '.sticky-toc-container' ).css( 'z-index', to );
        } );
    });
    
    wp.customize( 'betterdocs_sticky_toc_margin_top', function( value ) {
        value.bind( function( to ) {
            $( '.sticky-toc-container.toc-sticky' ).css( 'margin-top', to + 'px');
        } );
    });
    
    wp.customize( 'betterdocs_toc_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc,.right-sidebar-toc-wrap' ).css( 'background-color', to );
        } );
    });

    wp.customize( 'betterdocs_doc_single_toc_padding_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc,.right-sidebar-toc-wrap' ).css( 'padding-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_toc_padding_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc,.right-sidebar-toc-wrap' ).css( 'padding-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_toc_padding_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc,.right-sidebar-toc-wrap' ).css( 'padding-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_toc_padding_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc,.right-sidebar-toc-wrap' ).css( 'padding-left', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_toc_title_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc > .toc-title,.betterdocs-entry-content .betterdocs-toc.collapsible-sm .angle-icon' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'betterdocs_toc_title_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc > .toc-title' ).css( 'font-size', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_toc_list_item_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc > .toc-list a' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_toc_active_item_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc > .toc-list a.active' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'betterdocs_toc_list_item_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc > .toc-list a' ).css( 'font-size', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_toc_list_margin_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc > .toc-list a' ).css( 'margin-top', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_doc_single_toc_list_margin_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc > .toc-list li:before' ).css( 'padding-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_toc_list_margin_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc > .toc-list a' ).css( 'margin-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_toc_list_margin_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc > .toc-list a' ).css( 'margin-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_toc_list_margin_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc > .toc-list a' ).css( 'margin-left', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_toc_margin_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-entry-content .betterdocs-toc' ).css( 'margin-bottom', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_single_content_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-content' ).css( 'font-size', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_single_content_font_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-content' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'betterdocs_post_social_share_text_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-social-share .betterdocs-social-share-heading h5' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_single_doc_feedback_icon_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.feedback-form-link .feedback-form-icon svg, .feedback-form-link .feedback-form-icon img' ).css( 'width', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_single_doc_feedback_link_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-entry-footer .feedback-form-link' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_single_doc_feedback_link_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-entry-footer .feedback-form-link' ).css( 'font-size', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_single_doc_feedback_link_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-entry-footer .feedback-form-link' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_single_doc_feedback_title_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-entry-footer .feedback-form .modal-content .feedback-form-title' ).css( 'font-size', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_single_doc_feedback_title_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-entry-footer .feedback-form .modal-content .feedback-form-title' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_single_doc_navigation_color', function( value ) {
        value.bind( function( to ) {
            $( '.docs-navigation a' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_single_doc_navigation_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.docs-navigation a' ).css( 'font-size', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_single_doc_navigation_arrow_color', function( value ) {
        value.bind( function( to ) {
            $( '.docs-navigation a svg' ).css( 'fill', to );
        } );
    });

    wp.customize( 'betterdocs_single_doc_navigation_arrow_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.docs-navigation a svg' ).css( 'width', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_single_doc_lu_time_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-entry-footer .update-date' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_single_doc_lu_time_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-entry-footer .update-date' ).css( 'font-size', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_single_doc_powered_by_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-credit p' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_single_doc_powered_by_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-credit p' ).css( 'font-size', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_single_doc_powered_by_link_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-credit p a' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'betterdocs_sidebar_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content .betterdocs-categories-wrap,.betterdocs-full-sidebar-left' ).css( 'background-color', to );
        } );
    });

    wp.customize( 'betterdocs_sidebar_padding_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content .betterdocs-categories-wrap, .betterdocs-full-sidebar-left .betterdocs-categories-wrap' ).css( 'padding-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_padding_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content .betterdocs-categories-wrap, .betterdocs-full-sidebar-left .betterdocs-categories-wrap' ).css( 'padding-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_padding_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content .betterdocs-categories-wrap, .betterdocs-full-sidebar-left .betterdocs-categories-wrap' ).css( 'padding-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_padding_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content .betterdocs-categories-wrap, .betterdocs-full-sidebar-left .betterdocs-categories-wrap' ).css( 'padding-left', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_borderr_topleft', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-layout1 .betterdocs-sidebar-content .betterdocs-categories-wrap' ).css( 'border-top-left-radius', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_borderr_topright', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-layout1 .betterdocs-sidebar-content .betterdocs-categories-wrap' ).css( 'border-top-right-radius', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_borderr_bottomright', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-layout1 .betterdocs-sidebar-content .betterdocs-categories-wrap' ).css( 'border-bottom-right-radius', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_borderr_bottomleft', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-layout1 .betterdocs-sidebar-content .betterdocs-categories-wrap' ).css( 'border-bottom-left-radius', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_sidebar_icon_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .docs-cat-title img' ).css( 'height', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_title_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .docs-single-cat-wrap .docs-cat-title-wrap' ).css( 'background-color', to );
        } );
    });
    
    wp.customize( 'betterdocs_sidebar_title_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .docs-cat-title-inner .docs-cat-heading,.betterdocs-sidebar-content.betterdocs-category-sidebar .docs-cat-title-inner .cat-list-arrow-down' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'betterdocs_sidebar_active_title_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .docs-single-cat-wrap .active-title .docs-cat-title-inner .docs-cat-heading,.betterdocs-sidebar-content.betterdocs-category-sidebar .active-title .docs-cat-title-inner .docs-cat-heading,.betterdocs-category-wraper .betterdocs-full-sidebar-left .docs-cat-title-wrap::after').css( 'color', to );
        } );
    });
    
    wp.customize( 'betterdocs_sidebar_title_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .docs-cat-title-inner .docs-cat-heading' ).css( 'font-size', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_title_padding_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .betterdocs-categories-wrap .docs-single-cat-wrap .docs-cat-title-wrap' ).css( 'padding-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_title_padding_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .betterdocs-categories-wrap .docs-single-cat-wrap .docs-cat-title-wrap' ).css( 'padding-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_title_padding_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .betterdocs-categories-wrap .docs-single-cat-wrap .docs-cat-title-wrap' ).css( 'padding-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_title_padding_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .betterdocs-categories-wrap .docs-single-cat-wrap .docs-cat-title-wrap' ).css( 'padding-left', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_title_margin_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .betterdocs-categories-wrap .docs-single-cat-wrap' ).css( 'margin-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_title_margin_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .betterdocs-categories-wrap .docs-single-cat-wrap' ).css( 'margin-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_title_margin_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .betterdocs-categories-wrap .docs-single-cat-wrap' ).css( 'margin-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_title_margin_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .betterdocs-categories-wrap .docs-single-cat-wrap' ).css( 'margin-left', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_sidbebar_item_list_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .docs-item-container' ).css( 'background-color', to );
        } );
    });
    
    wp.customize( 'betterdocs_sidbebar_item_count_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .docs-item-count' ).css( 'background-color', to );
        } );
    });
    
    wp.customize( 'betterdocs_sidbebar_item_count_inner_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .docs-item-count span' ).css( 'background-color', to );
        } );
    });

    wp.customize( 'betterdocs_sidebar_item_counter_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .docs-item-count span' ).css( 'width', to + 'px' );
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .docs-item-count span' ).css( 'height', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_sidebar_item_count_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .docs-item-count span' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_sidebat_item_count_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .docs-item-count span' ).css( 'font-size', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_active_cat_background_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .docs-single-cat-wrap .docs-cat-title-wrap.active-title' ).css( 'background-color', to );
        } );
    });

    wp.customize( 'betterdocs_sidebar_active_cat_border_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .docs-single-cat-wrap .docs-cat-title-wrap.active-title' ).css( 'border-color', to );
        } );
    });

    wp.customize( 'betterdocs_sidebar_list_item_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .betterdocs-categories-wrap li a' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_sidebar_active_list_item_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content .betterdocs-categories-wrap li a.active, .betterdocs-sidebar-content .betterdocs-categories-wrap li.sub-list a.active' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_sidebar_list_item_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .betterdocs-categories-wrap li a' ).css( 'font-size', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_sidebar_list_item_margin_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .betterdocs-categories-wrap .docs-item-container li' ).css( 'margin-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_list_item_margin_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .betterdocs-categories-wrap .docs-item-container li' ).css( 'margin-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_list_item_margin_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .betterdocs-categories-wrap .docs-item-container li' ).css( 'margin-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_sidebar_list_item_margin_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .betterdocs-categories-wrap .docs-item-container li' ).css( 'margin-left', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_sidebar_list_icon_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .betterdocs-categories-wrap .docs-item-container li svg' ).css( 'fill', to );
        } );
    });
    
    wp.customize( 'betterdocs_sidebar_list_icon_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-sidebar-content.betterdocs-category-sidebar .betterdocs-categories-wrap .docs-item-container li svg' ).css( 'font-size', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_archive_page_background_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper.betterdocs-single-wraper' ).css( 'background-color', to);
        } );
    });

    wp.customize( 'betterdocs_archive_page_background_image', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper.betterdocs-single-wraper' ).css( 'background-image', 'url('+to+')');
        } );
    });
    
    wp.customize( 'betterdocs_archive_page_background_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper.betterdocs-single-wraper' ).css( 'background-size', to);
        } );
    });
    
    wp.customize( 'betterdocs_archive_page_background_repeat', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper.betterdocs-single-wraper' ).css( 'background-repeat', to);
        } );
    });
    
    wp.customize( 'betterdocs_archive_page_background_attachment', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper.betterdocs-single-wraper' ).css( 'background-attachment', to);
        } );
    });

    wp.customize( 'betterdocs_archive_page_background_position', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper.betterdocs-single-wraper' ).css( 'background-position', to);
        } );
    });

    wp.customize( 'betterdocs_archive_content_area_max_width', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-wraper .betterdocs-content-area, .betterdocs-content-area.doc-category-layout-2' ).css( 'max-width', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_archive_content_area_width', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-single-wraper .betterdocs-content-area, .betterdocs-content-area.doc-category-layout-2' ).css( 'width', to + '%' );
        } );
    });
    
    wp.customize( 'betterdocs_archive_content_background_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper.betterdocs-single-wraper .docs-listing-main .docs-category-listing' ).css( 'background-color', to);
        } );
    });

    wp.customize( 'betterdocs_archive_content_margin_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper.betterdocs-single-wraper .docs-listing-main .docs-category-listing' ).css( 'margin-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_archive_content_margin_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper.betterdocs-single-wraper .docs-listing-main .docs-category-listing' ).css( 'margin-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_archive_content_margin_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper.betterdocs-single-wraper .docs-listing-main .docs-category-listing' ).css( 'margin-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_archive_content_margin_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper.betterdocs-single-wraper .docs-listing-main .docs-category-listing' ).css( 'margin-left', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_archive_content_padding_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper.betterdocs-single-wraper .docs-listing-main .docs-category-listing' ).css( 'padding-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_archive_content_padding_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper.betterdocs-single-wraper .docs-listing-main .docs-category-listing' ).css( 'padding-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_archive_content_padding_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper.betterdocs-single-wraper .docs-listing-main .docs-category-listing' ).css( 'padding-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_archive_content_padding_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper.betterdocs-single-wraper .docs-listing-main .docs-category-listing' ).css( 'padding-left', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_archive_content_border_radius', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper.betterdocs-single-wraper .docs-listing-main .docs-category-listing' ).css( 'border-radius', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_archive_title_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-category-listing .docs-cat-title .docs-cat-heading' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_archive_title_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-category-listing .docs-cat-title .docs-cat-heading' ).css( 'font-size', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_archive_title_margin_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-category-listing .docs-cat-title .docs-cat-heading' ).css( 'margin-top', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_archive_title_margin_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-category-listing .docs-cat-title .docs-cat-heading' ).css( 'margin-right', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_archive_title_margin_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-category-listing .docs-cat-title .docs-cat-heading' ).css( 'margin-bottom', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_archive_title_margin_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-category-listing .docs-cat-title .docs-cat-heading' ).css( 'margin-left', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_archive_description_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-category-listing .docs-cat-title p' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_archive_description_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-category-listing .docs-cat-title p' ).css( 'font-size', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_archive_description_margin_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-category-listing .docs-cat-title p' ).css( 'margin-top', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_archive_description_margin_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-category-listing .docs-cat-title p' ).css( 'margin-right', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_archive_description_margin_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-category-listing .docs-cat-title p' ).css( 'margin-bottom', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_archive_description_margin_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-category-listing .docs-cat-title p' ).css( 'margin-left', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_archive_article_list_margin_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list ul li, .betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list .docs-sub-cat-title' ).css( 'margin-top', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_archive_article_list_margin_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list ul li, .betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list .docs-sub-cat-title' ).css( 'margin-right', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_archive_article_list_margin_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list ul li, .betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list .docs-sub-cat-title' ).css( 'margin-bottom', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_archive_article_list_margin_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list ul li, .betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list .docs-sub-cat-title' ).css( 'margin-left', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_archive_list_icon_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list ul li svg' ).css( 'fill', to );
        } );
    });

    wp.customize( 'betterdocs_archive_list_icon_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list ul li svg' ).css( 'font-size', to + 'px' );
            $( '.betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list ul li svg' ).css( 'min-width', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_archive_list_item_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list ul li a' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_archive_list_item_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list ul li a' ).css( 'font-size', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_archive_article_subcategory_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list .docs-sub-cat-title a' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_archive_article_subcategory_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list .docs-sub-cat-title a' ).css( 'font-size', to + 'px' );
            
        } );
    });

    wp.customize( 'betterdocs_archive_subcategory_icon_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list .docs-sub-cat-title svg' ).css( 'fill', to );
        } );
    });

    wp.customize( 'betterdocs_archive_subcategory_icon_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list .docs-sub-cat-title svg' ).css( 'font-size', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_archive_subcategory_article_list_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list .docs-sub-cat li a' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_archive_subcategory_article_list_icon_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-category-wraper .docs-listing-main .docs-category-listing .docs-list .docs-sub-cat li svg' ).css( 'fill', to );
        } );
    });

    wp.customize( 'betterdocs_live_search_heading_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-heading h2.heading, .betterdocs-search-heading h1.heading, .betterdocs-search-heading h3.heading, .betterdocs-search-heading h4.heading, .betterdocs-search-heading h5.heading, .betterdocs-search-heading h6.heading' ).css( 'font-size', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_live_search_heading_font_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-heading h2.heading, .betterdocs-search-heading h1.heading, .betterdocs-search-heading h3.heading, .betterdocs-search-heading h4.heading, .betterdocs-search-heading h5.heading, .betterdocs-search-heading h6.heading' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_live_search_subheading_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-heading h3.subheading, .betterdocs-search-heading h2.subheading, .betterdocs-search-heading h1.subheading, .betterdocs-search-heading h4.subheading, .betterdocs-search-heading h5.subheading, betterdocs-search-heading h6.subheading' ).css( 'font-size', to + 'px');
        } );
    });
    
    wp.customize( 'betterdocs_live_search_subheading_font_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-heading h3.subheading, .betterdocs-search-heading h2.subheading, .betterdocs-search-heading h1.subheading, .betterdocs-search-heading h4.subheading, .betterdocs-search-heading h5.subheading, .betterdocs-search-heading h6.subheading' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_search_heading_margin_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-heading h2.heading, .betterdocs-search-heading h1.heading, .betterdocs-search-heading h3.heading, .betterdocs-search-heading h4.heading, .betterdocs-search-heading h5.heading, .betterdocs-search-heading h6.heading' ).css( 'margin-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_search_heading_margin_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-heading h2.heading, .betterdocs-search-heading h1.heading, .betterdocs-search-heading h3.heading, .betterdocs-search-heading h4.heading, .betterdocs-search-heading h5.heading, .betterdocs-search-heading h6.heading' ).css( 'margin-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_search_heading_margin_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-heading h2.heading, .betterdocs-search-heading h1.heading, .betterdocs-search-heading h3.heading, .betterdocs-search-heading h4.heading, .betterdocs-search-heading h5.heading, .betterdocs-search-heading h6.heading' ).css( 'margin-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_search_heading_margin_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-heading h2.heading, .betterdocs-search-heading h1.heading, .betterdocs-search-heading h3.heading, .betterdocs-search-heading h4.heading, .betterdocs-search-heading h5.heading, .betterdocs-search-heading h6.heading' ).css( 'margin-left', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_search_subheading_margin_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-heading h3.subheading, .betterdocs-search-heading h2.subheading, .betterdocs-search-heading h1.subheading, .betterdocs-search-heading h4.subheading, .betterdocs-search-heading h5.subheading, .betterdocs-search-heading h6.subheading' ).css( 'margin-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_search_subheading_margin_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-heading h3.subheading, .betterdocs-search-heading h2.subheading, .betterdocs-search-heading h1.subheading, .betterdocs-search-heading h4.subheading, .betterdocs-search-heading h5.subheading, .betterdocs-search-heading h6.subheading' ).css( 'margin-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_search_subheading_margin_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-heading h3.subheading, .betterdocs-search-heading h2.subheading, .betterdocs-search-heading h1.subheading, .betterdocs-search-heading h4.subheading, .betterdocs-search-heading h5.subheading, .betterdocs-search-heading h6.subheading' ).css( 'margin-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_search_subheading_margin_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-heading h3.subheading, .betterdocs-search-heading h2.subheading, .betterdocs-search-heading h1.subheading, .betterdocs-search-heading h4.subheading, .betterdocs-search-heading h5.subheading, .betterdocs-search-heading h6.subheading' ).css( 'margin-left', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_live_search_background_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-form-wrap' ).css( 'background-color', to);
        } );
    });

    wp.customize( 'betterdocs_live_search_background_image', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-form-wrap' ).css( 'background-image', 'url('+to+')');
        } );
    });
    
    wp.customize( 'betterdocs_live_search_background_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-form-wrap' ).css( 'background-size', to);
        } );
    });
    
    wp.customize( 'betterdocs_live_search_background_repeat', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-form-wrap' ).css( 'background-repeat', to);
        } );
    });
    
    wp.customize( 'betterdocs_live_search_background_attachment', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-form-wrap' ).css( 'background-attachment', to);
        } );
    });

    wp.customize( 'betterdocs_live_search_background_position', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-form-wrap' ).css( 'background-position', to);
        } );
    });

    wp.customize( 'betterdocs_live_search_padding_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-form-wrap' ).css( 'padding-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_live_search_padding_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-form-wrap' ).css( 'padding-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_live_search_padding_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-form-wrap' ).css( 'padding-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_live_search_padding_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-form-wrap' ).css( 'padding-left', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_search_field_background_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-searchform' ).css( 'background-color', to );
        } );
    });
    
    wp.customize( 'betterdocs_search_field_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-searchform .betterdocs-search-field' ).css( 'font-size', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_search_field_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-searchform .betterdocs-search-field' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_search_field_padding_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-searchform' ).css( 'padding-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_search_field_padding_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-searchform' ).css( 'padding-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_search_field_padding_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-searchform' ).css( 'padding-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_search_field_padding_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-searchform' ).css( 'padding-left', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_search_field_border_radius', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-searchform' ).css( 'border-radius', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_search_icon_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-searchform svg.docs-search-icon' ).css( 'height', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_search_icon_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-searchform svg.docs-search-icon' ).css( 'fill', to );
        } );
    });
    
    wp.customize( 'betterdocs_search_close_icon_color', function( value ) {
        value.bind( function( to ) {
            $( '.docs-search-close .close-line' ).css( 'fill', to );
        } );
    });

    wp.customize( 'betterdocs_search_close_icon_border_color', function( value ) {
        value.bind( function( to ) {
            $( '.docs-search-close .close-border' ).css( 'fill', to );
        } );
    });

    wp.customize( 'betterdocs_search_close_icon_border_color', function( value ) {
        value.bind( function( to ) {
            $( '.docs-search-loader' ).css( 'stroke', to );
        } );
    });

    wp.customize( 'betterdocs_search_result_width', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-live-search .docs-search-result' ).css( 'width', to + '%' );
        } );
    });

    wp.customize( 'betterdocs_search_result_max_width', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-live-search .docs-search-result' ).css( 'max-width', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_search_result_background_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-live-search .docs-search-result' ).css( 'background-color', to );
        } );
    });

    wp.customize( 'betterdocs_search_result_border_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-live-search .docs-search-result' ).css( 'border-color', to );
        } );
    });

    wp.customize( 'betterdocs_search_result_item_font_size', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-live-search .docs-search-result li a,.betterdocs-live-search .docs-search-result li:only-child' ).css( 'font-size', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_search_result_item_font_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-live-search .docs-search-result li a .betterdocs-search-title' ).css( 'color', to );
        } );
    });

    //Search Result Item Cat Font Color
    wp.customize( 'betterdocs_search_result_item_cat_font_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-live-search .docs-search-result li a .betterdocs-search-category' ).css( 'color', to );
        } );
    });

    wp.customize( 'betterdocs_search_result_item_padding_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-live-search .docs-search-result li a' ).css( 'padding-top', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_search_result_item_padding_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-live-search .docs-search-result li a' ).css( 'padding-right', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_search_result_item_padding_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-live-search .docs-search-result li a' ).css( 'padding-bottom', to + 'px' );
        } );
    });
    
    wp.customize( 'betterdocs_search_result_item_padding_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-live-search .docs-search-result li a' ).css( 'padding-left', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_search_result_item_border_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-live-search .docs-search-result li' ).css( 'border-color', to );
        } );
    });

    // live search form margin
    wp.customize( 'betterdocs_live_search_margin_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-form-wrap').css( 'margin-top', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_live_search_margin_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-form-wrap').css( 'margin-right', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_live_search_margin_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-form-wrap').css( 'margin-bottom', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_live_search_margin_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-form-wrap').css( 'margin-left', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_doc_page_explore_btn_border_width', function( value ) {
        value.bind( function( to ) {
            $( '.docs-cat-link-btn, .docs-cat-link-btn').css( 'border-width', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_doc_page_explore_btn_border_width', function( value ) {
        value.bind( function( to ) {
            $( '.docs-cat-link-btn, .docs-cat-link-btn').css( 'border-width', to + 'px');
        } );
    });

    // live search form margin
    wp.customize( 'betterdocs_live_search_margin_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-form-wrap').css( 'margin-top', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_live_search_margin_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-form-wrap').css( 'margin-right', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_live_search_margin_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-form-wrap').css( 'margin-bottom', to + 'px');
        } );
    });

    wp.customize( 'betterdocs_live_search_margin_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-search-form-wrap').css( 'margin-left', to + 'px');
        } );
    });

    //Item Count Border Type
    wp.customize( 'betterdocs_doc_page_item_count_border_type', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-cat-title-inner span ').css( 'border-style', to);
        } );
    });


    // Item Counter Border Color
    wp.customize( 'betterdocs_doc_page_item_count_border_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-cat-title-inner span').css( 'border-color', to);
        } );
    });

    // Doc List Padding Top
    wp.customize( 'betterdocs_doc_page_article_list_padding_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container li').css( 'padding-top', to + 'px');
        } );
    });

    // Doc List Padding Right
    wp.customize( 'betterdocs_doc_page_article_list_padding_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container li').css( 'padding-right', to + 'px');
        } );
    });

    // Doc List Padding Bottom
    wp.customize( 'betterdocs_doc_page_article_list_padding_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container li').css( 'padding-bottom', to + 'px');
        } );
    });

    // Doc List Padding Left
    wp.customize( 'betterdocs_doc_page_article_list_padding_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container li').css( 'padding-left', to + 'px');
        } );
    });

    //Button Margin Top Layout-1
    wp.customize( 'betterdocs_doc_page_explore_btn_margin_top', function( value ) {
        value.bind( function( to ) {
            $('.docs-single-cat-wrap .docs-item-container .docs-cat-link-btn').css( 'margin-top', to + 'px');
        } );
    });

    //Button Margin Right Layout-1
    wp.customize( 'betterdocs_doc_page_explore_btn_margin_right', function( value ) {
        value.bind( function( to ) {
            $('.docs-single-cat-wrap .docs-item-container .docs-cat-link-btn').css( 'margin-right', to + 'px');
        } );
    });

    //Button Margin Bottom Layout-1
    wp.customize( 'betterdocs_doc_page_explore_btn_margin_bottom', function( value ) {
        value.bind( function( to ) {
            $('.docs-single-cat-wrap .docs-item-container .docs-cat-link-btn').css( 'margin-bottom', to + 'px');
        } );
    });

    //Button Margin Left Layout-1
    wp.customize( 'betterdocs_doc_page_explore_btn_margin_left', function( value ) {
        value.bind( function( to ) {
            $('.docs-single-cat-wrap .docs-item-container .docs-cat-link-btn').css( 'margin-left', to + 'px');
        } );
    });

    //Inner Circle Border Width Top
    wp.customize( 'betterdocs_doc_page_item_count_inner_border_width_top', function( value ) {
        value.bind( function( to ) {
            $('.betterdocs-categories-wrap.single-kb .docs-cat-title-inner span').css( 'border-top-width', to + 'px');
        } );
    });

    //Inner Circle Border Width Right
    wp.customize( 'betterdocs_doc_page_item_count_inner_border_width_right', function( value ) {
        value.bind( function( to ) {
            $('.betterdocs-categories-wrap.single-kb .docs-cat-title-inner span').css( 'border-right-width', to + 'px');
        } );
    });

    //Inner Circle Border Width Bottom
    wp.customize( 'betterdocs_doc_page_item_count_inner_border_width_bottom', function( value ) {
        value.bind( function( to ) {
            $('.betterdocs-categories-wrap.single-kb .docs-cat-title-inner span').css( 'border-bottom-width', to + 'px');
        } );
    });

    //Inner Circle Border Width Left
    wp.customize( 'betterdocs_doc_page_item_count_inner_border_width_left', function( value ) {
        value.bind( function( to ) {
            $('.betterdocs-categories-wrap.single-kb .docs-cat-title-inner span').css( 'border-left-width', to + 'px');
        } );
    });

    //Category Title Padding Bottom
    wp.customize( 'betterdocs_doc_page_cat_title_padding_bottom', function( value ) {
        value.bind( function( to ) {
            $('.docs-cat-title-inner ').css( 'padding-bottom', to + 'px');
        } );
    });

    //Doc List And Button Background Color
    wp.customize( 'betterdocs_doc_page_article_list_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container' ).css( 'background-color', to );
        } );
    });

    //Doc List Padding 2
    wp.customize( 'betterdocs_doc_page_article_list_padding_top_2', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container ul ' ).css( 'padding-top', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_article_list_padding_bottom_2', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container ul ' ).css( 'padding-bottom', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_article_list_padding_right_2', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container ul ' ).css( 'padding-right', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_page_article_list_padding_left_2', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-categories-wrap.single-kb .docs-item-container ul ' ).css( 'padding-left', to + 'px' );
        } );
    });

    wp.customize( 'betterdocs_doc_single_toc_margin_top', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc').css( 'margin-top', to + 'px' );
        } );
    });  

    wp.customize( 'betterdocs_doc_single_toc_margin_right', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc').css( 'margin-right', to + 'px' );
        } );
    }); 

    wp.customize( 'betterdocs_doc_single_toc_margin_bottom', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc').css( 'margin-bottom', to + 'px' );
        } );
    }); 

    wp.customize( 'betterdocs_doc_single_toc_margin_left', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-toc').css( 'margin-left', to + 'px' );
        } );
    }); 

    wp.customize( 'betterdocs_post_reactions_text_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-article-reactions .betterdocs-article-reactions-heading h5' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'betterdocs_post_reactions_icon_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-article-reaction-links li a' ).css( 'background-color', to );
        } );
    });
    wp.customize( 'betterdocs_post_reactions_icon_hover_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-article-reaction-links li a:hover' ).css( 'background-color', to );
        } );
    });

    wp.customize( 'betterdocs_post_reactions_icon_svg_color', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-article-reaction-links li a svg path' ).css( 'fill', to );
        } );
    });

    //FAQ Section Title Margin FAQ Layout 1

    wp.customize('betterdocs_faq_title_margin', function( value ) {
        value.bind( function( to ) {
            $( '.betterdocs-faq-section-title.faq-doc' ).css( 'margin', formatData( JSON.parse(to) ) );
        } );
    });

    // FAQ Title Color FAQ Layout 1

    wp.customize('betterdocs_faq_title_color', function(value){
        value.bind( function( to ){
            $('.betterdocs-faq-section-title.faq-doc').css('color', to);
        });
    });

    // Entry Content Font Size FAQ Layout 1

    wp.customize('betterdocs_faq_title_font_size', function(value){
        value.bind( function( to ){
            $('.betterdocs-faq-section-title.faq-doc').css('font-size', to + 'px');
        });
    });

    // FAQ Category Title Color FAQ Layout 1

    wp.customize('betterdocs_faq_category_title_color', function(value){
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-1.faq-doc .betterdocs-faq-title h2').css( 'color', to );
        });
    });

    // FAQ Category Font Size FAQ Layout 1
    
    wp.customize('betterdocs_faq_category_name_font_size', function(value){
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-1.faq-doc .betterdocs-faq-title h2').css( 'font-size', to + 'px' );
        });
    });

    // FAQ Category Name Padding FAQ Layout 1
    wp.customize('betterdocs_faq_category_name_padding', function(value){
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-1.faq-doc .betterdocs-faq-title h2').css( 'padding', formatData( JSON.parse(to) ) );
        });
    });

    // FAQ List Color FAQ Layout 1
    wp.customize('betterdocs_faq_list_color', function(value){
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-1.faq-doc .betterdocs-faq-list > li .betterdocs-faq-group .betterdocs-faq-post .betterdocs-faq-post-name').css( 'color', to );
        });
    });

    // FAQ List Background Color FAQ Layout 1
    wp.customize('betterdocs_faq_list_background_color', function(value){
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-1.faq-doc .betterdocs-faq-list > li .betterdocs-faq-group .betterdocs-faq-post').css( 'background-color', to );
        });
    });

    // FAQ List Content Background Color Layout 1
    wp.customize('betterdocs_faq_list_content_background_color', function(value){
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-1.faq-doc .betterdocs-faq-group .betterdocs-faq-main-content').css( 'background-color', to );
        });
    });

    // FAQ List Content Color Layout 1
    
    wp.customize('betterdocs_faq_list_content_color', function(value){
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-1.faq-doc .betterdocs-faq-group .betterdocs-faq-main-content').css( 'color', to );
        });
    });

    // FAQ List Content Background Font Size Layout 1
    wp.customize('betterdocs_faq_list_content_font_size', function(value){
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-1.faq-doc .betterdocs-faq-group .betterdocs-faq-main-content').css( 'font-size', to + 'px' );
        });
    });

    // FAQ List Font Size FAQ Layout 1
    wp.customize('betterdocs_faq_list_font_size', function(value){
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-1.faq-doc .betterdocs-faq-list > li .betterdocs-faq-group .betterdocs-faq-post .betterdocs-faq-post-name').css( 'font-size', to + 'px' );
        });
    });

    // FAQ List Padding FAQ Layout 1
    wp.customize('betterdocs_faq_list_padding', function(value) {
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-1.faq-doc .betterdocs-faq-list > li .betterdocs-faq-group .betterdocs-faq-post').css( 'padding', formatData( JSON.parse(to) ) );
        });
    });

    /** FAQ LAYOUT 2 CONTROLLERS **/

    // FAQ Category Title Color
    wp.customize('betterdocs_faq_category_title_color_layout_2', function(value) {
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-2.faq-doc .betterdocs-faq-title h2').css('color', to);
        });
    });

    // FAQ Category Name Font Size
    wp.customize('betterdocs_faq_category_name_font_size_layout_2', function(value) {
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-2.faq-doc .betterdocs-faq-title h2').css('font-size', to + 'px');
        });
    });

    // FAQ Category List Box Padding 
    wp.customize('betterdocs_faq_category_name_padding_layout_2', function(value) {
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-2.faq-doc .betterdocs-faq-title h2').css('padding', formatData( JSON.parse(to) ) );
        });
    });

    // FAQ List Color
    wp.customize('betterdocs_faq_list_color_layout_2', function(value) {
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-2.faq-doc .betterdocs-faq-list > li .betterdocs-faq-group .betterdocs-faq-post-layout-2 .betterdocs-faq-post-name').css( 'color', to );
        });
    });

    // FAQ List Background Color
    wp.customize('betterdocs_faq_list_background_color_layout_2', function(value) {
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-2.faq-doc .betterdocs-faq-list-layout-2 > li .betterdocs-faq-group-layout-2').css( 'background-color', to );
        });
    });

    // FAQ List Content Background Color
    wp.customize('betterdocs_faq_list_content_background_color_layout_2', function(value) {
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-2.faq-doc .betterdocs-faq-list-layout-2 > li .betterdocs-faq-group-layout-2 .betterdocs-faq-main-content-layout-2').css( 'background-color', to );
        });
    });

    // FAQ List Content Color
    
    wp.customize('betterdocs_faq_list_content_color_layout_2', function(value){
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-2.faq-doc .betterdocs-faq-list-layout-2 > li .betterdocs-faq-group-layout-2 .betterdocs-faq-main-content-layout-2').css( 'color', to );
        });
    });

    // FAQ List Content Font Size
    wp.customize('betterdocs_faq_list_content_font_size_layout_2', function(value){
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-2.faq-doc .betterdocs-faq-list-layout-2 > li .betterdocs-faq-group-layout-2 .betterdocs-faq-main-content-layout-2').css( 'font-size', to + 'px' );
        });
    });

    //FAQ List Font Size
    wp.customize('betterdocs_faq_list_font_size_layout_2', function(value) {
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-2.faq-doc .betterdocs-faq-list > li .betterdocs-faq-group .betterdocs-faq-post-layout-2 .betterdocs-faq-post-name').css( 'font-size', to + 'px' );
        });
    });

    //FAQ List Padding
    wp.customize('betterdocs_faq_list_padding_layout_2', function(value) {
        value.bind( function( to ){
            $('.betterdocs-faq-main-wrapper-layout-2.faq-doc .betterdocs-faq-list-layout-2 > li .betterdocs-faq-group-layout-2 .betterdocs-faq-post-layout-2').css( 'padding', formatData( JSON.parse(to) ) );
        });
    });


} )( jQuery );


function formatData( data ) {

    var dimensions = '';

    for( let key in data ) {
        if( data[key] != '' ) {
            dimensions += data[key] + 'px ';
        } else {
            dimensions += 0 + 'px ';
        }
    }

    return dimensions;
}