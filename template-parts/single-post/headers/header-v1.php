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
	<?php the_title( '<h2 class="entry-title h2-style">', '</h2>' ); ?>
	<div class="entry-meta">
		<?php
			rx_theme_posted_by();
			rx_theme_posted_in( array(
				'prefix'  => __( 'In', 'rx-theme' ),
			) );
			rx_theme_posted_on( array(
				'prefix'  => __( 'Posted', 'rx-theme' ),
			) );
			rx_theme_post_comments( array(
				'postfix' => __( 'Comment(s)', 'rx-theme' ),
			) );
		?>
	</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<?php rx_theme_post_thumbnail( 'rx-theme-thumb-l', array( 'link' => false ) ); ?>
