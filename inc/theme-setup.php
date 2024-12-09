<?php
if (!defined('ABSPATH')) exit;

function modern_full_width_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Register navigation menu
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'modern-full-width'),
    ));
}
add_action('after_setup_theme', 'modern_full_width_setup');