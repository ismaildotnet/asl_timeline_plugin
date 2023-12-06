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
            <a href="?post_type=timeline&page=timeline-settings&tab=color" class="nav-tab <?php echo $current_tab ===   'color' ? 'nav-tab-active' : ''; ?>">Color settings</a>
            <!-- <a href="?post_type=timeline&page=timeline-settings&tab=boolean" class="nav-tab <?php echo $current_tab === 'boolean' ? 'nav-tab-active' : ''; ?>">Switch</a> -->
            <a href="?post_type=timeline&page=timeline-settings&tab=other" class="nav-tab <?php echo $current_tab ===  'other' ? 'nav-tab-active' : ''; ?>">Other Timeline Settings</a>
            <a href="?post_type=timeline&page=timeline-settings&tab=animation" class="nav-tab <?php echo $current_tab ===  'animation' ? 'nav-tab-active' : ''; ?>">Animation</a>
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
   // register_setting('timeline_plugin_settings_group_boolean', 'show_category_before_timeline_item');
  //  register_setting('timeline_plugin_settings_group_boolean', 'show_number_as_pagination');
  //  register_setting('timeline_plugin_settings_group_boolean', 'enable_details_view_for_timeline_item');
  //  register_setting('timeline_plugin_settings_group_boolean', 'show_pagination_after_maximum_item_shown');
   

    register_setting('timeline_plugin_settings_group_animation', 'timeline_odd_item_animation_name');
    register_setting('timeline_plugin_settings_group_animation', 'timeline_even_item_animation_name');
    register_setting('timeline_plugin_settings_group_animation', 'timeline_item_animate_duration');
    register_setting('timeline_plugin_settings_group_animation', 'timeline_item_animate_delay');
    register_setting('timeline_plugin_settings_group_animation', 'timeline_item_animate_repeat');


    register_setting('timeline_plugin_settings_group_other', 'timeline_maximum_item');
    register_setting('timeline_plugin_settings_group_other', 'timeline_item_title_font_size');
    register_setting('timeline_plugin_settings_group_other', 'show_timeline_ascending_by_timeline_date');

}

add_action('admin_init', 'add_settings_sections_and_fields');

function add_settings_sections_and_fields() {
   include_once(plugin_dir_path(__FILE__) . '\settings\color-settings.php');
  // include_once(plugin_dir_path(__FILE__) . '\settings\switch-settings.php');
   include_once(plugin_dir_path(__FILE__) . '\settings\animation-settings.php');
   include_once(plugin_dir_path(__FILE__) . '\settings\other-settings.php');
   load_timline_color_settings();
 //  Load_timline_switch_settings();
   load_timeline_other_settings();
   load_timeline_animation_settings();
  //  add_settings_field('timeline_maximum_item', 'Timeline Maximum Item (count)', 'number_type_callback', 'timeline-settings-page', 'timeline_boolean_section', array('setting_id'=> 'timeline_maximum_item'));
}
?>