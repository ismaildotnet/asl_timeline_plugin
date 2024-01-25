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
class TimelineConfig{
    public function __construct() {
       $this->TimelineWriteCSS();
    }

 const allvariables = array(
    "timeline_border_color",
    "timeline_top_border_color",
    "timeline_odd_item_icon_color",
    "timeline_odd_item_icon_background_color",
    "timeline_odd_item_text_color",
    "timeline_odd_item_background_color",
    "timeline_odd_item_border_color",
    "timeline_even_item_icon_color",
    "timeline_even_item_icon_background_color",
    "timeline_even_item_text_color",
    "timeline_even_item_background_color",
    "timeline_even_item_border_color",
    "timeline_odd_item_title_color",
    "timeline_even_item_title_color",
);
const animations = array(
    "timeline_odd_item_animation_name",
    "timeline_even_item_animation_name",
    "timeline_item_animate_duration",
    "timeline_item_animate_delay",
    "timeline_item_animate_repeat",
);


function TimelineWriteCSS(){
    echo '<style type="text/css"> :root{';
        foreach (self::allvariables as $field) {
            $option_value = get_option($field);
            $sanitized_value = sanitize_hex_color($option_value); // Adjust based on the type of value
            echo esc_attr( '--' . $field . ':' . $sanitized_value . ';');
        }
        foreach (self::animations as $animate) {
            $option_value = get_option($animate);
            $sanitized_value = $option_value; // Adjust based on the type of value
            echo esc_attr('--' . $animate . ':' . $sanitized_value . ';');
        }
        
        echo '--timeline_item_title_font_size:' . get_option('timeline_item_title_font_size', 30) . 'px;';
        echo '}</style>';
}
}
new TimelineConfig();
