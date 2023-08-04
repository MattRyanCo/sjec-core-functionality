<?php

/**
 * Class for SJEC Core Functionality Steeple Notes CPT.
 *
 * Only need to specify class properties here.
 *
 * @package core-functionality
 * @author  Matt Ryan
 */

add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {
    $meta_boxes[] = [
        'title'      => 'Steeple Notes Issue Details',
        'post_types' => 'steeple-notes',
        'fields'     => [
            [
                'name' => 'Title of publication',
                'id'   => 'pubtitle',
                'type' => 'text',
			],
			[
                'name' => 'Steeple Notes File',
                'id'   => 'pubfile',
                'type' => 'file_input',
				'max_file_uploads' => 1,
				'mime_type'        => 'application/pdf',
				'max_status'       => false,
            ],
			[
                'name' => 'Publication Date',
                'id'   => 'pubdate',
                'type' => 'date',
				'js_options' => [
					'dateFormat'      => 'mm-dd-yy',
					'showButtonPanel' => false,
				],
				'save-format' => 'Y-m-d',
				'inline'    => false,
				'timestamp' => false,
            ]
        ],
    ];

    // Add more field groups if you want
    // $meta_boxes[] = ...

    return $meta_boxes;
} );
