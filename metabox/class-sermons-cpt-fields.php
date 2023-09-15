<?php

/**
 * Class for SJEC Core Functionality Sermons CPT.
 *
 * Only need to specify class properties here.
 *
 * @package SJEC_Core_Functionality
 * @author  Matt Ryan
 */

add_filter( 'rwmb_meta_boxes', 'sjec_build_sermons_metabox' );
function sjec_build_sermons_metabox( $meta_boxes ) {
    $meta_boxes[] = [
        'title'      => 'Sermons Details',
        'post_types' => 'sermons',
        'fields'     => [
            [
                'label' => 'Speaker',
                'name' => 'speaker',
                'type' => 'text',
            ],
            [
                'label' => 'Sermon Topic',
                'name' => 'sermon_topic',
                'type' => 'text',
            ],
            [
                'label' => 'Sermon Delivery Date',
                'name' => 'sermon_delivery_date',
                'type' => 'date_picker',
                'display_format' => 'n/j/Y',
                'first_day' => 1,
                'return_format' => 'd/m/Y',
                'save_format' => 'yymmdd',
            ],
            [
                'label' => 'First Reading Link',
                'name' => 'first_reading_link',
                'type' => 'website',
                'instructions' => 'Create links to the appointed passages. The \'Title\' field will contain the book, chapter and verse, as shown on "The Lectionary Page" - http://www.lectionarypage.net/. The URL will contain the web address.',
                'website_title' => 1,
                ],
            [
                'label' => 'Second Reading Link',
                'name' => 'second_reading_link',
                'aria-label' => '',
                'type' => 'website',
                'website_title' => 1,
                'internal_link' => 0,
                'output_format' => 1,
            ],
            [
                'label' => 'Gospel Link',
                'name' => 'gospel_link',
                'aria-label' => '',
                'type' => 'website',
                'website_title' => 1,
                'internal_link' => 0,
                'output_format' => 1,
            ],
            [
                'label' => 'Sermon Audio Link',
                'name' => 'sermon_audio_link',
                'type' => 'text',
                'instructions' => 'Select sermon audio file',
            ],
            [
                'label' => 'Sermon Audio Link New',
                'name' => 'sermon_audio_link_new',
                'type' => 'file',
                'instructions' => 'Select sermon audio file',
                'return_format' => 'url',
                'mime_types' => 'mp3',
            ],
            [
                'label' => 'Sermon Video Link',
                'name' => 'sermon_video_link',
                'type' => 'text',
            ]
        ],
    ];

    return $meta_boxes;
}
