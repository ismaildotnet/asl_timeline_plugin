<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
add_action('admin_enqueue_scripts', function() {
    
	global $pagenow;
    wp_enqueue_style('wp-color-picker');
    // wp_enqueue_style('dashicons');
    wp_enqueue_script('timeline-color-picker', plugin_dir_url(__DIR__) . '/admin/js/color_picker.js', array('wp-color-picker'), false, true);
    wp_enqueue_style('timeline-editor-style', plugin_dir_url(__DIR__) . '/admin/css/timeline_editor.css');
    wp_enqueue_style('timeline-admin-item-style', plugin_dir_url(__DIR__) . '/assets/style.css');

if ($pagenow === 'edit.php' &&
isset($_GET['post_type']) && $_GET['post_type'] === 'timeline' &&
isset($_GET['page']) && $_GET['page'] === 'timeline-settings') {
        wp_enqueue_style('timeline-option-style', plugin_dir_url(__DIR__) . '/admin/css/timeline_style.css');
        wp_enqueue_script('timeline-option-script', plugin_dir_url(__DIR__) . '/admin/js/timeline_script.js');
    }
});
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('timeline-item-style', plugin_dir_url(__DIR__) . '/assets/style.css');
});
?>