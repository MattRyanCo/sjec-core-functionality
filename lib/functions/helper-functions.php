<?php

function display_recent_sermons() {
    // Define the query parameters

    $args = array(
        'post_type' => 'sermons',
        'posts_per_page' => -1, // Display all sermons
        // 'date_query' => array(
        //     'after' => '1 year ago', // Show posts published after 1 year ago
        // ),
    );
    // Query the posts
    $sermon_query = new WP_Query($args);

    // Check if there are any sermons
    if ($sermon_query->have_posts()) {
        echo '<ul>';
        while ($sermon_query->have_posts()) {
            $sermon_query->the_post();
            echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            //* Display values of custom fields (those that are not empty)
            // display_custom_sermon_fields();
            // display_sermon_featured_image();
            // custom_sermon_post_meta();
        }
        echo '</ul>';
        wp_reset_postdata(); // Reset the post data
    } else {
        echo 'No sermons found.';
    }
}

 
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
