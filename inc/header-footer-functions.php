<?php
if (!defined('ABSPATH')) exit;

function modern_full_width_get_header_type() {
    return get_theme_mod('header_builder_choice', 'default');
}

function modern_full_width_get_footer_type() {
    return get_theme_mod('footer_builder_choice', 'default');
}

function modern_full_width_render_header() {
    $header_type = modern_full_width_get_header_type();
    
    switch ($header_type) {
        case 'elementor':
            if (function_exists('hfe_render_header')) {
                hfe_render_header();
                return true;
            }
            break;
            
        case 'uae':
            if (function_exists('uael_header_template')) {
                uael_header_template();
                return true;
            }
            break;
            
        default:
            return false;
    }
    
    return false;
}

function modern_full_width_render_footer() {
    $footer_type = modern_full_width_get_footer_type();
    
    switch ($footer_type) {
        case 'elementor':
            if (function_exists('hfe_render_footer')) {
                hfe_render_footer();
                return true;
            }
            break;
            
        case 'uae':
            if (function_exists('uael_footer_template')) {
                uael_footer_template();
                return true;
            }
            break;
            
        default:
            return false;
    }
    
    return false;
}