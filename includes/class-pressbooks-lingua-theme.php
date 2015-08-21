<?php
/**
 * The core plugin class.
 *
 * This is used to define internationalization, dashboard-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.1
 * @package    Pressbooks_Lingua_Theme
 * @subpackage Pressbooks_Lingua_Theme/includes
 * @author     23yesil <yigityesilpinar@gmail.com>
 */
class Pressbooks_Lingua_Theme {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    0.1
	 * @access   protected
	 * @var      Pressbooks_Metadata_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    0.1
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    0.1
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
	 * @since    0.1
	 */
	public function __construct() {

		$this->plugin_name = 'pressbooks-lingua-theme';
		$this->version = '0.1';

		$this->load_dependencies();
		$this->set_themes();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Pressbooks_Metadata_Loader. Orchestrates the hooks of the plugin.
	 * - Pressbooks_Metadata_i18n. Defines internationalization functionality.
	 * - Pressbooks_Metadata_Admin. Defines all hooks for the dashboard.
	 * - Pressbooks_Metadata_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    0.1
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-pressbooks-lingua-theme-loader.php';



		/**
		 * The class responsible for registering and setting all the themes used by the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-pressbooks-lingua-theme-themes.php';

		/**
		 * The class responsible for defining all actions that occur in the Dashboard.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-pressbooks-lingua-theme-admin.php';
                
                /**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-pressbooks-lingua-theme-public.php';




		$this->loader = new Pressbooks_Lingua_Theme_Loader();

	}


	/**
	 * Set the plugin's specific themes and removes useless ones.
	 *
	 * @since    0.1
	 * @access   private
	 */
	private function set_themes() {

		$plugin_themes = new Pressbooks_Lingua_Theme_Themes( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'init', $plugin_themes, 'register_directory' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_themes, 'enqueue_custom_themes' );
		$this->loader->add_filter( 'allowed_themes', $plugin_themes, 'add_themes_to_filter', 11 );

		// Export fix
		$this->loader->add_filter( 'pb_epub_css_override', $plugin_themes, 'add_epub_export_styles' );

	}

	/**
	 * Register all of the hooks related to the dashboard functionality
	 * of the plugin.
	 *
	 * @since    0.1
	 * @access   private
	 */
	private function define_admin_hooks() {
		$plugin_admin = new Pressbooks_Lingua_Theme_Admin( $this->get_plugin_name(), $this->get_version() );		
		$this->loader-> add_action( 'admin_bar_menu',$plugin_admin,'remove_add_new_book', 999 );
		$this->loader->add_action( 'pressbooks_new_blog', $plugin_admin, 'new_book' );
	}



        /**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    0.1
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Pressbooks_Lingua_Theme_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
	

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    0.1
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     0.1
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     0.1
	 * @return    Pressbooks_Metadata_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     0.1
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
