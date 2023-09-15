<?php
/**
 * Plugin Name: Steeple Notes Plugin
 * Description: Creates "steeple-notes" custom post type from PDF files containing "steeple" in filename.
 * Version: 1.0
 * Author: Your Name
 */

class SteepleNotesPlugin {

    public function __construct() {
        // add_action('init', array($this, 'register_steeple_notes_post_type'));
        add_action('wp_loaded', array($this, 'process_media_library'));
    }

    public function register_steeple_notes_post_type() {
        $labels = array(
            'name' => 'Steeple Notes',
            'singular_name' => 'Steeple Note',
            'menu_name' => 'Steeple Notes',
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'supports' => array('title'),
        );

        register_post_type('steeple-notes', $args);
    }

    public function process_media_library() {
        // Query PDF files containing "steeple" in their filename
        $pdf_args = array(
            'post_type' => 'attachment',
			'post_status' => 'inherit',
			'post_mime_type' => 'application/pdf',
            'posts_per_page' => -1,
             's' => 'Steeple',
			//  'compare' => 'LIKE',
		);

        $pdf_query = new WP_Query($pdf_args);

        foreach ($pdf_query->posts as $pdf_post) {
		// foreach ($steeple_query->posts as $pdf_post) {
				$pdf_meta = wp_get_attachment_metadata($pdf_post->ID);
            $pub_date = date('Y-m-d', filemtime(get_attached_file($pdf_post->ID)));

            $steeple_note_args = array(
                'post_title' => $pdf_post->post_title,
                'post_type' => 'steeple-notes',
                'post_status' => 'publish',
                'meta_input' => array(
                    'pubtitle' => $pdf_post->post_title,
                    'pubfile' => wp_get_attachment_url($pdf_post->ID),
                    'pubdate' => $pub_date,
                ),
            );

            wp_insert_post($steeple_note_args);
        }
    }
}

// $steeple_notes_plugin = new SteepleNotesPlugin();
