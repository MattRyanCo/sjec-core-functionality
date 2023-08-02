<?php

//namespace capweb;

function display_custom_sermon_fields() {
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
	if ( get_field( 'sermon_audio_link' ) ) {
		echo '<a href="' . get_field( 'sermon_audio_link' ) . '" class="post-type-archive-sermons button">Sermon Audio</a>';
	}
	if ( get_field( 'sermon_audio_link_new' ) ) {
		echo '<a href="' . get_field( 'sermon_audio_link_new' ) . '" class="post-type-archive-sermons button">Sermon Audio</a>';
	}
	if ( get_field( 'sermon_video_link' ) ) {
		echo '<a href="' . get_field( 'sermon_video_link' ) . '" class="button">Sermon Video</a>';
	}

}

