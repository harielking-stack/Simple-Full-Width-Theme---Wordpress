<?php
if (!defined('ABSPATH')) exit;

function modern_full_width_customize_register($wp_customize) {
    // Add Header & Footer Settings Section
    $wp_customize->add_section('modern_full_width_header_footer', array(
        'title'    => __('Header & Footer Settings', 'modern-full-width'),
        'priority' => 120,
    ));

    // Header Builder Choice
    $wp_customize->add_setting('header_builder_choice', array(
        'default'           => 'default',
        'sanitize_callback' => 'modern_full_width_sanitize_select',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('header_builder_choice', array(
        'label'    => __('Header Builder', 'modern-full-width'),
        'section'  => 'modern_full_width_header_footer',
        'type'     => 'select',
        'choices'  => array(
            'default'  => __('Default Theme Header', 'modern-full-width'),
            'elementor' => __('Elementor Header', 'modern-full-width'),
            'uae'      => __('UAE Header', 'modern-full-width'),
        ),
    ));

    // Footer Builder Choice
    $wp_customize->add_setting('footer_builder_choice', array(
        'default'           => 'default',
        'sanitize_callback' => 'modern_full_width_sanitize_select',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('footer_builder_choice', array(
        'label'    => __('Footer Builder', 'modern-full-width'),
        'section'  => 'modern_full_width_header_footer',
        'type'     => 'select',
        'choices'  => array(
            'default'  => __('Default Theme Footer', 'modern-full-width'),
            'elementor' => __('Elementor Footer', 'modern-full-width'),
            'uae'      => __('UAE Footer', 'modern-full-width'),
        ),
    ));
}
add_action('customize_register', 'modern_full_width_customize_register');

// Sanitize select
function modern_full_width_sanitize_select($input, $setting) {
    $choices = $setting->manager->get_control($setting->id)->choices;
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}