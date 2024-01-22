<?php
/**
 * This Color settings for timeline
 *
 * PHP version 7.4.1
 *
 * @category Basefile
 * @package  General
 * @author   Alchemy Software Limited <wordpress@alchemy-bd.com>
 * @license  GPL v2 or later
 * @link     alchemy-bd.com
 */
namespace atwb\settings;
/**
 * This function will register section and settings field
 *
 * @return null
 */
function timline_load_Color_settings()
{
    add_settings_section('color', 'Timeline Color Scheme', 'atwb\settings\timeline_Color_Section_callback', 'timeline-settings-color');
    $colorPicker = array(
        "timeline_border_color",
        "timeline_top_border_color",
        "timeline_odd_item_icon_color",
        "timeline_odd_item_icon_background_color",
        "timeline_even_item_icon_color",
        "timeline_even_item_icon_background_color",

        "timeline_odd_item_title_color",
        "timeline_even_item_title_color",

        "timeline_odd_item_text_color",
        "timeline_odd_item_background_color",
        "timeline_odd_item_border_color",

        "timeline_even_item_text_color",
        "timeline_even_item_background_color",
        "timeline_even_item_border_color",

    );
    foreach ($colorPicker as $field) {
        add_settings_field(
            $field,
            ucwords(str_replace('_', ' ', $field)),
            'atwb\settings\timeline_renderColorPickerCallBack',
            'timeline-settings-color', // Specify the page slug here
            'color',
            array('setting_id' => $field)
        );
    }
}
/**
 * This function will return some html for section
 *
 * @return null
 */
function timeline_Color_Section_callback()
{
    // Description for the color section
    echo "<p>Explore the vivid world of our timeline's color section, where each hue is carefully chosen to represent distinct events and milestones. Dive into a visual journey that harmonizes colors with chronological significance, making your timeline not just informative but aesthetically pleasing.</p>";
}

/**
 * This function will return some html for settings
 *
 * @param mixed $args is the arguments of settings field
 * 
 * @return null
 */
function timeline_renderColorPickerCallBack($args)
{
    // Extract the setting_id from $args
    $setting_id = $args['setting_id'];
    // Get the option value
    $value = get_option($setting_id, '#ffffff'); // Default color
    // Output the color picker input
    echo '<input type="text" name="' . esc_attr($setting_id) . '" value="' . esc_attr($value) . '" class="timeline-color-field" />';
}
