<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/*
 * Plugin Name:       Awesome Timeline
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       manage a slider for your site
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            ASL
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       Awesome Timeline
 * Domain Path:       /languages
 */
define('TIMELINE_PLUGIN_DIR', __DIR__);
define('TIMELINE_PLUGIN_PATH', __FILE__);
define('TIMELINE_MENU_ICON_PATH',plugin_dir_url(__FILE__) .'/assets/images/menu-icon.png');

	 require_once TIMELINE_PLUGIN_DIR . '/includes/setup.php';
	 require_once TIMELINE_PLUGIN_DIR . '/includes/settings.php';
	 require_once TIMELINE_PLUGIN_DIR . '/includes/enquee.php';
	 require_once TIMELINE_PLUGIN_DIR . '/includes/widget.php';
	 require_once TIMELINE_PLUGIN_DIR . '/includes/shortcode.php';
	// require_once TIMELINE_PLUGIN_DIR . '/blocks/main.php';


// Define Global Veriable 
function timelinealt_timelinealt_block_init() {
	register_block_type( __DIR__ . '/blocks' );
}
add_action( 'init', 'timelinealt_timelinealt_block_init' );
add_action('enqueue_block_assets', function (): void {
    wp_enqueue_style('dashicons');
});
?>