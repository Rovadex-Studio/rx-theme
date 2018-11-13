<?php
/**
 * Template part for displaying style-v8 posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rx theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item justify-item' ); ?>>
	<div class="justify-item-inner invert">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="justify-item__thumbnail" <?php rx_theme_post_overlay_thumbnail( rx_theme_justify_thumbnail_size(1) );?>></div>
		<?php endif; ?>
		<div class="justify-item-wrap">
			<div class="entry-meta__top">
				<?php
					rx_theme_posted_in( array(
						'prefix' => '',
						'delimiter' => ''
					) );
					rx_theme_post_tags();
				?>
			</div><!-- .entry-meta -->
			<header class="entry-header">
				<h4 class="entry-title"><?php
					rx_theme_sticky_label();
					the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
				?></h4>
			</header><!-- .entry-header -->
			<div class="justify-item-wrap__animated">
				<?php rx_theme_post_excerpt(); ?>
				<?php rx_theme_post_link(); ?>
			</div><!-- .justify-item-wrap__animated-->
			<footer class="entry-footer">
				<div class="entry-meta">
					<?php
					rx_theme_posted_by();
					rx_theme_posted_on( array(
						'prefix' => __( 'Posted ', 'rx-theme' ),
					) );
					rx_theme_post_comments( array(
						'postfix' => __( 'comments', 'rx-theme' ),
					) );
					?>
				</div>
			</footer><!-- .entry-footer -->
		</div><!-- .justify-item-wrap-->
	</div><!-- .justify-item-inner-->
	<?php rx_theme_edit_link(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
