<?php
/**
 * The Core Steeple Notes custom post type.
 *
 */
function add_custom_meta_boxes() {
    add_meta_box('wp_custom_pdf_attachment', 'Steeple Notes Media', 'wp_custom_pdf_attachment', 'steeple-notes', 'normal', 'high');
}
// add_action('add_meta_boxes', 'add_custom_meta_boxes');

function wp_custom_pdf_attachment() {
    wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_pdf_attachment_nonce');
    $html = '<p class="description">';
    $html .= 'Upload your PDF here.';
    $html .= '</p>';
    $html .= '<input type="file" id="wp_custom_pdf_attachment" name="wp_custom_pdf_attachment" value="" size="25">';
    echo $html;
}

// add_action('save_post', 'save_custom_meta_data');
function save_custom_meta_data($id) {
    if(!empty($_FILES['wp_custom_pdf_attachment']['name'])) {
        $supported_types = array('application/pdf');
        $arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_pdf_attachment']['name']));
        $uploaded_type = $arr_file_type['type'];

        if(in_array($uploaded_type, $supported_types)) {
            $upload = wp_upload_bits($_FILES['wp_custom_pdf_attachment']['name'], null, file_get_contents($_FILES['wp_custom_pdf_attachment']['tmp_name']));
            if(isset($upload['error']) && $upload['error'] != 0) {
                wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
            } else {
                update_post_meta($id, 'wp_custom_pdf_attachment', $upload);
            }
        }
        else {
            wp_die("The file type that you've uploaded is not a PDF.");
        }
    }
}

function update_edit_form() {
    echo ' enctype="multipart/form-data"';
}
// add_action('post_edit_form_tag', 'update_edit_form');
