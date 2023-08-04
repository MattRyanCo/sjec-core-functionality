<?php
/**
 * Plugin Name: Core Functionality for stjameschurch.ws
 * Plugin URI: https://github.com/MattRyanCo/sjec-core-functionality
 * Description: This contains all your site's core functionality so that it is theme independent. Customized by capwebsolutions.com.
 * Version: 2.0.0
 * Author: Cap Web Solutions
 * Author URI: https://capwebsolutions.com
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */

// namespace capweb;

// Plugin Directory
define( 'CORE_FUNCTIONALITY_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

if( ! class_exists( 'Gamajo_Template_Loader' ) ) {
	require CORE_FUNCTIONALITY_PLUGIN_DIR . 'classes/class-gamajo-template-loader.php';
}
require CORE_FUNCTIONALITY_PLUGIN_DIR . 'classes/class-sjec-core-functionality-template-loader.php';

// Taxonomies
include_once( CORE_FUNCTIONALITY_PLUGIN_DIR . '/lib/functions/taxonomies.php' );

// General
include_once( CORE_FUNCTIONALITY_PLUGIN_DIR . '/lib/functions/general.php' );
include_once( CORE_FUNCTIONALITY_PLUGIN_DIR . '/lib/functions/helper-functions.php' );

// Post Types
include_once( CORE_FUNCTIONALITY_PLUGIN_DIR . '/lib/functions/post-types.php' );
include_once( CORE_FUNCTIONALITY_PLUGIN_DIR . '/lib/functions/sermon-cpt.php' );
// include_once( CORE_FUNCTIONALITY_PLUGIN_DIR . '/lib/functions/steeple-notes-cpt.php' );

// TGMPA library and related for Metabox.io
include_once( CORE_FUNCTIONALITY_PLUGIN_DIR . '/metabox/example.php' );
require CORE_FUNCTIONALITY_PLUGIN_DIR . '/metabox/class-steeple-notes-cpt-fields.php';

require 'vendor/autoload.php';

function sjec_core_functionality_sample_shortcode() {

	$templates = new Sjec_Core_Functionality_Template_Loader;

	// Templates will be loaded here
	ob_start();
	$templates->get_template_part( 'single', 'sermons' );
	$templates->get_template_part( 'archive', 'sermons' );
	return ob_get_clean();

}
add_shortcode( 'sjec_sample', 'sjec_core_functionality_sample_shortcode' );

// $sjec_core_functionality_template_loader = new Sjec_Core_Functionality_Template_Loader;

function display_sermon() {
	$sjec_core_functionality_template_loader = new Sjec_Core_Functionality_Template_Loader;

	if ( 'sermons' === get_post_type() ) {
		if (get_post_type_object( get_post_type() )->has_archive ) {
			$sjec_core_functionality_template_loader->get_template_part( 'archive', 'sermons' );
		} else { //single post
			$sjec_core_functionality_template_loader->get_template_part( 'single', 'sermons' );
		}
	}
}
add_action("kadence_single_before_entry_content", "display_sermon");

function display_steeple_notes() {
	$sjec_core_functionality_template_loader = new Sjec_Core_Functionality_Template_Loader;

	if ( 'steeple-notes' === get_post_type() ) {
		if (get_post_type_object( get_post_type() )->has_archive ) {
			$sjec_core_functionality_template_loader->get_template_part( 'single', 'steeple-notes' );
		} else { //single post
			$sjec_core_functionality_template_loader->get_template_part( 'single', 'steeple-notes' );
		}
	}
}
add_action("kadence_single_before_entry_content", "display_steeple_notes");
