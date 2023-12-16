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
        get_stylesheet_uri() . '?v=' . time(), // Add cache busting query string
        [],
        null // Set version to null to avoid double version parameters in the URL
    );
}
add_action("wp_enqueue_scripts", "altius_healthcare_enqueue_styles");


//Disable lazy loading for cover images
function disable_lazyload_for_cover_images( $default, $tag_name, $context ) {
    if ( $tag_name === 'img' && isset( $context['class'] ) && strpos( $context['class'], 'wp-block-cover__image-background' ) !== false ) {
        return false;
    }
    return $default;
}
add_filter( 'wp_lazy_loading_enabled', 'disable_lazyload_for_cover_images', 10, 3 );


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
        "services-menu" => __("Services Menu"),
        "company-menu" => __("Company Menu"),
    ]);
}
add_action("init", "register_my_menus");

add_theme_support( 'title-tag' );
function insert_meta_description() {
    if ( is_single() || is_page() ) {
        global $post;
        if( has_excerpt( $post->ID ) ) {
            echo '<meta name="description" content="' . esc_attr( strip_tags( get_the_excerpt() ) ) . '">';
        } else {
            // if there's no excerpt, you can choose to do nothing, or you can use post content as fallback
            $trimmed_content = wp_trim_words( $post->post_content );
            echo '<meta name="description" content="' . esc_attr( strip_tags( $trimmed_content ) ) . '">';
        }
    }
}
add_action('wp_head', 'insert_meta_description');



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

// Add base js
function altius_healthcare_scripts()
{
    wp_enqueue_script(
        "altius-healthcare",
        get_template_directory_uri() . "/assets/js/functions.js",
        ["jquery"],
        "1.0.0",
        true
    );
}
add_action("wp_enqueue_scripts", "altius_healthcare_scripts");

// Services toggle
function enqueue_services_script() {
    if ( is_page_template( 'services.php' ) ) {
        wp_enqueue_script( 'services', get_template_directory_uri() . '/assets/js/services.js', array( 'jquery' ), '1.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'enqueue_services_script' );


function altius_healthcare_customizer( $wp_customize ) {

    // Register the alert bar section
    $wp_customize->add_section(
        'altius_healthcare_alert_bar',
        array(
            'title' => __( 'Alert Bar', 'altius_healthcare' ),
            'priority' => 30,
        )
    );

    // Add settings and controls for the alert bar
    $wp_customize->add_setting(
        'altius_healthcare_alert_bar_text',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'altius_healthcare_alert_bar_text_control',
            array(
                'label' => __( 'Alert Bar Text', 'altius_healthcare' ),
                'section' => 'altius_healthcare_alert_bar',
                'settings' => 'altius_healthcare_alert_bar_text',
            )
        )
    );
// Add a new control for alert bar link
$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'altius_healthcare_alert_bar_link_control',
        array(
            'label' => __( 'Alert Bar Link', 'altius_healthcare' ),
            'section' => 'altius_healthcare_alert_bar',
            'settings' => 'altius_healthcare_alert_bar_link',
            'type' => 'url',
        )
    )
);
    $wp_customize->add_setting(
        'altius_healthcare_alert_bar_visible',
        array(
            'default' => false,
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'altius_healthcare_alert_bar_visible_control',
            array(
                'label' => __( 'Alert Bar Visible', 'altius_healthcare' ),
                'section' => 'altius_healthcare_alert_bar',
                'settings' => 'altius_healthcare_alert_bar_visible',
                'type' => 'checkbox',
            )
        )
    );
    // Add a new setting for alert bar link
$wp_customize->add_setting(
    'altius_healthcare_alert_bar_link',
    array(
        'default' => '',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
    )
);

// Add a new control for alert bar link
$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'altius_healthcare_alert_bar_link_control',
        array(
            'label' => __( 'Alert Bar Link', 'altius_healthcare' ),
            'section' => 'altius_healthcare_alert_bar',
            'settings' => 'altius_healthcare_alert_bar_link',
            'type' => 'url',
        )
    )
);


    // Register the social links section
    $wp_customize->add_section(
        'altius_healthcare_social_links',
        array(
            'title' => __( 'Social Links', 'altius_healthcare' ),
            'priority' => 40,
        )
    );

    // Add settings and controls for the social links
    $social_links = ['twitter', 'youtube', 'facebook', 'instagram', 'tiktok', 'email'];
    foreach ($social_links as $link) {
        $wp_customize->add_setting(
            'altius_healthcare_'.$link.'_link',
            array(
                'default' => '',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'altius_healthcare_'.$link.'_link_control',
                array(
                    'label' => __( ucfirst($link) . ' Link', 'altius_healthcare' ),
                    'section' => 'altius_healthcare_social_links',
                    'settings' => 'altius_healthcare_'.$link.'_link',
                    'type' => 'url',
                )
            )
        );
    }
}

add_action( 'customize_register', 'altius_healthcare_customizer' );


// Make sure the alert bar is visible even if the nav is fixed and 60px tall
add_action( 'wp_footer', function() {
    if( get_theme_mod( 'altius_healthcare_alert_bar_visible' ) ) {
        $alert_bar_text = get_theme_mod( 'altius_healthcare_alert_bar_text' );
        $alert_bar_link = get_theme_mod( 'altius_healthcare_alert_bar_link' );
        echo '<div class="alert-bar">';
        echo '<a href="'.esc_url($alert_bar_link).'">'.esc_html($alert_bar_text).'</a>';
        echo '</div>';
    }
});


// Add aos 
function enqueue_aos_library() {
    wp_enqueue_script( 'aos', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js', array(), '2.1.1', true );
    wp_enqueue_style( 'aos', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css', array(), '2.1.1', 'all' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_aos_library' );

add_theme_support( 'author' );


//enable post template
add_theme_support( 'post-thumbnails' );
// add excerpts to pages
add_post_type_support( 'page', 'excerpt' );


// Custom query for offers
function create_offers_cpt() {
    $args = array(
        'public' => true,
        'label'  => 'Sidebar offers',
        'show_in_rest' => true, // Enable Gutenberg editor
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'), // Ensure 'custom-fields' is included

        // Define other necessary arguments like 'supports', 'labels', etc.
    );
    register_post_type('offer', $args);
}
add_action('init', 'create_offers_cpt');





