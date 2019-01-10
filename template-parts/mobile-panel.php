<?php
/**
 * Template part for mobile panel .
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rx Theme
 */

do_action( 'rx-theme/mobile-panel/mobile-panel-before' );

$controls_list = [
	'home' => [
		'label' => false,
		'icon'  => 'fa fa-home',
		'link'  => get_home_url(),
	],
	'mobile-menu' => [
		'label' => false,
		'icon'  => 'fa fa-bars',
		'link'  => false,
	],
];

if ( is_active_sidebar( 'sidebar' ) && 'none' !== rx_theme()->sidebar_position ) {
	$controls_list['sidebar'] = [
		'label' => false,
		'icon'  => 'fa fa-ellipsis-h',
		'link'  => false,
	];
}

$controls_list = apply_filters( 'rx-theme/mobile-panel/mobile-panel-controls', $controls_list );

?><div class="rx-mobile-panel">
	<div class="rx-mobile-panel__inner">
		<div class="rx-mobile-panel__controls"><?php

			if ( ! empty( $controls_list ) ) {
				foreach ( $controls_list as $control_slug => $control_data ) {
					$label = ! empty( $control_data['label'] ) ? sprintf( '<span>%s</span>', $control_data['label'] ) : '';
					$icon  = $control_data['icon'];
					$link  = $control_data['link'];
					$classes = sprintf( 'rx-mobile-panel__control--%s', $control_slug );

					$button = sprintf( '<i class="%s"></i>%s', $icon, $label );

					if ( ! empty( $link ) ) {
						$button = sprintf( '<a href="%s">%s</a>', $link, $button );

						$classes .= ' extenal-link';
					}

					?><div class="rx-mobile-panel__control <?php echo esc_attr( $classes ); ?>" data-control-type="<?php echo esc_attr( $control_slug ); ?>"><?php
						printf( '%s', $button );
					?></div><?php
				}
			}

		?></div>
	</div>
</div><?php

do_action( 'rx-theme/mobile-panel/mobile-panel-after' ); ?>
