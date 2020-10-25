/*
 * All Scripts Used in this Kroth Theme
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

;(function ( $, window, document, undefined ) {
  'use strict';

  var BERLIN = window.BERLIN || {};

  BERLIN.topLang = function(){

    $('.krth-top-dropdown').each(function() {

      var $this    = $(this),
          $open    = $this.find('.krth-top-active'),
          $content = $this.find('.krth-topdd-content');

      $open.on('click', function( e ) {

        e.preventDefault();
        e.stopPropagation();

        if( $content.hasClass('krth-opened') ) {
          $content.removeClass('krth-opened').fadeOut('fast');
        } else {
          $content.trigger('close-modals').addClass('krth-opened').fadeIn('fast');
          $content.find('input').focus();
        }

      });

      $content.on('click', function ( event ) {

        if (event.stopPropagation) {
          event.stopPropagation();
        } else if ( window.event ) {
          window.event.cancelBubble = true;
        }

      });

      $(document.body).on('click close-modals', function () {
	      $('.krth-topdd-content').removeClass('krth-opened').fadeOut('fast');
	    });

    });

  };

  BERLIN.counter = function(){

    $('.cvalues').counterUp({
	    delay: 10,
	    time: 1000
		});

  };

  BERLIN.portfolioIsotope = function(){

  	// Initialize Isotope
    var $portfolioIso = $('.krth-portfolios').isotope({
	    itemSelector: ".krth-portfolio-item",
	    percentPosition: true,
		  masonry: {
		    columnWidth: '.grid-sizer',
		    gutter: '.gutter-sizer',
		  }
		});

		// Filter With Selector
		$('.bpw-filter > li > a').on( 'click', function(e) {
			// Prevent default behaviour
			e.preventDefault();

			// Get Data Attribute to Filter a Item
		  var $filter = $(this).attr('data-filter');
		  $portfolioIso.isotope({ filter: $filter });

		  // Toggle the active class on the correct button
		  $(".bpw-filter > li > a").removeClass("btn-active");
		  $(this).addClass("btn-active");
		});

  };

  BERLIN.myCarousel = function(){

	  $('.krth-theme-carousel').each( function() {
	    var $carousel = $(this);

	    var $items = ($carousel.data("items") !== undefined) ? $carousel.data("items") : 1;
	    var $items_tablet = ($carousel.data("items-tablet") !== undefined) ? $carousel.data("items-tablet") : 1;
	    var $items_mobile_landscape = ($carousel.data("items-mobile-landscape") !== undefined) ? $carousel.data("items-mobile-landscape") : 1;
	    var $items_mobile_portrait = ($carousel.data("items-mobile-portrait") !== undefined) ? $carousel.data("items-mobile-portrait") : 1;

	    $carousel.owlCarousel({
	      loop : ($carousel.data("loop") !== undefined) ? $carousel.data("loop") : true,
	      items : $carousel.data("items"),
	      margin : ($carousel.data("margin") !== undefined) ? $carousel.data("margin") : 0,
	      dots : ($carousel.data("dots") !== undefined) ? $carousel.data("dots") : false,
	      nav : ($carousel.data("nav") !== undefined) ? $carousel.data("nav") : false,
	      navText : ["<div class='slider-no-current'><span class='current-no'></span><span class='total-no'></span></div><span class='current-monials'></span>", "<div class='slider-no-next'></div><span class='next-monials'></span>"],
	      autoplay : ($carousel.data("autoplay") !== undefined) ? $carousel.data("autoplay") : false,
	      autoplayTimeout : ($carousel.data("autoplay-timeout") !== undefined) ? $carousel.data("autoplay-timeout") : 5000,
	      animateOut : ($carousel.data("animateout") !== undefined) ? $carousel.data("animateout") : false,
	      mouseDrag : ($carousel.data("mouse-drag") !== undefined) ? $carousel.data("mouse-drag") : true,
	      autoWidth : ($carousel.data("auto-width") !== undefined) ? $carousel.data("auto-width") : false,
	      autoHeight : ($carousel.data("auto-height") !== undefined) ? $carousel.data("auto-height") : false,
	      responsiveClass: true,
	      responsive : {
	        0 : {
	          items : $items_mobile_portrait,
	        },
	        480 : {
	          items : $items_mobile_landscape,
	        },
	        768 : {
	          items : $items_tablet,
	        },
	        960 : {
	          items : $items,
	        }
	      }
	    });

	    // Adding Slide nav and slide numbers
	    var totLength = $(".owl-dot", $carousel).length;
	    $(".total-no", $carousel).html(totLength);
	    $(".current-no", $carousel).html(totLength);
	    $carousel.owlCarousel();
	    $(".current-no", $carousel).html(1);

	    // Owl Event nav slide current and total numbers
	    $carousel.on('changed.owl.carousel', function(event) {
	      var total_items = event.page.count;
	      var currentNum = event.page.index + 1;

	      $(".total-no", $carousel ).html(total_items);
	      $(".current-no", $carousel).html(currentNum);
	    });

	  });

  };

	$(document).ready( function(){

	  BERLIN.topLang();
	  BERLIN.counter();
	  BERLIN.myCarousel();

	  // Parallax
		$(".parallax-window").stellar();

	});
	$(window).load( function(){

	  BERLIN.portfolioIsotope();

	});

})( jQuery, window, document );

jQuery(document).ready(function($) {

	// Header Sticky
	$(".krth-sticky").sticky({ topSpacing: 0 });

	// Bootstrap Menu Dropdown on Hover
	$('ul.nav li.dropdown').hover(function() {
	  $(this).children('.dropdown-menu').stop(true, true).delay(100).fadeIn(200);
	}, function() {
	  $(this).children('.dropdown-menu').stop(true, true).delay(100).fadeOut(200);
	});

	// Accordion Active Class
	$('.panel-group .panel-collapse.in').prev().addClass('accordion-active');
	$('.panel-group').on('show.bs.collapse', function(e) {
	  $(e.target).prev('.panel-heading').addClass('accordion-active');
	}).on('hide.bs.collapse', function(e) {
	  $(e.target).prev('.panel-heading').removeClass('accordion-active');
	});

	// Contact form 7 - Select Field Right Arrow Class
	$(".wpcf7-form-control.wpcf7-select").parent(".wpcf7-form-control-wrap").addClass("wpcf7-select-field");
	$(".wpcf7-form-control.wpcf7-select[multiple]").parent(".wpcf7-form-control-wrap").removeClass("wpcf7-select-field");

	// Search For Header Two
	$('#search-trigger').on('click', function(e) {
  	e.preventDefault();
  	$('.krth-search-three').parents('.krth-navigation').toggleClass('search-active');
  	$('.krth-search-three input[type="text"]').focus();
  	$('.krth-search-two').slideToggle();
  	$('.krth-search-two input[type="text"]').focus();
  	return false;
  });
  $('#search-trigger-two').on('click', function(e) {
  	e.preventDefault();
  	$('html,body').animate({
      scrollTop: 0
    }, 500);

    $('.krth-search-three').parents('.krth-navigation').toggleClass('search-active');
  	$('.krth-search-three input[type="text"]').focus();
  	$('.krth-search-two').slideToggle();
  	$('.krth-search-two input[type="text"]').focus();
  	return false;
  });
  $('.krth-search-close').on('click', function(e) {
  	e.preventDefault();
  	$('.krth-search-two').slideUp();
  	$('.krth-search-three').parents('.krth-navigation').removeClass('search-active');
  });

  // Tooltip
  $('[data-toggle="tooltip"]').tooltip();

  // Side Navigation
  $( ".nav-enabled-child .menu-item-has-children > a" ).on('click', function(e) {
  	e.preventDefault();
  	var $this = $(this).parent().addClass('krth-sidenav-parent');
  	$this.find('.sub-menu').addClass('krth-sidenav-list');
	  $( ".sub-menu", $this ).slideToggle( "500" );
	  $( $this ).toggleClass( "krth-active" );
	});
	// $( ".nav-enabled-child .current-menu-parent > ul.sub-menu" ).show();
	$( ".nav-enabled-child .current-menu-parent > ul.sub-menu" ).addClass('krth-sidenav-list');

	// If Archive & Category Widgets are in Dropdown Mode
	$( ".widget_archive" ).has( "select" ).addClass( "widget_archive_select" );
	$( ".widget_categories" ).has( "select" ).addClass( "widget_categories_select" );
	$( ".widget_layered_nav" ).has( "select" ).addClass( "widget_layered_nav_select" );
	$( ".widget_product_categories" ).has( "select" ).addClass( "widget_product_categories_select" );
	$( ".widget_text" ).has( "select" ).addClass( "widget_text_select" );
	$( ".calendar_wrap tbody td" ).has( "a" ).addClass( "hav-post-in-date" );
	$( ".widget_list_style ul" ).find( "ul" ).addClass( "children" );

	// Map Tab
	$( ".krth-map-tab-content .tab-pane:first-child" ).addClass( "active in" );

	// Call to Action - Shortcode
	$( ".krth-cta" ).parents( ".vc_row" ).addClass( "krth-cta-fullwidth" );

	// Testimonial
	$( ".krth-testimonials" ).parents( ".vc_row" ).addClass( "testimonial-hover-control" );

	// Widgetised Column - Add Default Widget Class Automatically
	$( ".wpb_widgetised_column" ).parent().addClass( "krth-sidebar" );

	// WPML Menu Dropdown
  $( ".menu-item-language" ).addClass('dropdown');
  $( ".navbar-nav > li.menu-item-language > a" ).addClass('dropdown-toggle sub-collapser').removeAttr('onclick').attr('data-toggle', 'dropdown');
  $( ".menu-item-language > ul" ).addClass('dropdown-menu');
  $(".navbar-nav > li.menu-item-language > a").attr('id', 'jt-wpml-dropdown').append("<b class='caret'></b>");

	// Page-Navi
	$( ".wp-pagenavi .previouspostslink" ).html( "<i class='fa fa-angle-left'></i>" );
	$( ".wp-pagenavi .nextpostslink" ).html( "<i class='fa fa-angle-right'></i>" );
	$( ".wp-pagenavi .first" ).html( "<i class='fa fa-angle-double-left'></i>" );
	$( ".wp-pagenavi .last" ).html( "<i class='fa fa-angle-double-right'></i>" );

	// Portfolio single next and prev
	$prev_height = $('.krth-portfolio-prev .krth-port-nav-hm').outerWidth();
	$next_height = $('.krth-portfolio-next .krth-port-nav-hm').outerWidth();
	$('.krth-portfolio-prev .krth-port-nav-hm').css('left', -$prev_height);
	$('.krth-portfolio-next .krth-port-nav-hm').css('right', -$next_height);

	// Job details equal height
	$('.krth-job-details').each(function() {
		var maxHeight = 0;
		var $this = $(this);
		$('.krth-job-details').children('.bjd-each', $this).each(function() {
			var height = $('.bjd-each', $this).outerHeight();
			// alert(height);
			if ( height > maxHeight ) {
				maxHeight = height;
			}
		});
		$('.bjd-each', $this).css('height', maxHeight);
	});

	// Fitvideos
	$("body").fitVids({ customSelector: "iframe[src^='http://youtube.com'], iframe[src^='http://vimeo.com']"});
	$(".video, .player").fitVids();

	// WooCommerce
	$( '.shipping-calculator-form' ).show();
	$( '.shipping-calculator-button' ).hide();

	// Accordion Active Only One At a Time.
	$('.collapse-others').each(function() {
		var $this = $(this);
		$('.collapse', $this).on('show.bs.collapse', function (e) {
			var all = $this.find('.collapse');
	    var actives = $this.find('.collapsing, .collapse.in');
	    all.each(function (index, element) {
	      $(element).collapse('hide');
	    })
	    actives.each(function (index, element) {
	      $(element).collapse('show');
	    })
		});
	});

	// Smooth Scroll
  $('.krth-navigation-widget .krth-sidenav a').bind('click', function(event) {
    var $anchor = $(this);
    var navHeight = $('.krth-sticky').height();
    $('html, body').stop().animate({
      scrollTop: $($anchor.attr('href')).offset().top - navHeight
    }, 1500);
    event.preventDefault();
  });

	// Responsive Menu
	var $meanTrigger = $('.krth-header-nav nav');
	var $meanWidth = ($meanTrigger.data("starts") !== undefined) ? $meanTrigger.data("starts") : 480;
	$meanTrigger.meanmenu({
		meanMenuContainer: $('.krth-navigation'),
		meanScreenWidth: $meanWidth,
		meanMenuClose: '<span></span><span></span><span></span>',
		meanExpand: '<span></span><span></span>',
		meanContract: '<span></span><span></span>',
		removeElements: '',
		meanRemoveAttrs: false,
		onePage: false
	});

	$('.meanmenu-reveal').on('click', function() {
		$('.mean-container').toggleClass('mean-menu-opened');
	});

	// Nice Select
	$('.wpcf7 select, .widget_archive_select select, .widget_categories_select select, .widget_text_select select').niceSelect();

	// Portfolio Click
	$('.krth-portfolio-item, .krth-service-two').on('click touchend', function(e) {
		var el = $(this);
		$(el).trigger('hover');
	});

	// Product and Blog Posts in Match Height
	$('.products .product, .krth-blog-post').matchHeight();

});