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
	'search' => [
		'label' => esc_html__( 'Search', 'rx-theme' ),
		'icon'  => 'fa fa-search',
	],
	'mobile-menu' => [
		'label' => esc_html__( 'Menu', 'rx-theme' ),
		'icon'  => 'fa fa-bars',
	],
	'sidebar' => [
		'label' => esc_html__( 'More', 'rx-theme' ),
		'icon'  => 'fa fa-ellipsis-h',
	],
];

$controls_list = apply_filters( 'rx-theme/mobile-panel/mobile-panel-controls', $controls_list );

?><div class="rx-mobile-panel">
	<div class="rx-mobile-panel__inner">
		<div class="rx-mobile-panel__controls"><?php

			if ( ! empty( $controls_list ) ) {
				foreach ( $controls_list as $control_slug => $control_data ) {
					$label = $control_data['label'];
					$icon = $control_data['icon'];
					$classes = sprintf( 'rx-mobile-panel__control--%s', $control_slug );

					?><div class="rx-mobile-panel__control <?php echo $classes; ?>" data-control-type="<?php echo $control_slug; ?>">
						<i class="<?php echo $icon; ?>"></i>
						<span><?php echo $label; ?></span>
					</div><?php
				}
			}

		?></div>
	</div>
</div><?php

do_action( 'rx-theme/mobile-panel/mobile-panel-after' ); ?>
