<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// global $wpdb;
// $table_prefix = $wpdb->prefix;
define("_timeline_post_type",  "timeline");


/**
 * Register the "book" custom post type
 */

function timeline_setup_post_type() {
	if ( ! current_user_can( 'activate_plugins' ) ) {
        return;
    }

	register_post_type( _timeline_post_type,
	array(
		'labels' => array(
			'name' => __( 'Timeline' ),
			'singular_name' => __( 'Timeline Item' ),
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
		'supports' => array( 'title', 'editor', 'thumbnail' ),
	)
); 

} 
add_action( 'init', 'timeline_setup_post_type' );
/**meta box for icon picker name with 'timeline_icon' */
include(plugin_dir_path(__FILE__) . '/iconpicker_meta_box.php');
include(plugin_dir_path(__FILE__) . '/datepicker_meta_box.php');





/**
 * Activate the plugin.
 */
function timeline_plugin_activate() { 
	// Trigger our function that registers the custom post type plugin.
	timeline_setup_post_type(); 
	// Clear the permalinks after the post type has been registered.
	flush_rewrite_rules(); 
}
register_activation_hook( __FILE__, 'timeline_plugin_activate' );

/**
 * Deactivation hook.
   */
function timeline_plugin_deactivate() {
	// Unregister the post type, so the rules are no longer in memory.
	unregister_post_type( _timeline_post_type );
	// Clear the permalinks to remove our post type's rules from the database.
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'timeline_plugin_deactivate' );

?>
