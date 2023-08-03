<div id="pw-header">
	<p>This is the single Steeple Notes template.</p>
</div>
<article id="post-<?php the_ID(); ?>" >
	<div class="entry-content-wrap">
		<?php get_header(); ?>
		<?php $steeple_notes = get_post_meta( $post_id, 'wp_custom_pdf_attachment', true ); ?>
		<?php
		error_log( print_r( (object)
			[
				'file' => __FILE__,
				'method' => __METHOD__,
				'line' => __LINE__,
				'dump' => [
					$post_id, $steeple_notes,
				],
			], true ) );
			?>
		<?php $steeple_notes['url']; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->


