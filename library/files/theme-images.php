<?php
/**
 * TODO Functions which enhance the theme by hooking into WordPress
 *
 * @package sn
 */
 
 // Define image sizes that cannot be overriden by a user in the administration.
add_image_size('wysiwyg_large', 800, 9999, false);
add_image_size('wysiwyg_small', 400, 9999, false);


// responsive image size (same ratio)
add_image_size('landscape', 1600, 620, array( 'center', 'center' ));
add_image_size('landscape_tablet', 768, 384, array( 'center', 'top' ));
add_image_size('landscape_medium', 780, 520, array( 'center', 'top' ));


/** 
 * Disable WordPress default image cropping
 */
function sn_unset_wordpress_automatic_image_cropping(){
	update_option('thumbnail_size_h', 0);
	update_option('thumbnail_size_w', 0);
	update_option('medium_size_h', 0);
	update_option('medium_size_w', 0);
	update_option('medium_large_size_h', 0);
	update_option('medium_large_size_w', 0);
	update_option('large_size_h', 0);
	update_option('large_size_w', 0);
}

/** 
 * Add our custom image sizes to WordPress interface so they can be choosable in Admin
 */
function sn_image_size_names_choose($sizes){
    return array_merge($sizes, array(
		'wysiwyg_large' => __('Standard', 'latimpe'),
	));
}

add_action('init', 'sn_unset_wordpress_automatic_image_cropping');
add_filter('image_size_names_choose', 'sn_image_size_names_choose');