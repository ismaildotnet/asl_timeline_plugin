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
namespace ATWB\settings;

/**
 * Class TimelineColorSettings
 */
class TimelineColorSettings {

    /**
     * Initialize the TimelineColorSettings class
     */
    public function __construct() {
       $this-> loadColorSettings();
    }

    /**
     * Load color settings section and fields
     *
     * @return void
     */
    public function loadColorSettings() {
        add_settings_section('color', 'Timeline Color Scheme', array($this, 'colorSectionCallback'), 'timeline-settings-color');

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
                array($this, 'renderColorPickerCallback'),
                'timeline-settings-color',
                'color',
                array('setting_id' => $field)
            );
        }
    }

    /**
     * Display HTML for the color settings section
     *
     * @return void
     */
    public function colorSectionCallback() {
        echo "<p>Explore the vivid world of our timeline's color section, where each hue is carefully chosen to represent distinct events and milestones. Dive into a visual journey that harmonizes colors with chronological significance, making your timeline not just informative but aesthetically pleasing.</p>";
    }

    /**
     * Display HTML for the color picker field
     *
     * @param array $args Arguments of the color picker field
     *
     * @return void
     */
    public function renderColorPickerCallback($args) {
        $settingId = $args['setting_id'];
        $value = get_option($settingId, '#ffffff'); // Default color
        echo '<input type="text" name="' . esc_attr($settingId) . '" value="' . esc_attr($value) . '" class="timeline-color-field" />';
    }
}

// Instantiate the class
new TimelineColorSettings();
