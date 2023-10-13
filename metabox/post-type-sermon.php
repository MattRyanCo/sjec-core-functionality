<?php
/**
 * Post Types
 *
 * This file registers the Sermons custom post type
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/capwebsolutions/penncat-core-functionality
 * @author       Matt Ryan <matt@capwebsolutions.com>
 * @copyright    Copyright (c) 2023, Matt Ryan
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

add_action( 'init', 'capweb_register_sermon_post_type' );
function capweb_register_sermon_post_type() {
	$args = [
		'label'  => esc_html__( 'Sermon', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Sermons', 'sjec-core-functionality' ),
			'name_admin_bar'     => esc_html__( 'Sermon', 'sjec-core-functionality' ),
			'add_new'            => esc_html__( 'Add Sermon', 'sjec-core-functionality' ),
			'add_new_item'       => esc_html__( 'Add new Sermon', 'sjec-core-functionality' ),
			'new_item'           => esc_html__( 'New Sermon', 'sjec-core-functionality' ),
			'edit_item'          => esc_html__( 'Edit Sermon', 'sjec-core-functionality' ),
			'view_item'          => esc_html__( 'View Sermon', 'sjec-core-functionality' ),
			'update_item'        => esc_html__( 'View Sermon', 'sjec-core-functionality' ),
			'all_items'          => esc_html__( 'All Sermons', 'sjec-core-functionality' ),
			'search_items'       => esc_html__( 'Search Sermons', 'sjec-core-functionality' ),
			'parent_item_colon'  => esc_html__( 'Parent Sermon', 'sjec-core-functionality' ),
			'not_found'          => esc_html__( 'No Sermons found', 'sjec-core-functionality' ),
			'not_found_in_trash' => esc_html__( 'No Sermons found in Trash', 'sjec-core-functionality' ),
			'name'               => esc_html__( 'Sermons', 'sjec-core-functionality' ),
			'singular_name'      => esc_html__( 'Sermon', 'sjec-core-functionality' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-megaphone',
		'menu_position'       => 80,
		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'custom-fields',
		],
		'taxonomies' => [
			// 'category',
			// 'tag',
		],
		'rewrite' => true
	];

	register_post_type( 'sermons', $args );
}