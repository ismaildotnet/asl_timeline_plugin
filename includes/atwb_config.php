<?php
/**
 * This reading configuration file
 *
 * PHP version 7.4.1
 * 
 * @category Basefile
 * @package  General
 * @author   Alchemy Software Limited <wordpress@alchemy-bd.com>
 * @license  GPL v2 or later
 * @link     wordpress.org
 */
namespace ATWB\Config;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
class ATWBTimelineConfig
{
    public function __construct()
    {
        $this->TimelineWriteCSS();
    }

    const allvariables = array(
        "atwb_border_color",
        "atwb_top_border_color",
        "atwb_odd_item_icon_color",
        "atwb_odd_item_icon_background_color",
        "atwb_odd_item_text_color",
        "atwb_odd_item_background_color",
        "atwb_odd_item_border_color",
        "atwb_even_item_icon_color",
        "atwb_even_item_icon_background_color",
        "atwb_even_item_text_color",
        "atwb_even_item_background_color",
        "atwb_even_item_border_color",
        "atwb_odd_item_title_color",
        "atwb_even_item_title_color",
    );
    const animations = array(
        "atwb_odd_item_animation_name",
        "atwb_even_item_animation_name",
        "atwb_item_animate_duration",
        "atwb_item_animate_delay",
        "atwb_item_animate_repeat",
    );


    function TimelineWriteCSS()
    {
        echo '<style type="text/css"> :root{';
        foreach (self::allvariables as $field) {
            $option_value = get_option($field);
            $sanitized_value = sanitize_hex_color($option_value); // Adjust based on the type of value
            echo esc_attr('--' . $field . ':' . $sanitized_value . ';');
        }
        foreach (self::animations as $animate) {
            $option_value = get_option($animate);
            $sanitized_value = intval($option_value, 0); // Adjust based on the type of value
            echo esc_attr('--' . $animate . ':' . $sanitized_value . ';');
        }
        $fontsize = esc_attr(get_option('atwb_item_title_font_size', 30));
        $fontsizecss = sprintf('--atwb_item_title_font_size:%spx; }</style>', $fontsize);
        echo $fontsizecss;
    }
}
new ATWBTimelineConfig();
