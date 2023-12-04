<?php
add_action('admin_menu', 'add_timeline_plugin_settings_page');

// function add_timeline_plugin_settings_page() {
//     add_options_page('Timeline Settings',
//      'Timeline Settings', 
//     'manage_options',
//      'timeline-settings', 
//      'timeline_plugin_settings_page');
// }

function add_timeline_plugin_settings_page() {
    add_submenu_page(
        'edit.php?post_type=timeline', // Parent menu slug
        'Timeline Settings',
        'Timeline Settings',
        'manage_options',
        'timeline-settings',
        'timeline_plugin_settings_page',
        '/assets/images/menu.png'
    );
}

function timeline_plugin_settings_page() {
    $current_tab = isset($_GET['tab']) ? $_GET['tab'] : 'color'; // Default to Section 1

    ?>

    <div class="wrap">
        <h1>Timeline Settings</h1>
        <h2 class="nav-tab-wrapper">
            <a href="?post_type=timeline&page=timeline-settings&tab=color" class="nav-tab <?php echo $current_tab ===   'color' ? 'nav-tab-active' : ''; ?>">Color</a>
            <a href="?post_type=timeline&page=timeline-settings&tab=boolean" class="nav-tab <?php echo $current_tab === 'boolean' ? 'nav-tab-active' : ''; ?>">Switch</a>
            <a href="?post_type=timeline&page=timeline-settings&tab=number" class="nav-tab <?php echo $current_tab ===  'number' ? 'nav-tab-active' : ''; ?>">Number/Count</a>
            <a href="?post_type=timeline&page=timeline-settings&tab=help" class="nav-tab <?php echo $current_tab ===  'help' ? 'nav-tab-active' : ''; ?>">How to?</a>
            <!-- Add more tabs for additional sections -->
        </h2>
        <?php if ($current_tab !== 'help') : ?>
        <?php settings_errors(); ?>
        <form method="post" action="options.php">
            <?php
            settings_fields('timeline_plugin_settings_group_'.$current_tab);
            echo '<div class="timeline-settings-container">';
            do_settings_sections('timeline-settings-'.$current_tab);
            echo '</div>';
            submit_button();
            ?>
        </form>
        <?php else : 
          
          include(plugin_dir_path(__FILE__) . 'templates/timeline_guide.php');
          endif; ?>
        <div class="clearfix">
            <hr>
           Developed by  <a href="https://alchemy-bd.com" title="Developed by Alchemy Software Limited">Alchemy Software Limited</a>
        </div>
    </div>
    <?php
}

add_action('admin_init', 'register_plugin_settings');

function register_plugin_settings() {
    // Specify the second argument as the option group, which should match the argument in settings_fields
    register_setting('timeline_plugin_settings_group_color', 'timeline_border_color');
    register_setting('timeline_plugin_settings_group_color', 'timeline_top_border_color');

    //icon color
    register_setting('timeline_plugin_settings_group_color', 'timeline_odd_item_icon_color');
    register_setting('timeline_plugin_settings_group_color', 'timeline_odd_item_icon_background_color');
    register_setting('timeline_plugin_settings_group_color', 'timeline_even_item_icon_color');
    register_setting('timeline_plugin_settings_group_color', 'timeline_even_item_icon_background_color');


    //item odd title 
    register_setting('timeline_plugin_settings_group_color', 'timeline_odd_item_title_color');
    register_setting('timeline_plugin_settings_group_color', 'timeline_even_item_title_color');

    //item odd color
    register_setting('timeline_plugin_settings_group_color', 'timeline_odd_item_text_color');
    register_setting('timeline_plugin_settings_group_color', 'timeline_odd_item_background_color');
    register_setting('timeline_plugin_settings_group_color', 'timeline_odd_item_border_color');

    //item even color
    register_setting('timeline_plugin_settings_group_color', 'timeline_even_item_text_color');
    register_setting('timeline_plugin_settings_group_color', 'timeline_even_item_background_color');
    register_setting('timeline_plugin_settings_group_color', 'timeline_even_item_border_color');
    // Boolean Settings
    register_setting('timeline_plugin_settings_group_boolean', 'show_category_before_timeline_item');
    register_setting('timeline_plugin_settings_group_boolean', 'show_number_as_pagination');
    register_setting('timeline_plugin_settings_group_boolean', 'enable_details_view_for_timeline_item');
    register_setting('timeline_plugin_settings_group_boolean', 'show_pagination_after_maximum_item_shown');
    register_setting('timeline_plugin_settings_group_boolean', 'show_timeline_ascending_by_timeline_date');


    register_setting('timeline_plugin_settings_group_number', 'timeline_maximum_item');
    register_setting('timeline_plugin_settings_group_number', 'timeline_item_title_font_size');



}

