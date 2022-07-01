<?php

/**
 * @link              https://wordpress.org/plugins/black-studio-homepage-builder/
 * @since             1.0.0
 * @package           Black_Studio_Homepage_Builder
 *
 * @wordpress-plugin
 * Plugin Name:       Black Studio Homepage Builder for Genesis
 * Plugin URI:        https://wordpress.org/plugins/black-studio-homepage-builder/
 * Description:       Customize the home page of Genesis framework child themes using Page Builder by SiteOrigin.
 * Version:           1.0.3
 * Author:            Black Studio
 * Author URI:        http://www.blackstudio.it
 * License:           GPLv3
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       black-studio-homepage-builder
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Includes
require_once plugin_dir_path( __FILE__ ) . 'includes/class-black-studio-homepage-builder.php';

// Plugin instance
$black_studio_homepage_builder = new Black_Studio_Homepage_Builder;

// Activation hook
register_activation_hook( __FILE__, array( 'Black_Studio_Homepage_Builder', 'activation_hook' ) );
