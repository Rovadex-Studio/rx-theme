;var Rx_Theme_JS;

(function($) {
	'use strict';

	Rx_Theme_JS = {

		$window: $( window ),

		$body: $( 'body' ),

		threshold: 768,

		init: function() {
			this.page_preloader_init();
			this.eventsInit();
			this.toTopInit();
			this.responsiveMenuInit();
			this.magnificPopupInit();
			this.swiperInit();
			this.mobilePanelInit();
		},

		page_preloader_init: function(self) {

			if ($('.page-preloader-cover')[0]) {
				$('.page-preloader-cover').delay(500).fadeTo(500, 0, function() {
					$(this).remove();
				});
			}
		},

		toTopInit: function() {
			if ($.isFunction(jQuery.fn.UItoTop)) {
				$().UItoTop({
					text: '',
					scrollSpeed: 600
				});
			}
		},

		responsiveMenuInit: function() {
			$( '.main-navigation' ).RxMenu();
		},

		magnificPopupInit: function() {

			if (typeof $.magnificPopup !== 'undefined') {

				//MagnificPopup init
				$('[data-popup="magnificPopup"]').magnificPopup({
					type: 'image'
				});

				$(".gallery > .gallery-item a").filter("[href$='.png'],[href$='.jpg']").magnificPopup({
					type: 'image',
					gallery: {
						enabled: true,
						navigateByImgClick: true,
					},
				});

			}
		},

		swiperInit: function() {
			if (typeof Swiper !== 'undefined') {

				//Swiper carousel init
				var mySwiper = new Swiper('.swiper-container', {
					// Optional parameters
					loop: true,
					spaceBetween: 10,

					// Navigation arrows
					nextButton: '.swiper-button-next',
					prevButton: '.swiper-button-prev',
				})

			}
		},

		mobilePanelInit: function() {
			var $mobilePanel = $( '.rx-mobile-panel' ),
				$body        = $( 'body' );

			if ( ! $mobilePanel[0] ) {
				return false;
			}

			var $controls         = $( '.rx-mobile-panel__control', $mobilePanel ),
				controlsData      = {},
				$sidebarToggle    = $( '.rx-mobile-panel__control--sidebar', $mobilePanel ),
				$mobileMenuToggle = $( '.rx-mobile-panel__control--mobile-menu', $mobilePanel );

			$controls.each( function( intex ) {
				var $control    = $( this ),
					type        = $control.data( 'control-type' ),
					controlData = {
						'selector': $control,
						'type': type,
						'status': 'hidden',
					};

				controlsData[ type ] = controlData;
			} );

			$controls.on( 'click.rxTheme', function( event ) {
				var $this = $( this ),
					type  = $this.data( 'control-type' );

				if ( ! $this.hasClass( 'active' ) ) {
					modifyControlData( type, 'status', 'visible' );
				} else {
					modifyControlData( type, 'status', 'hidden' );
				}

				controlsSync();
			} );

			this.$window.on( 'rx-theme/responsive-menu/mobile/hide-event', function() {
				//$mobileMenuToggle.removeClass( 'active' );

				modifyControlData( 'mobile-menu', 'status', 'hidden' );
				controlsSync();
			} );

			function modifyControlData( type, key, value ) {

				if ( 'status' === key ) {
					for ( var _key in controlsData ) {
						controlsData[ _key ][ 'status' ] = 'hidden';
					}
				}

				controlsData[ type ][ key ] = value;
			}

			function controlsSync() {

				for ( var key in controlsData ) {
					var $control = controlsData[ key ].selector,
						type     = controlsData[ key ].type,
						status   = controlsData[ key ].status;

					if ( 'hidden' == status ) {
						$control.removeClass( 'active' );
						$body.removeClass( type + '-visible' );
					}

					if ( 'visible' == status ) {
						$control.addClass( 'active' );
						$body.addClass( type + '-visible' );
					}

				}
			}
		},

		eventsInit: function() {
			Rx_Theme_JS.$window.on( 'resize.RxTheme orientationchange.RxTheme', Rx_Theme_JS.debounce( 50, Rx_Theme_JS.watcher.bind( this ) ) ).trigger( 'resize.RxTheme' );
		},

		/**
		 * Resize Event Watcher callback.
		 *
		 * @param  {Object} Resize or Orientationchange event.
		 * @return {void}
		 */
		watcher: function( event ) {

			if ( Rx_Theme_JS.isThreshold() ) {
				Rx_Theme_JS.$body.addClass( 'mobile-layout' );
				Rx_Theme_JS.$body.removeClass( 'desktop-layout' );
			} else {
				Rx_Theme_JS.$body.addClass( 'desktop-layout' );
				Rx_Theme_JS.$body.removeClass( 'mobile-layout' );
			}
		},

		/**
		 * Get mobile status.
		 *
		 * @return {boolean} Mobile Status
		 */
		isThreshold: function() {
			return ( Rx_Theme_JS.$window.width() < Rx_Theme_JS.threshold ) ? true : false;
		},

		/**
		 * Debounce the function call
		 *
		 * @param  {number}   threshold The delay.
		 * @param  {Function} callback  The function.
		 */
		debounce: function ( threshold, callback ) {
			var timeout;

			return function debounced( $event ) {
				function delayed() {
					callback.call( this, $event );
					timeout = null;
				}

				if ( timeout ) {
					clearTimeout( timeout );
				}

				timeout = setTimeout( delayed, threshold );
			};
		},
	};

	Rx_Theme_JS.init();

}(jQuery));
