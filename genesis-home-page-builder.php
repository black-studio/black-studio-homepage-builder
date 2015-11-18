<?php

/**
 * @link              https://wordpress.org/plugins/genesis-home-page-builder/
 * @since             1.0.0
 * @package           Genesis_Home_Page_Builder
 *
 * @wordpress-plugin
 * Plugin Name:       Genesis Home Page Builder by Black Studio
 * Plugin URI:        https://wordpress.org/plugins/genesis-home-page-builder/
 * Description:       Customize the home page of Genesis framework child themes using Page Builder.
 * Version:           1.0.0
 * Author:            Black Studio
 * Author URI:        http://www.blackstudio.it
 * License:           GPLv3
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       genesis-home-page-builder
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Includes
require_once plugin_dir_path( __FILE__ ) . 'includes/class-genesis-home-page-builder.php';

// Plugin instance
$genesis_home_page_builder = new Genesis_Home_Page_Builder;

// Activation hook
register_activation_hook( __FILE__, array( 'Genesis_Home_Page_Builder', 'activation_hook' ) );
