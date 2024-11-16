jQuery(window).on("load", function () {
	
	jQuery(document).ready(function($) { 
	
		"use strict";
		
		// Loader
		$('.sohohotel-loading-wrapper').remove();
		$(".sohohotel-site-wrapper").css('opacity','1');
	
		// Fixed Menu
		$(".sohohotel-fixed-navigation").before($(".sohohotel-fixed-navigation").clone().addClass("sohohotel-fixed-navigation-clone"));
	
		$(window).on("load scroll resize", function () {
		
			if ( $(window).width() > 1090 ) {
				$(".sohohotel-fixed-navigation.sohohotel-fixed-navigation-clone").css('display','block');
			} else {
				$(".sohohotel-fixed-navigation.sohohotel-fixed-navigation-clone").css('display','none');
			}
		
			var sohohotel_header_height = "-" + $('.sohohotel-fixed-navigation').outerHeight() + "px";
		
			if ($(".logged-in").length) {
				var sohohotel_adminbar_height = $('#wpadminbar').outerHeight() + "px";
			} else {
				var sohohotel_adminbar_height = "0px";
			}
		
			$(".sohohotel-fixed-navigation.sohohotel-fixed-navigation-clone").css('top',sohohotel_header_height);
			$("body").toggleClass("sohohotel-fixed-navigation-show", ($(window).scrollTop() > 1090));
			$("body.sohohotel-fixed-navigation-show .sohohotel-fixed-navigation.sohohotel-fixed-navigation-clone").css('top',sohohotel_adminbar_height);
		
		});
	
		// Mobile menu
		$(".sohohotel-mobile-navigation-wrapper .sohohotel-mobile-navigation li.menu-item-has-children > a, .sohohotel-mobile-navigation-wrapper .sohohotel-mobile-navigation li.page_item_has_children > a").on("click", function (e) {
		    if ($(this).parent().has("ul")) {
		        e.preventDefault();
		    }
			$(this).parent().toggleClass('sohohotel-mobile-navigation-arrow', 10000);
			$(this).next('ul').slideToggle('slow');
		});
	
		// If window is resized to mobile size when sticky menu is displaying, hide it
		$(window).resize(function () {

			if ( $(window).width() <= 1020 ) {
				$(".sohohotel-fixed-navigation").removeClass("sohohotel-fixed-navigation-show");
				$(".sohohotel-fixed-navigation-wrapper").removeAttr("style");
			}

		});

		// Mobile Navigation
		$(window).resize(function() {
		  if ($(window).width() > 1090) {
			$(".sohohotel-mobile-navigation-wrapper").css("display","none");
			$( "body" ).removeClass("sohohotel-mobile-navigation-open");
		  }
		});

		// Mobile Navigation Button
		$( ".sohohotel-mobile-navigation-button" ).click(function() {
		
			$( "body" ).toggleClass("sohohotel-mobile-navigation-open");
		
			$( ".sohohotel-mobile-navigation-wrapper" ).slideToggle( "slow", function() {
	    	
		  });
		});
	
		// Main Navigation
		jQuery(".sohohotel-navigation ul").on("mouseenter mouseleave",".menu-item-has-children", function (e) {

			var elm = $("ul:first", this);
			var off = elm .offset();
			var l = off.left;
			var w = elm.width();
			var docH = $(".sohohotel-site-wrapper").height();
			var docW = $(".sohohotel-site-wrapper").width();

			var isEntirelyVisible = (l+ w <= docW);

			if ( ! isEntirelyVisible ) {
				$(this).addClass("sohohotel-edge");
			} else {
				$(this).removeClass("sohohotel-edge");
			}
		});
	
		// Testimonials
		$('.sohohotel-owl-carousel-1').owlCarousel({
		    loop:false,
		    margin:30,
		    nav:false,
			pagination: true,
			navText: "",
			autoHeight: true,
		    responsive:{
		        0:{
		            items:1
		        },
				490:{
		            items:1
		        },
				710:{
		            items:1
		        },
				920:{
		            items:1
		        },
		    }
		});
	
		// Blog
		$('.sohohotel-owl-carousel-2').owlCarousel({
		    loop:false,
		    margin:30,
		    nav:false,
			pagination: true,
			navText: "",
			autoHeight: false,
		    responsive:{
		        0:{
		            items:1
		        },
				490:{
		            items:2
		        },
				710:{
		            items:3
		        },
				920:{
		            items:4
		        },
		    }
		});
	
		// Accommodation carousel 1 - 2 cols
		$('.sohohotel-owl-carousel-3').owlCarousel({
		    loop:false,
		    margin:30,
		    nav:false,
			pagination: true,
			navText: "",
			autoHeight: false,
		    responsive:{
		        0:{
		            items:1
		        },
				700:{
		            items:1
		        },
				910:{
		            items:2
		        },
		    }
		});
	
		// Accommodation carousel 1 - 3 cols
		$('.sohohotel-owl-carousel-4').owlCarousel({
		    loop:false,
		    margin:30,
		    nav:false,
			pagination: true,
			navText: "",
			autoHeight: false,
		    responsive:{
		        0:{
		            items:1
		        },
				700:{
		            items:1
		        },
				910:{
		            items:3
		        },
		    }
		});
	
		// Offers
		$('.sohohotel-owl-carousel-5').owlCarousel({
		    loop:false,
		    margin:30,
		    nav:false,
			pagination: true,
			navText: "",
			autoHeight: false,
		    responsive:{
		        0:{
		            items:1
		        },
				490:{
		            items:2
		        },
				710:{
		            items:3
		        },
		    }
		});
	
		// PrettyPhoto
		$("a[data-gal^='prettyPhoto']").prettyPhoto({
			hook: 'data-gal',
			animation_speed: 'fast',
			slideshow: 5000,
			autoplay_slideshow: false,
			opacity: 0.80,
			show_title: true,
			allow_resize: true,
			default_width: 1300,
			default_height: 732,
			counter_separator_label: '/',
			theme: 'pp_default',
			horizontal_padding: 20,
			hideflash: false,
			wmode: 'opaque',
			autoplay: true,
			modal: false,
			deeplinking: false,
			overlay_gallery: false,
			keyboard_shortcuts: true,
			changepicturecallback: function(){},
			callback: function(){},
			ie6_fallback: true,
			markup: '<div class="pp_pic_holder"> \
						<div class="ppt">&nbsp;</div> \
						<div class="pp_top"> \
							<div class="pp_left"></div> \
							<div class="pp_middle"></div> \
							<div class="pp_right"></div> \
						</div> \
						<div class="pp_content_container"> \
							<div class="pp_left"> \
								<div class="pp_right"> \
									<div class="pp_content"> \
										<div class="pp_loaderIcon"></div> \
										<div class="pp_fade"> \
											<div class="pp_hoverContainer"> \
												<a class="pp_next" href="#"><i class="fas fa-chevron-right"></i></a> \
												<a class="pp_previous" href="#"><i class="fas fa-chevron-left"></i></a> \
											</div> \
											<div id="pp_full_res"></div> \
											<div class="pp_details"> \
												<div class="pp_nav"> \
													<a href="#" class="pp_arrow_previous">Previous</a> \
													<p class="currentTextHolder">0/0</p> \
													<a href="#" class="pp_arrow_next">Next</a> \
												</div> \
												<p class="pp_description"></p> \
												<a class="pp_close" href="#"><i class="fas fa-times"></i></a> \
											</div> \
										</div> \
									</div> \
								</div> \
								</div> \
							</div> \
							<div class="pp_bottom"> \
								<div class="pp_left"></div> \
								<div class="pp_middle"></div> \
								<div class="pp_right"></div> \
							</div> \
						</div> \
						<div class="pp_overlay"></div>',
				image_markup: '<img id="fullResImage" src="{path}" />'
		});
		
		$('.flexslider').flexslider({
			animation: "fade",
			controlNav: false,
			slideshowSpeed: 7000,
			animationSpeed: 600,
		});
		
		// Scroll to #divID if there is one in the URL
		var hash = $(location).attr('hash');
		if ( hash !== '' ) {
			document.querySelector(hash).scrollIntoView({
				behavior: 'smooth'
			});
		}

	});

});