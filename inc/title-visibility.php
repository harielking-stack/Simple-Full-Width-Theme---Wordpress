<?php
if (!defined('ABSPATH')) exit;

// Add meta box for title visibility
function modern_full_width_add_title_meta_box() {
    $screens = ['page', 'post'];
    foreach ($screens as $screen) {
        add_meta_box(
            'modern_full_width_title_visibility',
            __('Title Visibility', 'modern-full-width'),
            'modern_full_width_title_meta_box_html',
            $screen,
            'side'
        );
    }
}
add_action('add_meta_boxes', 'modern_full_width_add_title_meta_box');

// Meta box HTML
function modern_full_width_title_meta_box_html($post) {
    $value = get_post_meta($post->ID, '_hide_title', true);
    ?>
    <label>
        <input type="checkbox" name="hide_title" value="1" <?php checked($value, '1'); ?>>
        <?php _e('Hide page title', 'modern-full-width'); ?>
    </label>
    <?php
    wp_nonce_field('modern_full_width_title_visibility', 'modern_full_width_title_nonce');
}

// Save meta box data
function modern_full_width_save_title_meta_box($post_id) {
    if (!isset($_POST['modern_full_width_title_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['modern_full_width_title_nonce'], 'modern_full_width_title_visibility')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $hide_title = isset($_POST['hide_title']) ? '1' : '0';
    update_post_meta($post_id, '_hide_title', $hide_title);
}
add_action('save_post', 'modern_full_width_save_title_meta_box');

// Function to check if title should be hidden
function modern_full_width_is_title_hidden($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    return get_post_meta($post_id, '_hide_title', true) === '1';
}