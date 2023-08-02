<div id="pw-header">
	<p>This is the single sermons template.</p>
</div>
<article id="post-<?php the_ID(); ?>" >
	<div class="entry-content-wrap">
		<?php get_header(); ?>
		<?php capweb\display_custom_sermon_fields(); ?>
		<?php capweb\add_sermon_buttons(); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

<?php
if ( is_singular( get_post_type() ) ) {
	// Show post navigation only when the post type is 'post' or has an archive.
	if ( ( 'sermons' === get_post_type() || get_post_type_object( get_post_type() )->has_archive ) && kadence()->show_post_navigation() ) {
		if ( kadence()->option( 'post_footer_area_boxed' ) ) {
			echo '<div class="post-navigation-wrap content-bg entry-content-wrap entry">';
		}
		the_post_navigation(
			apply_filters(
				'kadence_post_navigation_args',
				array(
					'prev_text' => '<div class="post-navigation-sub"><small>' . kadence()->get_icon( 'arrow-left-alt' ) . esc_html__( 'Previous', 'kadence' ) . '</small></div>%title',
					'next_text' => '<div class="post-navigation-sub"><small>' . esc_html__( 'Next', 'kadence' ) . kadence()->get_icon( 'arrow-right-alt' ) . '</small></div>%title',
				)
			)
		);

	}

}
