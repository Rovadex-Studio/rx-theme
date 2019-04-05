<?php

/**
 * [panel_render description]
 * @return [type] [description]
 */
function rvdx_theme_mobile_panel_render() {
	get_template_part( 'template-parts/mobile-panel' );
}

add_action( 'wp_footer', 'rvdx_theme_mobile_panel_render' );

/**
 * [rvdx_theme_mobile_panel_woo_after_content description]
 * @return [type] [description]
 */
function rvdx_theme_mobile_panel_woo_after_content() {

	if ( ! method_exists( WC()->cart, 'get_cart_contents_count' ) ) {
		$count = '';
	} else {
		$count = WC()->cart->get_cart_contents_count();
	}

	return sprintf( '<div class="woo-card-count">%1$s</div>', $count );
}

/**
 * [rvdx_theme_cart_link_fragments description]
 * @param  [type] $fragments [description]
 * @return [type]            [description]
 */
function rvdx_theme_cart_link_fragments( $fragments ) {

	$fragments[ '.rvdx-mobile-panel__control--woo-card .woo-card-count' ] = rvdx_theme_mobile_panel_woo_after_content();

	return $fragments;
}

if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
	add_filter( 'woocommerce_add_to_cart_fragments', 'rvdx_theme_cart_link_fragments' );
} else {
	add_filter( 'add_to_cart_fragments', 'rvdx_theme_cart_link_fragments' );
}
