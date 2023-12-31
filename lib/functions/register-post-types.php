<?php
/**
 * Post Types
 *
 * This file registers any custom post types
 *
 * @package      SJEC_Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/MattRyanCo/sjec-core-functionality
 * @author       Matt Ryan
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */



add_action( 'init', 'capweb_register_my_sermons_cpt' );
function capweb_register_my_sermons_cpt() {
	$labels = array(
		"name" => __( 'Sermons', '' ),
		"singular_name" => __( 'Sermon', '' ),
		"menu_name" => __( 'Sermons', '' ),
		"all_items" => __( 'All Sermons', '' ),
		"add_new" => __( 'Add Sermon', '' ),
		"add_new_item" => __( 'Add Sermon', '' ),
		"edit_item" => __( 'Edit Sermon', '' ),
		"new_item" => __( 'New Sermon', '' ),
		"view_item" => __( 'View Sermon', '' ),
		"search_items" => __( 'Search Sermons', '' ),
		"not_found" => __( 'No Sermons Found', '' ),
		"not_found_in_trash" => __( 'No Sermons Found In Trash', '' ),
		"parent_item_colon" => __( 'Parent Sermon', '' ),
		"archives" => __( 'Sermon Archives', '' ),
		"insert_into_item" => __( 'Insert into Sermon', '' ),
		"filter_items_list" => __( 'Filter Sermon List', '' ),
		"items_list" => __( 'Sermon List', '' ),
		"parent_item_colon" => __( 'Parent Sermon', '' ),
		);

	$args = array(
		"label" => __( 'Sermons', '' ),
		"labels" => $labels,
		"description" => "Sermon Custom Posts",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "sermons", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-megaphone",
		"supports" => array( "title", "editor", "thumbnail", "author", "custom-fields" ),
		"taxonomies" => array( "category", "post_tag" ),
			);
	register_post_type( "sermons", $args );

// End of capweb_register_my_sermons_cpt()
}
function capweb_register_my_steeple_notes_cpt() {
	$labels = array(
		"name" => __( 'Steeple Notes', '' ),
		"singular_name" => __( 'Steeple Notes', '' ),
		"menu_name" => __( 'Steeple Notes', '' ),
		"all_items" => __( 'All Steeple Notes', '' ),
		"add_new" => __( 'Add Steeple Notes Editon', '' ),
		"add_new_item" => __( 'Add Steeple Notes Editon', '' ),
		"edit_item" => __( 'Edit Steeple Notes', '' ),
		"new_item" => __( 'New Steeple Notes', '' ),
		"view_item" => __( 'View Steeple Notes', '' ),
		"search_items" => __( 'Search Steeple Notes', '' ),
		"not_found" => __( 'No Steeple Notes Found', '' ),
		"not_found_in_trash" => __( 'No Steeple Notes Found In Trash', '' ),
		"parent_item_colon" => __( 'Parent Steeple Notes', '' ),
		"archives" => __( 'Steeple Notes Archives', '' ),
		"insert_into_item" => __( 'Insert into Steeple Notes', '' ),
		"filter_items_list" => __( 'Filter Steeple Notes List', '' ),
		"items_list" => __( 'Steeple Notes List', '' ),
		"parent_item_colon" => __( 'Parent Steeple Notes', '' ),
		);

	$args = array(
		// "label" => __( 'Steeple Notes', '' ),
		"labels" => $labels,
		// "description" => "Parish Newsletter",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		// "map_meta_cap" => true,
		// "hierarchical" => false,
		"rewrite" => array( "slug" => "steeple-notes", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-media-document",
		"supports" => array( 'title', 'thumbnail' ),
		"taxonomies" => array( "category", "post_tag" ),
		);
	register_post_type( "steeple-notes", $args );

// End of capweb_register_my_sermons_cpt()
}
add_action( 'init', 'capweb_register_my_sermons_cpt' );
add_action( 'init', 'capweb_register_my_steeple_notes_cpt' );
