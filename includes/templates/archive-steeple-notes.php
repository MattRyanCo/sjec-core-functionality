<div id="pw-header">
	<p>This is the archive Steeple Notes template.</p>
</div>
<?php
/**
 * Template part for displaying Steeple Notes post archive content
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content-wrap">
        <div class="entry-content">
			<p>
				<?php echo do_shortcode( '[mbv name="steeple-notes-archive"]' ); ?>
			</p>
        </div>
	</div>
</article>

