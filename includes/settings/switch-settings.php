<?php
function Load_timline_switch_settings(){
   // add_settings_section('boolean','Enable/Disable Settings', 'boolean_section_callback', 'timeline-settings-boolean');
    $boolearnsettings= array(
        // "show_category_before_timeline_item",
        // "show_number_as_pagination",
        // "enable_details_view_for_timeline_item",
        // "show_pagination_after_maximum_item_shown",
        "show_timeline_ascending_by_timeline_date"
    );

    foreach ($boolearnsettings as $field) {
        add_settings_field(
            $field,
            ucwords(str_replace('_', ' ', $field)),
            'renderBooleanFieldCallBack',
            'timeline-settings-number', // Specify the page slug here
            'number',
            array('setting_id' => $field)
        );
    }
}
function boolean_section_callback() {
    // Description for the color section
    echo "<p>Fine-tune your timeline experience with our Boolean section, offering a straightforward way to toggle between different settings. Enable or disable features seamlessly, providing you with the flexibility to customize your timeline based on specific preferences or requirements.</p>";
}

function renderBooleanFieldCallBack($args){
    $setting_id = $args['setting_id'];
    $value = get_option($setting_id, '0'); // Default value is '0'
    // Output the checkbox input
         echo '<input type="checkbox" id="'.esc_attr($setting_id).'" name="' . esc_attr($setting_id) . '" value="1" ' . checked('1', $value, "0") . ' class="timeline_checkbox" />';
         echo '<label for="' . esc_attr($setting_id) .'"></label>';
}
?>