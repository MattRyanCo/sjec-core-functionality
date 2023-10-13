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
        'context' => 'normal',
        'fields'     => [
            [
                'name' => 'Speaker',
                'id' => 'speaker',
                'type' => 'text',
            ],
            [
                'name' => 'Sermon Topic',
                'id' => 'sermond_topic',
                'type' => 'text',
            ],
            [
                'name' => 'Sermon Delivery Date',
                'id' => 'sermond_delivery_date',
                'type' => 'date_picker',
                'display_format' => 'n/j/Y',
                'first_day' => 1,
                'return_format' => 'd/m/Y',
                'save_format' => 'yymmdd',
            ],
            [
                'name' => 'First Reading Link',
                'id' => 'first_reading_link',
                'type' => 'url',
                'desc' => 'Create links to the appointed passages. The \'Title\' field will contain the book, chapter and verse, as shown on "The Lectionary Page" - http://www.lectionarypage.net/. The URL will contain the web address.',
                'website_title' => 1,
                ],
            [
                'name' => 'Second Reading Link',
                'id' => 'second_reading_link',
                'aria-label' => '',
                'type' => 'website',
                'website_title' => 1,
                'internal_link' => 0,
                'output_format' => 1,
            ],
            [
                'name' => 'Gospel Link',
                'id' => 'gospel_link',
                'aria-label' => '',
                'type' => 'website',
                'website_title' => 1,
                'internal_link' => 0,
                'output_format' => 1,
            ],
            [
                'name' => 'Sermon Audio',
                'id' => 'sermon_audio',
                'type' => 'file_advanced',
                // 'return_format' => 'url',
                'mime_types' => 'mp3',
                'desc' => 'Sermon audio file via media library.',
                'max_file_uploads' => 1,
            ],
            [
                'name' => 'Sermon Video',
                'id' => 'sermon_video',
                'type' => 'video',
                'desc' => 'Sermon video file via media library.',
                'max_file_uploads' => 1,
            ]
        ],
    ];

    return $meta_boxes;
}
