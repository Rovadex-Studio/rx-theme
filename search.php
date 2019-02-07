<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Rx Theme
 */

get_header();

	do_action( 'rx-theme/site/site-content-before', 'search' ); ?>

	<div <?php rx_theme_content_class() ?>>
		<div class="row">

			<?php do_action( 'rx-theme/site/primary-before', 'search' ); ?>

			<div id="primary" class="col-xs-12">

				<?php do_action( 'rx-theme/site/main-before', 'search' ); ?>

				<main id="main" class="site-main"><?php
					if ( have_posts() ) : ?>

						<?php

						rx_theme()->do_location( 'archive', 'template-parts/search-loop' );

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
				?></main><!-- #main -->

				<?php do_action( 'rx-theme/site/main-after', 'search' ); ?>

			</div><!-- #primary -->

			<?php do_action( 'rx-theme/site/primary-after', 'search' ); ?>

		</div>
	</div><?php
get_footer();
