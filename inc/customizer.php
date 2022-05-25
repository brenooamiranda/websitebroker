<?php

function wPseguros_customizer( $wp_customize ){

    // Copyright

    $wp_customize->add_section(
        'sec_copyright', array(
            'title' => __('Copyright', 'wpseguros'),
            'description' => __('Copyright Section', 'wpseguros'),
        )
    );

    $wp_customize->add_setting(
        'set_copyright', array(
            'type' => 'theme_mod',
            'default' => __('Copyright X - All rights reserved', 'wpseguros'),
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        )
    );

    $wp_customize->add_control(
        'set_copyright', array(
            'label' => __('Copyright', 'wpseguros'),
            'description' => __('Choose whether to show the Services section or not', 'wpseguros'),
            'section' => 'sec_copyright',
            'type' => 'text'
        )
    );

    // Map

    $wp_customize->add_section(
        'sec_map', array(
            'title' => __('Map', 'wpseguros'),
            'description' => __('Map Section', 'wpseguros'),
        )
    );

    // API Key

    $wp_customize->add_setting(
        'set_map_apikey', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        )
    );

    $wp_customize->add_control(
        'set_map_apikey', array(
            'label' => __('API Key', 'wpseguros'),
            'description' => sprintf(
                __('Get your key <a target="_blank" href="%s">here</a>', 'wpseguros'),
                'https://console.developers.google.com/flows/enableapi?apiid=maps_backend'
                ),
            'section' => 'sec_map',
            'type' => 'text'
        )
    );

    // Address

    $wp_customize->add_setting(
        'set_map_address', array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'esc_textarea'
        )
    );

    $wp_customize->add_control(
        'set_map_address', array(
            'label' => __('Type your address here', 'wpseguros'),
            'description' => __('No special characters allowed', 'wpseguros'),
            'section' => 'sec_map',
            'type' => 'textarea'
        )
    );

    // Slider

    $wp_customize->add_section(
        'sec_slider', array(
            'title' => __('Slider', 'wpseguros'),
            'description' => __('Slider Section', 'wpseguros'),
        )
    );

    // Design

    $wp_customize->add_setting(
        'set_slider_option', array(
            'type' => 'theme_mod',
            'default' => '1',
            'sanitize_callback' => 'wpseguros_sanitize_select'
        )
    );

    $wp_customize->add_control(
        'set_slider_option', array(
            'label' => __('Choose your design type here', 'wpseguros'),
            'description' => __('Choose your design type', 'wpseguros'),
            'section' => 'sec_slider',
            'type' => 'select',
            'choices' => array(
                '1' => __('Design Type 1','wpseguros'),
                '2' => __('Design Type 2', 'wpseguros'),
                '3' => __('Design Type 3', 'wpseguros'),
                '4' => __('Design Type 4', 'wpseguros'),
            )
        )
    );

    // Limit

    $wp_customize->add_setting(
        'set_slider_limit', array(
            'type' => 'theme_mod',
            'default' => '5',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        'set_slider_limit', array(
            'label' => __('Number of posts to display', 'wpseguros'),
            'description' => __('Choose the number of posts to be displayed', 'wpseguros'),
            'section' => 'sec_slider',
            'type' => 'number'
        )
    );


}
add_action( 'customize_register', 'wpseguros_customizer' );

function wpseguros_sanitize_select( $input, $setting ){

    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible select options
    $choices = $setting->manager->get_control( $setting->id )->choices;

    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}