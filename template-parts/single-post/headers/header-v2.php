<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rx Theme
 */
?>

<div class="single-header-2 container">
	<div class="row">
		<div class="col-xs-12 col-lg-8 col-lg-push-2">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title h2-style">', '</h1>' ); ?>
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
		</div>
	</div>
</div>

<?php rx_theme_post_thumbnail( 'rx-theme-thumb-xl', array( 'link' => false ) ); ?>