add_action('admin_init', 'add_settings_sections_and_fields');

function add_settings_sections_and_fields() {
    add_settings_section('color', 'Timeline Color Scheme', 'color_section_callback', 'timeline-settings-color');
    add_settings_section('boolean', 'Enable/Disable Settings', 'boolean_section_callback', 'timeline-settings-boolean');
    add_settings_section('number', 'Numeric Parameters', 'number_section_callback', 'timeline-settings-number');
   
   
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

    $boolearnsettings= array(
        "show_category_before_timeline_item",
        "show_number_as_pagination",
        "enable_details_view_for_timeline_item",
        "show_pagination_after_maximum_item_shown",
        "show_timeline_ascending_by_timeline_date"
    );

    foreach ($boolearnsettings as $field) {
        add_settings_field(
            $field,
            ucwords(str_replace('_', ' ', $field)),
            'renderBooleanFieldCallBack',
            'timeline-settings-boolean', // Specify the page slug here
            'boolean',
            array('setting_id' => $field)
        );
    }

    $numberSettings = array(
        "timeline_maximum_item",
        "timeline_item_title_font_size"
    );

    foreach ($numberSettings as $field) {
        add_settings_field(
            $field,
            ucwords(str_replace('_', ' ', $field)),
            'number_type_callback',
            'timeline-settings-number', // Specify the page slug here
            'number',
            array('setting_id' => $field)
        );
    }
  //  add_settings_field('timeline_maximum_item', 'Timeline Maximum Item (count)', 'number_type_callback', 'timeline-settings-page', 'timeline_boolean_section', array('setting_id'=> 'timeline_maximum_item'));

}

function color_section_callback() {
    // Description for the color section
    echo "<p>Explore the vivid world of our timeline's color section, where each hue is carefully chosen to represent distinct events and milestones. Dive into a visual journey that harmonizes colors with chronological significance, making your timeline not just informative but aesthetically pleasing.</p>";
}

function boolean_section_callback() {
    // Description for the color section
    echo "<p>Fine-tune your timeline experience with our Boolean section, offering a straightforward way to toggle between different settings. Enable or disable features seamlessly, providing you with the flexibility to customize your timeline based on specific preferences or requirements.</p>";
}
function number_section_callback() {
    // Description for the color section
    echo "<p>Precision meets customization in our Numeric Input section. Tailor your timeline by inputting numerical values that enhance the clarity and accuracy of data representation. Whether it's specifying quantities, adjusting scales, or configuring precise settings, this section empowers you to fine-tune your timeline with numerical precision. </p>";
}


function renderColorPickerCallBack($args) {
    // Extract the setting_id from $args
    $setting_id = $args['setting_id'];
    // Get the option value
    $value = get_option($setting_id, '#ffffff'); // Default color
    // Output the color picker input
    echo '<input type="text" name="' . esc_attr($setting_id) . '" value="' . esc_attr($value) . '" class="timeline-color-field" />';
}

function renderBooleanFieldCallBack($args){
    $setting_id = $args['setting_id'];
    $value = get_option($setting_id, '0'); // Default value is '0'

    // Output the checkbox input
         echo '<input type="checkbox" id="'.esc_attr($setting_id).'" name="' . esc_attr($setting_id) . '" value="1" ' . checked('1', $value, "0") . ' class="timeline_checkbox" />';
         echo '<label for="' . esc_attr($setting_id) .'"></label>';
}

function number_type_callback($args){
    $setting_id = $args['setting_id'];
    $value = get_option($setting_id, '20'); // Default value is '0'
    // Output the checkbox input
         echo '<input type="number" min="1" required id="'.esc_attr($setting_id).'" name="' . esc_attr($setting_id) . '" value="'. $value.'" class="timeline_number_input" />';
}
?>
