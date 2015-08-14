<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://on-lingua.com
 * @since             0.1
 * @package           Pressbooks_Lingua_Theme
 *
 * @wordpress-plugin
 * Plugin Name:       Pressbooks Lingua Theme
 * Plugin URI:        http://on-lingua.com/
 * Description:       Theme for Pressbooks 
 * Version:           0.1
 * Author:            My Language Skills
 * Author URI:        http://on-lingua.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pressbooks-lingua-theme
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pressbooks-metadata-activator.php
 */
function activate_pressbooks_metadatatheme() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pressbooks-metadatatheme-activator.php';
	Pressbooks_Metadatatheme_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pressbooks-metadata-deactivator.php
 */
function deactivate_pressbooks_metadatatheme() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pressbooks-metadatatheme-deactivator.php';
	Pressbooks_Metadatatheme_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pressbooks_metadatatheme' );
register_deactivation_hook( __FILE__, 'deactivate_pressbooks_metadatatheme' );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-pressbooks-metadatatheme.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1
 */
function run_pressbooks_metadatatheme() {

	$plugin = new Pressbooks_Metadatatheme();
	$plugin->run();

}
run_pressbooks_metadatatheme();
