<?php
/**
 * Template part for displaying creative posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rx Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item creative-item invert-hover' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="creative-item__thumbnail" <?php rx_theme_post_overlay_thumbnail( 'rx-theme-thumb-m' ); ?>></div>
	<?php endif; ?>

	<header class="entry-header">
		<?php
			rx_theme_posted_in();
			rx_theme_posted_on( array(
				'prefix' => __( 'Posted', 'rx-theme' )
			) );
		?>
		<h4 class="entry-title"><?php
			rx_theme_sticky_label();
			the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
		?></h4>
	</header><!-- .entry-header -->

	<?php rx_theme_post_excerpt(); ?>

	<footer class="entry-footer">
		<div class="entry-meta">
			<div>
				<?php
					rx_theme_posted_by();
					rx_theme_post_comments( array(
						'prefix' => '<i class="fa fa-comment" aria-hidden="true"></i>'
					) );
					rx_theme_post_tags( array(
						'prefix' => __( 'Tags:', 'rx-theme' )
					) );
				?>
			</div>
			<?php
				rx_theme_post_link();
			?>
		</div>
		<?php rx_theme_edit_link(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
