<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Rx Theme
 */
?>

<?php do_action( 'rx-theme/widget-area/render', 'footer-area' ); ?>

<div <?php rx_theme_footer_class(); ?>>
	<div class="space-between-content"><?php
		rx_theme_footer_copyright();
		rx_theme_social_list( 'footer' );
	?></div>
</div><!-- .container -->
