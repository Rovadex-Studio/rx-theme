<?php
/**
 * Template part for displaying style-10 posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rvdx Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item grid-item' ); ?>>
	<?php rvdx_theme_post_thumbnail( 'rvdx-theme-thumb-m-2' ); ?>
	<div class="grid-item-inner">
		<header class="entry-header">
			<div class="entry-meta">
				<?php
				rvdx_theme_posted_by();
				rvdx_theme_posted_in( array(
					'prefix' => esc_html__( 'In', 'rvdx-theme' ),
					'delimiter' => ', '
				) );
				rvdx_theme_posted_on( array(
					'prefix' => esc_html__( 'Posted', 'rvdx-theme' ),
				) );
				?>
			</div><!-- .entry-meta -->
			<h4 class="entry-title"><?php
				rvdx_theme_sticky_label();
				the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
			?></h4>
		</header><!-- .entry-header -->
		<?php rvdx_theme_post_excerpt(); ?>

		<footer class="entry-footer">
			<div class="entry-meta">
				<?php
				rvdx_theme_post_tags();

				$post_more_btn_enabled = strlen( rvdx_theme()->customizer->get_value( 'blog_read_more_text' ) ) > 0 ? true : false;
				$post_comments_enabled = rvdx_theme()->customizer->get_value( 'blog_post_comments' );

				if( $post_more_btn_enabled || $post_comments_enabled ) {
					?><div class="space-between-content"><?php
					rvdx_theme_post_link();
					rvdx_theme_post_comments();
					?></div><?php
				}
				?>
			</div>
		</footer><!-- .entry-footer -->
	</div><!-- .grid-item-inner -->
	<?php rvdx_theme_edit_link(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
