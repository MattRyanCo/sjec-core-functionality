<?php
/**
 * Template part for displaying Steeple Notes post archive content
 */

add_filter( 'pre_get_posts', 'modify_steeple_notes_query' );
function modify_steeple_notes_query( $wp_query ) {
  if(is_tax('category')){
    if( $wp_query->query_vars['post_type'] != 'steeple-notes' ) return;
    $wp_query->query_vars['posts_per_page'] = 12;
  }
  return $wp_query;
}


steeple_notes_archive();

function steeple_notes_archive() {
    $args = array(
        'post_type' => 'steeple-notes',
        'posts_per_page' => 12,
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) { ?>
		<div id="archive-container-new" class="content-wrap grid-cols steeple-notes-archive grid-sm-col-2 grid-lg-col-3 item-image-style-above">

		<?php
        while ( $query->have_posts() ) {
            $query->the_post();
			// $pubtitle = rwmb_get_value( 'pubtitle');
			$pubtitle = rwmb_meta( 'pubtitle');
			$pubdate = rwmb_get_value( 'pubdate');
			// $pubfile = rwmb_get_value( 'pubfile');
			// Set Default thumbnail if none provided
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
				} else { ?>
				<img src="<?php bloginfo('template_directory'); ?>/wp-content/uploads/2016/03/Steeple-Notes.jpg" alt="<?php the_title(); ?>" />
				<?php } 
			?>
			<article class="entry content-bg loop-entry post-13851 steeple-notes type-steeple-notes status-publish hentry">
				<div class="entry-content-wrap">
				<header class="entry-header">
					<h2 class="entry-title"><a href="<?php echo get_permalink();?>"><?php echo $pubtitle;?></h2>
					<div><?php echo $pubdate;?></div>
					<footer class="entry-footer">
						<div class="entry-actions">
						<p class="more-link-wrap">
						<a href="<?php echo get_permalink();?>" class="post-more-link">Read <span class="screen-reader-text"><?php echo $pubtitle;?></span>
						<span class="kadence-svg-iconset svg-baseline"><svg aria-hidden="true" class="kadence-svg-icon kadence-arrow-right-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="27" height="28" viewBox="0 0 27 28"><title>Continue</title><path d="M27 13.953c0 0.141-0.063 0.281-0.156 0.375l-6 5.531c-0.156 0.141-0.359 0.172-0.547 0.094-0.172-0.078-0.297-0.25-0.297-0.453v-3.5h-19.5c-0.281 0-0.5-0.219-0.5-0.5v-3c0-0.281 0.219-0.5 0.5-0.5h19.5v-3.5c0-0.203 0.109-0.375 0.297-0.453s0.391-0.047 0.547 0.078l6 5.469c0.094 0.094 0.156 0.219 0.156 0.359v0z"></path>
						</svg></span>
						</a>
						<p>
						</div> <!-- //entry-actions -->
					</footer> <!-- //entry-footer -->
				</div>
			</article>
		<?php
       	wp_reset_postdata();
		}
		?>
		</div>
		<?php
	}
}

