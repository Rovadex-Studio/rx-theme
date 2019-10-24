<?php
/**
 * Jet Plugins Wizard configuration.
 *
 * @package Storycle
 */
$license = array(
	'enabled' => false,
);

/**
 * Plugins configuration
 *
 * @var array
 */
$plugins = array(
	'jet-data-importer' => array(
		'name'   => esc_html__( 'Jet Data Importer', 'rvdx-theme' ),
		'source' => 'remote', // 'local', 'remote', 'wordpress' (default).
		'path'   => 'https://plugins.rovadex.com/jet-data-importer.zip',
		'access' => 'base',
	),

	'elementor' => array(
		'name'   => esc_html__( 'Elementor Page Builder', 'rvdx-theme' ),
		'access' => 'base',
	),

	'header-footer-elementor' => array(
		'name'   => esc_html__( 'Header Footer Elementor', 'rvdx-theme' ),
		'access' => 'base',
	),

	'jetwidgets-for-elementor' => array(
		'name'   => esc_html__( 'JetWidgets For Elementor', 'rvdx-theme' ),
		'access' => 'base',
	),

	'rx-theme-assistant' => array(
		'name'   => esc_html__( 'Rx Theme Assistant', 'rvdx-theme' ),
		'source' => 'remote', // 'local', 'remote', 'wordpress' (default).
		'path'   => 'http://plugins.rovadex.com/rx-theme-assistant.zip',
		'access' => 'base',
	),

	'revslider' => array(
		'name'   => esc_html__( 'Slider Revolution', 'rvdx-theme' ),
		'source' => 'remote', // 'local', 'remote', 'wordpress' (default).
		'path'   => get_theme_file_uri( 'assets/plugins/revslider.zip' ),
		'access' => 'base',
	),

	'contact-form-7' => array(
		'name'   => esc_html__( 'Contact Form 7', 'rvdx-theme' ),
		'access' => 'base',
	),

	'essential-addons-for-elementor-lite' => array(
		'name'   => esc_html__( 'Essential Addons for Elementor', 'rvdx-theme' ),
		'access' => 'base',
	),

	'advanced-custom-fields' => array(
		'name'   => esc_html__( 'Advanced Custom Fields', 'rvdx-theme' ),
		'access' => 'base',
	),

	'custom-post-type-ui' => array(
		'name'   => esc_html__( 'Custom Post Type UI', 'rvdx-theme' ),
		'access' => 'base',
	),

	'wp-gdpr-compliance' => array(
		'name'   => esc_html__( 'WP GDPR Compliance', 'rvdx-theme' ),
		'access' => 'skins',
	),

	'wordpress-seo' => array(
		'name'   => esc_html__( 'Yoast SEO', 'rvdx-theme' ),
		'access' => 'skins',
	),

	'phastpress' => array(
		'name'   => esc_html__( 'Phast Press - plugin for optimizing asset loading (css, js and others)', 'rvdx-theme' ),
		'access' => 'skins',
	),

	'rocket-lazy-load' => array(
		'name'   => esc_html__( 'Lazy Load - plugin for optimal image loading', 'rvdx-theme' ),
		'access' => 'skins',
	),
);

/**
 * Skins configuration
 *
 * @var array
 */
$theme = wp_get_theme();
$theme_slag = get_template();
$skins = array(
	'base' => array(
		'jet-data-importer',
		'elementor',
		'jetwidgets-for-elementor',
		'revslider',
		'advanced-custom-fields',
		'powerpack-lite-for-elementor',
		'custom-post-type-ui',
		'rx-theme-assistant',
		'contact-form-7',
	),
	'advanced' => array(
		'default' => array(
			'full'  => array(
				'cherry-ld-mods-switcher',
				'wp-gdpr-compliance',
				'gutenberg',
				'block-builder',
			),
			'lite'            => false,
			'demo'            => 'https://' . $theme_slag . '.rovadex.com/',
			'thumb'           => get_theme_file_uri( 'screenshot.png' ),
			'name'            => $theme->get( 'Name' ),
			'additional_info' => array(
				'title'       => sprintf( '%1$s %2$s %3$s', $theme->get( 'Name' ), esc_html__( 'Theme', 'rvdx-theme' ), $theme->get( 'Version' ) ),
				'description' => $theme->get( 'Description' ),
				'social_links' => array(
					'facebook' => array(
						'icon' => '#',
						'link' => '#',
					)
				),
				'info_blocks' => array(
					'documentation' => array(
						'thumb'       => 'https://plugins.rovadex.com/rx-theme-wizard/documentation-thumb.png',
						'title'       => esc_html__( 'Documentation', 'rvdx-theme' ),
						'description' => esc_html__( 'Detailed documentation which explains in easy way how to setup and customize our theme. Your site customisations will be easy and fast!', 'rvdx-theme' ),
						'link_text'   => esc_html__( 'Read', 'rvdx-theme' ),
						'link'        => 'https://documentation.rovadex.com/' . $theme_slag,
					),
					'support' => array(
						'thumb'       => 'https://plugins.rovadex.com/rx-theme-wizard/support-thumb.png',
						'title'       => esc_html__( 'Support', 'rvdx-theme' ),
						'description' => esc_html__( 'We always care about our customers, our loyal support team are always ready to help', 'rvdx-theme' ),
						'link_text'   => esc_html__( 'Submit Ticket', 'rvdx-theme' ),
						'link'        => 'https://rovadex.ticksy.com',
					),
					'author' => array(
						'thumb'       => 'https://plugins.rovadex.com/rx-theme-wizard/author-thumb.png',
						'title'       => esc_html__( 'Rovadex', 'rvdx-theme' ),
						'description' => esc_html__( 'Business has an idea, an idea has a realization. We develop ideas for your business on the Internet. With our help, you will put into effect the most demanding and quality projects.', 'rvdx-theme' ),
						'link_text'   => esc_html__( 'Author Site', 'rvdx-theme' ),
						'link'        => 'https://rovadex.com/',
					),
				),
			)
		),
	),
);

$texts = array(
	'theme-name' => $theme->get( 'Name' ),
);

$config = array(
	'license' => $license,
	'plugins' => $plugins,
	'skins'   => $skins,
	'texts'   => $texts,
);
