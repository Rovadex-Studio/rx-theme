<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rx Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('search-item'); ?>>
	<header class="entry-header">
		<div class="entry-meta"><?php
			rx_theme_posted_by();
			rx_theme_posted_in( array(
				'prefix' => esc_html__( 'In', 'rx-theme' ),
			) );
			rx_theme_posted_on( array(
				'prefix' => esc_html__( 'Posted', 'rx-theme' )
			) );
		?></div><!-- .entry-meta -->
		<?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php rx_theme_post_link(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
