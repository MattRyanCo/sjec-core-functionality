<?php
/**
 * The Core sermon custom post type.
 *
 */

namespace capweb;

/**
 * [Dashboard] Add Liturgical Season Taxonomy to columns at http://example.com/wp-admin/edit.php?post_type=sermons
 * URL: http://make.wordpress.org/core/2012/12/11/wordpress-3-5-admin-columns-for-custom-taxonomies/
 */

add_filter( 'manage_taxonomies_for_sermons_columns', 'capweb\cws_sermons_columns' );
function cws_sermons_columns( $taxonomies ) {

	$taxonomies[] = 'liturgical-season';
	$taxonomies[] = 'series';
	return $taxonomies;

}

//* [All Sermon pages] Function to display values of custom fields (if not empty)
function cws_display_custom_sermon_fields() {

	$speaker = get_field( 'speaker' );
	$sermon_topic = get_field( 'sermon_topic' );
	$sermon_delivery_date = get_field( 'sermon_delivery_date' );
	$first_reading_link = get_field( 'first_reading_link' );
	$second_reading_link = get_field( 'second_reading_link' );
	$gospel_link = get_field( 'gospel_link' );
	$sermon_audio_link = get_field( 'sermon_audio_link' );
	$sermon_audio_link_new = get_field( 'sermon_audio_link_new' );

	$sermon_video_link = get_field( 'sermon_video_link' );

	if ( $speaker || $sermon_topic || $sermon_delivery_date || $sermon_audio_link  || $sermon_audio_link_new  || $sermon_video_link  ) {

		echo '<div class="sermon-meta">';

			if ( $speaker ) {
				echo '<p><strong>Speaker</strong>: ' . $speaker . '</p>';
			}

			if ( $sermon_topic ) {
				echo '<p><strong>Topic</strong>: ' . $sermon_topic . '</p>';
			}

			if ( $sermon_delivery_date ) {
				echo '<p><strong>Date Delivered</strong>: ' . substr($sermon_delivery_date,4,2) . '/' . substr($sermon_delivery_date,6,2) . '/' . substr($sermon_delivery_date,0,4) . '</p>';
			}

			if ( $first_reading_link|| $second_reading_link || $gospel_link ) {
				echo '<strong>Appointed Passages: </strong>' . '<br>';
				echo '&nbsp;&nbsp;&nbsp;First Reading: <a href=' . $first_reading_link["url"] . ' target="_blank">' . $first_reading_link["title"] . '</a><br>';
				echo '&nbsp;&nbsp;&nbsp;Second Reading: <a href=' . $second_reading_link["url"] . ' target="_blank">' . $second_reading_link["title"] . '</a><br>';
				echo '&nbsp;&nbsp;&nbsp;Gospel Reading: <a href=' . $gospel_link["url"] . ' target="_blank">' . $gospel_link["title"] . '</a><br><br>';
			}

			if ( $sermon_audio_link ) {
				echo '<a href=' . $sermon_audio_link . ' class="button">Sermon Audio</a>';
			} elseif ( $sermon_audio_link_new ) {
			echo '<a href=' . $sermon_audio_link_new . ' class="button">Sermon Audio</a>';
			}
			if ( $sermon_video_link ) {
				echo '<a href="' . $sermon_video_link . '" class="button">Sermon Video</a>';
			}

		echo '</div>';

	}
}

// [All Sermon pages] Show custom taxonomy (ie. Liturgical Season, Series)
//	terms for Sermon CPT single pages, archive page and Liturgical Season taxonomy term pages
add_filter( 'kadence_single_before_entry_content', 'capweb\cws_add_custom_sermon_post_meta' );
function cws_add_custom_sermon_post_meta( $post_meta ) {

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
function cws_custom_sermon_post_meta() {

	if ( has_term( '', 'liturgical-season' ) || has_term( '', 'series' ) ) {
		// genesis_post_meta();
		echo "Do post_meta here.";
	}

}

/**
 * [WordPress] Template Redirect
 * Use archive-sermons.php for Liturgical Season taxonomy archives.
 */
add_filter( 'template_include', 'capweb\cws_sermon_template_redirect' );
function cws_sermon_template_redirect( $template ) {

	if ( is_tax( 'liturgical-season' ) ||  is_tax( 'series' ) )
		$template = get_query_template( 'archive-sermons' );
	return $template;

}
