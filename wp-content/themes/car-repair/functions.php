<?php

require get_stylesheet_directory() . '/customizer/customizer.php';

add_action( 'after_setup_theme', 'car_repair_after_setup_theme' );
function car_repair_after_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "responsive-embeds" );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'car-repair-featured-image', 2000, 1200, true );
    add_image_size( 'car-repair-thumbnail-avatar', 100, 100, true );

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ) );

    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff'
    ) );

    add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

    add_editor_style( array( 'assets/css/editor-style.css') );
}

/**
 * Register widget area.
 */
function car_repair_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'car-repair' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'car-repair' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Page Sidebar', 'car-repair' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'car-repair' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sidebar 3', 'car-repair' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'car-repair' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'car-repair' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'car-repair' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'car-repair' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'car-repair' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'car-repair' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'car-repair' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 4', 'car-repair' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets here to appear in your footer.', 'car-repair' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'car_repair_widgets_init' );

// enqueue styles for child theme
function car_repair_enqueue_styles() {

    wp_enqueue_style( 'car-repair-fonts', automobile_hub_fonts_url(), array(), null );

    // Bootstrap
    wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

    // Theme block stylesheet.
    wp_enqueue_style( 'car-repair-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'car-repair-child-style' ), '1.0' );
    
    // enqueue parent styles
    wp_enqueue_style('automobile-hub-style', get_template_directory_uri() .'/style.css');
    
    // enqueue child styles
    wp_enqueue_style('car-repair-child-style', get_stylesheet_directory_uri() .'/style.css', array('automobile-hub-style'));

    wp_style_add_data('car-repair-child-style', 'rtl', 'replace');
    
    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
}
add_action('wp_enqueue_scripts', 'car_repair_enqueue_styles');

function car_repair_admin_scripts() {
    // Backend CSS
    wp_enqueue_style( 'car-repair-backend-css', get_theme_file_uri( '/assets/css/customizer.css' ) );
}
add_action( 'admin_enqueue_scripts', 'car_repair_admin_scripts' );

define('CAR_REPAIR_CREDIT',__('https://www.themespride.com/themes/free-car-repair-wordpress-theme/','car-repair') );
if ( ! function_exists( 'car_repair_credit' ) ) {
    function car_repair_credit(){
        echo "<a href=".esc_url(CAR_REPAIR_CREDIT)." target='_blank'>".esc_html__('Themespride','car-repair')."</a>";
    }
}

function car_repair_header_style() {
    if ( get_header_image() ) :
    $custom_header = "
        .menubar{
            background-image:url('".esc_url(get_header_image())."');
            background-position: center top;
        }";
        wp_add_inline_style( 'car-repair-child-style', $custom_header );
    endif;
}
add_action( 'wp_enqueue_scripts', 'car_repair_header_style' );

if ( ! defined( 'AUTOMOBILE_HUB_THEME_NAME' ) ) {
    define( 'AUTOMOBILE_HUB_THEME_NAME', esc_html__( 'Car Repair Pro Theme', 'car-repair' ));
}
if ( ! defined( 'AUTOMOBILE_HUB_PRO_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/car-repair-wordpress-theme/'));
}
if ( ! defined( 'AUTOMOBILE_HUB_FREE_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_FREE_THEME_URL', 'https://www.themespride.com/themes/free-car-repair-wordpress-theme/' );
}
if ( ! defined( 'AUTOMOBILE_HUB_DEMO_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_DEMO_THEME_URL', 'https://www.themespride.com/car-repair-pro/' );
}
if ( ! defined( 'AUTOMOBILE_HUB_DOCS_URL' ) ) {
    define( 'AUTOMOBILE_HUB_DOCS_URL', 'https://www.themespride.com/demo/docs/car-repair-lite/' );
}
if ( ! defined( 'AUTOMOBILE_HUB_DOCS_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_DOCS_THEME_URL', 'https://www.themespride.com/demo/docs/car-repair-lite/' );
}
if ( ! defined( 'AUTOMOBILE_HUB_RATE_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_RATE_THEME_URL', 'https://wordpress.org/support/theme/car-repair/reviews/#new-post' );
}
if ( ! defined( 'AUTOMOBILE_HUB_CHANGELOG_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_CHANGELOG_THEME_URL', get_stylesheet_directory() . '/readme.txt' );
}
if ( ! defined( 'AUTOMOBILE_HUB_SUPPORT_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/car-repair/' );
}