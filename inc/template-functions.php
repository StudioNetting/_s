<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package sn
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sn_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function sn_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}

// Simply remove anything that looks like an archive title prefix ("Archive:", "Foo:", "Bar:").
function sn_the_archive_title($title){
	return preg_replace('/^\w+: /', '', $title);
}

add_filter( 'body_class', 'sn_body_classes' );
add_filter('get_the_archive_title', 'sn_the_archive_title');

add_action( 'wp_head', 'sn_pingback_header' );
