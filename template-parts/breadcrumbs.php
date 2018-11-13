<?php
/**
 * Template part for breadcrumbs.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rx Theme
 */

$breadcrumbs_visibillity = rx_theme()->customizer->get_value( 'breadcrumbs_visibillity' );

/**
 * [$breadcrumbs_visibillity description]
 * @var [type]
 */
$breadcrumbs_visibillity = apply_filters( 'rx-theme/breadcrumbs/breadcrumbs-visibillity', $breadcrumbs_visibillity );

if ( ! $breadcrumbs_visibillity ) {
	return;
}

$breadcrumbs_front_visibillity = rx_theme()->customizer->get_value( 'breadcrumbs_front_visibillity' );

if ( !$breadcrumbs_front_visibillity && is_front_page() ) {
	return;
}

do_action( 'rx-theme/breadcrumbs/breadcrumbs-before-render' );

?><div <?php echo rx_theme_get_container_classes( 'site-breadcrumbs' ); ?>>
	<div <?php rx_theme_breadcrumbs_class(); ?>>
		<?php do_action( 'rx-theme/breadcrumbs/before' ); ?>
		<?php do_action( 'cx_breadcrumbs/render' ); ?>
		<?php do_action( 'rx-theme/breadcrumbs/after' ); ?>
	</div>
</div><?php

do_action( 'rx-theme/breadcrumbs/breadcrumbs-after-render' );
