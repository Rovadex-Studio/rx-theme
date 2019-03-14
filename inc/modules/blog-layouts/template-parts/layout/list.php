<?php
/**
 * Template part for displaying default posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rx Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('posts-list__item default-item'); ?>>

	<header class="entry-header">
		<h3 class="entry-title"><?php
			rx_theme_sticky_label();
			the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
		?></h3>
		<div class="entry-meta">
			<?php
				rx_theme_posted_by();
				rx_theme_posted_in( array(
					'prefix' => esc_html__( 'In', 'rx-theme' ),
				) );
				rx_theme_posted_on( array(
					'prefix' => esc_html__( 'Posted', 'rx-theme' )
				) );
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php rx_theme_post_thumbnail( 'rx-theme-thumb-l' ); ?>

	<?php rx_theme_post_excerpt(); ?>

	<footer class="entry-footer">
		<div class="entry-meta">
			<?php
				rx_theme_post_tags( array(
					'prefix' => esc_html__( 'Tags:', 'rx-theme' )
				) );
			?>
			<div><?php
				rx_theme_post_comments( array(
					'prefix' => '<i class="fa fa-comment" aria-hidden="true"></i>',
					'class'  => 'comments-button'
				) );
				rx_theme_post_link();
			?></div>
		</div>
		<?php rx_theme_edit_link(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
