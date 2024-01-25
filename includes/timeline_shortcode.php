<?php
/**
 * This short code to use the timeline in page 
 *
 * PHP version 7.4.1
 *
 * @category Basefile
 * @package  General
 * @author   Alchemy Software Limited <wordpress@alchemy-bd.com>
 * @license  GPL v2 or later
 * @link     wordpress.org
 */
namespace ATWB\Shortcode;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class TimelineShortcode {
    public function __construct() {
        add_shortcode('timeline_shortcode', array($this, 'timeline_Shortcode_function'));
    }

    /**
     * This function will generate short code
     * 
     * @return null
     */
    public function timeline_Shortcode_function() {
        $ascending_order = get_option('show_timeline_ascending_by_timeline_date', 0);

        $args = array(
            'post_type'      => _TIMELINE_POST_TYPE, // Replace with your actual post type
            'posts_per_page' => get_option('timeline_maximum_item', 20),
            'meta_key'       => 'timeline_date',
            'orderby'        => 'meta_value', // Order by the value of the meta key
            'order'          => $ascending_order ? 'ASC' : 'DESC', // Use 'ASC' for ascending if 1, otherwise 'DESC'
        );

        $timeline_query = new \WP_Query($args);
        ob_start();
        if ($timeline_query->have_posts()) {
           include plugin_dir_path(__FILE__) . '/timeline_config.php';
            ?>
            <div class="timeline_aria">
                <div class="timeline_items">
                    <?php
                    while ($timeline_query->have_posts()) {
                        $timeline_query->the_post();
                        include plugin_dir_path(__FILE__) . '/templates/timeline_item.php';
                    }
                    ?>
                </div>
            </div>
            <?php
        } else {
            ?> <h4>No item in the timeline</h4> <?php
        }
        wp_reset_postdata();
        return ob_get_clean(); // Return the buffered content
    }
}

new TimelineShortcode();
?>
