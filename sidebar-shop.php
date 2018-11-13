<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rx Theme
 */
?>

<?php if ( is_active_sidebar( 'sidebar-shop' ) && 'none' !== rx_theme()->sidebar_position ) : ?>
	<aside id="secondary" <?php rx_theme_secondary_content_class( array( 'widget-area' ) ); ?>>
	  <?php dynamic_sidebar( 'sidebar-shop' ); ?>
	</aside><!-- #secondary -->
<?php endif;
