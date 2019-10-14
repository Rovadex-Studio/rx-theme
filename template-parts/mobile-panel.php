<?php
/**
 * Template part for mobile panel .
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rvdx Theme
 */

if( ! rvdx_theme()->customizer->get_value( 'mobile_panel_enable' ) ){
	return;
}

do_action( 'rvdx-theme/mobile-panel/mobile-panel-before' );

$controls_list = array();

if ( rvdx_theme()->customizer->get_value( 'mobile_panel_home_button' ) ) {
	$controls_list['home'] = [
		'label'  => false,
		'icon'   => 'fa fa-home',
		'link'   => get_home_url(),
		'before' => '',
		'after'  => '',
	];
}

if ( rvdx_theme()->customizer->get_value( 'mobile_panel_main_menu' ) ) {
	$controls_list['mobile-menu'] = [
		'label'         => false,
		'icon'          => 'fa fa-bars',
		'close-icon'    => 'fa fa-bars',
		'link'          => false,
		'before'        => '',
		'after'         => '',
		'mobile_layout' => 'default',
	];
}

if ( class_exists( 'WooCommerce' ) && rvdx_theme()->customizer->get_value( 'mobile_panel_cart' ) ) {
	$controls_list['woo-card'] = [
		'label'  => false,
		'icon'   => 'fa fa-shopping-cart',
		'link'   => wc_get_cart_url(),
		'before' => '',
		'after'  => rvdx_theme_mobile_panel_woo_after_content(),
	];
}

if ( is_active_sidebar( 'sidebar' ) && 'none' !== rvdx_theme()->sidebar_position  && rvdx_theme()->customizer->get_value( 'mobile_panel_sidebar' ) ) {
	$controls_list['sidebar'] = [
		'label'         => false,
		'icon'          => 'fa fa-ellipsis-h',
		'link'          => false,
		'before'        => '',
		'after'         => '',
		'mobile_layout' => 'default-layout',
	];
}

$controls_list = apply_filters( 'rvdx-theme/mobile-panel/mobile-panel-controls', $controls_list );

?><div class="rvdx-mobile-panel">
	<div class="rvdx-mobile-panel__inner">
		<div class="rvdx-mobile-panel__controls"><?php

			if ( ! empty( $controls_list ) ) {
				foreach ( $controls_list as $control_slug => $control_data ) {
					$label      = ! empty( $control_data['label'] ) ? sprintf( '<span>%s</span>', $control_data['label'] ) : '';
					$icon       = $control_data['icon'];
					$close_icon = isset( $control_data['close-icon'] ) ? 'data-close-icon="' . $control_data['close-icon'] . '"' : '' ;
					$link       = $control_data['link'];
					$before     = $control_data['before'];
					$after      = $control_data['after'];
					$classes    = sprintf( 'rvdx-mobile-panel__control--%s', $control_slug );
					$button     = sprintf( '<i class="%1$s" data-icon="%1$s" %2$s></i>%3$s', $icon, $close_icon, $label );

					if ( ! empty( $link ) ) {
						$button = sprintf( '<a href="%s">%s</a>', $link, $button );

						$classes .= ' extenal-link';
					}

					?><div class="rvdx-mobile-panel__control <?php echo esc_attr( $classes ); ?>" data-control-type="<?php echo esc_attr( $control_slug ); ?>"><?php
						printf( '%2$s<div class="rvdx-mobile-panel__control-inner">%1$s</div>%3$s', $button, $before, $after );
					?></div><?php
				}
			}
		?></div>
	</div>
</div><?php

do_action( 'rvdx-theme/mobile-panel/mobile-panel-after' ); ?>
