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
namespace ATWB\settings;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class TimelineSettings {

    /**
     * Initialize the TimelineSettings class
     */
    public function __construct() {
        add_action('admin_menu', array($this, 'atwb_addTimelinePluginSettingsPage'));
        add_action('admin_init', array($this, 'atwb_registerPluginSettings'));
        add_action('admin_init', array($this, 'atwb_addSettingsSectionsAndFields'));
    }

    /**
     * Add a menu item to the admin sidebar
     *
     * @return void
     */
    public function atwb_addTimelinePluginSettingsPage() {
        add_submenu_page(
            'edit.php?post_type=atwb', // Parent menu slug
            'Timeline Settings',
            'Timeline Settings',
            'manage_options',
            'atwb-settings',
            array($this, 'atwb_PluginSettingsPage'),
            10
        );
    }

    /**
     * Display the Timeline Settings page
     *
     * @return void
     */
    public function atwb_PluginSettingsPage() {
        $allowed_tabs = array('color', 'other', 'animation', 'help');
                $current_tab = isset($_GET['tab']) ? $_GET['tab'] : 'color';
                 // If needed, you can still sanitize the value
                $current_tab = htmlspecialchars($current_tab, ENT_QUOTES, 'UTF-8');
                // Validate $current_tab against allowed values
                $current_tab = in_array($current_tab, $allowed_tabs) ? $current_tab : 'color';

    ?>
    
    <div class="wrap">
        <h1>Timeline Settings</h1>
        <h2 class="nav-tab-wrapper">
            <a href="?post_type=atwb&page=atwb-settings&tab=color" class="nav-tab <?php echo $current_tab === 'color' ? 'nav-tab-active' : ''; ?>">Color settings</a>
            <a href="?post_type=atwb&page=atwb-settings&tab=other" class="nav-tab <?php echo $current_tab === 'other' ? 'nav-tab-active' : ''; ?>">Other Timeline Settings</a>
            <a href="?post_type=atwb&page=atwb-settings&tab=animation" class="nav-tab <?php echo $current_tab === 'animation' ? 'nav-tab-active' : ''; ?>">Animation</a>
            <a href="?post_type=atwb&page=atwb-settings&tab=help" class="nav-tab <?php echo $current_tab === 'help' ? 'nav-tab-active' : ''; ?>">How to?</a>
            <!-- Add more tabs for additional sections -->
        </h2>
        <?php if ($current_tab !== 'help' ) : ?>
            <?php settings_errors();?>
        <form method="post" action="options.php">
            <?php
              settings_fields('atwb-settings-' . $current_tab);
             echo '<div class="timeline-settings-container">';
              do_settings_sections('atwb-settings-' . $current_tab);
             echo '</div>';
            submit_button();
            ?>
        </form>
        <?php else:

             include plugin_dir_path(__FILE__) . 'templates/atwb_guide.php';
        endif;?>
        <div class="clearfix">
            <hr>
Developed by<a href="#" title="Alchemy Software Limited">Alchemy Software Ltd.</a>
        </div>
    </div>
    <?php
    }

    /**
     * Register relevant settings fields
     *
     * @return void
     */
    public function atwb_registerPluginSettings() {
             register_setting('atwb-settings-color', "atwb_border_color");
             register_setting('atwb-settings-color', "atwb_top_border_color");
             register_setting('atwb-settings-color', "atwb_odd_item_icon_color");
             register_setting('atwb-settings-color', "atwb_odd_item_icon_background_color");
             register_setting('atwb-settings-color', "atwb_even_item_icon_color");
             register_setting('atwb-settings-color', "atwb_even_item_icon_background_color");
             register_setting('atwb-settings-color', "atwb_odd_item_title_color");
             register_setting('atwb-settings-color', "atwb_even_item_title_color");
             register_setting('atwb-settings-color', "atwb_odd_item_text_color");
             register_setting('atwb-settings-color', "atwb_odd_item_background_color");
             register_setting('atwb-settings-color', "atwb_odd_item_border_color");
             register_setting('atwb-settings-color', "atwb_even_item_text_color");
             register_setting('atwb-settings-color', "atwb_even_item_background_color");
             register_setting('atwb-settings-color', "atwb_even_item_border_color");

 

            register_setting('atwb-settings-other', "atwb_maximum_item");
            register_setting('atwb-settings-other', "atwb_item_title_font_size");
            register_setting('atwb-settings-other', "atwb_ascending_by_timeline_date");

            register_setting('atwb-settings-animation', "atwb_odd_item_animation_name");
            register_setting('atwb-settings-animation', "atwb_even_item_animation_name");
            register_setting('atwb-settings-animation', "atwb_item_animate_duration");
            register_setting('atwb-settings-animation', "atwb_item_animate_delay");
            register_setting('atwb-settings-animation', "atwb_item_animate_repeat");



    }

    /**
     * Load all settings sections and fields
     *
     * @return void
     */
    public function atwb_addSettingsSectionsAndFields() {
        include_once plugin_dir_path(__FILE__) . '/settings/atwb-color-settings.php';
        include_once plugin_dir_path(__FILE__) . '/settings/atwb-animation-settings.php';
        include_once plugin_dir_path(__FILE__) . '/settings/atwb-other-settings.php';
        

    }
}

// Instantiate the class
new TimelineSettings();
