<?php
if (!defined('ABSPATH')) exit;

function modern_full_width_scripts() {
    wp_enqueue_style('modern-full-width-style', get_stylesheet_uri(), array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'modern_full_width_scripts');