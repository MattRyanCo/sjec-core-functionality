<?php
/**
 * General
 *
 * This file contains any general functions
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/MattRyanCo/sjec-core-functionality
 * @author       Matt Ryan
 */


namespace capweb;

/**
 * Remove Menu Items
 * @since 1.0.0
 *
 * Remove unused menu items by adding them to the array.
 * See the commented list of menu items for reference.
 *
 */
function remove_menus () {
	global $menu;
	$restricted = array(__('Links'));
	// Example:
	//$restricted = array(__('Dashboard'), __('Posts'), __('Media'), __('Links'), __('Pages'), __('Appearance'), __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action( 'admin_menu', 'capweb\remove_menus' );

/**
 * Customize Admin Bar Items
 * @since 1.0.0
 * @link http://wp-snippets.com/addremove-wp-admin-bar-links/
 */
function admin_bar_items() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'new-link', 'new-content' );
}
add_action( 'wp_before_admin_bar_render', 'capweb\admin_bar_items' );


/**
 * Customize Menu Order
 * @since 1.0.0
 *
 * @param array $menu_ord. Current order.
 * @return array $menu_ord. New order.
 *
 */
function custom_menu_order( $menu_ord ) {
	if ( !$menu_ord ) return true;
	return array(
		'index.php', // this represents the dashboard link
		'edit.php?post_type=page', //the page tab
		'edit.php', //the posts tab
		'edit-comments.php', // the comments tab
		'upload.php', // the media manager
    );
}
add_filter( 'custom_menu_order', 'capweb\custom_menu_order' );
add_filter( 'menu_order', 'capweb\custom_menu_order' );

//
// Enqueue needed scripts
add_action( 'wp_enqueue_scripts', 'capweb\enqueue_needed_scripts' );
function enqueue_needed_scripts() {
  wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );
  // wp_enqueue_script( 'cws-retina', get_bloginfo( 'stylesheet_directory' ) . '/js/retina.min.js', array( 'jquery' ), '1.0.0' );
  // REf: http://briangardner.com/optimize-images-retina-display/
  wp_enqueue_script( 'cws-retina', plugins_url('/js/retina.min.js', 'capweb_DIR'), array( 'jquery' ), '1.0.0' );
}

