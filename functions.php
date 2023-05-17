<?php
function altius_healthcare_enqueue_styles() {
    // Add Bootstrap CSS
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.0.0' );

    // Add your theme's main stylesheet
    wp_enqueue_style( 'altius_healthcare-style', get_stylesheet_uri(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'altius_healthcare_enqueue_styles' );

function altius_healthcare_enqueue_scripts() {
    // Add Bootstrap JS
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), '5.0.0', true );

    // Add your theme's main JS file (if you have one)
    // wp_enqueue_script( 'altius_healthcare-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'altius_healthcare_enqueue_scripts' );
