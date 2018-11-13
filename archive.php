<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rx Theme
 */

get_header();

	do_action( 'rx-theme/site/site-content-before', 'archive' ); ?>

	<div <?php rx_theme_content_class() ?>>

		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header -->

		<div class="row">

			<?php do_action( 'rx-theme/site/primary-before', 'archive' ); ?>

			<div id="primary" <?php rx_theme_primary_content_class(); ?>>

				<?php do_action( 'rx-theme/site/main-before', 'archive' ); ?>

				<main id="main" class="site-main"><?php
					if ( have_posts() ) :

						rx_theme()->do_location( 'archive', 'template-parts/posts-loop' );

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
				?></main><!-- #main -->

				<?php do_action( 'rx-theme/site/main-after', 'archive' ); ?>

			</div><!-- #primary -->

			<?php do_action( 'rx-theme/site/primary-after', 'archive' ); ?>

			<?php get_sidebar(); // Loads the sidebar.php template.  ?>
		</div>
	</div>

	<?php do_action( 'rx-theme/site/site-content-after', 'archive' );

get_footer();
