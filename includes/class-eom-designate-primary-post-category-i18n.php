<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.efficiencyofmovement.com
 * @since      1.0.0
 *
 * @package    Eom_Designate_Primary_Post_Category
 * @subpackage Eom_Designate_Primary_Post_Category/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Eom_Designate_Primary_Post_Category
 * @subpackage Eom_Designate_Primary_Post_Category/includes
 * @author     Josh Smith <joshsmith01.contact@gmail.com>
 */
class Eom_Designate_Primary_Post_Category_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'eom-designate-primary-post-category',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
