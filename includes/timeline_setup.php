<?php
/**
 * This date picker box for custom post type Timeline
 *
 * PHP version 7.4.1
 *
 * @category Basefile
 * @package  General
 * @author   Alchemy Software Limited <wordpress@alchemy-bd.com>
 * @license  GPL v2 or later
 * @link     alchemy-bd.com
 */
namespace atwb\setup;
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
define("_TIMELINE_POST_TYPE", "timeline");

class ATWBSetup{

    function __construct(){
        require_once plugin_dir_path(__FILE__) . '/timeline_iconpicker_meta_box.php';
        require_once plugin_dir_path(__FILE__) . '/timeline_datepicker_meta_box.php';
        add_action('init', array($this, 'Timeline_Setup_Post_type'));
        register_activation_hook(__FILE__, array($this, 'timeline_plugin_activate'));
        register_deactivation_hook(__FILE__, array($this, 'timeline_plugin_deactivate'));

    }
/**
 * Register the "book" custom post type
 *
 * @return null
 */
function Timeline_Setup_Post_type()
{
    if (!current_user_can('activate_plugins')) {
        return;
    }
    $args = array(
        'labels' => array(
            'name' => __('Timeline'),
            'singular_name' => __('Timeline Item'),
            'parent_item_colon' => __('Parent Timeline Item'),
            'all_items' => __('All Timeline item'),
            'view_item' => __('View Timeline Item'),
            'add_new_item' => __('Add New Timeline Item'),
            'add_new' => __('Add New'),
            'edit_item' => __('Edit Timeline Item'),
            'update_item' => __('Update Timeline Item'),
            'search_items' => __('Search Timeline Item'),
            'not_found' => __('Not Found'),
            'not_found_in_trash' => __('Not found in Trash'),
        ),
        'public' => true,
        'has_archive' => false,
        'menu_position' => 5,
        'menu_icon' => TIMELINE_MENU_ICON_PATH,
        'supports' => array('title', 'editor', 'thumbnail'),
    );
    register_post_type(_TIMELINE_POST_TYPE, $args);
}

/**
 * Activate the plugin.
 *
 * @return null
 */
function Timeline_Plugin_activate()
{
    // Trigger our function that registers the custom post type plugin.
    Timeline_Setup_Post_type();
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules();
}

/**
 * Deactivation hook.
 *
 * @return null
 */
function Timeline_Plugin_deactivate()
{
    // Unregister the post type, so the rules are no longer in memory.
    unregister_post_type(_TIMELINE_POST_TYPE);
    // Clear the permalinks to remove our post type's rules from the database.
    flush_rewrite_rules();
}
}
new ATWBSetup();
