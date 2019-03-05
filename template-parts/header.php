<?php
/**
 * Template part for default Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rx Theme
 */
?>

<?php get_template_part( 'template-parts/top-panel' ); ?>

<div class="site-header__wrap">
	<div class="container">
		<?php do_action( 'rx-theme/header/before' ); ?>
		<div class="space-between-content">
			<div <?php echo rx_theme_site_branding_class(); ?>>
				<?php rx_theme_header_logo(); ?>
			</div>
			<?php rx_theme_main_menu(); ?>
		</div>
		<?php do_action( 'rx-theme/header/after' ); ?>
	</div>
</div>
