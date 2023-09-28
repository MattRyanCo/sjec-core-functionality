<?php

//namespace capweb;

function display_custom_sermon_fields() {
	?><h3>Getting sermon fields</h3><?php
	$speaker = rwmb_get_value(  'speaker' );
	$sermon_topic = rwmb_get_value(  'sermon_topic' );
	$sermon_delivery_date = rwmb_get_value(  'sermon_delivery_date' );
	$first_reading_link = rwmb_get_value(  'first_reading_link' );
	$second_reading_link = rwmb_get_value(  'second_reading_link' );
	$gospel_link = rwmb_get_value(  'gospel_link' );
	$sermon_audio_link = rwmb_get_value(  'sermon_audio_link' );
	$sermon_audio_link_new = rwmb_get_value(  'sermon_audio_link_new' );

	$sermon_video_link = rwmb_get_value(  'sermon_video_link' );

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

			add_sermon_buttons();
		echo '</div>';

	}
}



function display_sermon_featured_image() {
	$image_args = array(
		'size' => 'medium',
		'attr' => array(
			'class' => 'alignright',
		),
	);

	// $image = genesis_get_image( $image_args );
	$image = wp_get_attachment_image( $image_args );

	if ( $image ) {
		echo '<a href="' . get_permalink() . '">' . $image .'</a>';
	}

}

function add_sermon_buttons() {
	if ( rwmb_get_value(  'sermon_audio_link' ) ) {
		echo '<a href="' . rwmb_get_value(  'sermon_audio_link' ) . '" class="post-type-archive-sermons button">Sermon Audio</a>';
	}
	if ( rwmb_get_value(  'sermon_audio_link_new' ) ) {
		echo '<a href="' . rwmb_get_value(  'sermon_audio_link_new' ) . '" class="post-type-archive-sermons button">Sermon Audio</a>';
	}
	if ( rwmb_get_value(  'sermon_video_link' ) ) {
		echo '<a href="' . rwmb_get_value(  'sermon_video_link' ) . '" class="button">Sermon Video</a>';
	}

}

function display_recent_sermons() {
    // Define the query parameters
    $args = array(
        'post_type' => 'sermons',
        'posts_per_page' => -1, // Display all sermons
        'date_query' => array(
            'after' => '1 year ago', // Show posts published after 1 year ago
        ),
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