<?php

/**
 * Class for SJEC Core Functionality Steeple Notes CPT.
 *
 * Only need to specify class properties here.
 *
 * @package core-functionality
 * @author  Matt Ryan
 */

add_filter( 'rwmb_meta_boxes', 'sjec_build_steeple_notes_metabox' );
function sjec_build_steeple_notes_metabox( $meta_boxes ) {
    $meta_boxes[] = [
        'title'      => 'Steeple Notes Issue Details',
        'post_types' => 'steeple-notes',
        'fields'     => [
            [
                'name' => 'Title of publication',
                'id'   => 'pubtitle',
                'type' => 'text',
                'desc' => 'Enter title of this issue, if different from post title above.'
			],
			[
                'name' => 'Steeple Notes Filename',
                'id'   => 'pubfile',
                'type' => 'file_input',
				'max_file_uploads' => 1,
				'mime_type'        => 'application/pdf',
				'max_status'       => false,
                'desc' => 'This filename can be retreived from the Media Library. Use the "Select" button to find it in the media library. Once found in the media library, use the "Copy URL" button to copy it to the clipboard and then paste that filename back here. You can also upload the issue PDF from that screen.'
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
                'desc' => 'Enter the publication date for this issue of Steeple Notes. Click into the entry box to use a date picker.'
            ]
        ],
    ];

    // Add more field groups if you want
    // $meta_boxes[] = ...

    return $meta_boxes;
}