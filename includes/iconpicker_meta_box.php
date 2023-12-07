<?php
/**
 * This icon picker box for custom post type Timeline
 *
 * PHP version 7.4.1
 *
 * @category Basefile
 * @package  General
 * @author   Alchemy Software Limited <wordpress@alchemy-bd.com>
 * @license  GPL v2 or later
 * @link     alchemy-bd.com
 */
/**
 * Add a custom meta box to the edit screen
 * 
 * @return null
 */
function Add_Timeline_Custom_Meta_box()
{
    add_meta_box(
        'timeline_custom_meta_box',
        'Select Icon',
        'Render_Timeline_Custom_Meta_box',
        _TIMELINE_POST_TYPE,
        'normal',
        'default'
    );
}

add_action('add_meta_boxes', 'Add_Timeline_Custom_Meta_box');

/**
 * Render the HTML for the custom meta box
 * 
 * @param mixed $post as arguments of timline post
 * 
 * @return null
 */

function Render_Timeline_Custom_Meta_box($post)
{
    $timeline_icon = get_post_meta($post->ID, 'timeline_icon', true);
    $all_dashicons = Get_All_dashicons();
    ?>

<div class="dashicon-picker-aria">
    <label id="togglePicker" for="timeline_icon"><span class="dashicons <?php echo esc_attr($timeline_icon); ?>"></label>
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
jQuery(".icon-picker").toggleClass('opend');
            });
jQuery(".icon-picker").on('click', 'span.dashicons', function(){
var val = jQuery(this).attr('data-value');
jQuery("#timeline_icon").val(val);
jQuery('#togglePicker').find("span").removeClass().addClass("dashicons "+val);
jQuery(this).parent('div.icon-picker').toggleClass('opend');
});
        });
    </script>
    <?php
}
/**
 * This Function will load all dashicons in an array
 * 
 * @return array dashicons as array
 */
function Get_All_dashicons()
{

    // Get the content of the Dashicons stylesheet
    $dashicons_css = file_get_contents(admin_url('load-styles.php?c=0&dir=ltr&load=dashicons,admin-bar,buttons,media-views,wp-admin,wp-auth-check&ver=' . get_bloginfo('version')));
    // Extract Dashicons classes from the stylesheet
    preg_match_all('/\.(dashicons-[a-z0-9-]+)/', $dashicons_css, $matches);

    return $matches[1];
}

/**
 * Save the custom field value when the post is saved
 * 
 * @param mixed $post_id 
 * 
 * @return null
 */
function Save_Timeline_Custom_Meta_box($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's role before saving
    $allowed_roles = array('editor', 'administrator'); // Add roles allowed to edit
    $current_user = wp_get_current_user();

    if (array_intersect($allowed_roles, $current_user->roles)) {
        if (isset($_POST['timeline_icon'])) {
            update_post_meta($post_id, 'timeline_icon', sanitize_text_field($_POST['timeline_icon']));
        }
    }
}

add_action('save_post', 'Save_Timeline_Custom_Meta_box');

?>