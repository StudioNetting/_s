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
	
	if (current_user_can('editor')) { //Remove options in menu for the editor role
		remove_menu_page( 'tools.php' );						//Remove tools
		//remove_menu_page( 'ajax-load-more');    				//Remove plugin ajax load more
		remove_submenu_page( 'themes.php', 'themes.php' ); 		//Remove themes options
		remove_submenu_page( 'themes.php', 'widgets.php' ); 	//Remove widgets
	    remove_submenu_page( 'themes.php', 'customize.php' );	//Remove customize options
	    global $submenu;
	    unset($submenu['themes.php'][6]);
		
	}
}

 /**
 * Change capabilities of the editor role
 */
function sn_theme_caps(){  
	$role = get_role("editor"); 
	$role->add_cap( 'edit_theme_options' ); //Edit menu
	add_capability_edit_users($role); // Edit users
}

//Add ability to change, delete or add users
function add_capability_edit_users($role){
    $role->add_cap('edit_users');
    $role->add_cap('list_users');
    $role->add_cap('create_users');
    $role->add_cap('add_users');
    $role->add_cap('delete_users');
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
 
 