<?php
/**
 * Taxonomies
 *
 * This file registers any custom taxonomies
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/billerickson/Core-Functionality
 * @author       Bill Erickson <bill@billerickson.net>
 * @copyright    Copyright (c) 2011, Bill Erickson
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */


add_action( 'init', 'cptui_register_my_taxes' );
function cptui_register_my_taxes() {
	$labels = array(
		"name" => __( 'Liturgical Seasons', '' ),
		"singular_name" => __( 'Liturgical Season', '' ),
		"all_items" => __( 'All Liturgical Seasons', '' ),
		"edit_item" => __( 'Edit Liturgical Season', '' ),
		"view_item" => __( 'View Liturgical Season', '' ),
		"update_item" => __( 'Update Liturgical Season', '' ),
		"add_new_item" => __( 'Add New Liturgical Season', '' ),
		"new_item_name" => __( 'New Liturgical Season', '' ),
		"search_items" => __( 'Search Liturgical Seasons', '' ),
		"not_found" => __( 'No Liturgical Seasons Found', '' ),
		"no_terms" => __( 'No Liturgical Seasons', '' ),
		);

	$args = array(
		"label" => __( 'Liturgical Seasons', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Liturgical Seasons",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'liturgical-season', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "liturgical-season", array( "sermons" ), $args );

	$labels = array(
		"name" => __( 'Series', '' ),
		"singular_name" => __( 'Series', '' ),
		"menu_name" => __( 'Series', '' ),
		"all_items" => __( 'All Series', '' ),
		"edit_item" => __( 'Edit Series', '' ),
		"view_item" => __( 'View Series', '' ),
		"update_item" => __( 'Update Series', '' ),
		"add_new_item" => __( 'Add New Series', '' ),
		"new_item_name" => __( 'New Series', '' ),
		"search_items" => __( 'Search Series', '' ),
		"not_found" => __( 'No Series Found', '' ),
		"no_terms" => __( 'No Series', '' ),
		);

	$args = array(
		"label" => __( 'Series', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Series",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'series', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "series", array( "sermons" ), $args );

// End cptui_register_my_taxes()
}


add_action( 'init', 'cptui_register_my_taxes' );