<?php
function altius_healthcare_enqueue_styles()
{
    // Add Bootstrap CSS
    wp_enqueue_style(
        "bootstrap-css",
        get_template_directory_uri() . "/assets/css/bootstrap.min.css",
        [],
        "5.0.0"
    );

    wp_enqueue_style(
        "altius_healthcare-style",
        get_stylesheet_uri(),
        [],
        "1.0.0"
    );
}
add_action("wp_enqueue_scripts", "altius_healthcare_enqueue_styles");

function altius_healthcare_enqueue_scripts()
{
    // Add Bootstrap JS
    wp_enqueue_script(
        "bootstrap-js",
        get_template_directory_uri() . "/assets/js/bootstrap.bundle.min.js",
        [],
        "5.0.0",
        true
    );

    // wp_enqueue_script( 'altius_healthcare-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
}
add_action("wp_enqueue_scripts", "altius_healthcare_enqueue_scripts");

function mytheme_register_block()
{
    wp_register_script(
        "mytheme/cover",
        get_template_directory_uri() . "/block.js",
        ["wp-blocks", "wp-element", "wp-editor"]
    );

    register_block_type("mytheme/cover", [
        "editor_script" => "mytheme/cover",
    ]);
}
add_action("init", "mytheme_register_block");

/**
 * Register Custom Navigation Walker
 */
function register_my_menus()
{
    register_nav_menus([
        "header-menu" => __("Header Menu"),
        "clinic-menu" => __("Clinic Menu"),
    ]);
}
add_action("init", "register_my_menus");

// Add custom logo support
function altius_healthcare_setup()
{
    add_theme_support("custom-logo", [
        "height" => 100,
        "width" => 200,
        "flex-height" => true,
        "flex-width" => true,
        "header-text" => ["site-title", "site-description"],
    ]);
}
add_action("after_setup_theme", "altius_healthcare_setup");

// Add transparent navbar class to navbar when scrolled
function altius_healthcare_scripts()
{
    wp_enqueue_script(
        "altius-healthcare-navbar",
        get_template_directory_uri() . "/assets/js/navbar-translucency.js",
        ["jquery"],
        "1.0.0",
        true
    );
}
add_action("wp_enqueue_scripts", "altius_healthcare_scripts");


