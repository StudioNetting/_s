<?php
/**
 * sn functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sn
 */

define( 'SN_THEME_VERSION', '1.1.0' );

if ( ! function_exists( 'sn_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sn_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on sn, use a find and replace
		 * to change 'sn' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sn', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'sn' ),
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
			)
		);

	}
endif;

/**
 * Set assets version number.
 *
 * @return string
 */
function assets_version_number() : string {

	return SN_THEME_VERSION . '-' . filemtime( get_stylesheet_directory() . '/style.css' );
}

/**
 * Enqueue scripts and styles.
 */
function sn_scripts() {
	wp_enqueue_style( 'sn-style', get_stylesheet_uri(), [], assets_version_number() );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'sn-script', get_template_directory_uri() . '/library/js/min/sn-min.js', array(), '20151215', true );

	wp_enqueue_script( 'sn-navigation', get_template_directory_uri() . '/library/js/min/navigation-min.js', array(), '20151215', true );

	wp_enqueue_script( 'sn-skip-link-focus-fix', get_template_directory_uri() . '/library/js/min/skip-link-focus-fix-min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'after_setup_theme', 'sn_setup' );
add_action( 'wp_enqueue_scripts', 'sn_scripts' );

/**
 * Require Theme function files
 */
require get_template_directory() . '/library/files/template-tags.php';
require get_template_directory() . '/library/files/template-functions.php';
require get_template_directory() . '/library/files/theme-admin.php';
require get_template_directory() . '/library/files/theme-images.php';
