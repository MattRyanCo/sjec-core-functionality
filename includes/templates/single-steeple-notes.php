<?php
/**
 * Template part for displaying single Steeple Notes post content
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content-wrap">
        <div class="entry-content">
			<p>
				<?php
				echo wp_sprintf(
					"Title: %s | Published %s<br><a href='%s'>Click to view/right click to save</a>",
					rwmb_the_value( 'pubtitle'),
					rwmb_the_value( 'pubdate'),
					rwmb_meta( 'pubfile')
				);
				?>
			</p>
        </div>
	</div>
</article>
