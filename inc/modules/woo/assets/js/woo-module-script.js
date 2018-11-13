;var Rx_Theme_Woo_Module;


(function ($) {
	"use strict";


	Rx_Theme_Woo_Module = {

		init: function () {
			this.wooHeaderCart();
		},

		wooHeaderCart: function () {
			var headerCartButton = $('.header-cart__link-wrap'),

			toggleButton = function (e){
				e.preventDefault();
				$('.header-cart__content').toggleClass('show');
			};

			headerCartButton.on('click', toggleButton );

		}

	};

	Rx_Theme_Woo_Module.init();

}(jQuery));
