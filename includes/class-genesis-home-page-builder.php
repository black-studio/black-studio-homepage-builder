<?php 

class Genesis_Home_Page_Builder {

	public function __construct() {
		if( is_admin() ) {
			add_action( 'admin_init', array( $this, 'save_options' ) );
			add_action( 'after_setup_theme', array( $this, 'add_page_builder_support' ) );
			add_action( 'load-appearance_page_so_panels_home_page', array( $this, 'add_meta_boxes' ) );
			add_action( 'admin_footer-appearance_page_so_panels_home_page', array( $this, 'footer' ) );
		}
		else {
			add_filter( 'genesis_pre_get_option_site_layout', array( $this, 'force_layout' ), 50 );
			add_action( 'genesis_before', array( $this, 'setup_loop' ) );
			add_action( 'wp_head', array( $this, 'style' ), 100 );
		}
	}
	
	// Activation checks
	static public function activation_hook() {
		// Check for Genesis presence
		if ( 'genesis' != basename( TEMPLATEPATH ) ) {
			deactivate_plugins( plugin_basename( __FILE__ ) ); 
			exit( sprintf( __( 'Sorry, to activate the Genesis Home Page Builder plugin you should have installed a <a target="_blank" href="%s">Genesis</a> theme', 'genesis-home-page-builder' ), 'http://www.studiopress.com/themes/genesis' ) );
		}
		// Check for Page Builder presence
		if ( ! defined( 'SITEORIGIN_PANELS_VERSION' ) ) {
			deactivate_plugins( plugin_basename( __FILE__ ) ); 
			exit( sprintf( __( 'Sorry, to activate the Genesis Home Page Builder plugin you should have installed the <a target="_blank" href="%s">Page Builder by SiteOrigin</a> plugin', 'genesis-home-page-builder' ), 'http://wordpress.org/plugins/siteorigin-panels/' ) );
		}
	}
	
	// Add Page Builder support to theme
	public function add_page_builder_support() {
		add_theme_support( 'siteorigin-panels', array(
			'home-page' => true,
			'margin-bottom' => 35,
			'home-page-default' => 'default-home',
			'home-demo-template' => 'home-panels.php',
			'responsive' => true,
		) );
	}
	
	// Add meta box options 
	public function add_meta_boxes( $post_type, $post = null ) {
		add_meta_box(
			'genesis-home-page-builder-settings', 
			__( 'Genesis styles adjustments', 'genesis-home-page-builder' ),
			array( $this, 'render_meta_box' ),
			'appearance_page_so_panels_home_page',
			'advanced', 
			'high'
		);
	}
	
	// Display meta box in footer
	public function footer() {
		include plugin_dir_path( dirname( __FILE__ ) ) . 'partials/admin-footer.php';
	}

	// Render meta box options 
	public function render_meta_box( $post = null ) {
		$settings = get_option( 'genesis-home-page-builder-settings', 0 );
		include plugin_dir_path( dirname( __FILE__ ) ) . 'partials/admin-settings.php';
	}
	
	// Function save options
	public function save_options() {
		if( ! isset( $_POST['_sopanels_home_nonce'] ) || ! wp_verify_nonce( $_POST['_sopanels_home_nonce'], 'save' ) ) return;
		if ( isset( $_POST['genesis-home-page-builder-settings'] ) ) {
			$new_settings = array_map( 'absint', $_POST['genesis-home-page-builder-settings'] );
			update_option( 'genesis-home-page-builder-settings', $new_settings );
		}
	}
	
	// Include frontend styles
	public function style() {
		if ( is_front_page() ) {
			$settings = get_option( 'genesis-home-page-builder-settings', 0 );
			if( ! empty( $settings['reset-content-padding'] ) || ! empty( $settings['reset-overflow-hidden'] ) ) {
				include plugin_dir_path( dirname( __FILE__ ) ) . 'partials/public-style.php';
			}
		}
	}

	// Force fullwidth layout
	public function force_layout( $layout ) {
		if ( is_front_page() ) {
			$layout = 'full-width-content';
		}
		return $layout;
	}
	
	// Setup custom loog in home page
	public function setup_loop() {
		if ( is_front_page() ) {
			remove_action( 'genesis_loop', 'genesis_do_loop' );
			add_action( 'genesis_loop', array( $this, 'loop' ) );
		}
	}

	// Render home page
	public function loop() {
		if( function_exists( 'siteorigin_panels_render' ) ) {
			echo siteorigin_panels_render( 'home' ); 
		} else {
			genesis_do_loop();
		}
	}
	
}

