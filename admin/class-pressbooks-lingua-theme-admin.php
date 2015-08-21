<?php
/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @since      0.1
 * @package    Pressbooks_Lingua_Theme
 * @subpackage Pressbooks_Lingua_Theme/includes
 * @author     23yesil <yigityesilpinar@gmail.com>
 */
class Pressbooks_Lingua_Theme_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}



	/**
	 * Called when a book is created in PressBooks.
	 *
	 * @since    0.1
	 */
	public function new_book() {

		switch_theme( 'pressbooks-lingua-theme' );

	}
  

function remove_add_new_book( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'add-new-book' );
       
}
        

}
