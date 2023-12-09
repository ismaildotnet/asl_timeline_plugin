<?php
/**
 * This date picker box for custom post type Timeline
 *
 * PHP version 7.4.1
 *
 * @category Basefile
 * @package  General
 * @author   Alchemy Software Limited <wordpress@alchemy-bd.com>
 * @license  GPL v2 or later
 * @link     wordpress.org
 */

/**
 * This function will add custom meta as date picker to TImeline
 *
 * @return null
 */
function Add_Custom_metabox()
{
    add_meta_box(
        'timeline_date_metabox',
        'Timeline Date',
        'Render_Iimeline_Date_metabox',
        _TIMELINE_POST_TYPE, // You can change this to 'page' or a custom post type
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'Add_Custom_metabox');

/**
 * This function will add custom meta as date picker to TImeline
 *
 * @param mixed $post Description of the $post parameter.
 *
 * @return void
 */
function Render_Iimeline_Date_metabox($post)
{
    // Retrieve the current value of the date from post meta
    $timeline_date = get_post_meta($post->ID, 'timeline_date', true);
    ?>
    <input type="date" id="timeline_date" class="timeline_input" name="timeline_date" value="<?php echo esc_attr($timeline_date); ?>" />

    <?php
}
/**
 * This function will save custom meta as date picker to TImeline
 *
 * @param mixed $post_id mixed $post Description of the $post parameter.
 *
 * @return void
 */
function Save_Timeline_Date_metabox($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check if the user has permissions to save data
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save the custom date value
    if (isset($_POST['timeline_date'])) {
        update_post_meta($post_id, 'timeline_date', sanitize_text_field($_POST['timeline_date']));
    }
}

add_action('save_post', 'Save_Timeline_Date_metabox');

?>