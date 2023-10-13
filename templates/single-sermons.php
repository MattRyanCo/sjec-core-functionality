<?php
/**
 * Template part for displaying single Sermon post content
 */


?>
<article id="post-<?php the_ID(); ?>" >
	<div class="entry-content-wrap">
		<?php get_header(); ?>
		<?php 
		// display_custom_sermon_fields(); 
			$speaker = rwmb_get_value( 'speaker' );
			$sermon_topic = rwmb_get_value(  'sermon_topic' );
			$sermon_delivery_date = rwmb_get_value(  'sermon_delivery_date' );
			$first_reading_link = rwmb_get_value(  'first_reading_link' );
			$second_reading_link = rwmb_get_value(  'second_reading_link' );
			$gospel_link = rwmb_get_value(  'gospel_link' );
			$sermon_audio_link = rwmb_get_value(  'sermon_audio_link' );
			$sermon_audio_link_new = rwmb_get_value(  'sermon_audio_link_new' );
			$sermon_video_link = rwmb_get_value(  'sermon_video_link' );

			$sermon_audio = rwmb_get_value(  'sermon_audio' );
			$sermon_video = rwmb_get_value(  'sermon_video' );

			
			error_log( '$sermon_audio_link ' . var_export($sermon_audio_link , true ) );
			error_log( print_r( (object)
				[
					'file' => __FILE__,
					'method' => __METHOD__,
					'line' => __LINE__,
					'dump' => [
						$sermon_audio_link, $sermon_audio_file, $first_reading_link,
					],
				], true ) );

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

					if ( $first_reading_link || $second_reading_link || $gospel_link ) {
						echo '<strong>Appointed Passages: </strong>' . '<br>';
						// echo '&nbsp;&nbsp;&nbsp;First Reading: <a href=' . $first_reading_link["url"] . ' target="_blank">' . $first_reading_link["title"] . '</a><br>';
						echo '&nbsp;&nbsp;&nbsp;First Reading: <a href=' . $first_reading_link . ' target="_blank">' . '$first_reading_link' . '</a><br>';
						echo '&nbsp;&nbsp;&nbsp;Second Reading: <a href=' . $second_reading_link . ' target="_blank">' . '$second_reading_link["title"]' . '</a><br>';
						echo '&nbsp;&nbsp;&nbsp;Gospel Reading: <a href=' . $gospel_link . ' target="_blank">' . '$gospel_link["title"]' . '</a><br><br>';
					}

					// add_sermon_buttons();
					echo 'add_sermon_buttons';
					var_dump($sermon_audio_link);
					if ( $sermon_audio_link ) {
						echo '<a href="' . $sermon_audio_link . '" class="post-type-archive-sermons button">Sermon Audio</a>';
					}
					if ( rwmb_get_value(  'sermon_audio_link_new' ) ) {
						echo '<a href="' . rwmb_get_value(  'sermon_audio_link_new' ) . '" class="post-type-archive-sermons button">Sermon Audio</a>';
					}
					if ( rwmb_get_value(  'sermon_video_link' ) ) {
						echo '<a href="' . rwmb_get_value(  'sermon_video_link' ) . '" class="button">Sermon Video</a>';
					}
				echo '</div>';

			}
?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
