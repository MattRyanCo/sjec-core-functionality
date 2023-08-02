<?php
/**
 * The Core sermon custom post type.
 *
 */

// namespace capweb;

/**
 * [Dashboard] Add Liturgical Season Taxonomy to columns at http://example.com/wp-admin/edit.php?post_type=sermons
 * URL: http://make.wordpress.org/core/2012/12/11/wordpress-3-5-admin-columns-for-custom-taxonomies/
 */

add_filter( 'manage_taxonomies_for_sermons_columns', 'sermons_columns' );
function sermons_columns( $taxonomies ) {

	$taxonomies[] = 'liturgical-season';
	$taxonomies[] = 'series';
	return $taxonomies;

}

//* [All Sermon pages] Function to display values of custom fields (if not empty)

// [All Sermon pages] Show custom taxonomy (ie. Liturgical Season, Series)
//	terms for Sermon CPT single pages, archive page and Liturgical Season taxonomy term pages
add_filter( 'kadence_single_before_entry_content', 'add_custom_sermon_post_meta' );
function add_custom_sermon_post_meta( $post_meta ) {

	if ( is_singular( 'sermons' ) || is_post_type_archive( 'sermons' ) ||  is_tax( 'liturgical-season' ) || is_tax( 'series' ) ) {
			$post_meta = '[post_terms taxonomy="liturgical-season" before="Liturgical Season: "]<br> 	[post_terms taxonomy="series" before="Sermon Series: "]';
	}
	return $post_meta;

}

/**
 * [All Sermon pages] Display Post meta only if the entry has been assigned to any custom taxonomy
 *  (ie. Liturgical Season, Series) term
 *  Removes empty markup, '<p class="entry-meta"></p>' for entries
 *  that have not been assigned to any Liturgical Season
 */
function custom_sermon_post_meta() {

	if ( has_term( '', 'liturgical-season' ) || has_term( '', 'series' ) ) {
		// genesis_post_meta();
		return;
	}

}

