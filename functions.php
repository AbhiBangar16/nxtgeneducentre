<?php
/**
 * Nxt Gen EduCentre Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function nxtgen_educentre_setup() {
    // Add theme support for various features
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
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('responsive-embeds');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'nxtgen-educentre'),
        'footer' => esc_html__('Footer Menu', 'nxtgen-educentre'),
    ));

    // Add image sizes
    add_image_size('hero-image', 1200, 600, true);
    // Course thumbnail size removed for new course structure
    add_image_size('university-thumbnail', 350, 250, true);
}
add_action('after_setup_theme', 'nxtgen_educentre_setup');

/**
 * Enqueue scripts and styles
 */
function nxtgen_educentre_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('nxtgen-educentre-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue Google Fonts
    wp_enqueue_style('nxtgen-educentre-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@300;400;500&display=swap', array(), null);
    
    // Enqueue custom scripts
    wp_enqueue_script('nxtgen-educentre-script', get_template_directory_uri() . '/js/theme.js', array(), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('nxtgen-educentre-script', 'nxtgen_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('nxtgen_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'nxtgen_educentre_scripts');

/**
 * Customizer additions
 */
function nxtgen_educentre_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Section', 'nxtgen-educentre'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('hero_title', array(
        'default' => 'Welcome to Nxt Gen EduCentre',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'nxtgen-educentre'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Empowering students with quality education and comprehensive learning resources for a brighter future.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero Subtitle', 'nxtgen-educentre'),
        'section' => 'hero_section',
        'type' => 'textarea',
    ));

    // Features Section
    $wp_customize->add_section('features_section', array(
        'title' => __('Features Section', 'nxtgen-educentre'),
        'priority' => 31,
    ));

    // Feature 1
    $wp_customize->add_setting('feature_1_title', array(
        'default' => 'Quality Education',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('feature_1_title', array(
        'label' => __('Feature 1 Title', 'nxtgen-educentre'),
        'section' => 'features_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('feature_1_text', array(
        'default' => 'We provide top-notch educational content and resources designed to help students excel in their academic journey.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('feature_1_text', array(
        'label' => __('Feature 1 Text', 'nxtgen-educentre'),
        'section' => 'features_section',
        'type' => 'textarea',
    ));

    // Feature 2
    $wp_customize->add_setting('feature_2_title', array(
        'default' => 'Expert Guidance',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('feature_2_title', array(
        'label' => __('Feature 2 Title', 'nxtgen-educentre'),
        'section' => 'features_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('feature_2_text', array(
        'default' => 'Our experienced educators and mentors are here to support you every step of the way towards your educational goals.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('feature_2_text', array(
        'label' => __('Feature 2 Text', 'nxtgen-educentre'),
        'section' => 'features_section',
        'type' => 'textarea',
    ));

    // Feature 3
    $wp_customize->add_setting('feature_3_title', array(
        'default' => 'Modern Learning',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('feature_3_title', array(
        'label' => __('Feature 3 Title', 'nxtgen-educentre'),
        'section' => 'features_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('feature_3_text', array(
        'default' => 'Stay ahead with our cutting-edge learning materials and innovative teaching methodologies.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('feature_3_text', array(
        'label' => __('Feature 3 Text', 'nxtgen-educentre'),
        'section' => 'features_section',
        'type' => 'textarea',
    ));

    // CTA Section
    $wp_customize->add_section('cta_section', array(
        'title' => __('Call to Action Section', 'nxtgen-educentre'),
        'priority' => 32,
    ));

    $wp_customize->add_setting('cta_title', array(
        'default' => 'Ready to Start Your Journey?',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cta_title', array(
        'label' => __('CTA Title', 'nxtgen-educentre'),
        'section' => 'cta_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('cta_text', array(
        'default' => 'Explore our courses and take the first step towards achieving your educational dreams.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('cta_text', array(
        'label' => __('CTA Text', 'nxtgen-educentre'),
        'section' => 'cta_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('cta_button_text', array(
        'default' => 'Explore Courses',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cta_button_text', array(
        'label' => __('CTA Button Text', 'nxtgen-educentre'),
        'section' => 'cta_section',
        'type' => 'text',
    ));

    // Footer Section
    $wp_customize->add_section('footer_section', array(
        'title' => __('Footer Settings', 'nxtgen-educentre'),
        'priority' => 33,
    ));

    $wp_customize->add_setting('footer_email', array(
        'default' => 'nxtgen.educentre@gmail.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('footer_email', array(
        'label' => __('Footer Email', 'nxtgen-educentre'),
        'section' => 'footer_section',
        'type' => 'email',
    ));

    $wp_customize->add_setting('footer_phone', array(
        'default' => '93161-30112',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_phone', array(
        'label' => __('Footer Phone', 'nxtgen-educentre'),
        'section' => 'footer_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'nxtgen_educentre_customize_register');

/**
 * Register widget areas
 */
function nxtgen_educentre_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'nxtgen-educentre'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'nxtgen-educentre'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget 1', 'nxtgen-educentre'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here.', 'nxtgen-educentre'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget 2', 'nxtgen-educentre'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here.', 'nxtgen-educentre'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget 3', 'nxtgen-educentre'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Add widgets here.', 'nxtgen-educentre'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'nxtgen_educentre_widgets_init');

/**
 * Custom post types
 */
function nxtgen_educentre_custom_post_types() {
    // Courses Post Type - Removed for new course structure

    // Universities Post Type
    register_post_type('universities', array(
        'labels' => array(
            'name' => 'Universities',
            'singular_name' => 'University',
            'add_new' => 'Add New University',
            'add_new_item' => 'Add New University',
            'edit_item' => 'Edit University',
            'new_item' => 'New University',
            'view_item' => 'View University',
            'search_items' => 'Search Universities',
            'not_found' => 'No universities found',
            'not_found_in_trash' => 'No universities found in trash',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-building',
        'rewrite' => array('slug' => 'universities'),
    ));

    // Downloads Post Type
    register_post_type('downloads', array(
        'labels' => array(
            'name' => 'Downloads',
            'singular_name' => 'Download',
            'add_new' => 'Add New Download',
            'add_new_item' => 'Add New Download',
            'edit_item' => 'Edit Download',
            'new_item' => 'New Download',
            'view_item' => 'View Download',
            'search_items' => 'Search Downloads',
            'not_found' => 'No downloads found',
            'not_found_in_trash' => 'No downloads found in trash',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-download',
        'rewrite' => array('slug' => 'downloads'),
    ));
}
add_action('init', 'nxtgen_educentre_custom_post_types');

/**
 * Custom search form
 */
function nxtgen_educentre_search_form($form) {
    $form = '<form role="search" method="get" class="search-form" action="' . home_url('/') . '">
        <input type="search" class="search-field" placeholder="Search..." value="' . get_search_query() . '" name="s" />
        <button type="submit" class="search-submit">Search</button>
    </form>';
    return $form;
}
add_filter('get_search_form', 'nxtgen_educentre_search_form');

/**
 * Add custom classes to body
 */
function nxtgen_educentre_body_classes($classes) {
    if (is_singular()) {
        $classes[] = 'singular';
    }
    
    if (is_front_page()) {
        $classes[] = 'front-page';
    }
    
    return $classes;
}
add_filter('body_class', 'nxtgen_educentre_body_classes');

/**
 * Custom excerpt length
 */
function nxtgen_educentre_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'nxtgen_educentre_excerpt_length');

/**
 * Custom excerpt more
 */
function nxtgen_educentre_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'nxtgen_educentre_excerpt_more');

/**
 * Security enhancements
 */
function nxtgen_educentre_security_headers() {
    if (!is_admin()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
    }
}
add_action('send_headers', 'nxtgen_educentre_security_headers');

/**
 * Remove WordPress version from head
 */
remove_action('wp_head', 'wp_generator');

/**
 * Disable XML-RPC
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Custom login logo
 */
function nxtgen_educentre_login_logo() {
    echo '<style type="text/css">
        #login h1 a {
            background-image: url(' . get_template_directory_uri() . '/logo.png.png) !important;
            background-size: contain !important;
            width: 300px !important;
            height: 100px !important;
        }
    </style>';
}
add_action('login_head', 'nxtgen_educentre_login_logo');

/**
 * Custom login logo URL
 */
function nxtgen_educentre_login_logo_url() {
    return home_url();
}
add_filter('login_headerurl', 'nxtgen_educentre_login_logo_url');

/**
 * Custom login logo title
 */
function nxtgen_educentre_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter('login_headertext', 'nxtgen_educentre_login_logo_url_title');
?> 