<?php
/**
 * Template part for displaying style-v2 posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rx theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item justify-item' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="justify-item__thumbnail" <?php rx_theme_post_overlay_thumbnail( rx_theme_justify_thumbnail_size(0) );?>></div>
	<?php endif; ?>
	<div class="justify-item-wrap">
		<header class="entry-header">
			<div class="entry-meta">
				<?php
				rx_theme_posted_by();
				rx_theme_posted_in( array(
					'prefix' => esc_html__( 'In', 'rx-theme' ),
					'delimiter' => ', '
				) );
				rx_theme_posted_on( array(
					'prefix' => esc_html__( 'Posted', 'rx-theme' ),
				) );
				?>
			</div><!-- .entry-meta -->
			<h4 class="entry-title"><?php
				rx_theme_sticky_label();
				the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
			?></h4>
		</header><!-- .entry-header -->

		<?php rx_theme_post_excerpt(); ?>

		<footer class="entry-footer">
			<div class="entry-meta">
				<?php
				rx_theme_post_tags();

				$post_more_btn_enabled = strlen( rx_theme()->customizer->get_value( 'blog_read_more_text' ) ) > 0 ? true : false;
				$post_comments_enabled = rx_theme()->customizer->get_value( 'blog_post_comments' );

				if( $post_more_btn_enabled || $post_comments_enabled ) {
					?><div class="space-between-content"><?php
					rx_theme_post_link();
					rx_theme_post_comments();
					?></div><?php
				}
				?>
			</div>
		</footer><!-- .entry-footer -->
	</div><!-- .justify-item-wrap-->
	<?php rx_theme_edit_link(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
