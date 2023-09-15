<div> In the archive sermon template. </div>
<?php

// You can call this function in your WordPress theme template files like this:
// display_recent_sermons();
$args = array(
    'post_type' => 'sermons',
    'posts_per_page' => -1, // Display all sermons
    'date_query' => array(
        'after' => '1 year ago', // Show posts published after 1 year ago
    ),
);
// Query the posts
$sermon_query = new WP_Query($args);

// Check if there are any sermons
if ($sermon_query->have_posts()) {
    echo '<ul>';
    while ($sermon_query->have_posts()) {
        $sermon_query->the_post();
        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
        //* Display values of custom fields (those that are not empty)
        // display_custom_sermon_fields();
        // display_sermon_featured_image();
        // custom_sermon_post_meta();
    }
    echo '</ul>';
    wp_reset_postdata(); // Reset the post data
} else {
    echo 'No sermons found.';
}
