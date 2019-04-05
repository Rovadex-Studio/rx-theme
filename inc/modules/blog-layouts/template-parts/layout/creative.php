<?php
/**
 * Template part for displaying creative posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rvdx Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item creative-item' ); ?>>

	<?php rvdx_theme_post_thumbnail( 'rvdx-theme-thumb-l' ); ?>

	<div class="creative-item__content">

		<header class="entry-header">
			<h3 class="entry-title"><?php
				rvdx_theme_sticky_label();
				the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
			?></h3>
		</header><!-- .entry-header -->

		<?php rvdx_theme_post_excerpt(); ?>

		<footer class="entry-footer">
			<div class="entry-meta"><?php
				rvdx_theme_posted_by();
				rvdx_theme_posted_in( array(
					'prefix' => esc_html__( 'In', 'rvdx-theme' ),
				) );
				rvdx_theme_posted_on( array(
					'prefix' => esc_html__( 'Posted', 'rvdx-theme' )
				) );
				rvdx_theme_post_tags( array(
					'prefix' => esc_html__( 'Tags:', 'rvdx-theme' )
				) );
				?><div><?php
					rvdx_theme_post_link();
					rvdx_theme_post_comments( array(
						'prefix' => '<i class="fa fa-comment" aria-hidden="true"></i>',
						'class'  => 'comments-button'
					) );
				?></div>
			</div>
			<?php rvdx_theme_edit_link(); ?>
		</footer><!-- .entry-footer -->

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
