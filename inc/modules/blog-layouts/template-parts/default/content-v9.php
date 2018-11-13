<?php
/**
 * Template part for displaying default posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rx Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('posts-list__item default-item invert-item'); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="default-item__thumbnail" <?php rx_theme_post_overlay_thumbnail( 'rx-theme-thumb-l' ); ?>></div>
	<?php endif; ?>

	<div class="container">

		<header class="entry-header">
			<div class="entry-meta"><?php
				rx_theme_posted_by();
				rx_theme_posted_in( array(
					'prefix' => __( 'In', 'rx-theme' ),
				) );
				rx_theme_posted_on( array(
					'prefix' => __( 'Posted', 'rx-theme' )
				) );
				rx_theme_post_tags( array(
					'prefix' => __( 'Tags:', 'rx-theme' )
				) );
				rx_theme_post_comments( array(
					'postfix' => __( 'Comment(s)', 'rx-theme' )
				) );
			?></div><!-- .entry-meta -->
			<h3 class="entry-title"><?php
				rx_theme_sticky_label();
				the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
			?></h3>
		</header><!-- .entry-header -->

		<?php rx_theme_post_excerpt(); ?>

		<footer class="entry-footer">
			<div class="entry-meta">
				<?php
					rx_theme_post_link();
				?>
			</div>
			<?php rx_theme_edit_link(); ?>
		</footer><!-- .entry-footer -->

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
