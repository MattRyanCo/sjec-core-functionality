<?php
/**
 * Template part for displaying single Steeple Notes post content
 */
?>
<div id="pw-header">
	<p>This is the single steeple notes template.</p>
</div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content-wrap">
        <div class="entry-content">
			<p>
				<?php
				$pubtitle = rwmb_get_value( 'pubtitle');
				$pubdate = rwmb_get_value( 'pubdate');
				$pubfile = rwmb_get_value( 'pubfile');
				echo wp_sprintf(
					"<strong>Title</strong>: %s | <strong>Published</strong>: %s<br><a href='%s'>Click to view/right click to save</a>",
					$pubtitle,
					$pubdate,
					$pubfile
				);
				?>
			</p>
        </div>
	</div>
</article>
