<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rvdx Theme
 */

?>

<header class="entry-header">
	<div class="entry-meta">
		<?php
			rvdx_theme_posted_by();
			rvdx_theme_posted_in( array(
				'prefix'  => esc_html__( 'In', 'rvdx-theme' ),
			) );
			rvdx_theme_posted_on( array(
				'prefix'  => esc_html__( 'Posted', 'rvdx-theme' ),
			) );
			rvdx_theme_post_comments( array(
				'postfix' => esc_html__( 'Comment(s)', 'rvdx-theme' ),
			) );
		?>
	</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<?php rvdx_theme_post_thumbnail( 'rvdx-theme-thumb-l', array( 'link' => false ) ); ?>
