<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rvdx Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	wp_body_open();
	do_action( 'rvdx-theme/site/page-start' );
	rvdx_theme_get_page_preloader();
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rvdx-theme' ); ?></a>
	<header id="masthead" <?php echo rvdx_theme_get_container_classes( 'site-header' ); ?>>
		<?php rvdx_theme()->do_location( 'header', 'template-parts/header' ); ?>
	</header><!-- #masthead -->
	<?php
		if( is_single() && get_page_template_slug( get_queried_object_id() ) ){
			return;
		}
	?>
	<?php if( rvdx_theme()->customizer->get_value( 'breadcrumbs_visibillity' ) || rvdx_theme()->customizer->get_value( 'page_title_visibility' ) ){ ?>

	<div class="page-header site-header__wrap">
		<div class="container">
			<?php rvdx_theme_the_title(); ?>
			<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
		</div>
	</div><!-- .page-header -->

	<?php } ?>
	<div id="content" <?php echo rvdx_theme_get_container_classes( 'site-content' ); ?>>
