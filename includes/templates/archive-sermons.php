<?php
//* Display values of custom fields (those that are not empty)
// add_action( 'kadence_entry_header', 'display_custom_sermon_fields' );
display_custom_sermon_fields();
//* Add post image in Entry Content above Excerpt
// add_action( 'kadence_single_before_entry_content', 'display_sermon_featured_image', 9 );
display_sermon_featured_image();
// add_action( 'kadence_after_content', 'custom_sermon_post_meta' );
custom_sermon_post_meta();

