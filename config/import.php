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
			'full'     => 'https://demo-content.rovadex.com/' . $theme_slag . '/default/default.xml',
			'lite'     => false,
			'thumb'    => get_theme_file_uri( 'screenshot.png' ),
			'demo_url' => 'https://' . $theme_slag . '.rovadex.com/',
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
			'label'  => esc_html__( 'View your site', 'rx-theme' ),
			'type'   => 'primary',
			'target' => '_blank',
			'icon'   => 'dashicons-welcome-view-site',
			'desc'   => esc_html__( 'Take a look at your site', 'rx-theme' ),
			'url'    => home_url( '/' ),
		),
		'customize' => array(
			'label'  => esc_html__( 'Customize your theme', 'rx-theme' ),
			'type'   => 'primary',
			'target' => '_self',
			'icon'   => 'dashicons-admin-generic',
			'desc'   => esc_html__( 'Proceed to customizing your theme', 'rx-theme' ),
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
			'elementor_global_image_lightbox',
			'mc4wp',
			'mc4wp_mailchimp_list_ids',
			'theme_mods_rx-theme',
			'wpgdprc_integrations_contact-form-7',
			'wpgdprc_integrations_wordpress',
			'wpgdprc_integrations_contact-form-7_form_text',
			'wpgdprc_integrations_contact-form-7_error_message',
			'cptui_post_types',
			'rx-theme-assistant-settings',
		),
		'tables' => array(
			'wp_postmeta',
			'wp_wpgdprc_consents',
			'revslider_css',
			'revslider_layer_animations',
			'revslider_navigations',
			'revslider_sliders',
			'revslider_slides',
			'revslider_static_slides',
		),
	),
);
