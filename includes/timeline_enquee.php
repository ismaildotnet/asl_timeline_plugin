<?php
/**
 * Animation settings for timeline
 *
 * PHP version 7.4.1
 *
 * @category Basefile
 * @package  General
 * @author   Alchemy Software Limited <wordpress@alchemy-bd.com>
 * @license  GPL v2 or later
 * @link     wordpress.org
 */

namespace ATWB\Enqueue;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Class Timeline_Enqueue
 */
class Timeline_Enqueue {

    /**
     * Initialize the class
     */
    public function __construct() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_styles_and_scripts'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles_and_scripts'));
    }

    /**
     * Enqueue styles and scripts for the admin side
     */
    public function enqueue_admin_styles_and_scripts() {
        global $pagenow;

        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('timeline-color-picker', plugin_dir_url(__DIR__) . '/admin/js/timeline_color_picker.js', array('wp-color-picker'), false, true);
        wp_enqueue_style('timeline-editor-style', plugin_dir_url(__DIR__) . '/admin/css/timeline_editor.css');
        wp_enqueue_style('timeline-admin-item-style', plugin_dir_url(__DIR__) . '/assets/style.css');

        if ($pagenow === 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] === 'timeline' && isset($_GET['page']) && $_GET['page'] === 'timeline-settings') {
            wp_enqueue_style('timeline-option-style', plugin_dir_url(__DIR__) . '/admin/css/timeline_style.css');
        }
    }

    /**
     * Enqueue styles and scripts for the front end
     */
    public function enqueue_styles_and_scripts() {
        wp_enqueue_style('timeline-item-style', plugin_dir_url(__DIR__) . '/assets/style.css');
    }
}

// Instantiate the class
new Timeline_Enqueue();
