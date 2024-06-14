<?php

namespace WPDeveloper\BetterDocsPro\Shortcodes;

use WPDeveloper\BetterDocs\Core\Shortcode;
use WPDeveloper\BetterDocsPro\Core\Encyclopedia;


class BetterdocsEncyclopedia extends Shortcode
{
    protected $is_pro = true;
    /**
     * A list of deprecated attributes.
     * @var array<string, string>
     */
    protected $deprecated_attributes = [
        'posts_per_grid' => 'posts_per_page',
        'icon'           => 'show_icon'
    ];

    /**
     * Summary of get_id
     * @return array|string
     */
    public function get_name()
    {
        return 'betterdocs_encyclopedia';
    }

    /**
     * Summary of default_attributes
     * @return array
     */


    public function default_attributes()
    {
        $customizer_settings = [
            'doc_style' => betterdocs()->customizer->defaults->get('encyclopedia_doc_style', 'doc-grid'),
            'start_letter_style' => betterdocs()->customizer->defaults->get('encyclopedia_letter_style', 'alphabet-big-round-view'),
            'start_letter_style_' => betterdocs()->customizer->defaults->get('encyclopedia_letter_style', 'alphabet-list-view'),
            'alphabet_list_style' => betterdocs()->customizer->defaults->get('encyclopedia_alphabet_list_style', 'box'),
            'dictionary_loadmore' => betterdocs()->customizer->defaults->get('encyclopedia_dictionary_loadmore', true),
            'dictionary_per_page' => betterdocs()->customizer->defaults->get('encyclopedia_dictionary_per_page', 5),
            'dictionary_loadmore_button_text'  => betterdocs()->customizer->defaults->get('encyclopedia_dictionary_loadmore_button_text', 'Load More'),
            'dictionary_learn_more_text'       => betterdocs()->customizer->defaults->get('encyclopedia_dictionary_learn_more_text', 'Learn More'),
            'dictionary_docs_loadmore' => betterdocs()->customizer->defaults->get('encyclopedia_dictionary_docs_loadmore', true),
            'dictionary_docs_per_page' => betterdocs()->customizer->defaults->get('encyclopedia_dictionary_docs_per_page', 10),

            'is_customizer' => true,
            'encyclopedia_background_color' => betterdocs()->customizer->defaults->get('encyclopedia_background_color', '#F9FAFB'),
            'encyclopedia_item_background_color' => betterdocs()->customizer->defaults->get('encyclopedia_item_background_color', '#ffffff'),
            'alphabets_background_color' => betterdocs()->customizer->defaults->get('alphabets_background_color', '#ffffff'),
            'alphabets_link_color' => betterdocs()->customizer->defaults->get('alphabets_link_color', '#667085'),
            'alphabets_link_disabled_color' => betterdocs()->customizer->defaults->get('alphabets_link_disabled_color', '#D0D5DD'),
            'alphabets_link_bg_color' => betterdocs()->customizer->defaults->get('alphabets_link_bg_color', 'rgba(147,147,147,0)'),
            'alphabets_link_active_bg_color' => betterdocs()->customizer->defaults->get('alphabets_link_active_bg_color', '#F5F5F5'),
            'alphabets_link_active_color' => betterdocs()->customizer->defaults->get('alphabets_link_active_color', '#ffffff'),
            'start_letter_color' => betterdocs()->customizer->defaults->get('start_letter_color', '#667085'),
            'start_letter_bg_color' => betterdocs()->customizer->defaults->get('start_letter_bg_color', '#fff'),
            'start_letter_inner_bg_color' => betterdocs()->customizer->defaults->get('start_letter_inner_bg_color', '#f8f8f8'),
            'item_title_color' => betterdocs()->customizer->defaults->get('item_title_color', '#344054'),
            'item_excerpt_color' => betterdocs()->customizer->defaults->get('item_excerpt_color', '#667085'),
            'item_link_color' => betterdocs()->customizer->defaults->get('item_link_color', '#667085'),
            'explore_more_text_color' => betterdocs()->customizer->defaults->get('explore_more_text_color', '#667085'),
            'alphabets_link_font_size' => betterdocs()->customizer->defaults->get('alphabets_link_font_size', '20px'),
            'start_letter_font_size' => betterdocs()->customizer->defaults->get('start_letter_font_size', '96px'),
            'item_title_font_size' => betterdocs()->customizer->defaults->get('item_title_font_size', '20px'),
            'item_excerpt_font_size' => betterdocs()->customizer->defaults->get('item_excerpt_font_size', '16px'),
            'item_link_font_size' => betterdocs()->customizer->defaults->get('item_link_font_size', '16px'),
            'explore_more_font_size' => betterdocs()->customizer->defaults->get('explore_more_font_size', '18px'),
            'loadmore_button_text_font_size' => betterdocs()->customizer->defaults->get('loadmore_button_text_font_size', '14px'),
            'loadmore_button_text_color' => betterdocs()->customizer->defaults->get('loadmore_button_text_color', '#ffffff'),
            'loadmore_button_bg_color' => betterdocs()->customizer->defaults->get('loadmore_button_bg_color', '#475467'),

            
        ];

    
        return $customizer_settings;
    }

    public function get_style_depends()
    {
        return ['betterdocs-encyclopedia'];
    }

    public function get_script_depends()
    {
        return ['betterdocs-encyclopedia'];
    }


    /**
     * Summary of render
     *
     * @param mixed $atts
     * @param mixed $content
     * @return mixed
     */
    
    public function render($atts, $content = null)
    {
        add_filter('betterdocs_term_permalink', [$this, 'term_permalink'], 10, 4);

        $this->views('layouts/encyclopedia/default', $this->default_attributes());

        remove_filter('betterdocs_term_permalink', [$this, 'term_permalink'], 10);
    }

    public function view_params()
    {
       
    }
}
