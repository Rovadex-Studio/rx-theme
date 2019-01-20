<?php
/**
 * Class description
 *
 * @package   package_name
 * @author    Rovadex
 * @license   GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Rx_Theme_Post_Meta' ) ) {

	/**
	 * Define Rx_Theme_Post_Meta class
	 */
	class Rx_Theme_Post_Meta {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		private static $instance = null;

		/**
		 * The post meta arguments.
		 *
		 * @since 1.0.0
		 * @var   array
		 */
		private $post_meta_args = array();

		/**
		 * Constructor for the class
		 */
		public function init() {


			$this->rx_theme_meta_init();
		}

		/**
		 * [rx_theme_meta_init description]
		 * @return [type] [description]
		 */
		public function rx_theme_meta_init() {

			new Cherry_X_Post_Meta( array(
				'id'            => 'rx-theme-post-type-settings',
				'title'         => esc_html__( 'Post Formats Settings', 'rx-theme' ),
				'page'          => array( 'post' ),
				'context'       => 'normal',
				'priority'      => 'high',
				'callback_args' => false,
				'builder_cb'    => array( $this, 'rx_theme_get_interface_builder' ),
				'fields'        => array(
					'post_formats' => array(
						'type'        => 'component-tab-horizontal',
					),
					'gallery_tab' => array(
						'type'        => 'settings',
						'parent'      => 'post_formats',
						'title'       => esc_html__( 'Gallery', 'rx-theme' ),
					),
					'rx_theme_gallery_images' => array(
						'type'               => 'media',
						'parent'             => 'gallery_tab',
						'title'              => esc_html__( 'Image Gallery', 'rx-theme' ),
						'description'        => esc_html__( 'Choose image(s) for the gallery. This setting is used for your gallery post formats.', 'rx-theme' ),
						'library_type'       => 'image',
						'upload_button_text' => esc_html__( 'Set Gallery Images', 'rx-theme' ),
					),
					'link_tab' => array(
						'type'        => 'settings',
						'parent'      => 'post_formats',
						'title'       => esc_html__( 'Link', 'rx-theme' ),
					),
					'rx_theme_link' => array(
						'type'        => 'text',
						'parent'      => 'link_tab',
						'title'       => esc_html__( 'Link URL', 'rx-theme' ),
						'description' => esc_html__( 'Enter your external url. This setting is used for your link post formats.', 'rx-theme' ),
					),
					'rx_theme_link_target' => array(
						'type'        => 'select',
						'parent'      => 'link_tab',
						'title'       => esc_html__( 'Link Target', 'rx-theme' ),
						'description' => esc_html__( 'Choose your target for the url. This setting is used for your link post formats.', 'rx-theme' ),
						'value'       => '_blank',
						'options'     => array(
							'_blank' => 'Blank',
							'_self'  => 'Self'
						)
					),
					'quote_tab' => array(
						'type'        => 'settings',
						'parent'      => 'post_formats',
						'title'       => esc_html__( 'Quote', 'rx-theme' ),
					),
					'rx_theme_quote_text' => array(
						'type'        => 'textarea',
						'parent'      => 'quote_tab',
						'title'       => esc_html__( 'Quote', 'rx-theme' ),
						'description' => esc_html__( 'Enter your quote. This setting is used for your quote post formats.', 'rx-theme' ),
					),
					'rx_theme_quote_cite' => array(
						'type'        => 'text',
						'parent'      => 'quote_tab',
						'title'       => esc_html__( 'Cite', 'rx-theme' ),
						'description' => esc_html__( 'Enter the quote source. This setting is used for your quote post formats.', 'rx-theme' ),
					),
					'audio_tab' => array(
						'type'        => 'settings',
						'parent'      => 'post_formats',
						'title'       => esc_html__( 'Audio', 'rx-theme' ),
					),
					'rx_theme_audio' => array(
						'type'               => 'media',
						'parent'             => 'audio_tab',
						'title'              => esc_html__( 'Audio', 'rx-theme' ),
						'description'        => esc_html__( 'Add audio from the media library. This setting is used for your audio post formats.', 'rx-theme' ),
						'library_type'       => 'audio',
						'multi_upload'       => false,
						'upload_button_text' => esc_html__( 'Set audio', 'rx-theme' ),
					),
					'rx_theme_audio_loop' => array(
						'type'        => 'switcher',
						'parent'      => 'audio_tab',
						'title'       => esc_html__( 'Loop', 'rx-theme' ),
						'description' => esc_html__( 'Allows for the looping of media.', 'rx-theme' ),
						'value'       => false,
					),
					'rx_theme_audio_autoplay' => array(
						'type'        => 'switcher',
						'parent'      => 'audio_tab',
						'title'       => esc_html__( 'Autoplay', 'rx-theme' ),
						'description' => esc_html__( 'Causes the media to automatically play as soon as the media file is ready.', 'rx-theme' ),
						'value'       => false,
					),
					'rx_theme_audio_preload' => array(
						'type'        => 'switcher',
						'parent'      => 'audio_tab',
						'title'       => esc_html__( 'Preload', 'rx-theme' ),
						'description' => esc_html__( 'Specifies if and how the audio should be loaded when the page loads.', 'rx-theme' ),
						'value'       => false,
					),
					'video_tab' => array(
						'type'        => 'settings',
						'parent'      => 'post_formats',
						'title'       => esc_html__( 'Video', 'rx-theme' ),
					),
					'rx_theme_video_type' => array(
						'type'        => 'radio',
						'parent'      => 'video_tab',
						'title'       => esc_html__( 'Video Source Type', 'rx-theme' ),
						'description' => esc_html__( 'Choose video source type. This setting is used for your video post formats.', 'rx-theme' ),
						'value'       => 'library',
						'options' => array(
							'library' => array(
								'label' => 'Media Library',
							),
							'external' => array(
								'label' => 'External Video',
							)
						),
					),
					'rx_theme_video_library' => array(
						'type'               => 'media',
						'parent'             => 'video_tab',
						'title'              => esc_html__( 'Library Video', 'rx-theme' ),
						'description'        => esc_html__( 'Add video from the media library. This setting is used for your video post formats.', 'rx-theme' ),
						'library_type'       => 'video',
						'multi_upload'       => false,
						'upload_button_text' => esc_html__( 'Set Video', 'rx-theme' ),
						'conditions'         => array(
							'rx_theme_video_type' => 'library',
						),
					),
					'rx_theme_video_external' => array(
						'type'        => 'text',
						'parent'      => 'video_tab',
						'title'       => esc_html__( 'External Video URL', 'rx-theme' ),
						'description' => esc_html__( 'Enter a URL that is compatible with WP built-in oEmbed feature. This setting is used for your video post formats.', 'rx-theme' ),
						'conditions'  => array(
							'rx_theme_video_type' => 'external',
						),
					),
					'rx_theme_video_poster' => array(
						'type'               => 'media',
						'parent'             => 'video_tab',
						'title'              => esc_html__( 'Video Poster', 'rx-theme' ),
						'description'        => esc_html__( 'Defines image to show as placeholder before the media plays.', 'rx-theme' ),
						'library_type'       => 'image',
						'multi_upload'       => false,
						'upload_button_text' => esc_html__( 'Set Poster', 'rx-theme' ),
					),
					'rx_theme_video_width' => array(
						'type'        => 'stepper',
						'parent'      => 'video_tab',
						'title'       => esc_html__( 'Width', 'rx-theme' ),
						'description' => esc_html__( 'Defines width of the media.', 'rx-theme' ),
						'value'       => 770,
						'max_value'   => 1200,
						'min_value'   => 100,
					),
					'rx_theme_video_height' => array(
						'type'        => 'stepper',
						'parent'      => 'video_tab',
						'title'       => esc_html__( 'Height', 'rx-theme' ),
						'description' => esc_html__( 'Defines height of the media.', 'rx-theme' ),
						'value'       => 480,
						'max_value'   => 1200,
						'min_value'   => 100,
					),
					'rx_theme_video_loop' => array(
						'type'        => 'switcher',
						'parent'      => 'video_tab',
						'title'       => esc_html__( 'Loop', 'rx-theme' ),
						'description' => esc_html__( 'Allows for the looping of media.', 'rx-theme' ),
						'value'       => false,
					),
					'rx_theme_video_autoplay' => array(
						'type'        => 'switcher',
						'parent'      => 'video_tab',
						'title'       => esc_html__( 'Autoplay', 'rx-theme' ),
						'description' => esc_html__( 'Causes the media to automatically play as soon as the media file is ready.', 'rx-theme' ),
						'value'       => false,
						'conditions'  => array(
							'rx_theme_video_loop' => 'true',
						),
					),
					'rx_theme_video_preload' => array(
						'type'        => 'switcher',
						'parent'      => 'video_tab',
						'title'       => esc_html__( 'Preload', 'rx-theme' ),
						'description' => esc_html__( 'Specifies if and how the video should be loaded when the page loads.', 'rx-theme' ),
						'value'       => false,
					),
				),
			) );

		}

		/**
		 * Retur CX_Interface_Builder instance.
		 *
		 * @return object
		 */
		public function rx_theme_get_interface_builder() {

			$builder_data = rx_theme()->framework->get_included_module_data( 'cherry-x-interface-builder.php' );

			return new CX_Interface_Builder(
				array(
					'path' => $builder_data['path'],
					'url'  => $builder_data['url'],
				)
			);
		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @return object
		 */
		public static function get_instance() {

			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}
	}

}

function rx_theme_post_meta() {
	return Rx_theme_Post_Meta::get_instance();
}
