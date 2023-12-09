<?php
/**
 * This is a file label comment.
 *
 * PHP version 7.4.1
 *
 * @category Basefile
 * @package  General
 * @author   Alchemy Software Limited <wordpress@alchemy-bd.com>
 * @license  GPL v2 or later
 * @link     alchemy-bd.com
 *
 * Plugin Name:       Awesome Timeline with block
 * Plugin URI:        https://wordpress.org/plugins/awesome-timeline-with-block/
 * Description:       Explore the versatility of Awesome Timeline with Gutenberg block, a WordPress plugin designed to streamline timeline management. Seamlessly integrate with the WordPress block editor, creating dynamic timelines that beautifully display key events or project milestones. Enjoy the convenience of using Awesome Timeline as a Gutenberg block anywhere on your website, combining intuitive editing with impactful visual storytelling. Elevate your content creation with this powerful plugin, delivering an immersive timeline experience within a user-friendly environment.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Alchemy Software Limited
 * Author URI:        https://alchemy-bd.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       TimeLine
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
define('TIMELINE_PLUGIN_DIR', __DIR__);
define('TIMELINE_PLUGIN_PATH', __FILE__);
define('TIMELINE_MENU_ICON_PATH', plugin_dir_url(__FILE__) . '/assets/images/menu-icon.png');

require_once TIMELINE_PLUGIN_DIR . '/includes/setup.php';
require_once TIMELINE_PLUGIN_DIR . '/includes/settings.php';
require_once TIMELINE_PLUGIN_DIR . '/includes/enquee.php';
require_once TIMELINE_PLUGIN_DIR . '/includes/shortcode.php';

/**
 * This function register block as timeline
 *
 * @return null
 */
function Timeline_Block_init()
{
    register_block_type(__DIR__ . '/blocks');
}
add_action('init', 'Timeline_Block_init');
/**
 * Registering dashicons for block
 *
 * @return null
 */
function Register_Dash_Icons_For_block()
{
    wp_enqueue_style('dashicons');
}
add_action('enqueue_block_assets', 'Register_Dash_Icons_For_block');
