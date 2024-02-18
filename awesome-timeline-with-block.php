<?php
/**
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
 * Text Domain:       atwb
 * Domain Path:       /languages
 */
namespace ATWB;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
define('ATWB_PLUGIN_DIR', __DIR__);
define('ATWB_PLUGIN_PATH', __FILE__);
define('ATWB_MENU_ICON_PATH', plugin_dir_url(__FILE__) . '/assets/images/menu-icon.png');

class ATWBInitializer
{
    function init()
    {
        require_once ATWB_PLUGIN_DIR . '/includes/atwb_setup.php';
        require_once ATWB_PLUGIN_DIR . '/includes/atwb_settings.php';
        require_once ATWB_PLUGIN_DIR . '/includes/atwb_enquee.php';
        require_once ATWB_PLUGIN_DIR . '/includes/atwb_shortcode.php';
        add_action('init', array($this, 'atwb_Block'));
        add_action('enqueue_block_assets', array($this, 'atwb_Dash_Icons_For_block'));
    }
    /**
     * This function register block as timeline
     *
     * @return null
     */
    function atwb_Block()
    {
        register_block_type(ATWB_PLUGIN_DIR . '/blocks');
    }

    /**
     * Registering dashicons for block
     *
     * @return null
     */
    function atwb_Dash_Icons_For_block()
    {
        try {
            wp_enqueue_style('dashicons');
        } catch (\Throwable $th) {
            $message = $th->error_message;
        }
    }
}

$timelineinitializer = new ATWBInitializer();
$timelineinitializer->init();

