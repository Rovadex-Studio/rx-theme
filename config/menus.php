<?php
/**
 * Menus configuration.
 *
 * @package Rx Theme
 */

add_action( 'after_setup_theme', 'rx_theme_register_menus', 5 );
function rx_theme_register_menus() {

	register_nav_menus( array(
		'main'   => esc_html__( 'Main', 'rx-theme' ),
		'footer' => esc_html__( 'Footer', 'rx-theme' ),
		'social' => esc_html__( 'Social', 'rx-theme' ),
	) );
}
