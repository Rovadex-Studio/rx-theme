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
			$( '.main-navigation' ).RxMenu( {
				/*enabled: rollUp,
				mouseLeaveDelay: +jetMenuMouseleaveDelay,
				megaWidthType: jetMenuMegaWidthType,
				megaWidthSelector: jetMenuMegaWidthSelector,
				openSubType: jetMenuMegaOpenSubType,
				threshold: +jetMenuMobileBreakpoint*/
			} );
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

			var $sidebarToggle = $( '.rx-mobile-panel__control--sidebar', $mobilePanel );

			$sidebarToggle.on( 'click.rxTheme', function( event ) {
				$body.toggleClass( 'sidebar-visible' );
				$sidebarToggle.toggleClass( 'active' );
			} );

		},

		eventsInit: function() {
			Rx_Theme_JS.$window.on( 'resize.RxTheme orientationchange.RxTheme', Rx_Theme_JS.debounce( 50, Rx_Theme_JS.watcher.bind( this ) ) ).trigger( 'resize.RxTheme' );
		},

		/**
		 * Responsive menu watcher callback.
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
		}
	};

	Rx_Theme_JS.init();

}(jQuery));
