<?php

/**
 * tfc_stoveshield functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tfc_stoveshield
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tfc_stoveshield_setup()
{
    /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on tfc_stoveshield, use a find and replace
		* to change 'tfc_stoveshield' to the name of your theme in all the template files.
		*/
    load_theme_textdomain('tfc_stoveshield', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
    add_theme_support('title-tag');

    /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    // register_nav_menus(
    //     array(
    //         'my-primary-menu' => esc_html__('Primary', 'tfc_stoveshield'),
    //         'extra-menu' => __('Secondary Menu')
    //     )
    // );

    /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'tfc_stoveshield_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action('after_setup_theme', 'tfc_stoveshield_setup');


/**
 * Enqueue Scripts and styles
 * @link https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
 */
function  tfc_stoveshield_scripts()
{
    wp_enqueue_style('style.css', get_stylesheet_uri(), array());
    wp_enqueue_script('global-js', get_stylesheet_directory_uri() . '/assets/js/global.js');
    // Home Page Css
    if (is_page('home')) {
        wp_enqueue_style('home-css', get_stylesheet_directory_uri() . '/assets/css/index.css', array(), microtime());
    }
}
add_action('wp_enqueue_scripts', 'tfc_stoveshield_scripts');



/** Allow SVG uploads */
function allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');

/**  Allow SVG files to be uploaded to the media library */
function allow_svg_upload_mime_type($data, $file, $filename, $mimes)
{
    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}
add_filter('wp_check_filetype_and_ext', 'allow_svg_upload_mime_type', 10, 4);


/** This theme uses wp_nav_menu() in one location. */
register_nav_menus(
    array(
        'menu-1' => esc_html__('Primary', 'tfc_stoveshield'),
        'menu-2' => esc_html__('Secondary', 'tfc_stoveshield'),
    )
);


/**
 * Add Custom Sidebars
*/
function tfc_stoveshield_widgetss_init(){

    register_sidebar( array(
        'name'          => __( 'Footer First ', 'textdomain' ),
        'id'            => 'footer_sidebar_1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s flex_column">',
        'after_widget'  => '</li>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer Second', 'textdomain' ),
        'id'            => 'footer_sidebar_2',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget flex_column %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'tfc_stoveshield_widgetss_init');