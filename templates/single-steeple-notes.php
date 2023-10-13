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
				if ( "" != rwmb_get_value( 'pubtitle') ) {
					$pubtitle = rwmb_get_value( 'pubtitle');
				} else {
					$pubtitle = get_the_title( );
				}
				$pubdate = rwmb_get_value( 'pubdate');
				$pubfile = rwmb_get_value( 'pubfile');
				echo wp_sprintf(
					"<strong>Title</strong>: %s | <strong>Published</strong>: %s<br><a href='%s'>Click to view or download.</a>",
					$pubtitle,
					$pubdate,
					$pubfile
				);
				?>
			</p>
        </div>
	</div>
</article>
