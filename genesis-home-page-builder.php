<?php
/*
Plugin Name: Genesis Home Page Builder
Plugin URI: http://wordpress.org/extend/plugins/genesis-home-page-builder/
Description: Customize the home page of Genesis framework powered site using Page Builder.
Version: 1.0.0
Author: Black Studio
Author URI: http://www.blackstudio.it
License: GPLv3
Text Domain: genesis-home-page-builder
Domain Path: /languages
*/

// Defines
define( 'GENESIS_HOME_PAGE_BUILDER_VERSION', '1.0.0' );
define( 'GENESIS_HOME_PAGE_BUILDER_DIR', dirname( __FILE__ ) );
define( 'GENESIS_HOME_PAGE_BUILDER_URL', plugin_dir_url( __FILE__ ) );
if ( ! defined('DS')) {
	define( 'DS', DIRECTORY_SEPARATOR);
}

// Includes
require_once GENESIS_HOME_PAGE_BUILDER_DIR . DS . 'includes' . DS . 'class-genesis-home-page-builder.php';

// Plugin instance
$genesis_home_page_builder = new Genesis_Home_Page_Builder;

// Activation hook
register_activation_hook( __FILE__, array( 'Genesis_Home_Page_Builder', 'activation_hook' ) );
