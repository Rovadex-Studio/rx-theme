<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rx Theme
 */

?>

<footer class="entry-footer">
	<div class="entry-meta"><?php
		rx_theme_post_tags ( array(
			'prefix'    => esc_html__( 'Tags:', 'rx-theme' ),
			'delimiter' => ''
		) );
	?></div>
</footer><!-- .entry-footer -->
