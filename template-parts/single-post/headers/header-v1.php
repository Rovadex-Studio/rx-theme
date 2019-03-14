<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rx Theme
 */

?>

<header class="entry-header">
	<?php the_title( '<h1 class="entry-title h2-style">', '</h1>' ); ?>
	<div class="entry-meta">
		<?php
			rx_theme_posted_by();
			rx_theme_posted_in( array(
				'prefix'  => esc_html__( 'In', 'rx-theme' ),
			) );
			rx_theme_posted_on( array(
				'prefix'  => esc_html__( 'Posted', 'rx-theme' ),
			) );
			rx_theme_post_comments( array(
				'postfix' => esc_html__( 'Comment(s)', 'rx-theme' ),
			) );
		?>
	</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<?php rx_theme_post_thumbnail( 'rx-theme-thumb-l', array( 'link' => false ) ); ?>
