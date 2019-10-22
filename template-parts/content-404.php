<?php
/**
 * Template part for displaying 404 pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rvdx Theme
 */

?>
<section class="error-404 not-found">
	<div class="page-content">
		<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'rvdx-theme' ); ?></p>

		<?php
			get_search_form();
		?>
	</div><!-- .page-content -->
</section><!-- .error-404 -->
