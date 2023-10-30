<?php
/**
 * Template part for displaying single Sermon post content
 */


?>
<article id="post-<?php the_ID(); ?>" >
	<div class="entry-content-wrap">
		<?php get_header(); ?>
		<?php 
			$speaker = rwmb_get_value( 'speaker' );
			$sermon_topic = rwmb_get_value(  'sermon_topic' );
			$sermon_delivery_date = rwmb_get_value(  'sermon_delivery_date' );
			$first_reading_link = rwmb_get_value(  'first_reading_link' );
			$second_reading_link = rwmb_get_value(  'second_reading_link' );
			$gospel_link = rwmb_get_value(  'gospel_link' );

			$sermon_audio = rwmb_get_value(  'sermon_audio' );
			$sermon_video = rwmb_get_value(  'sermon_video' );

			if ( $speaker || $sermon_topic || $sermon_delivery_date || $sermon_audio  || $sermon_video  ) {

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
						echo '&nbsp;&nbsp;&nbsp;First Reading: <a href=' . $first_reading_link . ' target="_blank">' . '$first_reading_link' . '</a><br>';
						echo '&nbsp;&nbsp;&nbsp;Second Reading: <a href=' . $second_reading_link . ' target="_blank">' . '$second_reading_link' . '</a><br>';
						echo '&nbsp;&nbsp;&nbsp;Gospel Reading: <a href=' . $gospel_link . ' target="_blank">' . '$gospel_link' . '</a><br><br>';
					}

					// add_sermon_media files
					if ( $sermon_audio ) {
						echo '<p><strong>Sermon Audio: </strong>';
						$files = rwmb_meta( 'sermon_audio' );
						foreach ( $files as $file ) : ?>
							<a href="<?= $file['url']; ?>"><?= $file['name']; ?></a>
						<?php endforeach;
						echo '</p>';
					}
					if ( $sermon_video ) {
						echo '<p><strong>Sermon Video: </strong>';
						$videos = rwmb_meta( 'sermon_video' ) ?>
						<?php foreach ( $videos as $video ) : ?>
								<?php
								echo $video['title'];
								echo '</p>';
								echo wp_video_shortcode( [
									'src'    => $video['src'],
									'width'  => $video['dimensions']['width'],
									'height' => $video['dimensions']['height'],	
									'poster' => $video['thumb']['src'],	
								] );
								?>
						<?php endforeach ?>
					<?php
					}

				echo '</div>';

			}
?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
