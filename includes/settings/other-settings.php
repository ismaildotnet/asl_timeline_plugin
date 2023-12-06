<?php
function load_timeline_other_settings(){
    add_settings_section('other', 'Other Timeline Settings', 'other_section_callback', 'timeline-settings-other');

    $otherSettings = array(
        "timeline_maximum_item",
        "timeline_item_title_font_size"
    );

    foreach ($otherSettings as $field) {
        add_settings_field(
            $field,
            ucwords(str_replace('_', ' ', $field)),
            'other_type_callback',
            'timeline-settings-other', // Specify the page slug here
            'other',
            array('setting_id' => $field)
        );
    }
    add_settings_field('show_timeline_ascending_by_timeline_date', 'Timeline Item with assending Order', 'renderBooleanFieldCallBack', 'timeline-settings-other', 'other', array('setting_id'=>'show_timeline_ascending_by_timeline_date'));

}

function other_section_callback() {
    // Description for the color section
    echo "<p>Precision meets customization in our Numeric Input section. Tailor your timeline by inputting numerical values that enhance the clarity and accuracy of data representation. Whether it's specifying quantities, adjusting scales, or configuring precise settings, this section empowers you to fine-tune your timeline with numerical precision. </p>";
}

function other_type_callback($args){
    $setting_id = $args['setting_id'];
    $value = get_option($setting_id, '20'); // Default value is '0'
    // Output the checkbox input
         echo '<input type="number" min="1" required id="'.esc_attr($setting_id).'" name="' . esc_attr($setting_id) . '" value="'. $value.'" class="timeline_number_input" />';
}

function renderBooleanFieldCallBack($args){
    $setting_id = $args['setting_id'];
    $value = get_option($setting_id, '0'); // Default value is '0'
    // Output the checkbox input
         echo '<input type="checkbox" id="'.esc_attr($setting_id).'" name="' . esc_attr($setting_id) . '" value="1" ' . checked('1', $value, "0") . ' class="timeline_checkbox" />';
         echo '<label for="' . esc_attr($setting_id) .'"></label>';
}
?>