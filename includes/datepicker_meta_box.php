<?php
function add_custom_metabox() {
    add_meta_box(
        'timeline_date_metabox',
        'Timeline Date',
        'render_timeline_date_metabox',
        _timeline_post_type,  // You can change this to 'page' or a custom post type
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'add_custom_metabox');

function render_timeline_date_metabox($post) {
    // Retrieve the current value of the date from post meta
    $timeline_date = get_post_meta($post->ID, 'timeline_date', true);
    ?>
    <input type="date" id="timeline_date" class="timeline_input" name="timeline_date" value="<?php echo esc_attr($timeline_date); ?>" />

    <?php
}

function save_timeline_date_metabox($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Check if the user has permissions to save data
    if (!current_user_can('edit_post', $post_id)) return;

    // Save the custom date value
    if (isset($_POST['timeline_date'])) {
        update_post_meta($post_id, 'timeline_date', sanitize_text_field($_POST['timeline_date']));
    }
}

add_action('save_post', 'save_timeline_date_metabox');

?>