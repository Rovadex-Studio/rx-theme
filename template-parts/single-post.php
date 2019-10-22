<?php
/**
 * Single Post template (fallback for single location)
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php

	rvdx_theme()->do_location( 'single-post-content', 'template-parts/content-post' );

?></article><?php

get_template_part( 'template-parts/single-post/author-bio' );
get_template_part( 'template-parts/single-post/post_navigation' );
rvdx_theme_related_posts();
get_template_part( 'template-parts/single-post/comments' );
