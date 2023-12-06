<?php
function load_timline_color_settings(){
    add_settings_section('color',  'Timeline Color Scheme', 'color_section_callback', 'timeline-settings-color');   
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
            'renderColorPickerCallBack',
            'timeline-settings-color', // Specify the page slug here
            'color',
            array('setting_id' => $field)
        );
    }
   




  //  add_settings_field('timeline_maximum_item', 'Timeline Maximum Item (count)', 'number_type_callback', 'timeline-settings-page', 'timeline_boolean_section', array('setting_id'=> 'timeline_maximum_item'));

}

function color_section_callback() {
    // Description for the color section
    echo "<p>Explore the vivid world of our timeline's color section, where each hue is carefully chosen to represent distinct events and milestones. Dive into a visual journey that harmonizes colors with chronological significance, making your timeline not just informative but aesthetically pleasing.</p>";
}
function renderColorPickerCallBack($args) {
    // Extract the setting_id from $args
    $setting_id = $args['setting_id'];
    // Get the option value
    $value = get_option($setting_id, '#ffffff'); // Default color
    // Output the color picker input
    echo '<input type="text" name="' . esc_attr($setting_id) . '" value="' . esc_attr($value) . '" class="timeline-color-field" />';
}
?>