( function( $ ) {
	'use strict';

	var RxMenu = function( element, options ) {

		this.defaultSettings = {
			enabled: false,
			threshold: 767, // Minimal menu width, when this plugin activates
			mouseLeaveDelay: 500,
			openSubType: 'hover', // hover, click
			mainMenuSelector: '.menu',
			menuItemSelector: '.menu-item',
			moreMenuContent:  '&middot;&middot;&middot;',
			templates: {
				mobileMenuToogleButton: '<button class="mobile-menu-toggle-button"><i class="menu-toggle__icon"></i></button>',
			}
		}

		this.settings = $.extend( this.defaultSettings, options );

		this.$window = $( window );

		this.$document = $( document );

		this.$element = $( element );

		this.$instance = $( this.settings.mainMenuSelector, this.$element ).addClass( 'responsive-menu menu--animation-type-fade' );

		this.$menuItems = $( '>' + this.settings.menuItemSelector, this.$instance ).addClass( 'responsive-menu-item' );

		this.$moreItemsInstance = null;

		this.hiddenItemsArray = [];

		this.createMenuInstance();

		this.$instance.trigger( 'RxMenuCreated' );
	}

	RxMenu.prototype = {
		constructor: RxMenu,

		createMenuInstance: function() {
			var self = this,
				mainMenuWidth,
				totalVisibleItemsWidth = 0;

			this.subMenuRebuild();

			// Add available items list
			if ( ! tools.isEmpty( this.settings.moreMenuContent ) && self.settings.enabled ) {
				self.$instance.append( '<li class="menu-item menu-item-has-children simple-menu-item responsive-menu-available-items" hidden><a href="#" class="top-level-link"><div class="menu-item-wrapper">' + this.settings.moreMenuContent + '</div></a><ul class="sub-menu"></ul></li>' );
				self.$moreItemsInstance = $( '> .responsive-menu-available-items', this.$instance );
				self.$moreItemsInstance.attr( { 'hidden': 'hidden' } );
			}

			// Add mobile menu toogle button
			if ( ! tools.isEmpty( this.settings.templates.mobileMenuToogleButton ) ) {
				this.$element.prepend( this.settings.templates.mobileMenuToogleButton );
				this.$mobileToogleButton = $( '.mobile-menu-toggle-button', this.$element );
			}

			if ( this.isThreshold() ) {
				this.$element.addClass( 'mobile-menu' );
				$( 'body' ).addClass( 'mobile-menu-active' );
			} else {
				$( 'body' ).addClass( 'desktop-menu-active' );
				this.rebuildItems();
			}

			this.subMenuHandler();

			this.mobileViewHandler();

			this.watch();
		},

		/**
		 * SubMenu items Handler.
		 *
		 * @return {void}
		 */
		subMenuHandler: function() {
			var self = this,
				transitionend = 'transitionend oTransitionEnd webkitTransitionEnd',
				prevClickedItem = null,
				menuItem,
				menuItemParents,
				timer;

			if ( self.mobileAndTabletcheck() ) {
				this.$instance.on( 'touchstart', '.menu-item > a', touchStartItem );
				this.$instance.on( 'touchend', '.menu-item > a', touchEndItem );
			} else {

				this.$instance.on( 'mouseenter', '.menu-item > a', mouseEnterHandler );
				this.$instance.on( 'mouseleave', '.menu-item > a', mouseLeaveHandler );

				this.$instance.on( 'mouseenter', '.sub-menu', mouseEnterSubMenuHandler );
				this.$instance.on( 'mouseenter', mouseEnterInstanceHandler );
				this.$instance.on( 'mouseleave', mouseLeaveInstanceHandler );
			}

			function touchStartItem( event ) {
				var $currentTarget = $( event.currentTarget ),
					$this          = $currentTarget.closest( '.menu-item' );

				$this.data( 'offset', $this.offset().top );
			}

			function touchEndItem( event ) {
				var $this,
					$siblingsItems,
					$link,
					link,
					$currentTarget,
					subMenu,
					offset;

				event.preventDefault();
				event.stopPropagation();

				$currentTarget = $( event.currentTarget );
				$this          = $currentTarget.closest( '.menu-item' );
				$siblingsItems = $this.siblings( '.menu-item.menu-item-has-children' );
				$link          = $( '> a', $this );
				link           = $link.attr( 'href' );
				subMenu        = $( '.sub-menu:first', $this );
				offset         = $this.data( 'offset' );

				if ( offset !== $this.offset().top ) {
					return false;
				}

				if ( $siblingsItems[0] ) {
					$siblingsItems.removeClass( 'menu-hover' );
					$( '.menu-item-has-children', $siblingsItems ).removeClass( 'menu-hover' );
				}

				if ( ! $( '.sub-menu', $this )[0] || $this.hasClass( 'menu-hover' ) ) {
					//window.location = $link.attr( 'href' );

					//$( 'body' ).removeClass( 'mobile-menu-visible' );
					//self.$element.removeClass( 'mobile-menu-active-state' );

					//return false;
				}

				if ( $this.hasClass( 'menu-hover' ) ) {
					$this.removeClass( 'menu-hover' );

					return false;
				}

				if ( subMenu[0] ) {
					$this.addClass( 'menu-hover' );
				}
			}

			function mouseEnterHandler( event ) {
				var subMenu;

				menuItem = $( event.target ).parents( '.menu-item' );
				subMenu = menuItem.children( '.sub-menu' ).first();

				$( '.menu-hover', this.$instance ).removeClass( 'menu-hover' );

				if ( subMenu[0] ) {
					menuItem.addClass( 'menu-hover' );
				}
			}

			function mouseLeaveHandler( event ) {
				// Item Mouse Leave Event
			}

			function mouseEnterSubMenuHandler( event ) {
				clearTimeout( timer );
			}

			function mouseEnterInstanceHandler( event ) {
				clearTimeout( timer );
			}

			function mouseLeaveInstanceHandler( event ) {
				timer = setTimeout( function() {
					$( '.menu-hover', this.$instance ).removeClass( 'menu-hover' );
				}, self.settings.mouseLeaveDelay );
			}

			self.$window.on( 'orientationchange resize', function() {
				if ( $( 'body' ).hasClass( 'mobile-menu-active' ) ) {
					return;
				}

				self.$instance.find( '.menu-item' ).removeClass( 'menu-hover' );
			} );

		},

		/**
		 * Mobile View Handler.
		 *
		 * @return {void}
		 */
		mobileViewHandler: function() {
			var self             = this,
				toogleStartEvent = 'mousedown',
				toogleEndEvent   = 'mouseup';

			if ( 'ontouchend' in window || 'ontouchstart' in window ) {
				toogleStartEvent = 'touchstart';
				toogleEndEvent = 'touchend';
			}

			this.$mobileToogleButton.on( toogleEndEvent, function( event ) {
				event.preventDefault();

				$( 'body' ).toggleClass( 'mobile-menu-visible' );
				self.$element.toggleClass( 'mobile-menu-active-state' );
			} );
		},

		/**
		 * Responsive menu watcher function.
		 *
		 * @param  {number} Watcher debounce delay.
		 * @return {void}
		 */
		watch: function( delay ) {
			var delay = delay || 10;

			$( window ).on( 'resize.RxResponsiveMenu orientationchange.RxResponsiveMenu', this.debounce( delay, this.watcher.bind( this ) ) );
			this.$instance.trigger( 'containerResize' );
		},

		/**
		 * Responsive menu watcher callback.
		 *
		 * @param  {Object} Resize or Orientationchange event.
		 * @return {void}
		 */
		watcher: function( event ) {

			if ( this.isThreshold() ) {
				this.$element.addClass( 'mobile-menu' );
				$( 'body' ).addClass( 'mobile-menu-active' );
				$( 'body' ).removeClass( 'desktop-menu-active' );
				this.$menuItems.removeAttr( 'hidden' );

				// More-items listing not empty checking
				if ( 0 !== this.hiddenItemsArray.length ) {
					$( '> .sub-menu', this.$moreItemsInstance ).empty();
				}

				if ( this.settings.enabled ) {
					this.$moreItemsInstance.attr( { 'hidden': 'hidden' } );
				}

			} else {
				this.$element.removeClass( 'mobile-menu' );
				$( 'body' ).removeClass( 'mobile-menu-active' );
				$( 'body' ).addClass( 'desktop-menu-active' );
				$( 'body' ).removeClass( 'mobile-menu-visible' );

				this.rebuildItems();

				this.$instance.trigger( 'containerResize' );
			}
		},

		/**
		 * Responsive Menu rebuilding function.
		 *
		 * @return {void}
		 */
		rebuildItems: function() {

			if ( ! this.settings.enabled ) {
				return false;
			}

			var self                       = this,
				mainMenuWidth              = this.$instance.width(),
				correctedMenuWidth         = this.$instance.width() - self.$moreItemsInstance.outerWidth( true ),
				iterationVisibleItemsWidth = 0,
				iterationHiddenItemsWidth  = this.getVisibleItemsWidth(),
				visibleItemsArray          = [],
				hiddenItemsArray           = [];

			self.$menuItems.each( function() {
				var $this = $( this );

				iterationVisibleItemsWidth += $this.outerWidth( true );

				if ( iterationVisibleItemsWidth > correctedMenuWidth && ! tools.inArray( this, hiddenItemsArray ) ) {
					hiddenItemsArray.push( this );
				} else {
					visibleItemsArray.push( this );
				}

			} );

			hiddenItemsArray.forEach( function( item ) {
				var $item = $( item );

				$item.attr( { 'hidden': 'hidden' } );
			} );

			visibleItemsArray.forEach( function( item, index ) {
				var $item = $( item );

				$item.removeAttr( 'hidden' );
			} );

			$( '> .sub-menu', self.$moreItemsInstance ).empty();

			hiddenItemsArray.forEach( function( item ) {
				var $clone = $( item ).clone();

				$clone.addClass( 'sub-menu-item' );

				$clone.removeAttr( 'hidden' );

				$( '> .top-level-link', $clone ).toggleClass( 'top-level-link sub-level-link' );

				$( '> .sub-menu', self.$moreItemsInstance ).append( $clone );
			} );

			if ( 0 == hiddenItemsArray.length ) {
				self.$moreItemsInstance.attr( { 'hidden': 'hidden' } );
				self.$moreItemsInstance.addClass( 'rx-empty' );
			} else {
				self.$moreItemsInstance.removeAttr( 'hidden' );
				self.$moreItemsInstance.removeClass( 'rx-empty' );
			}

			self.hiddenItemsArray = hiddenItemsArray;

			this.$instance.trigger( 'rebuildItems' );
		},

		/**
		 * Sub Menu rebuilding function.
		 *
		 * @return {void}
		 */
		subMenuRebuild: function() {
			var self = this;

			this.$instance.on( 'rebuildItems', function() {
				var $menuItemsList = $( '> .menu-item', self.$instance ),
					maxWidth       = self.$instance.outerWidth( true );

				$menuItemsList.each( function() {
					var $subMenuItem  = $( '> .sub-menu', this ),
						subMenuOffset = $( this ).position().left,
						subMenuPos    = subMenuOffset + $subMenuItem.outerWidth( true );

					if ( subMenuPos >= maxWidth ) {
						$subMenuItem.addClass( 'right-side' );
					} else {
						$subMenuItem.removeClass( 'right-side' );
					}

				} );
			} );
		},

		/**
		 * Get visible items total width
		 *
		 * @return {int}
		 */
		getVisibleItemsWidth: function() {
			var totalVisibleItemsWidth = 0;

			this.$menuItems.each( function() {
				var $this = $( this );

				if ( ! $this.hasAttr( 'hidden' ) ) {
					totalVisibleItemsWidth += $this.outerWidth( true );
				}

			} );

			return totalVisibleItemsWidth;
		},

		/**
		 * Get mobile status.
		 *
		 * @return {boolean} Mobile Status
		 */
		isThreshold: function() {
			return ( this.$window.width() < this.settings.threshold ) ? true : false;
		},

		/**
		 * Mobile and tablet check funcion.
		 *
		 * @return {boolean} Mobile Status
		 */
		mobileAndTabletcheck: function() {
			var check = false;

			(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);

			return check;
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
	}

	/*
	 * Js tools
	 */
	var tools = {
		isEmpty: function( value ) {
			return ( ( false === value ) || ( '' === value ) || ( null === value ) || ( undefined === value ));
		},

		isEmptyObject: function( value ) {
			return ( true === this.isEmpty( value ) ) || ( 0 === value.length );
		},

		isString: function(value) {
			return ( ( 'string' === typeof value ) || ( value instanceof String ) );
		},

		isArray: function( value ) {
			return $.isArray( value );
		},

		inArray: function( value, array ) {
			return ( $.inArray( value, array ) !== -1);
		}
	};

	/*
	 * Jq tools
	 */
	$.fn.hasAttr = function( name ) {
		return this.attr( name ) !== undefined;
	};

	// jQuery plugin
	$.fn.RxMenu = function( options ) {
		return this.each( function() {
			var $this         = $( this ),
				pluginOptions = ( 'object' === typeof options ) ? options : {};

			if ( ! $this.data( 'RxMenu' ) ) {

				// create plugin instance (only if not exists) and expose the entire instance API
				$this.data( 'RxMenu', new RxMenu( this, pluginOptions ) );
			}
		} );
	};

}( jQuery ) );
