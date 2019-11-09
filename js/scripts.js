(function($){
    "use strict";

	/* FIX TRIM FOR IE8 */
	if ( typeof String.prototype.trim !== 'function' ) {
		String.prototype.trim = function() {
			return this.replace(/^\s+|\s+$/g, '');
		};
	}

/* -----------------------------------------------------------------------------

	GLOBAL FUNCTIONS

----------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------
		ACCORDION
	------------------------------------------------------------------------- */

	$.fn.uouAccordion = function(){

		var self = $(this),
		items = self.find( '.accordion-item' );

		items.find( '.accordion-item-content:visible' ).css( 'display', 'block' );
		items.find( '.accordion-item-content:hidden' ).css( 'display', 'none' );

		items.find( '.accordion-toggle' ).each(function(){
			$(this).click(function(){

				if ( ! self.hasClass( 'type-toggle' ) ) {

					self.find( '.accordion-item.active .accordion-toggle .fa-minus' ).removeClass( 'fa-minus' ).addClass( 'fa-plus' );
					self.find( '.accordion-item.active .accordion-item-content' ).slideUp(300);
					self.find( '.accordion-item' ).removeClass( 'active' );

				}

				$(this).find( '.fa' ).toggleClass( 'fa-plus fa-minus' );
				$(this).parents( '.accordion-item' ).toggleClass( 'active' ).find( '.accordion-item-content' ).slideToggle(300, function(){
					if ( $(this).is( ':visible' ) ) {
						$(this).css( 'display', 'block' );
					}
					else {
						$(this).css( 'display', 'none' );
					}
				});

			});
		});

		return false;

	};

	/* -------------------------------------------------------------------------
		ALERT MESSAGES
	------------------------------------------------------------------------- */

	$.fn.uouAlertMessage = function(){

		var self = $(this),
		close = self.find( '.close' );
		close.click(function(){
			self.slideUp(300);
		});

	};

	/* -------------------------------------------------------------------------
		CONTACT FORM
	------------------------------------------------------------------------- */

	$.fn.uouContactForm = function(){

		var form = $(this).prop( 'tagName' ).toLowerCase() === 'form' ? $(this) : $(this).find( 'form' ),
		submit_btn = form.find( '.submit-btn' );

		form.submit(function(e){
			e.preventDefault();

			if ( ! submit_btn.hasClass( 'loading' ) ) {

				// form not valid
				if ( ! form.uouFormValid() ) {
					form.find( 'p.alert-message.warning.validation' ).slideDown(300);
					return false;
				}
				// form valid
				else {

					submit_btn.addClass( 'loading' ).attr( 'data-label', submit_btn.text() );
					submit_btn.text( submit_btn.data( 'loading-label' ) );

					// ajax request
					$.ajax({
						type: 'POST',
						url: form.attr( 'action' ),
						data: form.serialize(),
						success: function( data ){

							form.find( '.alert-message.validation' ).hide();
							form.prepend( data );
							form.find( '.alert-message.success, .alert-message.phpvalidation' ).slideDown(300);
							submit_btn.removeClass( 'loading' );
							submit_btn.text( submit_btn.attr( 'data-label' ) );

							// reset all inputs
							if ( data.indexOf( 'success' ) > 0 ) {
								form.find( 'input, textarea' ).each( function() {
									$(this).val( '' );
								});
							}

						},
						error: function(){
							form.find( '.alert-message.validation' ).slideUp(300);
							form.find( '.alert-message.request' ).slideDown(300);
							submit_btn.removeClass( 'loading' );
							submit_btn.text( submit_btn.attr( 'data-label' ) );
						}
					});

				}

			}
		});
	};

	/* -------------------------------------------------------------------------
		FORM ELEMENTS
	------------------------------------------------------------------------- */

	// CHEKCBOX INPUT
	$.fn.uouCheckboxInput = function(){

		var self = $(this),
		input = self.find( 'input' );



		// INITIAL STATE
		if ( input.is( ':checked' ) ) {
			self.addClass( 'active' );
		}
		else {
			self.removeClass( 'active' );
		}

		// CHANGE STATE
		input.change(function(){
			if ( input.is( ':checked' ) ) {
				self.addClass( 'active' );
			}
			else {
				self.removeClass( 'active' );
			}
		});

	};

	// RADIO INPUT
	$.fn.uouRadioInput = function(){

		var self = $(this),
		input = self.find( 'input' ),
		group = input.attr( 'name' );

		// INITIAL STATE
		if ( input.is( ':checked' ) ) {
			self.addClass( 'active' );
		}

		// CHANGE STATE
		input.change(function(){
			if ( group ) {
				$( '.radio-input input[name="' + group + '"]' ).parent().removeClass( 'active' );
			}
			if ( input.is( ':checked' ) ) {
				self.addClass( 'active' );
			}
		});

	};

	// SELECT BOX
	$.fn.uouSelectBox = function(){

		var self = $(this),
		select = self.find( 'select' );
		self.prepend( '<ul class="select-clone custom-list"></ul>' );

		var placeholder = select.data( 'placeholder' ) ? select.data( 'placeholder' ) : select.find( 'option:eq(0)' ).text(),
		clone = self.find( '.select-clone' );
		self.prepend( '<input class="value-holder" type="text" disabled="disabled" placeholder="' + placeholder + '"><i class="fa fa-chevron-down"></i>' );
		var value_holder = self.find( '.value-holder' );

		// INPUT PLACEHOLDER FIX FOR IE
		if ( $.fn.placeholder ) {
			self.find( 'input, textarea' ).placeholder();
		}

		// CREATE CLONE LIST
		select.find( 'option' ).each(function(){
			if ( $(this).attr( 'value' ) ){
				clone.append( '<li data-value="' + $(this).val() + '">' + $(this).text() + '</li>' );
			}
		});

		// TOGGLE LIST
		self.click(function(){
			var media_query_breakpoint = uouMediaQueryBreakpoint();
			if ( media_query_breakpoint > 991 ) {
				clone.slideToggle(100);
				self.toggleClass( 'active' );
			}
		});

		// CLICK
		clone.find( 'li' ).click(function(){

			value_holder.val( $(this).text() );
			select.find( 'option[value="' + $(this).attr( 'data-value' ) + '"]' ).attr('selected', 'selected');

			// IF LIST OF LINKS
			if ( self.hasClass( 'links' ) ) {
				window.location.href = select.val();
			}

		});

		// HIDE LIST
		self.bind( 'clickoutside', function(event){
			clone.slideUp(100);
		});

		// LIST OF LINKS
		if ( self.hasClass( 'links' ) ) {
			select.change( function(){
				window.location.href = select.val();
			});
		}

	};

	/* -------------------------------------------------------------------------
		FORM VALIDATION
	------------------------------------------------------------------------- */

	$.fn.uouFormValid = function() {

		function emailValid( email ) {
			var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		}

		var form = $(this),
		formValid = true;

		form.find( 'input.required, textarea.required, select.required' ).each(function(){

			var field = $(this),
			value = field.val(),
			valid = false;

			if ( value.trim() !== '' ) {

				// email field
				if ( field.hasClass( 'email' ) ) {
					if ( ! emailValid( value ) ) {
						field.addClass( 'error' );
					}
					else {
						field.removeClass( 'error' );
						valid = true;
					}
				}

				// select field
				else if ( field.prop( 'tagName' ).toLowerCase() === 'select' ) {

					if ( value === null || value === field.data( 'placeholder' ) ) {
						field.addClass( 'error' );
						field.parents( '.select-box' ).addClass( 'error' );
					}
					else {
						field.removeClass( 'error' );
						valid = true;
					}
				}

				// default field
				else {
					field.removeClass( 'error' );
					valid = true;
				}

			}
			else {
				field.addClass( 'error' );
			}
			formValid = ! valid ? false : formValid;

		});

		return formValid;

	};

	/* -------------------------------------------------------------------------
		IMAGES LOADED
	------------------------------------------------------------------------- */

    $.fn.uouImagesLoaded = function( options ) {
		if ( $.isFunction( options ) ) {

			var images = $(this).find( 'img' ),
			loaded_images = 0,
			count = images.length;

			if ( count > 0 ) {
				images.one( 'load', function(){
					loaded_images++;
					if ( loaded_images === count ){
						options.call();
					}
				}).each(function() {
					if ( this.complete ) { $(this).load(); }
				});
			}
			else {
				options.call();
			}

		}
    };

	/* -------------------------------------------------------------------------
		LIGHTBOX
	------------------------------------------------------------------------- */

	// LIGHTBOX STRINGS SETUP
	
	// FUNCTION
	$.fn.uouInitLightboxes = function(){
		if ( $.fn.magnificPopup ) {
			$(this).find( 'a.lightbox' ).each(function(){

				var self = $(this),
				lightbox_group = self.data( 'lightbox-group' ) ? self.data( 'lightbox-group' ) : false;

				if ( lightbox_group ) {
					$( 'a.lightbox[data-lightbox-group="' + lightbox_group + '"]' ).magnificPopup({
						type: 'image',
						removalDelay: 300,
						mainClass: 'mfp-fade',
						gallery: {
							enabled: true
						}
					});
				}
				else {
					self.magnificPopup({
						type: 'image'
					});
				}

			});
		}
	};

	/* -------------------------------------------------------------------------
		MEDIA QUERY BREAKPOINT
	------------------------------------------------------------------------- */

	var uouMediaQueryBreakpoint = function() {

		if ( $( '#media-query-breakpoint' ).length < 1 ) {
			$( 'body' ).append( '<var id="media-query-breakpoint"><span></span></var>' );
		}
		var value = $( '#media-query-breakpoint' ).css( 'content' );
		if ( typeof value !== 'undefined' ) {
			value = value.replace( "\"", "" ).replace( "\"", "" ).replace( "\'", "" ).replace( "\'", "" );
			if ( isNaN( parseInt( value, 10 ) ) ){
				$( '#media-query-breakpoint span' ).each(function(){
					value = window.getComputedStyle( this, ':before' ).content;
				});
				value = value.replace( "\"", "" ).replace( "\"", "" ).replace( "\'", "" ).replace( "\'", "" );
			}
			if(isNaN(parseInt(value,10))){
				value = 1199;
			}
		}
		else {
			value = 1199;
		}
		return value;

	};

	
	

	
	/* -------------------------------------------------------------------------
		TOGGLE
	------------------------------------------------------------------------- */

	$.fn.uouToggle = function(){

		var self = $(this),
		title = self.find( '.toggle-title' ),
		content = self.find( '.toggle-content' );

		title.click(function(){
			self.toggleClass( 'closed' );
			content.slideToggle(200);
		});

	};

	/* -------------------------------------------------------------------------
		TWITTER FEED
	------------------------------------------------------------------------- */

	$.fn.uouTwitterFeed = function(){
		if ( $.fn.tweet ) {

			var self = $(this),
			feed_id = self.data( 'id' ),
			feed_limit = self.data( 'limit' ),
			widget = self.parents( '.twitter-widget' );

			self.bind( 'loaded', function(){
				widget.removeClass( 'loading' );
				if ( self.hasClass( 'paginated' ) && $.fn.owlCarousel ) {
					var interval = self.data( 'interval' ) ? parseInt( self.data( 'interval' ) ) > 0 : false;
					self.find( '.tweet-list' ).fadeIn(500);
					widget.find( '.tweet-nav' ).fadeIn(500);
					self.find( '.tweet-list' ).owlCarousel({
						autoPlay: interval,
						slideSpeed: 300,
						pagination: false,
						paginationSpeed : 400,
						singleItem:true
					});
					widget.find( '.tweet-nav-prev' ).click(function(){
						self.find( '.tweet-list' ).trigger( 'owl.prev' );
					});
					widget.find( '.tweet-nav-next' ).click(function(){
						self.find( '.tweet-list' ).trigger( 'owl.next' );
					});
				}
			});

			self.tweet({
				username: feed_id,
				modpath: './library/twitter/',
				count: feed_limit,
				loading_text: '<span class="loading-anim"><span></span></span>'
			});

		}
	};


$(document).ready(function(){
/* -----------------------------------------------------------------------------

	GENERAL

----------------------------------------------------------------------------- */

	// GET ACTUAL MEDIA QUERY BREAKPOINT
	var media_query_breakpoint = uouMediaQueryBreakpoint();

	// INPUT PLACEHOLDER FIX FOR IE
	if ( $.fn.placeholder ) {
		$( 'input, textarea' ).placeholder();
	}

	// ACCORDIONS
	$( '.accordion-container' ).each(function(){
		$(this).uouAccordion();
	});

	// ALERT MESSAGES
	$( '.alert-message' ).each(function(){
		$(this).uouAlertMessage();
	});

	// FORM ELEMENTS
	$( '.checkbox-input' ).each(function(){
		$(this).uouCheckboxInput();
	});
	$( '.radio-input' ).each(function(){
		$(this).uouRadioInput();
	});
	$( '.select-box' ).each(function(){
		$(this).uouSelectBox();
	});

	// DATE PICKER
	$( '.calendar-input' ).each(function(){

		var input = $(this).find( 'input' ),
		dateformat = input.data( 'dateformat' ) ? input.data( 'dateformat' ) : 'm/d/y',
		icon = $(this).find( '.fa' ),
		widget = input.datepicker( 'widget' );

		input.datepicker({
			dateFormat: dateformat,
			minDate: 0,
			beforeShow: function(){
				input.addClass( 'active' );
			},
			onClose: function(){
				input.removeClass( 'active' );
				// TRANSPLANT WIDGET BACK TO THE END OF BODY IF NEEDED
				widget.hide();
				if ( ! widget.parent().is( 'body' ) ) {
					widget.detach().appendTo( $( 'body' ) );
				}
			}
		});
		icon.click(function(){
			input.focus();
		});

	});

	// LIGHTBOXES
	$( 'body' ).uouInitLightboxes();

	// PROGRESS BARS
	$( '.progress-bar' ).each(function(){
		$(this).uouProgressBar();
	});
	$( '.radial-progress-bar' ).each(function(){
		$(this).uouRadialProgressBar();
	});

	// TABS
	$( '.tabs-container' ).each(function(){
		$(this).uouTabbed();
	});

	// TOGGLES
	$( '.toggle-container' ).each(function(){
		$(this).uouToggle();
	});


/* -----------------------------------------------------------------------------

	HEADER

----------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------
		HEADER SEARCH
	------------------------------------------------------------------------- */

	$( '.header-search' ).each(function(){

		var self = $(this),
		search_input = self.find( '.search-input input' ),
		search_advanced = self.find( '.search-advanced' );

		// SHOW ADVANCED
		search_input.focus(function(){
			self.addClass( 'active' );
			$(this).addClass( 'active' );
			$(this).parent().find( '.ico' ).fadeOut(300);
			search_advanced.slideDown(200);
		});

		// HIDE ADVANCED
		self.bind( 'clickoutside', function(event){
			if ( media_query_breakpoint > 991 ) {

				var target = $(event.target);
				if ( ! ( target.hasClass( 'ui-datepicker-prev' ) || target.hasClass( 'ui-datepicker-next' ) ) ) {
					search_input.blur();
					self.removeClass( 'active' );
					search_input.removeClass( 'active' );
					if ( search_input.val() === '' ) {
						search_input.parent().find( '.ico' ).fadeIn(300);
					}
					search_advanced.slideUp(200);
					self.find( '.select-box .select-clone' ).slideUp(200);
				}

			}
		});

		// TRANSPLANT CALENDAR BEFORE SHOW
		self.find( '.calendar-input' ).each(function(){

			var self = $(this),
			widget = self.find( 'input' ).datepicker( 'widget' );
			self.find( 'input' ).focus(function(){
				widget.detach().insertAfter( self.parent() );
			});

		});

		
		

	});



	

	/* -------------------------------------------------------------------------
		BANNER SEARCH
	------------------------------------------------------------------------- */

	$( '.banner-search-inner' ).each(function(){

		var self = $(this),
		tabs = self.find( '.tab-title' ),
		contents = self.find( '.tab-content' );

		// TAB CLICK
		tabs.click(function(){
			if ( ! $(this).hasClass( 'active' ) ) {
				var index = $(this).index();
				tabs.filter( '.active' ).removeClass( 'active' );
				$(this).addClass( 'active' );
				contents.filter( '.active' ).hide().removeClass( 'active' );
				contents.filter( ':eq(' + index + ')' ).show().addClass( 'active' );

				// CHANGE BG
				if ( $.fn.owlCarousel ) {
					$( '#banner .banner-bg' ).trigger( 'owl.goTo', index );
				}

			}
		});

	});


/* -----------------------------------------------------------------------------

	CORE

----------------------------------------------------------------------------- */

	

	/* -------------------------------------------------------------------------
		CONTACT FORM
	------------------------------------------------------------------------- */

	$( '#contact-form' ).each(function(){
		$(this).uouContactForm();
	});

	

	
	// SEARCH TYPE
	$( '.properties-search-type' ).each(function(){

		var self = $(this),
		inputs = self.find( 'input[type=radio]' );
		inputs.each(function(){
			$(this).change(function(){
				$( '#properties-search-form-swap, #properties-search-form-book, #properties-search-form-rent' ).hide();
				$( '#properties-search-form-' + $(this).data( 'type' ) ).show();
			});
		});

	});

	// PRICE FILTER
	$( '.properties-search-filter .price-filter .slider-range-container' ).each(function(){
		if ( $.fn.slider ) {

			var self = $(this),
			slider = self.find( '.slider-range' ),
			min = slider.data( 'min' ) ? slider.data( 'min' ) : 100,
			max = slider.data( 'max' ) ? slider.data( 'max' ) : 2000,
			step = slider.data( 'step' ) ? slider.data( 'step' ) : 100,
			default_min = slider.data( 'default-min' ) ? slider.data( 'default-min' ) : 100,
			default_max = slider.data( 'default-max' ) ? slider.data( 'default-max' ) : 500,
			currency = slider.data( 'currency' ) ? slider.data( 'currency' ) : '$',
			input_from = self.find( '.range-from' ),
			input_to = self.find( '.range-to' );

			input_from.val( currency + ' ' + default_min );
			input_to.val( currency + ' ' + default_max );

			slider.slider({
				range: true,
				min: min,
				max: max,
				step: step,
				values: [ default_min, default_max ],
				slide: function( event, ui ) {
					input_from.val( currency + ' ' + ui.values[0] );
					input_to.val( currency + ' ' + ui.values[1] );
				}
			});

		}
	});

	


/* -----------------------------------------------------------------------------

	TESTIMONIALS

----------------------------------------------------------------------------- */

	$( '#testimonials' ).each(function(){

		var self = $(this),
		list = self.find( '.testimonial-list' ),
		testimonials = list.find( '.testimonial' ),
		interval = self.data( 'interval' ) ? parseInt( self.data( 'interval' ) ) > 0 : false;

		// SHOW FIRST PORTRAIT
		var first_portrait = testimonials.first().find( '.portrait img' );
		if ( first_portrait.length > 0 ) {
			list.before( '<div class="active-portrait"><img src="' + first_portrait.attr( 'src' ) + '" alt="' + first_portrait.attr( 'alt' ) + '"></div>' );
		}

		// CREATE SLIDER
		list.owlCarousel({
			autoPlay: interval,
			slideSpeed: 300,
			pagination: false,
			paginationSpeed : 400,
			singleItem:true,
			addClassActive: true,
			afterMove: function(){
				var new_portrait;
				self.find( '.active-portrait' ).fadeOut(200, function(){
					new_portrait = list.find( '.owl-item.active .portrait img' );
					if ( new_portrait.length > 0 ) {
						self.find( '.active-portrait img' ).attr( 'src', new_portrait.attr( 'src' ) );
						self.find( '.active-portrait img' ).attr( 'alt', new_portrait.attr( 'alt' ) );
					}
					self.find( '.active-portrait' ).fadeIn(200);
				});
			}
		});

		// NAV
		self.find( '.navigation .prev' ).click(function(){
			list.trigger( 'owl.prev' );
		});
		self.find( '.navigation .next' ).click(function(){
			list.trigger( 'owl.next' );
		});

	});


/* -----------------------------------------------------------------------------

	BOTTOM PANEL

----------------------------------------------------------------------------- */

	// NEWSLETTER WIDGET
	$( '#bottom-panel .newsletter-widget form' ).submit(function(){

		var form = $(this);
		if ( form.uouFormValid() ) {
			form.find( '.alert-message.warning:visible' ).slideUp(300);
		}
		else {
			form.find( '.alert-message.warning' ).slideDown(300);
			return false;
		}

	});

	// TWITTER WIDGET
	$( '#bottom-panel .twitter-feed' ).each(function(){
		$(this).uouTwitterFeed();
	});


/* -----------------------------------------------------------------------------

	SCREEN RESIZE

----------------------------------------------------------------------------- */

	$(window).resize(function(){
		if ( uouMediaQueryBreakpoint() !== media_query_breakpoint ) {
			media_query_breakpoint = uouMediaQueryBreakpoint();

			/* RESET HEADER ELEMENTS */
			$( '.header-navbar, .header-form, .header-nav, .header-nav ul, .header-menu, .header-search, .header-tools, .sub-menu' ).removeAttr( 'style' );
			$( '.submenu-toggle .fa' ).removeClass( 'fa-chevron-up' ).addClass( 'fa-chevron-down' );
			$( '.header-btn' ).removeClass( 'hover' );

		}

	});

/* -----------------------------------------------------------------------------

	STYLE SWITCHER

----------------------------------------------------------------------------- */

	if ( $( 'body' ).hasClass( 'enable-style-switcher' ) ) {

		// CREATE STYLE SWITCHER
		var style_switcher_html = '<div id="style-switcher"><button class="style-switcher-toggle"><i class="ico fa fa-cog"></i></button>';
		style_switcher_html += '<div class="style-switcher-content"><ul class="custom-list skin-list">';
		style_switcher_html += '<li><button class="skin-default active" data-skin="default"><span>Default</span></button></li>';
		style_switcher_html += '<li><button class="skin-blue" data-skin="blue"><span>Blue</span></button></li>';
		style_switcher_html += '<li><button class="skin-yellow" data-skin="yellow"><span>Yellow</span></button></li>';
		style_switcher_html += '</ul></div></div>';
		$( 'body' ).append( style_switcher_html );

		// INIT SWITCHER
		$( '#style-switcher' ).each(function(){

			var switcher = $(this),
			toggle = switcher.find( '.style-switcher-toggle' ),
			skins = switcher.find( '.skin-list button' ),
			style_switcher_settings = {};

			//localStorage.clear();

			// SAVE SETTINGS
			var style_switcher_save = function(){
				if ( $( 'html' ).hasClass( 'localstorage' ) ) {
					localStorage.style_switcher_settings = JSON.stringify( style_switcher_settings );
				}
			};

			// LOAD SETTINGS
			if ( $( 'html' ).hasClass( 'localstorage' ) && localStorage.style_switcher_settings ) {

				style_switcher_settings = JSON.parse( localStorage.style_switcher_settings );

				// LOAD SAVED SKIN
				if ( typeof style_switcher_settings.skin !== 'undefined' ) {
					skins.filter( '.active' ).removeClass( 'active' );
					skins.filter( '[data-skin="' + style_switcher_settings.skin + '"]' ).addClass( 'active' );
					if ( $( 'head #skin-temp' ).length < 1 ) {
						$( 'head' ).append( '<link id="skin-temp" rel="stylesheet" type="text/css" href="library/css/skins/' + style_switcher_settings.skin + '.css">' );
					}
				}

			}

			// TOGGLE SWITCHER
			toggle.click(function(){
				switcher.toggleClass( 'active' );
			});

			// SET SKIN
			skins.click(function(){
				skins.filter( '.active' ).removeClass( 'active' );
				$(this).toggleClass( 'active' );
				style_switcher_settings.skin = $(this).data( 'skin' );
				style_switcher_save();
				if ( $( 'head #skin-temp' ).length < 1 ) {
					$( 'head' ).append( '<link id="skin-temp" rel="stylesheet" type="text/css" href="library/css/skins/' + $(this).data( 'skin' ) + '.css">' );
				}
				else {
					$( '#skin-temp' ).attr( 'href', 'library/css/skins/' + $(this).data( 'skin' ) + '.css' );
				}

			});

		});

	}
	// STYLE SWITCHER END

	// view swticher 
		$('.thumb-view').addClass('active');
	$('.list-grid-view button').on('click',function(e) {
		if ($(this).hasClass('thumb-view')) {
			$(this).addClass('active');
			$('.without-thumb').removeClass('active');
			$('.grid-view').removeClass('active');
			$('.all-menu-details').removeClass('thumb');
			$('.menu-with-details').removeClass('menu-with-details').addClass('item-list');
			$('.for-list').show();
		}
		else if($(this).hasClass('without-thumb')) {
			$(this).addClass('active');
			$('.thumb-view').removeClass('active');
			$('.grid-view').removeClass('active');
			$('.all-menu-details').addClass('thumb');
			$('.menu-with-details').removeClass('menu-with-details').addClass('item-list');
			$('.for-list').show();
		}
		else if($(this).hasClass('grid-view')) {
			$('.thumb-view').removeClass('active');
			$('.without-thumb').removeClass('active');
			$(this).addClass('active');
			$('.item-list').addClass('menu-with-details').removeClass('item-list');
			$('.m-with-details').show();
			$('.for-list').hide();
		}
	});

	// dropdown optin
	var drop= $('#main-wrapper .all-menu-details .dropdown-option');
	drop.hide();

	$(".toggle").click(function() {
		$(this).toggleClass("active");
		$(this).parent().parent().next()
			.slideToggle(300);
		

		$(this).parent().parent()
			.toggleClass('red');
	});



	var check= $('.category .toggle-content ul');
		check.hide();

	$('#main-wrapper .side-panel .sd-panel-heading').hide();
	$("#main-wrapper .side-panel .toggle-main-title").click(function() {
		$(this).toggleClass('active')
			.next().slideToggle();

	});

	$('#main-wrapper .side-panel .sd-panel-heading .slideToggle').hide();
	$("#main-wrapper .side-panel .toggle-title").click(function() {
		$(this).toggleClass('active')
			.next().slideToggle();

	});


	var self = $("#header .header-top-bar .call-us"),
		input = self.find('input');

	// INITIAL STATE
	var open = $("#header .header-top-bar .call-us .open-now");
	var close = $("#header .header-top-bar .call-us .close-now");
	close.hide();

	input.change(function() {
		if (input.is(':checked')) {
			open.show();
			close.hide();
		}
		else {
			open.hide();
			close.show();
		}
	});

	//qty cart option
	/*$('.qty-cart button').click(function(e){
		$(this).toggleClass('active');
		e.preventDefault();
	});*/




	// thumbnail slide section 
	var owl = $("#thumb-slide-section");
	owl.owlCarousel({
		itemsCustom: [
			[0, 2],
			[450, 3],
			[600, 4],
			[700, 6],
			[1000, 8],
			[1200, 14],
			[1400, 14],
			[1600, 15]
		],
		navigation: true
	});

	// home page second slide 

	$("#slide-content").owlCarousel({
		autoPlay: 4000,
		stopOnHover: true,
		itemsCustom: [
		[0, 1],
		[450, 1],
		[600, 1],
		[700, 1],
		[1000, 2],
		[1200, 2],
		[1400, 2],
		[1600, 2]
		]
	});


	$('#map_canvas').gmap({'scrollwheel':false }).bind('init', function(ev, map) {
		$('#map_canvas').gmap('addMarker', {'position': '57.7973333,12.0502107', 'bounds': true}).click(function() {
			$('#map_canvas').gmap('openInfoWindow', {'content': 'TakeAway'}, this);
		});
		$('#map_canvas').gmap('option', 'zoom', 14);
	
	});


	

/* END. */
});
})(jQuery);