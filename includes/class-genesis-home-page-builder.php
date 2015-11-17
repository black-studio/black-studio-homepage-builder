<?php 

class Genesis_Home_Page_Builder {

	function __construct() {
		add_filter( 'genesis_pre_get_option_site_layout', array( $this, 'force_layout' ), 50 );
		add_filter( 'body_class', array( $this, 'body_class' ) ) ;
		add_action( 'admin_init', array( $this, 'add_meta_boxes' ) );
		add_action( 'admin_init', array( $this, 'save_options' ) );
		add_action( 'after_setup_theme', array( $this, 'add_page_builder_support' ) );
		add_action( 'genesis_before', array( $this, 'setup_loop' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_style' ) );
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

	// Add meta box options 
	function add_meta_boxes( $post_type, $post = null ) {
		add_meta_box(
			'genesis-home-page-builder-options', 
			__( 'Misc Settings', 'genesis-home-page-builder' ),
			array( $this, 'render_meta_box'),
			'appearance_page_so_panels_home_page',
			'advanced', 
			'high'
		);
	}
	
	// Render meta box options 
	function render_meta_box( $post = null ) {
		$remove_content_padding = get_option( 'genesis-home-page-builder-remove-content-padding', 0 );
		echo '<input type="hidden" name="genesis-home-page-builder-remove-content-padding" value="0" /> ';
		echo '<input type="checkbox" name="genesis-home-page-builder-remove-content-padding"' . ( $remove_content_padding ? ' checked="checked"' : '' ) . ' value="1" /> ';
		echo __( 'Remove <code>#content</code> padding', 'genesis-home-page-builder' );
	}
	
	// Function save options
	function save_options() {
		if( !isset( $_POST['_sopanels_home_nonce'] ) || !wp_verify_nonce($_POST['_sopanels_home_nonce'], 'save') ) return;
		if ( isset( $_POST['genesis-home-page-builder-remove-content-padding'] ) ) {
			update_option( 'genesis-home-page-builder-remove-content-padding', $_POST['genesis-home-page-builder-remove-content-padding'] );
		}
	}

	// Enqueue CSS
	function enqueue_style() {
		if ( is_front_page() ) {
			 wp_enqueue_style( 'genesis-home-page-builder', GENESIS_HOME_PAGE_BUILDER_URL . '/genesis-home-page-builder.css', array(), GENESIS_HOME_PAGE_BUILDER_VERSION );
		}
	}
	
	// Custom body class
	function body_class( $classes ) {
		if ( is_front_page() ) {
			$remove_content_padding = get_option( 'genesis-home-page-builder-remove-content-padding', 0 );
			if ( $remove_content_padding ) {
				$classes[] = 'remove-content-padding';
			}
		}
		return $classes;
	}

}

