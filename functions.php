<?php
/**
* Avalon functions and definitions
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package WordPress
* @subpackage Avalon
* @since 1.0
*/

function avalon_setup() {
    load_theme_textdomain( 'avalon' );
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'avalon-featured-image', 2000, 1200, true );
    add_image_size( 'avalon-thumbnail-avatar', 100, 100, true );
    $GLOBALS['content_width'] = 1000;

    // This theme uses wp_nav_menu() in three locations.
    register_nav_menus( array(
        'top'    => __( 'Top Menu', 'avalon' ),
        'mobile'    => __( 'Top Mobile Menu', 'avalon' ),
        'social' => __( 'Social Links Menu', 'avalon' ),
    ) );

    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    /*
     * Enable support for Post Formats.
     */
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ) );

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 275,
        'height'      => 70,
        'flex-width'  => true,
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Define and register starter content to showcase the theme on new sites.
    $starter_content = array(
        'widgets' => array(
            // Place three core-defined widgets in the sidebar area.
            'sidebar-1' => array(
                'text_business_info',
                'search',
                'text_about',
            ),

            // Add the core-defined business info widget to the footer 1 area.
            'sidebar-2' => array(
                'text_business_info',
            ),

            // Put two core-defined widgets in the footer 2 area.
            'sidebar-3' => array(
                'text_about',
                'search',
            ),
        ),

        // Default to a static front page and assign the front and posts pages.
        'options' => array(
            'show_on_front' => 'page',
            'page_on_front' => '{{home}}',
            'page_for_posts' => '{{blog}}',
        ),

        // Set the front page section theme mods to the IDs of the core-registered pages.
        'theme_mods' => array(
            'panel_1' => '{{homepage-section}}',
            'panel_2' => '{{about}}',
            'panel_3' => '{{blog}}',
            'panel_4' => '{{contact}}',
        ),

        // Set up nav menus for each of the two areas registered in the theme.
        'nav_menus' => array(
            // Assign a menu to the "top" location.
            'top' => array(
                'name' => __( 'Top Menu', 'avalon' ),
                'items' => array(
                    'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
                    'page_about',
                    'page_blog',
                    'page_contact',
                ),
            ),
            'mobile' => array(
                'name' => __( 'Top Mobile Menu', 'avalon' ),
                'items' => array(
                    'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
                    'page_about',
                    'page_blog',
                    'page_contact',
                ),
            ),
            // Assign a menu to the "social" location.
            'social' => array(
                'name' => __( 'Social Links Menu', 'avalon' ),
                'items' => array(
                    'link_yelp',
                    'link_facebook',
                    'link_twitter',
                    'link_instagram',
                    'link_vk',
                ),
            ),
        ),
    );
    $starter_content = apply_filters( 'avalon_starter_content', $starter_content );
    add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'avalon_setup' );

register_nav_menus(array(
'top'    => __( 'Top Menu', 'avalon' ),
'mobile'    => __( 'Top Mobile Menu', 'avalon' ),
'social' => __( 'Social Links Menu', 'avalon' ),
));

function avalon_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Post Sidebar', 'avalon' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'avalon' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'avalon' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'avalon' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'avalon' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'avalon' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'avalon_widgets_init' );

function avalon_excerpt_more( $link ) {
    if ( is_admin() ) {
        return $link;
    }

    $link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
        esc_url( get_permalink( get_the_ID() ) ),
        /* translators: %s: Name of current post */
        sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'avalon' ), get_the_title( get_the_ID() ) )
    );
    return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'avalon_excerpt_more' );

function jquerymask(){
    wp_register_script( 'jquerymask', get_template_directory_uri() . '/vendor/js/jquery.mask.js', array( 'jquery' ), NULL, false );
    wp_enqueue_script( 'jquerymask' );
}
add_action( 'wp_enqueue_scripts', 'jquerymask' );
function landing(){
    wp_register_script( 'landing', get_template_directory_uri() . '/vendor/js/landing.js', array( '' ), NULL, false );
    wp_enqueue_script( 'landing' );
}
add_action( 'wp_enqueue_scripts', 'landing' );
function gallery(){
    wp_register_script( 'gallery', get_template_directory_uri() . '/vendor/js/gallery.js', array( 'jquery' ), NULL, false );
    wp_enqueue_script( 'gallery' );
}
add_action( 'wp_enqueue_scripts', 'gallery' );
function main(){
    wp_register_script( 'main', get_template_directory_uri() . '/vendor/js/main.js', array( 'jquery' ), NULL, false );
    wp_enqueue_script( 'main' );
}
add_action( 'wp_enqueue_scripts', 'main' );

function script_add_defer_attribute( $tag, $handle ) {
    $handles = array(
        'jquerymask',
        'main',
        'landing',
        'banner',
        'gallery',
        'reviews',
    );
    foreach( $handles as $defer_script) {
        if ( $defer_script === $handle ) {
            return str_replace( ' src', ' defer="defer" async="async" src', $tag );
        }
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'script_add_defer_attribute', 10, 2 );

function wpse_load_css() {
    $plugin_url = get_template_directory_uri( __FILE__ );
    wp_enqueue_style('style', $plugin_url . '/style.css');
    wp_enqueue_style('landing', $plugin_url . '/css/landing.css');
    wp_enqueue_style('reset', $plugin_url . '/css/reset.css');
    wp_enqueue_style('mobile_main', $plugin_url . '/css/mobile_main.css', '', '', 'screen (max-width:800px)');
    wp_enqueue_style('mobile_landing', $plugin_url . '/css/mobile_landing.css', '', '', 'screen (max-width:800px)');
    wp_enqueue_style('gallery', $plugin_url . '/css/gallery.css');
}
//add_action( 'wp_enqueue_scripts', 'wpse_load_css');