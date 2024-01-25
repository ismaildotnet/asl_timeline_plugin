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
        add_action('admin_menu', array($this, 'addTimelinePluginSettingsPage'));
        add_action('admin_init', array($this, 'registerPluginSettings'));
        add_action('admin_init', array($this, 'addSettingsSectionsAndFields'));
    }

    /**
     * Add a menu item to the admin sidebar
     *
     * @return void
     */
    public function addTimelinePluginSettingsPage() {
        add_submenu_page(
            'edit.php?post_type=timeline', // Parent menu slug
            'Timeline Settings',
            'Timeline Settings',
            'manage_options',
            'timeline-settings',
            array($this, 'timelinePluginSettingsPage'),
            10
        );
    }

    /**
     * Display the Timeline Settings page
     *
     * @return void
     */
    public function timelinePluginSettingsPage() {
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

    /**
     * Register relevant settings fields
     *
     * @return void
     */
    public function registerPluginSettings() {
        // The existing content of timeline_Register_Plugin_settings function goes here
    }

    /**
     * Load all settings sections and fields
     *
     * @return void
     */
    public function addSettingsSectionsAndFields() {
        include_once plugin_dir_path(__FILE__) . '/settings/timeline-color-settings.php';
        include_once plugin_dir_path(__FILE__) . '/settings/timeline-animation-settings.php';
        include_once plugin_dir_path(__FILE__) . '/settings/timeline-other-settings.php';
        

    }
}

// Instantiate the class
new TimelineSettings();
