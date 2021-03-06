<?php
/**
 * Theme import config file.
 *
 * @var array
 *
 * @package Storycle
 */
$theme = wp_get_theme();
$theme_slag = get_template();
$config = array(
	'xml' => false,
	'advanced_import' => array(
		'default' => array(
			'label'    => $theme->get( 'Name' ),
			'full'     => 'https://assets.rovadex.com/demo-content/' . $theme_slag . '/default/default.xml',
			'lite'     => false,
			'thumb'    => get_theme_file_uri( 'screenshot.png' ),
			'demo_url' => 'https://wp.rovadex.com/' . $theme_slag,
		),
	),
	'import' => array(
		'chunk_size' => 3,
	),
	'slider' => array(
		'path' => 'https://raw.githubusercontent.com/JetImpex/wizard-slides/master/slides.json',
	),
	'success-links' => array(
		'home' => array(
			'label'  => esc_html__( 'View your site', 'rvdx-theme' ),
			'type'   => 'primary',
			'target' => '_blank',
			'icon'   => 'dashicons-welcome-view-site',
			'desc'   => esc_html__( 'Take a look at your site', 'rvdx-theme' ),
			'url'    => home_url( '/' ),
		),
		'customize' => array(
			'label'  => esc_html__( 'Customize your theme', 'rvdx-theme' ),
			'type'   => 'primary',
			'target' => '_self',
			'icon'   => 'dashicons-admin-generic',
			'desc'   => esc_html__( 'Proceed to customizing your theme', 'rvdx-theme' ),
			'url'    => admin_url( 'customize.php' ),
		),
	),
	'export' => array(
		'options' => array(
			'site_icon',
			'elementor_cpt_support',
			'elementor_disable_color_schemes',
			'elementor_disable_typography_schemes',
			'elementor_container_width',
			'elementor_css_print_method',
			'elementor_global_image_lightbox',
			'elementor_page_title_selector',
			'elementor_default_generic_fonts',
			'elementor_space_between_widgets',
			'elementor_stretched_section_container',
			'elementor_viewport_lg',
			'elementor_viewport_md',
			'elementor_load_fa4_shim',
			'elementor_allow_svg',
			'mc4wp',
			'mc4wp_mailchimp_list_ids',
			'theme_mods_rvdx-theme',
			'wpgdprc_integrations_contact-form-7',
			'wpgdprc_integrations_wordpress',
			'wpgdprc_integrations_contact-form-7_form_text',
			'wpgdprc_integrations_contact-form-7_error_message',
			'cptui_post_types',
			'rx-theme-assistant-settings',
		),
		'tables' => array(
			'wpgdprc_consents',
			'revslider_slides',
			'revslider_css',
			'revslider_layer_animations',
			'revslider_navigations',
			'revslider_sliders',
			'revslider_static_slides',
		),
	),
);
