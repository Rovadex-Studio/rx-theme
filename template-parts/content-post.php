<?php
/**
 * Post content template (fallback for single location)
 */

	get_template_part( 'template-parts/single-post/header', get_post_format() );
	get_template_part( 'template-parts/single-post/content', get_post_format() );
	get_template_part( 'template-parts/single-post/footer' );
?>
