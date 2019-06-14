<?php
/**
 * Functions which enhance the usability of WordPress Admin TODO
 *
 * @package sn
 */
 
 /**
 * Add options for the site footer to the Apperance menu.
 */
function sn_admin_menu() { 
	
	if( function_exists('acf_add_options_page') ) {
	    // add sub page to the menu page 'Apperance'
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Footer settings',
			'menu_title' 	=> 'Footer',
			'parent_slug' 	=> 'themes.php',
		));
	}
	
	//remove_menu_page( 'edit-comments.php' ); 	//the theme does not use comments
	
	if (current_user_can('editor')) {
		remove_menu_page( 'tools.php' );		//Tools
		//remove_menu_page( 'ajax-load-more');    //plugin ajax load more
		
	}
}

 /**
 * Add capabilites so editors can edit the menu.
 */
function sn_theme_caps(){  
	$role = get_role("editor"); 
	$role->add_cap( 'edit_theme_options' );	
}

/**
 * Modify the primary toolbar
 */
function sn_mce_buttons($buttons){
	return array_diff($buttons, array(
			'alignleft', 'aligncenter', 'alignright', 'alignjustify', 'wp_more', 'blockquote'
		)
	);
}

/**
 * Modify the advanced toolbar (can be toggled on/off by user)
 */
function sn_mce_buttons_2($buttons){
	return array_diff($buttons, array(
			'forecolor', 'strikethrough', 'hr', 'outdent', 'indent'
		)
	);
}

//not possible to edit the code in the admin
define( 'DISALLOW_FILE_EDIT', true );

add_action('admin_menu', 'sn_admin_menu', 999999);
add_action( 'admin_init', 'sn_theme_caps');

add_filter('mce_buttons', 'sn_mce_buttons');
add_filter('mce_buttons_2', 'sn_mce_buttons_2');
 
 