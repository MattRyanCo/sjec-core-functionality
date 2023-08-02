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

namespace capweb;

// Plugin Directory
define( 'CORE_DIR', dirname( __FILE__ ) );

// Taxonomies
include_once( CORE_DIR . '/lib/functions/taxonomies.php' );

// General
include_once( CORE_DIR . '/lib/functions/general.php' );

// Post Types
include_once( CORE_DIR . '/lib/functions/post-types.php' );
include_once( CORE_DIR . '/inc/functions/sermon-cpt.php' );
