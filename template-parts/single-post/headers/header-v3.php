<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rx Theme
 */

$author_block_enabled = rx_theme()->customizer->get_value( 'single_author_block' );

?>

<div class="single-header-3">
	<header class="entry-header">
		<div class="entry-meta">
			<?php
				rx_theme_posted_in( array(
					'delimiter' => '',
					'before'    => '<div class="cat-links btn-style">',
					'after'     => '</div>'
				) );
				if ( ! $author_block_enabled ) {
					rx_theme_posted_by();
					rx_theme_posted_on( array(
						'prefix'  => __( 'Posted', 'rx-theme' ),
					) );
				}
				rx_theme_post_comments( array(
					'postfix' => __( 'Comment(s)', 'rx-theme' ),
				) );
			?>
		</div><!-- .entry-meta -->
		<?php the_title( '<h1 class="entry-title h2-style">', '</h1>' ); ?>
	</header><!-- .entry-header -->
</div>
