<?php

/**
 * [panel_render description]
 * @return [type] [description]
 */
function rx_theme_mobile_panel_render() {
	get_template_part( 'template-parts/mobile-panel' );
}

add_action( 'wp_footer', 'rx_theme_mobile_panel_render' );
