<?php
/**
 * WooCommerce customizer options
 *
 * @package Rx Theme
 */

if ( ! function_exists( 'rx_theme_set_wc_dynamic_css_options' ) ) {

	/**
	 * Add dynamic WooCommerce styles
	 *
	 * @param $options
	 *
	 * @return mixed
	 */
	function rx_theme_set_wc_dynamic_css_options( $options ) {

		array_push( $options['css_files'], get_theme_file_path( 'inc/modules/woo/assets/css/dynamic/woo-module-dynamic.css' ) );

		return $options;

	}

}
add_filter( 'rx-theme/dynamic_css/options', 'rx_theme_set_wc_dynamic_css_options' );
