<?php
/**
 * This animation settings for timeline
 *
 * PHP version 7.4.1
 *
 * @category Basefile
 * @package  General
 * @author   Alchemy Software Limited <wordpress@alchemy-bd.com>
 * @license  GPL v2 or later
 * @link     wordpress.org
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/**
 * This Function will enquee the Admin side all styles and scripts 
 * 
 * @return null
 */
function Enqueue_Admin_Styles_And_scripts()
{
    global $pagenow;
    wp_enqueue_style('wp-color-picker');
    // wp_enqueue_style('dashicons');
    wp_enqueue_script('timeline-color-picker', plugin_dir_url(__DIR__) . '/admin/js/color_picker.js', array('wp-color-picker'), false, true);
    wp_enqueue_style('timeline-editor-style', plugin_dir_url(__DIR__) . '/admin/css/timeline_editor.css');
    wp_enqueue_style('timeline-admin-item-style', plugin_dir_url(__DIR__) . '/assets/style.css');

    if ($pagenow === 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] === 'timeline' && isset($_GET['page']) && $_GET['page'] === 'timeline-settings') {
        wp_enqueue_style('timeline-option-style', plugin_dir_url(__DIR__) . '/admin/css/timeline_style.css');
    }
}
add_action('admin_enqueue_scripts', 'Enqueue_Admin_Styles_And_scripts');

/**
 * This Function will enquee the all styles and scripts 
 * 
 * @return null
 */
function Enqueue_Styles_And_scripts()
{
    wp_enqueue_style('timeline-item-style', plugin_dir_url(__DIR__) . '/assets/style.css');
}
add_action('wp_enqueue_scripts', 'Enqueue_Styles_And_scripts');
