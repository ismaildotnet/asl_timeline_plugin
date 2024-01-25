<?php
/**
 * Icon picker box for custom post type Timeline
 *
 * PHP version 7.4.1
 *
 * @category Basefile
 * @package  General
 * @author   Alchemy Software Limited <wordpress@alchemy-bd.com>
 * @license  GPL v2 or later
 * @link     alchemy-bd.com
 */
namespace ATWB\Meta;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Class Timeline_Icon_Meta_Box
 */
class Timeline_Icon_Meta_Box {

    /**
     * Initialize the class
     */
    public function __construct() {
        add_action('add_meta_boxes', array($this, 'add_icon_meta_box'));
        add_action('save_post', array($this, 'save_icon_meta_box'));
    }

    /**
     * Add custom meta box to the edit screen
     */
    public function add_icon_meta_box() {
        add_meta_box(
            'timeline_custom_meta_box',
            'Select Icon',
            array($this, 'render_custom_meta_box'),
            _TIMELINE_POST_TYPE,
            'normal',
            'default'
        );
    }

    /**
     * Render the HTML for the custom meta box
     *
     * @param mixed $post Post object.
     */
    public function render_custom_meta_box($post) {
        $timeline_icon = get_post_meta($post->ID, 'timeline_icon', true);
        $all_dashicons = $this->get_all_dashicons();
        ?>

        <div class="dashicon-picker-aria">
            <label id="togglePicker" for="timeline_icon"><span class="dashicons <?php echo esc_attr($timeline_icon); ?>"></span></label>
            <input name="timeline_icon" id="timeline_icon" type="hidden" value="<?php echo esc_attr($timeline_icon) ?>">
            <div class="icon-picker">
                <?php
                foreach ($all_dashicons as $dashicon) {
                    echo '<span class="dashicons ' . esc_attr($dashicon) . '" data-value="' . esc_attr($dashicon) . '"></span>';
                }
                ?>
            </div>
        </div>

        <script>
            jQuery(document).ready(function ($) {
                $('#togglePicker').on('click', function () {
                    $(".icon-picker").toggleClass('opend');
                });

                $(".icon-picker").on('click', 'span.dashicons', function(){
                    var val = $(this).attr('data-value');
                    $("#timeline_icon").val(val);
                    $('#togglePicker').find("span").removeClass().addClass("dashicons "+val);
                    $(this).parent('div.icon-picker').toggleClass('opend');
                });
            });
        </script>

        <?php
    }

    /**
     * Load all dashicons in an array
     *
     * @return array Dashicons as an array.
     */
    public function get_all_dashicons() {
        $dashicons_css = file_get_contents(admin_url('load-styles.php?c=0&dir=ltr&load=dashicons,admin-bar,buttons,media-views,wp-admin,wp-auth-check&ver=' . get_bloginfo('version')));
        preg_match_all('/\.(dashicons-[a-z0-9-]+)/', $dashicons_css, $matches);

        return $matches[1];
    }

    /**
     * Save the custom field value when the post is saved
     *
     * @param mixed $post_id Post ID.
     */
    public function save_icon_meta_box($post_id) {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        $allowed_roles = array('editor', 'administrator');
        $current_user = wp_get_current_user();

        if (array_intersect($allowed_roles, $current_user->roles)) {
            if (isset($_POST['timeline_icon'])) {
                update_post_meta($post_id, 'timeline_icon', sanitize_text_field($_POST['timeline_icon']));
            }
        }
    }
}

// Instantiate the class
new Timeline_Icon_Meta_Box();
