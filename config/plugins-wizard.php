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
		'name'   => esc_html__( 'Jet Data Importer', 'rx-theme' ),
		'source' => 'remote', // 'local', 'remote', 'wordpress' (default).
		'path'   => 'http://plugins.rovadex.com/jet-data-importer.zip',
		'access' => 'base',
	),

	'elementor' => array(
		'name'   => esc_html__( 'Elementor Page Builder', 'rx-theme' ),
		'access' => 'base',
	),

	'jetwidgets-for-elementor' => array(
		'name'   => esc_html__( 'JetWidgets For Elementor', 'rx-theme' ),
		'access' => 'base',
	),

	'smart-slider-3' => array(
		'name'   => esc_html__( 'Smart Slider 3', 'rx-theme' ),
		'access' => 'base',
	),

	'header-footer-elementor' => array(
		'name'   => esc_html__( 'Header Footer Elementor', 'rx-theme' ),
		'access' => 'base',
	),

	'rx-theme-assistant' => array(
		'name'   => esc_html__( 'Rx Theme Assistant', 'rx-theme' ),
		'source' => 'remote', // 'local', 'remote', 'wordpress' (default).
		'path'   => 'https://github.com/Rovadex-Studio/rx-theme-assistant/archive/master.zip',
		'access' => 'base',
	),

	'cherry-ld-mods-switcher' => array(
		'name'   => esc_html__( 'Cherry ld mods switcher', 'rx-theme' ),
		'source' => 'remote', // 'local', 'remote', 'wordpress' (default).
		'path'   => 'http://plugins.rovadex.com/cherry-ld-mods-switcher.zip',
		'access' => 'base',
	),

	'contact-form-7' => array(
		'name'   => esc_html__( 'Contact Form 7', 'rx-theme' ),
		'access' => 'base',
	),

	'gutenberg' => array(
		'name'   => esc_html__( 'Gutenberg', 'rx-theme' ),
		'access' => 'skins',
	),

	'wp-gdpr-compliance' => array(
		'name'   => esc_html__( 'WP GDPR Compliance', 'rx-theme' ),
		'access' => 'skins',
	),

	'wordpress-seo' => array(
		'name'   => esc_html__( 'Yoast SEO', 'rx-theme' ),
		'access' => 'skins',
	),

	'autoptimize' => array(
		'name'   => esc_html__( 'Autoptimize', 'rx-theme' ),
		'access' => 'skins',
	),

	'wp-super-cache' => array(
		'name'   => esc_html__( 'WP Super Cache', 'rx-theme' ),
		'access' => 'skins',
	),
);

/**
 * Skins configuration
 *
 * @var array
 */
$skins = array(
	'base' => array(
		'jet-data-importer',
		'elementor',
		'jetwidgets-for-elementor',
		'smart-slider-3',
		'mailchimp-for-wp',
		'rx-theme-assistant',
		'contact-form-7',
	),
	'advanced' => array(
		'default' => array(
			'full'  => array(
				'wp-gdpr-compliance',
				'gutenberg',
			),
			'lite'            => false,
			'demo'            => 'http://rx-theme.rovadex.com/',
			'thumb'           => get_theme_file_uri( 'screenshot.png' ),
			'name'            => esc_html__( 'Rx Theme', 'rx-theme' ),
			'additional_info' => array(
				'title'       => esc_html__( 'Rx Theme Theme v.1.0.0', 'rx-theme' ),
				'description' => esc_html__( 'An ideal solution particularly regards to plumber and water service as well as it enables you to build a wide variety of business websites.', 'rx-theme' ),
				'social_links' => array(
					'facebook' => array(
						'icon' => '#',
						'link' => '#',
					)
				),
				'info_blocks' => array(
					'documentation' => array(
						'thumb'       => 'https://plugins.rovadex.com/rx-theme-wizard/documentation-thumb.png',
						'title'       => esc_html__( 'Documentation', 'rx-theme' ),
						'description' => esc_html__( 'Detailed documentation which explains in easy way how to setup and customize our theme. Your site customisations will be easy and fast!', 'rx-theme' ),
						'link_text'   => esc_html__( 'Read', 'rx-theme' ),
						'link'        => 'https://documentation.rovadex.com/rx-theme',
					),
					'support' => array(
						'thumb'       => 'https://plugins.rovadex.com/rx-theme-wizard/support-thumb.png',
						'title'       => esc_html__( 'Support', 'rx-theme' ),
						'description' => esc_html__( 'We always care about our customers, our loyal support team are always ready to help', 'rx-theme' ),
						'link_text'   => esc_html__( 'Submit Ticket', 'rx-theme' ),
						'link'        => 'https://rovadex.ticksy.com',
					),
					'author' => array(
						'thumb'       => 'https://plugins.rovadex.com/rx-theme-wizard/author-thumb.png',
						'title'       => esc_html__( 'Author', 'rx-theme' ),
						'description' => esc_html__( 'Business has an idea, an idea has a realization. We develop ideas for your business on the Internet. With our help, you will put into effect the most demanding and quality projects.', 'rx-theme' ),
						'link_text'   => esc_html__( 'Author Site', 'rx-theme' ),
						'link'        => 'https://rovadex.com/',
					),
				),
			)
		),
	),
);

$texts = array(
	'theme-name' => esc_html__( 'Rx Theme', 'rx-theme' ),
);

$config = array(
	'license' => $license,
	'plugins' => $plugins,
	'skins'   => $skins,
	'texts'   => $texts,
);
