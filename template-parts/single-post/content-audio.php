<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rx Theme
 */

?>

<?php do_action( 'rx_theme_assistant_post_format_audio' ); ?>

<div class="entry-content">
	<?php the_content(); ?>
	<?php wp_link_pages( array(
		'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'rx-theme' ),
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
	) ); ?>
</div><!-- .entry-content -->
