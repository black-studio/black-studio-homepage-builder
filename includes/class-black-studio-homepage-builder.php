<?php 

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the dashboard.
 *
 * @since      1.0.0
 *
 * @package    Black_Studio_Homepage_Builder
 * @subpackage Black_Studio_Homepage_Builder/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, dashboard-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Black_Studio_Homepage_Builder
 * @subpackage Black_Studio_Homepage_Builder/includes
 */

class Black_Studio_Homepage_Builder {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the Dashboard and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'black-studio-homepage-builder';
		$this->version = '1.0.3';
		
		if ( is_admin() ) {
			add_action( 'admin_init', array( $this, 'save_options' ) );
			add_action( 'after_setup_theme', array( $this, 'add_page_builder_support' ) );
			add_action( 'load-appearance_page_so_panels_home_page', array( $this, 'add_meta_boxes' ) );
			add_action( 'admin_footer-appearance_page_so_panels_home_page', array( $this, 'admin_footer' ) );
			add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );
		}
		else {
			add_filter( 'genesis_pre_get_option_site_layout', array( $this, 'force_layout' ), 50 );
			add_action( 'genesis_before', array( $this, 'replace_loop' ) );
			add_action( 'wp_head', array( $this, 'public_style' ), 100 );
		}
	}

	/**
	 * Perform activation checks
	 *
	 * @since    1.0.0
	 */
	static public function activation_hook() {
		// Check for Genesis presence
		if ( 'genesis' != basename( TEMPLATEPATH ) ) {
			deactivate_plugins( plugin_basename( __FILE__ ) ); 
			exit( sprintf( __( 'Sorry, to activate the Black Studio Homepage Builder plugin you should have installed a <a target="_blank" href="%s">Genesis</a> theme', 'black-studio-homepage-builder' ), 'http://www.studiopress.com/themes/genesis' ) );
		}
		// Check for Page Builder presence
		if ( ! defined( 'SITEORIGIN_PANELS_VERSION' ) ) {
			deactivate_plugins( plugin_basename( __FILE__ ) ); 
			exit( sprintf( __( 'Sorry, to activate the Black Studio Homepage Builder plugin you should have installed the <a target="_blank" href="%s">Page Builder by SiteOrigin</a> plugin', 'black-studio-homepage-builder' ), 'http://wordpress.org/plugins/siteorigin-panels/' ) );
		}
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			$this->plugin_name,
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}

	/**
	 * Add Page Builder support to theme
	 *
	 * @since    1.0.0
	 */
	public function add_page_builder_support() {
		add_theme_support( 'siteorigin-panels', array(
			'home-page' => true,
			'margin-bottom' => 35,
			'home-page-default' => 'default-home',
			'home-demo-template' => 'home-panels.php',
			'responsive' => true,
		) );
	}

	/**
	 * Add meta box for options
	 *
	 * @since    1.0.0
	 */
	public function add_meta_boxes() {
		add_meta_box(
			'black-studio-homepage-builder-settings', 
			__( 'Genesis styles adjustments', 'black-studio-homepage-builder' ),
			array( $this, 'render_meta_box' ),
			'appearance_page_so_panels_home_page',
			'advanced', 
			'high'
		);
	}

	/**
	 * Display meta box in footer
	 *
	 * @since    1.0.0
	 */
	public function admin_footer() {
		include plugin_dir_path( dirname( __FILE__ ) ) . 'partials/admin-footer.php';
	}

	/**
	 * Render meta box options
	 *
	 * @since    1.0.0
	 * @param    WP_Post|null    $post The object for the current post/page.
	 */
	public function render_meta_box( $post = null ) {
		$settings = get_option( 'black-studio-homepage-builder-settings', 0 );
		include plugin_dir_path( dirname( __FILE__ ) ) . 'partials/admin-settings.php';
	}

	/**
	 * Save plugin options
	 *
	 * @since    1.0.0
	 */
	public function save_options() {
		if ( ! isset( $_POST['_sopanels_home_nonce'] ) || ! wp_verify_nonce( $_POST['_sopanels_home_nonce'], 'save' ) ) {
			return;
		}
		if ( isset( $_POST['black-studio-homepage-builder-settings'] ) ) {
			$new_settings = array_map( 'absint', $_POST['black-studio-homepage-builder-settings'] );
			update_option( 'black-studio-homepage-builder-settings', $new_settings );
		}
	}

	/**
	 * Include frontend styles
	 *
	 * @since    1.0.0
	 */
	public function public_style() {
		if ( is_front_page() ) {
			$settings = get_option( 'black-studio-homepage-builder-settings', 0 );
			if ( ! empty( $settings['reset-content-padding'] ) || ! empty( $settings['reset-overflow-hidden'] ) ) {
				if ( ! current_theme_supports( 'html5' ) ) {
					include plugin_dir_path( dirname( __FILE__ ) ) . 'partials/public-style-xhtml.php';
				}
				else {
					include plugin_dir_path( dirname( __FILE__ ) ) . 'partials/public-style-html5.php';
				}
			}
		}
	}

	/**
	 * Force fullwidth layout
	 *
	 * @since    1.0.0
	 * @param    string    $layout
	 * @return   string
	 */
	public function force_layout( $layout ) {
		if ( is_front_page() ) {
			$layout = 'full-width-content';
		}
		return $layout;
	}

	/**
	 * Replace native loop with a custom loop for front page
	 *
	 * @since    1.0.0
	 */
	public function replace_loop() {
		if ( is_front_page() ) {
			remove_all_actions( 'genesis_loop' );
			add_action( 'genesis_loop', array( $this, 'render_home' ) );
		}
	}

	/**
	 * Render home page
	 *
	 * @since    1.0.0
	 */
	public function render_home() {
		if ( function_exists( 'siteorigin_panels_render' ) ) {
			echo siteorigin_panels_render( 'home' ); 
		} else {
			genesis_do_loop();
		}
	}

}
