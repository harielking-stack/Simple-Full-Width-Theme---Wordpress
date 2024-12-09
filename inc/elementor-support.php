<?php
if (!defined('ABSPATH')) exit;

// Support for Elementor Header & Footer
function modern_full_width_header_footer_support() {
    add_theme_support('header-footer-elementor');
}
add_action('after_setup_theme', 'modern_full_width_header_footer_support');

// Check if Elementor Header Footer Builder is active
function modern_full_width_header_footer_exists() {
    return function_exists('hfe_header_enabled') && function_exists('hfe_footer_enabled');
}

// Get Elementor Header
function modern_full_width_get_header() {
    if (modern_full_width_header_footer_exists() && hfe_header_enabled()) {
        hfe_render_header();
        return true;
    }
    return false;
}

// Get Elementor Footer
function modern_full_width_get_footer() {
    if (modern_full_width_header_footer_exists() && hfe_footer_enabled()) {
        hfe_render_footer();
        return true;
    }
    return false;
}