<?php 

class Genesis_Home_Page_Builder {

	function __construct() {
		add_filter( 'genesis_pre_get_option_site_layout', array( $this, 'force_layout' ), 50 );
		add_action( 'after_setup_theme', array( $this, 'add_page_builder_support' ) );
		add_action( 'genesis_before', array( $this, 'setup_loop' ) );
	}
	
	// Activation checks
	static function activation_hook() {
		// Check Genesis presence
		if ( 'genesis' != basename( TEMPLATEPATH ) ) {
			deactivate_plugins( plugin_basename( __FILE__ ) ); 
			wp_die( sprintf( __( 'Sorry, you can\'t activate unless you have installed <a href="%s">Genesis</a>', 'genesis-home-page-builder' ), 'http://www.studiopress.com/themes/genesis' ) );
		}
		// Check Page Builder presence
		if ( ! defined( 'SITEORIGIN_PANELS_VERSION' ) ) {
			deactivate_plugins( plugin_basename( __FILE__ ) ); 
			wp_die( sprintf( __( 'Sorry, you can\'t activate unless you have installed <a href="%s">Page Builder by SiteOrigin</a>', 'genesis-home-page-builder' ), 'http://wordpress.org/plugins/siteorigin-panels/' ) );
		}
	}
	
	// Add Page Builder support to theme
	function add_page_builder_support() {
		add_theme_support( 'siteorigin-panels', array(
			'home-page' => true,
			'margin-bottom' => 35,
			'home-page-default' => 'default-home',
			'home-demo-template' => 'home-panels.php',
			'responsive' => true,
		) );
	}
	
	// Force fullwidth layout
	function force_layout( $layout ) {
		if ( is_front_page() ) {
			$layout = 'full-width-content';
		}
		return $layout;
	}
	
	// Setup custom loog in home page
	function setup_loop() {
		if ( is_front_page() ) {
			remove_action( 'genesis_loop', 'genesis_do_loop' );
			add_action( 'genesis_loop', array( $this, 'loop' ) );
		}
	}

	// Render home page
	function loop() {
		if( function_exists( 'siteorigin_panels_render' ) ) {
			echo siteorigin_panels_render( 'home' ); 
		} else {
			genesis_do_loop();
		}
	}

}

