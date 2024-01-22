<?php   
/**
 * This main settings file
 *
 * PHP version 7.4.1
 * 
 * @category Basefile
 * @package  General
 * @author   Alchemy Software Limited <wordpress@alchemy-bd.com>
 * @license  GPL v2 or later
 * @link     alchemy-bd.com
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
add_action('admin_menu', 'Add_Timeline_Plugin_Settings_page');
/**
 * This Function will add a menu item to admin sidebar
 * 
 * @return null
 */

function Add_Timeline_Plugin_Settings_page()
{
    add_submenu_page(
        'edit.php?post_type=timeline', // Parent menu slug
        'Timeline Settings',
        'Timeline Settings',
        'manage_options',
        'timeline-settings',
        'Timeline_Plugin_Settings_page',
        '/assets/images/menu.png'
    );
}
/**
 * This Function will check which tab is need to be shown
 * 
 * @return null
 */
function Timeline_Plugin_Settings_page()
{
    $allowed_tabs = array('color', 'other', 'animation', 'help');
    $current_tab = isset($_GET['tab']) ? $_GET['tab'] : 'color';
    // Validate $current_tab against allowed values
    $current_tab = in_array($current_tab, $allowed_tabs) ? $current_tab : 'color';
    // If needed, you can still sanitize the value
    $current_tab = htmlspecialchars($current_tab, ENT_QUOTES, 'UTF-8');
    ?>
    
    <div class="wrap">
        <h1>Timeline Settings</h1>
        <h2 class="nav-tab-wrapper">
            <a href="?post_type=timeline&page=timeline-settings&tab=color" class="nav-tab <?php echo $current_tab === 'color' ? 'nav-tab-active' : ''; ?>">Color settings</a>
            <a href="?post_type=timeline&page=timeline-settings&tab=other" class="nav-tab <?php echo $current_tab === 'other' ? 'nav-tab-active' : ''; ?>">Other Timeline Settings</a>
            <a href="?post_type=timeline&page=timeline-settings&tab=animation" class="nav-tab <?php echo $current_tab === 'animation' ? 'nav-tab-active' : ''; ?>">Animation</a>
            <a href="?post_type=timeline&page=timeline-settings&tab=help" class="nav-tab <?php echo $current_tab === 'help' ? 'nav-tab-active' : ''; ?>">How to?</a>
            <!-- Add more tabs for additional sections -->
        </h2>
        <?php if ($current_tab !== 'help' ) : ?>
            <?php settings_errors();?>
        <form method="post" action="options.php">
            <?php
              settings_fields('timeline_s_' . $current_tab);
             echo '<div class="timeline-settings-container">';
              do_settings_sections('timeline-settings-' . $current_tab);
             echo '</div>';
            submit_button();
            ?>
        </form>
        <?php else:

             include plugin_dir_path(__FILE__) . 'templates/timeline_guide.php';
        endif;?>
        <div class="clearfix">
            <hr>
Developed by<a href="#" title="Alchemy Software Limited">Alchemy Software Ltd.</a>
        </div>
    </div>
    <?php
}

add_action('admin_init', 'timeline_Register_Plugin_settings');
/**
 * This function will register relevent settings field
 *
 * @return null
 */
function timeline_Register_Plugin_settings()
{
    // Specify the second argument as the option group, which should match the argument in settings_fields
    register_setting('timeline_s_color', 'timeline_border_color');
    register_setting('timeline_s_color', 'timeline_top_border_color');

    //icon color
    register_setting('timeline_s_color', 'timeline_odd_item_icon_color');
    register_setting('timeline_s_color', 'timeline_odd_item_icon_background_color');
    register_setting('timeline_s_color', 'timeline_even_item_icon_color');
    register_setting('timeline_s_color', 'timeline_even_item_icon_background_color');

    //item odd title
    register_setting('timeline_s_color', 'timeline_odd_item_title_color');
    register_setting('timeline_s_color', 'timeline_even_item_title_color');

    //item odd color
    register_setting('timeline_s_color', 'timeline_odd_item_text_color');
    register_setting('timeline_s_color', 'timeline_odd_item_background_color');
    register_setting('timeline_s_color', 'timeline_odd_item_border_color');

    //item even color
    register_setting('timeline_s_color', 'timeline_even_item_text_color');
    register_setting('timeline_s_color', 'timeline_even_item_background_color');
    register_setting('timeline_s_color', 'timeline_even_item_border_color');

    register_setting('timeline_s_animation', 'timeline_odd_item_animation_name');
    register_setting('timeline_s_animation', 'timeline_even_item_animation_name');
    register_setting('timeline_s_animation', 'timeline_item_animate_duration');
    register_setting('timeline_s_animation', 'timeline_item_animate_delay');
    register_setting('timeline_s_animation', 'timeline_item_animate_repeat');

    register_setting('timeline_s_other', 'timeline_maximum_item');
    register_setting('timeline_s_other', 'timeline_item_title_font_size');
    register_setting('timeline_s_other', 'show_timeline_ascending_by_timeline_date');

}

add_action('admin_init', 'Add_Settings_Sections_And_fields');
/**
 * This function will load all settings 
 * 
 * @return void
 */
function Add_Settings_Sections_And_fields()
{
    include_once plugin_dir_path(__FILE__) . '\settings\timeline-color-settings.php';
    include_once plugin_dir_path(__FILE__) . '\settings\timeline-animation-settings.php';
    include_once plugin_dir_path(__FILE__) . '\settings\timeline-other-settings.php';
    atwb\settings\timline_load_Color_settings();
    atwb\settings\timeline_load_Other_settings();
    atwb\settings\timeline_load_Animation_settings();
}
?>