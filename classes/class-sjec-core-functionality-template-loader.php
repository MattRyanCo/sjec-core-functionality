<?php

/**
 * Template loader for SJEC Core Functionality plugin.
 *
 * Only need to specify class properties here.
 *
 * @package core-functionality
 * @author  Matt Ryan
 */
class Sjec_Core_Functionality_Template_Loader extends Gamajo_Template_Loader {
	  /**
   * Prefix for filter names.
   *
   * @since 1.0.0
   *
   * @var string
   */
  protected $filter_prefix = 'sjec';

  /**
   * Directory name where custom templates for this plugin should be found in the theme.
   *
   * @since 1.0.0
   *
   * @var string
   */
  protected $theme_template_directory = 'sjec-templates';

  /**
   * Reference to the root directory path of this plugin.
   *
   * @since 1.0.0
   *
   * @var string
   */

  protected $plugin_directory = CORE_FUNCTIONALITY_PLUGIN_DIR;

  /**
   * Directory name where templates are found in this plugin.
   *
   * @since 1.1.0
   *
   * @var string
   */

  protected $plugin_template_directory = 'includes/templates';
}

