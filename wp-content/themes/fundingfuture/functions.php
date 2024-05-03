<?php
if ( ! function_exists( 'site_setup' ) ):
    function site_setup() {
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );

        register_nav_menus(
            array(
                'menu-1' => esc_html__( 'Header' ),
                'menu-2' => esc_html__( 'Footer' ),
                'menu-3' => esc_html__( 'Header - Mobile' ),
            )
        );

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
    }
endif;
add_action( 'after_setup_theme', 'site_setup' );

function site_scripts() {
    wp_enqueue_style( 'stylesheet', get_stylesheet_directory_uri() . '/build/index.css', array(), filemtime(get_stylesheet_directory() . '/build/index.css') );
	wp_enqueue_script(
		'main-js-file',
		get_stylesheet_directory_uri() . '/build/index.js',
		array(),
		filemtime( get_stylesheet_directory() . '/build/index.js' ),
		array(
			'strategy' => 'defer'
		)
	);
    wp_localize_script('main-js-file','site_data',array(
        'site_url' => site_url(),
        'theme_url' => get_template_directory_uri(),
    ));
}
add_action( 'wp_enqueue_scripts', 'site_scripts' );

require_once('inc/post-types.php');
require_once('inc/taxonomies.php');
require_once('inc/functions.php');
require_once('inc/acf.php');
require_once('inc/icon.php');
require_once('inc/resources-filters.php');
require_once('inc/posts-filters.php');