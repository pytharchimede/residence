<?php



/* ----------------------------------------------------------------------------

   Theme Setup

---------------------------------------------------------------------------- */
if ( ! isset( $content_width ) ) {
	$content_width = 1140;
}
add_action( 'after_setup_theme', 'sohohotel_setup' );

if ( ! function_exists( 'sohohotel_setup' ) ) {
	
	function sohohotel_setup() {
		
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'woocommerce' );
		
		if ( function_exists( 'add_theme_support' ) ) {
			add_theme_support( 'post-thumbnails' );
	        set_post_thumbnail_size( "100", "100" );  
		}

		if ( function_exists( 'add_image_size' ) ) {
			add_image_size( 'sohohotel-image-style1', 1560, 910, true );
			add_image_size( 'sohohotel-image-style2', 2420, 1288, true );
			add_image_size( 'sohohotel-image-style3', 190, 190, true );
			add_image_size( 'sohohotel-image-style4', 3840, 810, true );
			add_image_size( 'sohohotel-image-style5', 2420, 1430, true );
			add_image_size( 'sohohotel-image-style6', 170, 170, true );
			add_image_size( 'sohohotel-image-style7', 1540, 1000, true );
			add_image_size( 'sohohotel-image-style8', 1920, 1100, true );
			add_image_size( 'sohohotel-image-style9', 3840, 2000, true );
			add_image_size( 'sohohotel-image-style10', 1000, 700, true );
			add_image_size( 'sohohotel-image-style11', 3840, 2000, true );
			add_image_size( 'sohohotel-image-style12', 1560, 920, true );
			add_image_size( 'sohohotel-image-style13', 1170, 750, true );
			add_image_size( 'sohohotel-image-style14', 1470, 920, true );
		}
	
		add_theme_support( 'automatic-feed-links' );
		load_theme_textdomain( 'soho-hotel', get_template_directory() . '/framework/languages' );
		$locale = get_locale();
		$locale_file = get_template_directory() . "/framework/languages/$locale.php";
		
		if ( is_readable( $locale_file ) ) {
			require_once( $locale_file );
		}

	}
	
}



/* ----------------------------------------------------------------------------

   Do not auto resize big images

---------------------------------------------------------------------------- */
add_filter( 'big_image_size_threshold', '__return_false' );



/* ----------------------------------------------------------------------------

   Load language files in WordPress dashboard

---------------------------------------------------------------------------- */
if ( is_admin() ) {
	load_theme_textdomain( 'soho-hotel', get_template_directory() . '/framework/languages' );
}



/* ----------------------------------------------------------------------------

   Load Options Panel

---------------------------------------------------------------------------- */
require_once( get_template_directory() . '/framework/admin/admin-config.php' );



/* ----------------------------------------------------------------------------

   Load Frontend Inline CSS

---------------------------------------------------------------------------- */
function sohohotel_inline_css() {

	$output = '';
	
	// Logo
	if(!empty(get_theme_mod('desktop-logo-image-top-margin'))) {
		$output .= 'body .sohohotel-site-wrapper .sohohotel-header .sohohotel-logo {margin: ' . get_theme_mod('desktop-logo-image-top-margin') . ' 0 0 0;}';
	}

	if(!empty(get_theme_mod('desktop-logo-image-width'))) {
		$output .= 'body .sohohotel-site-wrapper .sohohotel-header .sohohotel-logo {width: ' . get_theme_mod('desktop-logo-image-width') . ';}';
	}
	
	if(!empty(get_theme_mod('desktop-logo-image-max-width'))) {
		$output .= 'body .sohohotel-site-wrapper .sohohotel-header .sohohotel-logo {max-width: ' . get_theme_mod('desktop-logo-image-max-width') . ';}';
	}
	
	if(!empty(get_theme_mod('desktop-sticky-nav-logo-image-top-margin'))) {
		$output .= 'body .sohohotel-site-wrapper .sohohotel-fixed-navigation-clone .sohohotel-logo {margin: ' . get_theme_mod('desktop-sticky-nav-logo-image-top-margin') . ' 0 0 0;}';
	}
	
	if(!empty(get_theme_mod('desktop-sticky-nav-logo-image-width'))) {
		$output .= 'body .sohohotel-site-wrapper .sohohotel-fixed-navigation-clone .sohohotel-logo {width: ' . get_theme_mod('desktop-sticky-nav-logo-image-width') . ';}';
	}
	
	if(!empty(get_theme_mod('desktop-sticky-nav-logo-image-max-width'))) {
		$output .= 'body .sohohotel-site-wrapper .sohohotel-fixed-navigation-clone .sohohotel-logo {max-width: ' . get_theme_mod('desktop-sticky-nav-logo-image-max-width') . ';}';
	}
	
	if(!empty(get_theme_mod('mobile-logo-image-top-margin'))) {
		$output .= '@media only screen and (max-width: 1020px) { 
			body .sohohotel-site-wrapper .sohohotel-header .sohohotel-logo {margin: ' . get_theme_mod('mobile-logo-image-top-margin') . ' 0 0 0;}
		}';
	}
	
	if(!empty(get_theme_mod('mobile-logo-image-width'))) {
		$output .= '@media only screen and (max-width: 1020px) { 
			body .sohohotel-site-wrapper .sohohotel-header .sohohotel-logo {width: ' . get_theme_mod('mobile-logo-image-width') . ';}
		}';
	}
	
	if(!empty(get_theme_mod('mobile-logo-image-max-width'))) {
		$output .= '@media only screen and (max-width: 1020px) { 
			body .sohohotel-site-wrapper .sohohotel-header .sohohotel-logo {max-width: ' . get_theme_mod('mobile-logo-image-max-width') . ';}
		}';
	}
	
	// Fonts
	if( !empty(get_theme_mod('sohohotel_primary_font_family')) ) {
		$output .= 'h1,h2,h3,h4,h5,h6 {
			font-family: ' . get_theme_mod('sohohotel_primary_font_family') . ';
		}';
	}
	
	if( !empty(get_theme_mod('sohohotel_secondary_font_family')) ) {
		$output .= 'body,textarea,input {
			font-family: ' . get_theme_mod('sohohotel_secondary_font_family') . ';
		}';
		
		$output .= '.shb-booking-page-main .woocommerce form.woocommerce-form-login .form-row .woocommerce-form-login__submit,
		.shb-booking-page-main .woocommerce form.checkout_coupon p .button,
		.shb-booking-page-main .woocommerce #payment #place_order,
		.woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content a.woocommerce-button,
		.woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content .woocommerce-Button,
		.woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content .woocommerce-Button.disabled,
		.woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content .button,
		.sohohotel-content-wrapper .woocommerce ul.products li.product .button,
		.single-product .sohohotel-blog-single-wrapper .single_add_to_cart_button.button.alt,
		.woocommerce-cart .sohohotel-content-wrapper .sohohotel-main-content .checkout-button,
		.woocommerce-cart .sohohotel-content-wrapper .sohohotel-main-content .checkout-button:hover,
		.shb-accommodation-listing-filter-sorting .shb-accommodation-listing-sorting select {
			font-family: ' . get_theme_mod('sohohotel_secondary_font_family') . ' !important;
		}';
	}
	
	// Theme
	
	// Main color
	if(!empty(get_theme_mod('sohohotel_main_color'))) {
		
		$output .= '.sohohotel-header .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-left-wrapper li.sohohotel-phone-icon:before,
			.sohohotel-header .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-left-wrapper li.sohohotel-map-icon:before,
			.sohohotel-header .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-right-wrapper .sohohotel-top-right-button2,
			.sohohotel-header .sohohotel-navigation ul li ul li:last-child a:hover,
			.sohohotel-header .sohohotel-navigation li ul li a:hover,
			.sohohotel-header .sohohotel-fixed-navigation-show .sohohotel-navigation li ul li a:hover,
			.sohohotel-header .sohohotel-navigation li ul li.current_page_item a:hover,
			.sohohotel-header .sohohotel-top-right-navigation li li a:hover,
			.sohohotel-header .sohohotel-mobile-navigation-wrapper .sohohotel-top-right-button2,
			.sohohotel-page-header h1:after,
			.sohohotel-blog-wrapper-1 .sohohotel-blog-block .sohohotel-blog-description .sohohotel-more-link,
			.sohohotel-footer-wrapper .sohohotel-footer-bottom-wrapper,
			h4.sohohotel-comment-count-title:after,
			.sohohotel-comments-wrapper #respond #reply-title:after,
			.sohohotel-main-content input[type="submit"],
			h3.sohohotel-title1:after,
			.sohohotel-sidebar-content .sohohotel-widget-wrapper h3:after,
			.sohohotel-footer-social-icons-wrapper a,
			body .tnp-widget input[type="submit"],
			body .tnp-widget-minimal input[type="submit"],
			.sohohotel-page-header .sohohotel-search-results-form button,
			.sohohotel-page-not-found h1:after,
			.sohohotel-page-not-found form button,
			body div.pp_default .pp_close,
			.sohohotel-title-left:after,
			.sohohotel-title-center:after,
			.vc_toggle_size_md.vc_toggle_default .vc_toggle_title h4:before,
			.wpb-js-composer .vc_tta-accordion.vc_tta.vc_general .vc_tta-panel h4.vc_tta-panel-title:before,
			.sohohotel-social-links a,
			.sohohotel-testimonial-wrapper.sohohotel-testimonial-wrapper-dark .owl-theme .owl-dots .owl-dot.active span,
			.sohohotel-hotel-listing-wrapper .sohohotel-hotel-listing h3:after,
			.owl-theme .owl-dots .owl-dot.active span,
			.sohohotel-main-content table th,
			.sohohotel-call-to-action-video-section .sohohotel-call-to-action-video-section-inner h3:after,
			.sohohotel-call-to-action-2-section h3:after,
			.wp-block-button__link,
			body .sohohotel-slider-caption-1 .sohohotel-slider-button,
			body .sohohotel-slider-caption-2 .sohohotel-slider-button,
			.shb-booking-form-with-background-1 .shb-booking-form-with-background-1-content h2:after,
			.shb-booking-form-with-background-2 .shb-booking-form-with-background-2-content h2:after,
			.shb-booking-form-with-background-3 .shb-booking-form-with-background-3-content h2:after,
			.shb-booking-form-with-background-3-wrapper .shb-booking-form-wrapper .shb-booking-form-button-1,
			body .sohohotel-slider-caption-3 h2:after,
			body .sohohotel-slider-caption-3 .sohohotel-slider-button,
			body .sohohotel-slider-caption-4 h2:after,
			body .sohohotel-slider-caption-4 .sohohotel-slider-button,
			.sohohotel-page-pagination .wp-pagenavi .current,
			.sohohotel-page-pagination .wp-pagenavi a:hover,
			.sohohotel-loading div:after,
			body .tnp-subscription input[type="submit"],
			.sohohotel-pagination .page-numbers.current, .sohohotel-pagination .page-numbers:hover {
			background: ' . get_theme_mod('sohohotel_main_color') . ';
			}
			
			body .sohohotel-button1 {
			background: ' . get_theme_mod('sohohotel_main_color') . ' !important;
			}
			
			.sohohotel-blog-wrapper-1 .sohohotel-blog-block .sohohotel-blog-meta i,
			.sohohotel-blog-single-wrapper .sohohotel-blog-meta i,
			.sohohotel-main-content .sohohotel-comments-wrapper .sohohotel-comments p.sohohotel-comment-info a,
			.sohohotel-main-content .sohohotel-comments-wrapper .comment-reply-link,
			.sohohotel-main-content .sohohotel-comments-wrapper .comment-edit-link,
			.sohohotel-blog-wrapper-2 .sohohotel-blog-block .sohohotel-blog-meta span i,
			.sohohotel-blog-wrapper-3 .sohohotel-blog-block .sohohotel-blog-meta i,
			blockquote:before,
			.sohohotel-widget .sohohotel-contact-widget li:before,
			.sohohotel-icon-text-wrapper-1 .sohohotel-icon-text-block .sohohotel-icon i,
			.sohohotel-icon-text-wrapper-2 .sohohotel-icon i,
			.sohohotel-contact-details-list li:before,
			.sohohotel-main-content div.wpcf7 .ajax-loader:after,
			.sohohotel-testimonial-wrapper .sohohotel-testimonial-block div span.sohohotel-open-quote,
			.sohohotel-testimonial-wrapper .sohohotel-testimonial-block div span.sohohotel-close-quote,
			.sohohotel-blog-carousel .sohohotel-blog-block .sohohotel-blog-date i,
			.sohohotel-single-testimonial-text span,
			.sohohotel-main-content ul li:before,
			.sohohotel-main-content ul.sohohotel-contact-details-list li::before {
			color: ' . get_theme_mod('sohohotel_main_color') . ';
			}
			
			.sohohotel-page-pagination .wp-pagenavi .current,
			.sohohotel-page-pagination .wp-pagenavi a:hover,
			.sohohotel-pagination .page-numbers.current, .sohohotel-pagination .page-numbers:hover {
			border: ' . get_theme_mod('sohohotel_main_color') . ' 1px solid;
			}
			
			body .tnp-subscription input[type="text"],
			body .tnp-subscription input[type="email"],
			body .tnp-widget input[type="text"], 
			body .tnp-widget input[type="email"],
			body .tnp-widget-minimal input[type="text"], 
			body .tnp-widget-minimal input[type="email"],
			.sohohotel-blog-block.sticky,
			.sohohotel-blog-block.tag-sticky-2,
			.is-style-outline > .wp-block-button__link:not(.has-background) {
				border: ' . get_theme_mod('sohohotel_main_color') . ' 2px solid;
			}
			
			.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic ul.vc_tta-tabs-list li.vc_tta-tab.vc_active {
				border-top: ' . get_theme_mod('sohohotel_main_color') . ' 4px solid;
			}';
		
	}
	
	if(!empty(get_theme_mod('sohohotel_header_bg_color'))) {
		$output .= '.sohohotel-header.sohohotel-fixed-navigation, .sohohotel-header .sohohotel-navigation ul ul, .sohohotel-header .sohohotel-top-right-navigation li, .sohohotel-header .sohohotel-mobile-currency-language {background: ' . get_theme_mod('sohohotel_header_bg_color') . ';}';
	}
	
	if(!empty(get_theme_mod('sohohotel_header_primary_text_color'))) {
		$output .= '.sohohotel-topbar ul.sohohotel-top-left-wrapper li a, .sohohotel-logo a, .sohohotel-header .sohohotel-navigation li a, .sohohotel-header .sohohotel-navigation ul li li.menu-item-has-children > a:after, .sohohotel-header .sohohotel-mobile-navigation-button i, .sohohotel-header .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-right-wrapper .sohohotel-top-right-button1, .sohohotel-header .sohohotel-top-right-navigation li a, .sohohotel-header .sohohotel-mobile-navigation-wrapper .sohohotel-mobile-navigation li a, .sohohotel-header .sohohotel-mobile-navigation-wrapper .sohohotel-mobile-navigation li.menu-item-has-children > a:after {color: ' . get_theme_mod('sohohotel_header_primary_text_color') . ';}';
	}
	
	if(!empty(get_theme_mod('sohohotel_header_secondary_text_color'))) {
		$output .= '.sohohotel-header .sohohotel-navigation li.current_page_item > a, .sohohotel-header .sohohotel-navigation li a:hover {color: ' . get_theme_mod('sohohotel_header_secondary_text_color') . ';}';
	}
	
	if(!empty(get_theme_mod('sohohotel_header_border_color'))) {
		$output .= '.sohohotel-header .sohohotel-topbar-wrapper, .sohohotel-header .sohohotel-mobile-navigation-wrapper .sohohotel-mobile-navigation {border-bottom: ' . get_theme_mod('sohohotel_header_border_color') . ' 1px solid;}';
		$output .= '.sohohotel-header .sohohotel-top-right-navigation, .sohohotel-header .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-right-wrapper .sohohotel-top-right-button1 {border-left: ' . get_theme_mod('sohohotel_header_border_color') . ' 1px solid;}';
		$output .= '.sohohotel-header .sohohotel-navigation ul ul, body .sohohotel-site-wrapper .sohohotel-header .sohohotel-top-right-navigation li ul, .sohohotel-header .sohohotel-mobile-navigation-wrapper .sohohotel-mobile-navigation li a, .sohohotel-header .sohohotel-mobile-currency-language {border-top: ' . get_theme_mod('sohohotel_header_border_color') . ' 1px solid;}';
		
		$output .= '@media only screen and (max-width: 1090px) { 
			
			.sohohotel-header .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-right-wrapper .sohohotel-top-right-button1 {
				border-left: none;
				border-bottom: ' . get_theme_mod('sohohotel_header_border_color') . ' 1px solid;
			}
			
			.sohohotel-header .sohohotel-topbar-wrapper {border-bottom: none;}
			
		}';
		
	}
	
	if(!empty(get_theme_mod('sohohotel_top_right_button_background_color'))) {
		$output .= 'body .sohohotel-site-wrapper .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-right-wrapper .sohohotel-top-right-button2 {background: ' . get_theme_mod('sohohotel_top_right_button_background_color') . ';}';
	}
	
	if(!empty(get_theme_mod('sohohotel_top_right_button_text_color'))) {
		$output .= 'body .sohohotel-site-wrapper .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-right-wrapper .sohohotel-top-right-button2 {color: ' . get_theme_mod('sohohotel_top_right_button_text_color') . ';}';
	}
	
	if(!empty(get_theme_mod('sohohotel_booking_form_button_bg_color'))) {
		$output .= 'body .sohohotel-site-wrapper .shb-booking-form-style-1 .shb-booking-form-col input[type="submit"],
		body .sohohotel-site-wrapper .shb-guestclass-select-dropdown .shb-qty-done,
		.shb-booking-form-with-background-3-wrapper .shb-booking-form-wrapper .shb-booking-form-button-1 {background: ' . get_theme_mod('sohohotel_booking_form_button_bg_color') . ';}';
	}
	
	if(!empty(get_theme_mod('sohohotel_booking_form_button_text_color'))) {
		$output .= 'body .sohohotel-site-wrapper .shb-booking-form-style-1 .shb-booking-form-col input[type="submit"],
		body .sohohotel-site-wrapper .shb-guestclass-select-dropdown .shb-qty-done,
		.shb-booking-form-with-background-3-wrapper .shb-booking-form-wrapper .shb-booking-form-button-1 {color: ' . get_theme_mod('sohohotel_booking_form_button_text_color') . ';}';
	}
	
	if(!empty(get_theme_mod('sohohotel_booking_form_icon_color'))) {
		$output .= 'body .sohohotel-site-wrapper .shb-booking-form-style-1 .shb-booking-form-col i {color: ' . get_theme_mod('sohohotel_booking_form_icon_color') . ';}';
	}
	
	if(!empty(get_theme_mod('sohohotel_footer_background_color'))) {
		$output .= 'body .sohohotel-site-wrapper .sohohotel-footer-wrapper {background: ' . get_theme_mod('sohohotel_footer_background_color') . ';}';
	}
	
	if(!empty(get_theme_mod('sohohotel_footer_text_color'))) {
		$output .= 'body .sohohotel-site-wrapper .sohohotel-footer-wrapper .sohohotel-widget h1,
		body .sohohotel-site-wrapper .sohohotel-footer-wrapper .sohohotel-widget h2,
		body .sohohotel-site-wrapper .sohohotel-footer-wrapper .sohohotel-widget h3,
		body .sohohotel-site-wrapper .sohohotel-footer-wrapper .sohohotel-widget h4,
		body .sohohotel-site-wrapper .sohohotel-footer-wrapper .sohohotel-widget h5,
		body .sohohotel-site-wrapper .sohohotel-footer-wrapper .sohohotel-widget h6,
		body .sohohotel-site-wrapper .sohohotel-footer-wrapper .sohohotel-widget p,
		body .sohohotel-site-wrapper .sohohotel-footer-wrapper .sohohotel-widget ul li,
		body .sohohotel-site-wrapper .sohohotel-footer-wrapper .sohohotel-widget ol li,
		body .sohohotel-site-wrapper .sohohotel-footer-wrapper .sohohotel-widget table,
		body .sohohotel-site-wrapper .sohohotel-footer-wrapper .sohohotel-widget a {color: ' . get_theme_mod('sohohotel_footer_text_color') . ';}';
	}
	
	if(!empty(get_theme_mod('sohohotel_footer_border_color'))) {
		$output .= 'body .sohohotel-site-wrapper .sohohotel-footer-wrapper .sohohotel-widget ul li,
		body .sohohotel-site-wrapper .sohohotel-footer-wrapper .sohohotel-widget ul li ul li ul {border-color: ' . get_theme_mod('sohohotel_footer_border_color') . ';}';
		
		$output .= 'body .sohohotel-site-wrapper .sohohotel-footer-wrapper .sohohotel-widget ul li ul {border-top: ' . get_theme_mod('sohohotel_footer_border_color') . ' 1px solid;}';
		
	}
	
	if(!empty(get_theme_mod('sohohotel_footer_bottom_bar_background_color'))) {
		$output .= '.sohohotel-footer-wrapper .sohohotel-footer-bottom-wrapper {background: ' . get_theme_mod('sohohotel_footer_bottom_bar_background_color') . ';}';
	}
	
	if(!empty(get_theme_mod('sohohotel_footer_bottom_bar_text_color'))) {
		$output .= 'body .sohohotel-site-wrapper .sohohotel-footer-wrapper .sohohotel-footer-bottom-wrapper p,
		.sohohotel-footer-wrapper .sohohotel-footer-bottom-wrapper .sohohotel-footer-bottom .sohohotel-bottom-right-wrapper p {color: ' . get_theme_mod('sohohotel_footer_bottom_bar_text_color') . ';}';
	}
	
	if(!empty(get_theme_mod('sohohotel_slideshow_button_background_color'))) {
		$output .= 'body .sohohotel-slider-caption-1 .sohohotel-slider-button,
			body .sohohotel-slider-caption-2 .sohohotel-slider-button,
			body .sohohotel-slider-caption-3 .sohohotel-slider-button,
			body .sohohotel-slider-caption-4 .sohohotel-slider-button {background: ' . get_theme_mod('sohohotel_slideshow_button_background_color') . ';}';
	}
	
	if(!empty(get_theme_mod('sohohotel_slideshow_button_text_color'))) {
		$output .= 'body .sohohotel-slider-caption-1 .sohohotel-slider-button,
			body .sohohotel-slider-caption-2 .sohohotel-slider-button,
			body .sohohotel-slider-caption-3 .sohohotel-slider-button,
			body .sohohotel-slider-caption-4 .sohohotel-slider-button {color: ' . get_theme_mod('sohohotel_slideshow_button_text_color') . ';}';
	}
	
	if(!empty(get_theme_mod('sohohotel_title_line_color'))) {
		$output .= '.sohohotel-title-center:after,
		.sohohotel-title-left:after,
		.shb-booking-form-with-background-1 .shb-booking-form-with-background-1-content h2:after,
		.shb-booking-form-with-background-2 .shb-booking-form-with-background-2-content h2:after,
		.sohohotel-call-to-action-video-section .sohohotel-call-to-action-video-section-inner h3:after,
		.shb-booking-form-with-background-3 .shb-booking-form-with-background-3-content h2:after,
		body .sohohotel-slider-caption-3 h2:after,
		body .sohohotel-slider-caption-4 h2:after,
		.sohohotel-page-header h1:after,
		.sohohotel-hotel-listing-wrapper .sohohotel-hotel-listing h3:after {background: ' . get_theme_mod('sohohotel_title_line_color') . ';}';
	}
	
	if(!empty(get_theme_mod('sohohotel_footer_alt_text_color'))) {
		$output .= '.sohohotel-footer-wrapper .sohohotel-footer-bottom-wrapper .sohohotel-footer-bottom .sohohotel-bottom-right-wrapper p {color: ' . get_theme_mod('sohohotel_footer_alt_text_color') . ';}';
	}
	
	// Plugin
	
	// Main color
	if(!empty(get_theme_mod('sohohotel_main_color'))) {
		
		$output .= '.shb-accommodation-listing-style-1 .shb-accommodation-listing-item .shb-accommodation-listing-description-wrapper .shb-accommodation-listing-description .shb-accommodation-listing-button1,
		.shb-accommodation-listing-style-2 .shb-accommodation-listing-item .shb-accommodation-listing-image .shb-accommodation-listing-button1,
		.shb-accommodation-listing-style-3 .shb-accommodation-listing-item .shb-accommodation-listing-image .shb-accommodation-listing-button1,
		.shb-booking-form-style-1 .shb-booking-form-col input[type="submit"],
		.shb-guestclass-select-dropdown .shb-qty-done,
		.sohohotel-content-wrapper .shb-booking-contact-wrapper h3:after,
		.shb-booking-step-wrapper .shb-booking-step.shb-booking-step-current a:first-child,
		.shb-booking-step-wrapper .shb-booking-step-line div,
		.shb-booking-accommodation-result-wrapper .shb-booking-accommodation-item .shb-booking-accommodation-info-wrapper .shb-booking-accommodation-info.shb-booking-accommodation-rate .shb-booking-accommodation-select-room,
		.shb-booking-your-stay-wrapper .shb-booking-your-stay-item-wrapper h3:after,
		.shb-booking-continue,
		.shb-lightbox-close,
		#ui-datepicker-div .ui-datepicker-calendar tbody td[data-event="click"]:hover,
		.shb-booking-complete-wrapper i,
		.shb-booking-page-main .woocommerce form.woocommerce-form-login .form-row .woocommerce-form-login__submit,
		.shb-booking-page-main .woocommerce form.checkout_coupon p .button,
		.woocommerce-page .select2-container--default .select2-results__option--highlighted[aria-selected], .woocommerce-page .select2-container--default .select2-results__option--highlighted[data-selected],
		.woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content form .select2-container--default .select2-results__option--highlighted[aria-selected], .woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content form .select2-container--default .select2-results__option--highlighted[data-selected],
		.shb-booking-page-main .woocommerce #payment #place_order,
		.woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content a.woocommerce-button,
		.woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content .woocommerce-Button,
		.woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content .woocommerce-Button.disabled,
		.woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content .button,
		.sohohotel-content-wrapper .woocommerce ul.products li.product .button,
		.woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content .woocommerce-order-details__title:after,
		.woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content .woocommerce-column__title:after,
		.woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content .woocommerce-Address-title h3:after,
		.woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content fieldset legend:after,
		.woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content form h3:after,
		.woocommerce-account .sohohotel-main-content h2:after,
		.single-product .sohohotel-blog-single-wrapper .related.products > h2:after,
		.single-product .sohohotel-blog-single-wrapper #tab-description h2:after,
		.single-product .sohohotel-blog-single-wrapper #tab-additional_information h2:after,
		.sohohotel-main-content .cart-collaterals .cart_totals h2:after,
		.sohohotel-content-wrapper .sohohotel-main-content .woocommerce span.onsale,
		.single-product .sohohotel-blog-single-wrapper .single_add_to_cart_button.button.alt,
		.sohohotel-content-wrapper .sohohotel-main-content .woocommerce table.shop_attributes tr:nth-child(2n) th,
		.woocommerce-cart .sohohotel-content-wrapper .sohohotel-main-content .checkout-button,
		.woocommerce-cart .sohohotel-content-wrapper .sohohotel-main-content .checkout-button:hover {
			background: ' . get_theme_mod('sohohotel_main_color') . ';
			}
			
			.shb-accommodation-listing-style-1 .shb-accommodation-listing-item .shb-accommodation-listing-description-wrapper .shb-accommodation-listing-description ul li i,
			.shb-accommodation-listing-style-2 .shb-accommodation-listing-item .shb-accommodation-listing-description-wrapper .shb-accommodation-listing-description ul li i,
			.shb-booking-form-style-1 .shb-booking-form-col i,
			.shb-title-with-icons-wrapper i,
			.sohohotel-main-content table td i,
			.sohohotel-content-wrapper .shb-booking-contact-wrapper ul li i,
			.shb-booking-accommodation-result-wrapper .shb-booking-accommodation-item .shb-booking-accommodation-image .shb-booking-accommodation-image-icon i,
			.shb-booking-accommodation-result-wrapper .shb-booking-accommodation-item .shb-booking-condition-wrapper h2 i,
			.shb-booking-accommodation-result-wrapper .shb-booking-accommodation-item .shb-booking-condition-wrapper ul li:before,
			.shb-booking-accommodation-result-wrapper .shb-booking-accommodation-item .shb-booking-accommodation-info-wrapper .shb-booking-accommodation-info ul li i,
			.shb-booking-notification-wrapper p i,
			.shb-booking-page-main .woocommerce .woocommerce-info:before,
			.woocommerce .woocommerce-error:before,
			.woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content .woocommerce-customer-details .woocommerce-customer-details--phone:before,
			.woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content .woocommerce-customer-details .woocommerce-customer-details--email:before,
			.woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content .woocommerce-Message:before,
			.woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content .woocommerce-message:before,
			.sohohotel-content-wrapper .sohohotel-main-content .woocommerce ul.products li.product .price,
			.sohohotel-content-wrapper .sohohotel-main-content .woocommerce div.product p.price {
			color: ' . get_theme_mod('sohohotel_main_color') . ';
			}
			
			.shb-booking-form-style-1 .shb-location-select-dropdown,
			.shb-booking-form-style-1 .shb-guestclass-select-dropdown,
			.shb-booking-step-wrapper .shb-booking-step.shb-booking-step-current a:first-child,
			.shb-booking-accommodation-result-wrapper .shb-booking-accommodation-item .shb-booking-condition-wrapper,
			.shb-booking-accommodation-result-wrapper .shb-booking-accommodation-item.shb-booking-accommodation-item-highlight {
				border: ' . get_theme_mod('sohohotel_main_color') . ' 2px solid;
			}';
		
	}

	if(!empty(get_theme_mod('transparent-header-page-ids'))) {

		$transparent_page_ids = get_theme_mod('transparent-header-page-ids');
		$transparent_page_ids_exp = explode(',',$transparent_page_ids);
	
		foreach($transparent_page_ids_exp as $id) {
		
			$output .= '.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation.sohohotel-header .sohohotel-topbar-wrapper,
		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation.sohohotel-header .sohohotel-top-right-navigation,
		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation.sohohotel-header .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-right-wrapper .sohohotel-top-right-button1,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation.sohohotel-header .sohohotel-topbar-wrapper,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation.sohohotel-header .sohohotel-top-right-navigation,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation.sohohotel-header .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-right-wrapper .sohohotel-top-right-button1 {
			border-color: rgba(255,255,255,0.2);
		}

		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation.sohohotel-header .sohohotel-topbar-wrapper .sohohotel-topbar li a,
		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation.sohohotel-header h2.sohohotel-logo a,
		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation.sohohotel-header .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-right-wrapper .sohohotel-top-right-button1,
		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation.sohohotel-header .sohohotel-navigation li a,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation.sohohotel-header .sohohotel-topbar-wrapper .sohohotel-topbar li a,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation.sohohotel-header h2.sohohotel-logo a,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation.sohohotel-header .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-right-wrapper .sohohotel-top-right-button1,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation.sohohotel-header .sohohotel-navigation li a {
			color: #fff;
		}

		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation-clone.sohohotel-header .sohohotel-topbar-wrapper,
		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation-clone.sohohotel-header .sohohotel-top-right-navigation,
		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation-clone.sohohotel-header .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-right-wrapper .sohohotel-top-right-button1,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation-clone.sohohotel-header .sohohotel-topbar-wrapper,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation-clone.sohohotel-header .sohohotel-top-right-navigation,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation-clone.sohohotel-header .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-right-wrapper .sohohotel-top-right-button1 {
			border-color: #dedede;
		}

		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation-clone.sohohotel-header .sohohotel-topbar-wrapper .sohohotel-topbar li a,
		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation-clone.sohohotel-header h2.sohohotel-logo a,
		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation-clone.sohohotel-header .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-right-wrapper .sohohotel-top-right-button1,
		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation-clone.sohohotel-header .sohohotel-navigation li a,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation-clone.sohohotel-header .sohohotel-topbar-wrapper .sohohotel-topbar li a,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation-clone.sohohotel-header h2.sohohotel-logo a,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation-clone.sohohotel-header .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-right-wrapper .sohohotel-top-right-button1,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation-clone.sohohotel-header .sohohotel-navigation li a {
			color: #181b20;
		}

		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation-clone.sohohotel-header .sohohotel-navigation li.current_page_item > a,
		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation-clone.sohohotel-header .sohohotel-navigation li a:hover,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation-clone.sohohotel-header .sohohotel-navigation li.current_page_item > a,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation-clone.sohohotel-header .sohohotel-navigation li a:hover {
			color: #8a8989;
		}

		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation:hover .sohohotel-topbar-wrapper,
		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation:hover .sohohotel-top-right-navigation,
		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation:hover .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-right-wrapper .sohohotel-top-right-button1,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation:hover .sohohotel-topbar-wrapper,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation:hover .sohohotel-top-right-navigation,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation:hover .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-right-wrapper .sohohotel-top-right-button1 {
			border-color: #dedede;
		}

		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation:hover .sohohotel-topbar-wrapper .sohohotel-topbar li a,
		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation:hover h2.sohohotel-logo a,
		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation:hover .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-right-wrapper .sohohotel-top-right-button1,
		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation:hover .sohohotel-navigation li a,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation:hover .sohohotel-topbar-wrapper .sohohotel-topbar li a,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation:hover h2.sohohotel-logo a,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation:hover .sohohotel-topbar-wrapper .sohohotel-topbar .sohohotel-top-right-wrapper .sohohotel-top-right-button1,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation:hover .sohohotel-navigation li a {
			color: #181b20;
		}

		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation:hover .sohohotel-navigation li.current_page_item > a,
		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation:hover .sohohotel-navigation li a:hover,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation:hover .sohohotel-navigation li.current_page_item > a,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation:hover .sohohotel-navigation li a:hover {
			color: #8a8989;
		}

		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation:hover .sohohotel-topbar-wrapper .sohohotel-topbar li li a:hover,
		.page-id-' . $id . '.sohohotel-header-2 .sohohotel-fixed-navigation:hover .sohohotel-navigation li li a:hover,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation:hover .sohohotel-topbar-wrapper .sohohotel-topbar li li a:hover,
		.page-id-' . $id . '.sohohotel-header-4 .sohohotel-fixed-navigation:hover .sohohotel-navigation li li a:hover {
			color: #fff;
		}';
		
		}
		
	}
	
	if(!empty(get_theme_mod('sohohotel_booking_background_color'))) {
		$output .= '.sohohotel-slideshow-wrapper-1 .shb-booking-form-style-1, .shb-booking-page-main .shb-booking-form-style-1, .shb-booking-your-stay-wrapper, .sohohotel-content-wrapper .shb-booking-contact-wrapper, .shb-booking-cancel, .shb-booking-step-wrapper .shb-booking-step a:first-child, .shb-additionalfee-room-select-wrapper, .shb-booking-page-main .woocommerce .woocommerce-info, .shb-booking-notification-wrapper, .woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content .woocommerce-MyAccount-navigation, .woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content .woocommerce-Message, .shb-booking-form-style-1, .shbdp-cal-wrapper, .shbdp-cal-wrapper .shbdp-cal table tbody td, .shbdp-cal-wrapper .shbdp-cal table tbody td.shbdp-cal-available, .shbdp-cal-wrapper .shbdp-cal table tbody td.shbdp-cal-disabled, .shbdp-cal-wrapper .shbdp-cal table tbody td.shbdp-cal-disabled:hover, .shb-booking-form-style-1 .shb-guestclass-select-dropdown, .shb-guestclass-select-dropdown .shb-guestclass-select-section .shb-qty-selection .shb-qty-decrease, .shb-guestclass-select-dropdown .shb-guestclass-select-section .shb-qty-selection .shb-qty-increase, .shbdp-cal-wrapper .shbdp-cal table tbody td.shbdp-cal-available-checkout-only, .shb-booking-form-style-1 .shb-location-select-dropdown {background: ' . get_theme_mod('sohohotel_booking_background_color') . ';}';
		$output .= '.shb-booking-step-wrapper .shb-booking-step a:first-child {border: ' . get_theme_mod('sohohotel_booking_background_color') . ' 1px solid;}';
	}
	
	if(!empty(get_theme_mod('sohohotel_booking_primary_text_color'))) {
		$output .= '.shb-booking-form-style-1 .shb-booking-form-col .shb-booking-form-col-field label, .shb-booking-your-stay-wrapper .shb-booking-your-stay-item-wrapper h3, .shb-booking-your-stay-wrapper .shb-booking-your-stay-item-wrapper ul li span, .shb-booking-your-stay-wrapper .shb-booking-your-stay-item-wrapper .shb-booking-your-stay-item .shb-booking-your-stay-item-info h4 a, .shb-booking-your-stay-wrapper .shb-booking-total h4, .shb-booking-your-stay-controls a, .shb-booking-your-stay-wrapper .shb-booking-your-stay-item-wrapper .shb-booking-your-stay-item .shb-booking-your-stay-item-info p a, .shb-booking-your-stay-wrapper .shb-booking-your-stay-item-wrapper .shb-booking-your-stay-item .shb-booking-your-stay-item-info p i, .sohohotel-content-wrapper .shb-booking-contact-wrapper h3, .shb-booking-contact-wrapper ul li a, .shb-booking-your-stay-item-wrapper-alt .shb-booking-your-stay-other-item-wrapper .shb-booking-your-stay-other-item span a, .shb-booking-cancel, .shb-booking-your-stay-item-wrapper-alt .shb-booking-your-stay-other-item-wrapper .shb-booking-your-stay-other-item span i, .shb-booking-step-wrapper .shb-booking-step a:first-child, .sohohotel-content-wrapper .shb-additionalfee-room-select-wrapper p, .shb-booking-your-stay-wrapper .shb-deposit-due h4:first-child, .shb-booking-your-stay-wrapper .shb-deposit-due h4:last-child, .shb-booking-page-main .woocommerce .woocommerce-info a, .woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content .woocommerce-MyAccount-navigation ul li a, .woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content .woocommerce-Message, .shbdp-cal-wrapper .shbdp-cal .shbdp-month-title, .shbdp-cal-wrapper .shbdp-cal table tbody td, .shbdp-cal-wrapper .shbdp-cal table tbody td.shbdp-cal-available, .shb-guestclass-select-dropdown .shb-guestclass-select-section label, .shb-guestclass-select-dropdown .shb-guestclass-select-section .shb-qty-selection .shb-qty-display, .shb-guestclass-select-dropdown .shb-guestclass-select-section .shb-qty-selection .shb-qty-decrease, .shb-guestclass-select-dropdown .shb-guestclass-select-section .shb-qty-selection .shb-qty-increase, .shb-booking-form-style-1 .shb-location-select-dropdown ul li:hover, a.shbdp-nav-prev, a.shbdp-nav-next {color: ' . get_theme_mod('sohohotel_booking_primary_text_color') . ';}';
	}
	
	if(!empty(get_theme_mod('sohohotel_booking_secondary_text_color'))) {
		$output .= '.shb-booking-your-stay-wrapper .shb-booking-your-stay-item-wrapper ul li, .shb-booking-your-stay-wrapper .shb-booking-your-stay-item-wrapper .shb-booking-your-stay-item .shb-booking-your-stay-item-info .shb-booking-your-stay-item-info-detail, .sohohotel-content-wrapper .shb-booking-contact-wrapper p, .shb-booking-your-stay-wrapper .shb-booking-your-stay-item-wrapper .shb-booking-your-stay-item .shb-booking-your-stay-item-info h4 span, .shb-booking-price-expanded p span:first-child, .shb-booking-price-expanded p span:last-child, .shb-booking-your-stay-item-wrapper-alt .shb-booking-your-stay-other-item-wrapper .shb-booking-your-stay-other-item span:last-child, .shb-booking-your-stay-other-item-expanded p span:first-child, .shb-booking-your-stay-other-item-expanded p span:last-child, .shb-booking-page-main .woocommerce .woocommerce-info, .shb-booking-notification-wrapper p, .shb-booking-form-style-1 .shb-booking-form-col .shb-booking-form-col-field span, .shbdp-cal-wrapper .shbdp-cal table tbody td.shbdp-cal-disabled, .shb-guestclass-select-dropdown .shb-guestclass-select-section label span, .shb-booking-form-style-1 .shb-location-select-dropdown ul li {color: ' . get_theme_mod('sohohotel_booking_secondary_text_color') . ';}';
	}
	
	if(!empty(get_theme_mod('sohohotel_booking_border_color'))) {
		$output .= '.shb-booking-form-style-1 .shb-booking-form-col {border-left: ' . get_theme_mod('sohohotel_booking_border_color') . ' 1px solid;}';
		$output .= '.shb-booking-page-main .shb-booking-form-style-1 .shb-booking-form-col .shb-booking-form-col-field {border-right: ' . get_theme_mod('sohohotel_booking_border_color') . ' 1px solid;}';
		$output .= '.shb-booking-your-stay-wrapper .shb-booking-your-stay-item-wrapper, .shb-booking-your-stay-item-wrapper-alt, .woocommerce-account .sohohotel-content-wrapper .sohohotel-main-content .woocommerce-MyAccount-navigation ul li, .shb-booking-form-with-background-2-wrapper .shb-booking-form-style-1.shb-booking-form-1-column-5 .shb-booking-form-col, .shb-booking-form-style-1 .shb-location-select-dropdown ul li {border-bottom: ' . get_theme_mod('sohohotel_booking_border_color') . ' 1px solid;}';
		$output .= '.shb-booking-cancel, .shbdp-cal-wrapper .shbdp-cal table tbody td.shbdp-cal-disabled, .shbdp-cal-wrapper .shbdp-cal table tbody td.shbdp-datepicker-date, .shbdp-cal-wrapper .shbdp-cal table tbody td.shbdp-cal-disabled:hover, .shb-guestclass-select-dropdown .shb-guestclass-select-section .shb-qty-selection .shb-qty-decrease, .shb-guestclass-select-dropdown .shb-guestclass-select-section .shb-qty-selection .shb-qty-increase {border: ' . get_theme_mod('sohohotel_booking_border_color') . ' 1px solid;}';
		$output .= '.shb-booking-your-stay-wrapper .shb-deposit-due, .shb-booking-form-style-1-vertical.shb-booking-form-1-column-5 .shb-booking-form-col, .shbdp-cal-wrapper, .shb-guestclass-select-dropdown .shb-guestclass-select-section {border-top: ' . get_theme_mod('sohohotel_booking_border_color') . ' 1px solid;}';
		$output .= '@media only screen and (max-width: 1000px) { 

		.shb-booking-form-style-1.shb-booking-form-1-column-4 .shb-booking-form-col,
		.shb-booking-form-style-1.shb-booking-form-1-column-5 .shb-booking-form-col {
			border-bottom: ' . get_theme_mod('sohohotel_booking_border_color') . ' 1px solid;
		}

	}';
	}
	
	if(!empty(get_theme_mod('sohohotel_datepicker_select_color_2'))) {
		$output .= '.shbdp-cal-wrapper .shbdp-cal table tbody td.shbdp-cal-selected-date, .shbdp-cal-wrapper .shbdp-cal table tbody td.shbdp-cal-selected-date-live {background: ' . get_theme_mod('sohohotel_datepicker_select_color_2') . ';border: ' . get_theme_mod('sohohotel_datepicker_select_color_2') . ' 1px solid;}';
	}
	
	if(!empty(get_theme_mod('sohohotel_datepicker_hover_color'))) {
		$output .= '.shbdp-cal-wrapper .shbdp-cal table tbody td.shbdp-cal-available:hover {background: ' . get_theme_mod('sohohotel_datepicker_hover_color') . ';border: ' . get_theme_mod('sohohotel_datepicker_hover_color') . ' 1px solid;}';
	}
	
	if(!empty(get_theme_mod('sohohotel_datepicker_select_color_1'))) {
		$output .= '.shbdp-cal-wrapper .shbdp-cal table tbody td.shbdp-cal-selected-checkin, .shbdp-cal-wrapper .shbdp-cal table tbody td.shbdp-cal-selected-checkout {background: ' . get_theme_mod('sohohotel_datepicker_select_color_1') . ';border: ' . get_theme_mod('sohohotel_datepicker_select_color_1') . ' 1px solid;}';
	}
	
	if(empty(get_theme_mod('sohohotel_show_newsletter_label'))) {	
		$output .= 'body .tnp-widget label, body .tnp-subscription label {display: none;}';
	} 
	
	if(!empty(get_theme_mod('sohohotel_show_newsletter_label'))) {
		
		if(get_theme_mod('sohohotel_show_newsletter_label') == 'no') {
			$output .= 'body .tnp-widget label, body .tnp-subscription label {display: none;}';
		}
		
	}

	return $output;
	
}



/* ----------------------------------------------------------------------------

   Load Frontend Inline JS

---------------------------------------------------------------------------- */
function sohohotel_inline_js() {
	
	$output = '';
	
	return $output;
	
}



/* ----------------------------------------------------------------------------

   Load Frontend CSS

---------------------------------------------------------------------------- */
function sohohotel_enqueue_css() {
	wp_enqueue_style('sohohotel-color', get_template_directory_uri() .'/framework/css/color.css');
    wp_enqueue_style( 'sohohotel-style', get_stylesheet_uri() );
	wp_add_inline_style( 'sohohotel-style', sohohotel_inline_css() );
	wp_enqueue_style('sohohotel-fontawesome', get_template_directory_uri() .'/framework/css/font-awesome/css/all.min.css');
	wp_enqueue_style('sohohotel-owlcarousel', get_template_directory_uri() .'/framework/css/owl.carousel.css');
	wp_enqueue_style('sohohotel-flexslider', get_template_directory_uri() .'/framework/css/flexslider.css');
	wp_enqueue_style('sohohotel-prettyPhoto', get_template_directory_uri() .'/framework/css/prettyPhoto.css');
}
add_action( 'wp_enqueue_scripts', 'sohohotel_enqueue_css' );



/* ----------------------------------------------------------------------------

   Load Admin CSS

---------------------------------------------------------------------------- */
function sohohotel_enqueue_admin_css_js() {
	
	wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker');
    wp_enqueue_script( 'wp-color-picker-script-handle', plugins_url('wp-color-picker-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	wp_enqueue_style('sohohotel_admin_styles', get_template_directory_uri().'/framework/css/admin.css');
	wp_enqueue_style('sohohotel_remove_ads', get_template_directory_uri().'/framework/css/remove-ads.css');
}
add_action('admin_enqueue_scripts', 'sohohotel_enqueue_admin_css_js');



/* ----------------------------------------------------------------------------

   Load Theme JS

---------------------------------------------------------------------------- */
function sohohotel_enqueue_js() {
	
	wp_enqueue_script( array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'jquery-ui-accordion', 'jquery-ui-tabs', 'jquery-effects-core' ) );
	wp_enqueue_script( 'sohohotel-prettyPhoto', get_template_directory_uri() . '/framework/js/jquery.prettyPhoto.js' );
	wp_enqueue_script( 'sohohotel-owlcarousel', get_template_directory_uri() . '/framework/js/owl.carousel.min.js' );
	wp_enqueue_script( 'sohohotel-flexslider', get_template_directory_uri() . '/framework/js/jquery.flexslider.js' );
	wp_enqueue_script( 'sohohotel-scripts', get_template_directory_uri() . '/framework/js/scripts.js' );
	wp_add_inline_script( 'sohohotel-scripts', sohohotel_inline_js());
	
	if( is_single() ) {wp_enqueue_script( 'comment-reply' );}
	
}
add_action( 'wp_footer', 'sohohotel_enqueue_js' );



/* ----------------------------------------------------------------------------

   Remove "type" attribute from style and script tags to avoid failing W3C validation
 
---------------------------------------------------------------------------- */
/*add_filter('style_loader_tag', 'sohohotel_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'sohohotel_remove_type_attr', 10, 2);

function sohohotel_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}*/

add_action(
    'after_setup_theme',
    function() {
        add_theme_support( 'html5', [ 'script', 'style' ] );
    }
);


/* ----------------------------------------------------------------------------

   Enqueue Fonts

---------------------------------------------------------------------------- */
function sohohotel_fonts_url() {
	
    $font_url = '';
    
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'soho-hotel' ) ) {
		
		if( !empty(get_theme_mod('sohohotel_primary_font_weights')) ) {
			$sohohotel_font_1 = get_theme_mod('sohohotel_primary_font_weights');
		} else {
			$sohohotel_font_1 = 'Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
		}
		
		if( !empty(get_theme_mod('sohohotel_secondary_font_weights')) ) {
			$sohohotel_font_2 = get_theme_mod('sohohotel_secondary_font_weights');
		} else {
			$sohohotel_font_2 = 'Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
		}
		
        $font_url = add_query_arg( 'family',$sohohotel_font_1 . '|' . $sohohotel_font_2, "//fonts.googleapis.com/css" );
    
	}

    return $font_url;

}

function sohohotel_font_scripts() {
    wp_enqueue_style( 'sohohotel_fonts', sohohotel_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'sohohotel_font_scripts' );



/* ----------------------------------------------------------------------------

   Load Page Title

---------------------------------------------------------------------------- */
add_theme_support( 'title-tag' );



/* ----------------------------------------------------------------------------

   Required Plugins

---------------------------------------------------------------------------- */
require_once( get_template_directory() . '/framework/inc/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'sohohotel_theme_register_required_plugins' );

function sohohotel_theme_register_required_plugins() {

	$plugins = array(

		array(
			'name'     				=> esc_html__('Soho Hotel Shortcodes & Post Types','soho-hotel'),
			'slug'     				=> 'sohohotel-shortcodes-post-types',
			'source'   				=> get_template_directory() . '/framework/plugins/sohohotel-shortcodes-post-types.zip',
			'required' 				=> true,
			'version' 				=> '4.2.5',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> esc_html__('Soho Hotel Booking','soho-hotel'),
			'slug'     				=> 'sohohotel-booking',
			'source'   				=> get_template_directory() . '/framework/plugins/sohohotel-booking.zip',
			'required' 				=> true,
			'version' 				=> '4.2.5',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> esc_html__('Soho Hotel Translate','soho-hotel'),
			'slug'     				=> 'sohohotel-translate',
			'source'   				=> get_template_directory() . '/framework/plugins/sohohotel-translate.zip',
			'required' 				=> true,
			'version' 				=> '4.2.5',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> esc_html__('Soho Hotel Demo Data','soho-hotel'),
			'slug'     				=> 'sohohotel-demo-data',
			'source'   				=> get_template_directory() . '/framework/plugins/sohohotel-demo-data.zip',
			'required' 				=> false,
			'version' 				=> '4.2.5',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> esc_html__('WP Bakery Page Builder','soho-hotel'),
			'slug'     				=> 'js_composer',
			'source'   				=> get_template_directory() . '/framework/plugins/js-composer.zip',
			'required' 				=> true,
			'version' 				=> '7.9',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> esc_html__('Contact Form 7','soho-hotel'),
			'slug'     				=> 'contact-form-7',
			'required' 				=> false,
			'version' 				=> '5.9.8',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> esc_html__('Newsletter','soho-hotel'),
			'slug'     				=> 'newsletter',
			'required' 				=> false,
			'version' 				=> '8.5.2',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> esc_html__('WooCommerce','soho-hotel'),
			'slug'     				=> 'woocommerce',
			'required' 				=> true,
			'version' 				=> '9.3.3',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> esc_html__('Classic Editor','soho-hotel'),
			'slug'     				=> 'classic-editor',
			'required' 				=> true,
			'version' 				=> '1.6.5',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> esc_html__('Classic Widgets','soho-hotel'),
			'slug'     				=> 'classic-widgets',
			'required' 				=> true,
			'version' 				=> '0.3',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		)
	);

	$config = array(
		'id'           => 'tgmpa',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}



/* ----------------------------------------------------------------------------

   Load WP Bakery Page Builder Modifications

---------------------------------------------------------------------------- */
if (class_exists('WPBakeryVisualComposerAbstract')) {
	require_once(get_template_directory() . '/framework/inc/pagebuilder/pagebuilder_theme.php');
}



/* ----------------------------------------------------------------------------

   Load WP Bakery Page Builder Template Directory

---------------------------------------------------------------------------- */
if (class_exists('WPBakeryVisualComposerAbstract')) {
	$dir = get_stylesheet_directory() . '/framework/inc/pagebuilder/pagebuilder_templates';
	vc_set_shortcodes_templates_dir( $dir );
}



/* ----------------------------------------------------------------------------

   Register Sidebars

---------------------------------------------------------------------------- */
function sohohotel_widgets_init() {

	// Sidebar Widgets
	register_sidebar( array(
		'name' => esc_html__( 'Standard Page Sidebar', 'soho-hotel' ),
		'id' => 'sohohotel-primary-widget-area',
		'description' => esc_html__( 'Displayed on all pages with a sidebar set', 'soho-hotel' ),
		'before_widget' => '<div id="%1$s" class="sohohotel-widget sohohotel-widget-wrapper sohohotel-clearfix %2$s"><div class="sohohotel-title-block"></div>',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	// Footer Widgets
	register_sidebar( array(
		'name' => esc_html__( 'Footer Area', 'soho-hotel' ),
		'id' => 'sohohotel-footer-widget-area',
		'description' => esc_html__( 'Displayed at the bottom of all pages', 'soho-hotel' ),
		'before_widget' => '<div id="%1$s" class="sohohotel-widget sohohotel-widget-wrapper sohohotel-clearfix %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	) );

}

add_action( 'widgets_init', 'sohohotel_widgets_init' );



/* ----------------------------------------------------------------------------

   Register Menu

---------------------------------------------------------------------------- */
if( !function_exists( 'sohohotel_register_menu' ) ) {
	
	function sohohotel_register_menu() {
		
		$sohohotel_header = sohohotel_site_header(); 
		
		if($sohohotel_header == 'sohohotel-header-3' || $sohohotel_header == 'sohohotel-header-4') {
			
			register_nav_menus(array(
				'sohohotel-primary-left' => esc_html__( 'Primary Navigation Left','soho-hotel' ),
				'sohohotel-primary-right' => esc_html__( 'Primary Navigation Right','soho-hotel' ),
				'sohohotel-primary-mobile' => esc_html__( 'Primary Navigation Mobile','soho-hotel' )
			));
			
		} else {
			
			register_nav_menus(array(
				'sohohotel-primary' => esc_html__( 'Primary Navigation','soho-hotel' ),
				'sohohotel-primary-mobile' => esc_html__( 'Primary Navigation Mobile','soho-hotel' )
			));
			
		}

	}
	
	add_action('init', 'sohohotel_register_menu');
	
}



/* ----------------------------------------------------------------------------

   Main Menu Fallback

---------------------------------------------------------------------------- */
function sohohotel_main_menu_fallback() { ?>

<ul class="fallback_menu">
	<?php wp_list_pages(array(
		'depth' => 2,
		'exclude' => '',
		'title_li' => '',
		'link_before'  => '',
		'link_after'   => '',
		'sort_column' => 'post_title',
		'sort_order' => 'ASC',
	)); ?>
</ul>

<?php }



/* ----------------------------------------------------------------------------

   Mobile Main Menu Fallback

---------------------------------------------------------------------------- */
function sohohotel_mobile_menu_fallback() { ?>

<ul class="sohohotel-mobile-navigation">
	<?php wp_list_pages(array(
		'depth' => 2,
		'exclude' => '',
		'title_li' => '',
		'link_before'  => '',
		'link_after'   => '',
		'sort_column' => 'post_title',
		'sort_order' => 'ASC',
	)); ?>
</ul>

<?php }



/* ----------------------------------------------------------------------------

   Add Description Field to Menu

---------------------------------------------------------------------------- */
class description_walker extends Walker_Nav_Menu {
	
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . ' menu-item-' . $item->ID . '"';
		$output .= $indent . '<li ' . $value . $class_names . '>';
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		
		$prepend = '<strong>';
		$append = '</strong>';
		$description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';
		
		if($depth != 0) {
			$description = $append = $prepend = "";
		}
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $description.$args->link_after;
		$item_output .= $append;
		$item_output .= '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	
	}

}



/* ----------------------------------------------------------------------------

   Page Sidebar

---------------------------------------------------------------------------- */
function sohohotel_page_sidebar($sohohotel_get_post_id) {
	
	if( is_category() ) {
		
		if(!empty(get_theme_mod('sohohotel_category_layout'))) {
			$sohohotel_individual_layout = get_theme_mod('sohohotel_category_layout');
		} else {
			$sohohotel_individual_layout = 'right-sidebar';
		}
		
	} elseif( is_archive() ) {
		
		if(!empty(get_theme_mod('sohohotel_archive_layout'))) {
			$sohohotel_individual_layout = get_theme_mod('sohohotel_archive_layout');
		} else {
			$sohohotel_individual_layout = 'right-sidebar';
		}
		
	} elseif( is_search() ) {
		
		if(!empty(get_theme_mod('sohohotel_search_layout'))) {
			$sohohotel_individual_layout = get_theme_mod('sohohotel_search_layout');
		} else {
			$sohohotel_individual_layout = 'right-sidebar';
		}
	
	} else {
		
		if(!empty(get_post_meta($sohohotel_get_post_id, 'sohohotel_page_layout', true))) {
			$sohohotel_individual_layout = get_post_meta($sohohotel_get_post_id, 'sohohotel_page_layout', true);
		} else {
			$sohohotel_individual_layout = 'right-sidebar';
		}
	
	}

	return $sohohotel_individual_layout;

}



/* ----------------------------------------------------------------------------

   Page Layout

---------------------------------------------------------------------------- */
function sohohotel_page_title($sohohotel_get_post_id) {
	
	// Set Title Layout
	$sohohotel_individual_title = get_post_meta($sohohotel_get_post_id, 'sohohotel_page_title', true);

	if ( !empty($sohohotel_individual_title) ) {
		if ( $sohohotel_individual_title == 'no-title' ) {
			$sohohotel_page_title = 'no-title';
		} else {
			$sohohotel_page_title = 'title';
		}
	} else {
		$sohohotel_page_title = 'title';
	}
	
	return $sohohotel_page_title;

}



/* ----------------------------------------------------------------------------

   Page Header Image

---------------------------------------------------------------------------- */
function sohohotel_page_header_image( $post_id ) {
	
	$output = '';
	
	if( is_search() ) {
		
		if(!empty(get_theme_mod('sohohotel_search_header_image'))) {
			$header_image = get_theme_mod('sohohotel_search_header_image');
			$output .= 'style="background-image:url(' . esc_url( $header_image ) . ');"';
		}
		
	} elseif( is_404() ) {
		
		if(!empty(get_theme_mod('sohohotel_404_header_image'))) {
			$header_image = get_theme_mod('sohohotel_404_header_image');
			$output .= 'style="background-image:url(' . esc_url( $header_image ) . ');"';
		}
		
	} elseif( is_single() || is_front_page() || is_archive() ) {
			
		if(!empty(get_theme_mod('sohohotel_default_header_image'))) {
			$header_image = get_theme_mod('sohohotel_default_header_image');
			$output .= 'style="background-image:url(' . esc_url( $header_image ) . ');"';
		}
		
	} else {
		
		if(!empty($post_id)) {
			$header_image = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'sohohotel-image-style4' );
		
			if(!empty($header_image)) {
				$output .= 'style="background-image:url(' . esc_url( $header_image[0] ) . ');"';
			} else {
				if(!empty(get_theme_mod('sohohotel_default_header_image'))) {
					$header_image = get_theme_mod('sohohotel_default_header_image');
					$output .= 'style="background-image:url(' . esc_url( $header_image ) . ');"';
				}
			} 
		
		} else {
			$header_image = '';
		}
		
	}
	
	return $output;	
	
}



/* ----------------------------------------------------------------------------

   Comments Template

---------------------------------------------------------------------------- */
if( ! function_exists( 'sohohotel_comments' ) ) {
	function sohohotel_comments($comment, $args, $depth) {
	   $path = get_template_directory_uri();
	   $GLOBALS['comment'] = $comment;
	   ?>
		
	<li <?php comment_class('sohohotel-comment-entry sohohotel-clearfix'); ?> id="comment-<?php comment_ID(); ?>">
		
		<!-- BEGIN .sohohotel-comment-image -->
		<div class="sohohotel-comment-image">
			<?php echo get_avatar( $comment, 90 ); ?>
		<!-- END .sohohotel-comment-image -->
		</div>
	
		<!-- BEGIN .sohohotel-comment-content -->
		<div class="sohohotel-comment-content sohohotel-clearfix">
					
			<p class="sohohotel-comment-info"><?php printf( esc_html__( '%s', 'soho-hotel' ), sprintf( '%s', get_comment_author_link() ) ); ?> 
				<span><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php printf( esc_html__( '%1$s at %2$s', 'soho-hotel' ), get_comment_date(),  get_comment_time() ); ?>
				</a></span>
			</p>
					
			<div class="sohohotel-comment-text">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<p class="sohohotel-comment-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'soho-hotel' ); ?></p>
				<?php endif; ?>
				<?php comment_text(); ?>
			</div>
			
			<p class="sohohotel-reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				<?php edit_comment_link( esc_html__( '(Edit)', 'soho-hotel' ), ' ' ); ?>
			</p>

		<!-- END .sohohotel-comment-content -->
		</div>
		
		<div class="sohohotel-clearboth"></div>	

	<?php }
}



/* ----------------------------------------------------------------------------

   Password Protected Post Form

---------------------------------------------------------------------------- */
add_filter( 'the_password_form', 'sohohotel_password_form' );

function sohohotel_password_form() {
	
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$form = '<div class="sohohotel-msg sohohotel-fail sohohotel-clearfix"><p class="sohohotel-nopassword">' . esc_html__( 'This post is password protected. To view it please enter your password below', 'soho-hotel' ) . '</p></div>
<form class="sohohotel-protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post"><label for="' . esc_attr($label) . '">' . esc_html__( 'Password', 'soho-hotel' ) . ' </label><input name="post_password" id="' . esc_attr($label) . '" type="password" size="20" /><div class="sohohotel-clearboth"></div><input type="submit" value="' . esc_attr__( 'Submit','soho-hotel' ) . '" name="submit"></form>';
	return $form;
	
}



/* ----------------------------------------------------------------------------

   Remove width / height attributes from gallery images

---------------------------------------------------------------------------- */
add_filter('wp_get_attachment_link', 'sohohotel_remove_img_width_height', 10, 1);
add_filter('wp_get_attachment_image_attributes', 'sohohotel_remove_img_width_height', 10, 1);

function sohohotel_remove_img_width_height($html) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}



/* ----------------------------------------------------------------------------

   Excerpt More Link

---------------------------------------------------------------------------- */
function sohohotel_new_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'sohohotel_new_excerpt_more', 21 );

function sohohotel_the_excerpt_more_link( $excerpt ){
    $post = get_post();
    $excerpt .= '<a href="'. get_permalink($post->ID) . '" class="sohohotel-more-link">' . esc_html__( 'Read More', 'soho-hotel' ) . '</a>';
    return $excerpt;
}
add_filter( 'the_excerpt', 'sohohotel_the_excerpt_more_link', 21 );



/* ----------------------------------------------------------------------------

   Post Type Names

---------------------------------------------------------------------------- */
function sohohotel_post_type_name($post_type) {
	
	if ($post_type == 'post') {
		return esc_html__('Post','soho-hotel');
	}
	
	if ($post_type == 'testimonial') {
		return esc_html__('Testimonial','soho-hotel');
	}
	
	if ($post_type == 'page') {
		return esc_html__('Page','soho-hotel');
	}
	
	if ($post_type == 'accommodation') {
		return esc_html__('Room','soho-hotel');
	}
	
}



/* ----------------------------------------------------------------------------

   Automatically assign "Primary Navigation" menu if it exists and is not set

---------------------------------------------------------------------------- */
if ( !has_nav_menu( 'sohohotel-primary' ) ) {
	$menu_header = get_term_by('name', 'Primary Navigation', 'nav_menu');

	if ( !empty($menu_header->term_id) ) {
		$locations = get_theme_mod('nav_menu_locations');
		$locations['sohohotel-primary'] = $menu_header->term_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	}
}



/* ----------------------------------------------------------------------------

   Automatically assign "Primary Navigation Mobile" menu if it exists and is not set

---------------------------------------------------------------------------- */
if ( !has_nav_menu( 'sohohotel-primary-mobile' ) ) {
	$menu_header = get_term_by('name', 'Primary Navigation Mobile', 'nav_menu');

	if ( !empty($menu_header->term_id) ) {
		$locations = get_theme_mod('nav_menu_locations');
		$locations['sohohotel-primary-mobile'] = $menu_header->term_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	}
}



/* ----------------------------------------------------------------------------

   Automatically assign "Primary Navigation Left" menu if it exists and is not set

---------------------------------------------------------------------------- */
if ( !has_nav_menu( 'sohohotel-primary-left' ) ) {
	$menu_header = get_term_by('name', 'Primary Navigation Left', 'nav_menu');
	
	if(!empty($menu_header->term_id)) {
		$menu_header_id = $menu_header->term_id;
	}

	if ( !empty($menu_header_id) ) {
		$locations = get_theme_mod('nav_menu_locations');
		$locations['sohohotel-primary-left'] = $menu_header_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	}
}



/* ----------------------------------------------------------------------------

   Automatically assign "Primary Navigation Right" menu if it exists and is not set

---------------------------------------------------------------------------- */
if ( !has_nav_menu( 'sohohotel-primary-right' ) ) {
	$menu_header = get_term_by('name', 'Primary Navigation Right', 'nav_menu');
	
	if(!empty($menu_header->term_id)) {
		$menu_header_id = $menu_header->term_id;
	}

	if ( !empty($menu_header_id) ) {
		$locations = get_theme_mod('nav_menu_locations');
		$locations['sohohotel-primary-right'] = $menu_header_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	}
}



/* ----------------------------------------------------------------------------

   Automatically assign "Top Right Navigation" menu if it exists and is not set

---------------------------------------------------------------------------- */
if ( !has_nav_menu( 'sohohotel-top-right' ) ) {
	$menu_header = get_term_by('name', 'Top Right Navigation', 'nav_menu');
	
	if(!empty($menu_header->term_id)) {
		$menu_header_id = $menu_header->term_id;
	}

	if ( !empty($menu_header_id) ) {
		$locations = get_theme_mod('nav_menu_locations');
		$locations['sohohotel-top-right'] = $menu_header_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	}
}



/* ----------------------------------------------------------------------------

   Post type custom fields

---------------------------------------------------------------------------- */
function sohohotel_post_type_fields($sohohotel_post_fields,$data) {  
	
	$fields = '';
	
	$fields .= '<div class="sh-post-fields-wrapper">';
	
	foreach($sohohotel_post_fields as $field) {
		
		if ( !empty($data[$field['id']][0]) ) {
			$value = $data[$field['id']][0];
		} else {
			$value = '';
		}
		
		if($field['type'] == 'textfield') {
			$fields .= '<label>' . $field['title'] . '</label>';
			$fields .= '<input type="text" name="' . $field['id'] . '" class="' . $field['class'] . '" value="' . $value .  '" />';
		}
		
		if($field['type'] == 'textarea') {
			$fields .= '<label>' . $field['title'] . '</label>';
			$fields .= '<textarea name="' . $field['id'] . '" class="' . $field['class'] . '">' . $value .  '</textarea>';
		}
		
		if($field['type'] == 'select') {
			$fields .= '<label>' . $field['title'] . '</label>';
			$fields .= '<select name="' . $field['id'] . '" class="' . $field['class'] . '">';
			foreach($field['options'] as $option_key => $option_val) {
				if($value == $option_key) {
					$fields .= '<option value="' . $option_key . '" selected>' . $option_val .  '</textarea>';
				} else {
					$fields .= '<option value="' . $option_key . '">' . $option_val .  '</textarea>';
				}
				
			}
			$fields .= '</select>';
		}
	}
	
	$fields .= '</div>';
	
	return $fields;
	
}



/* ----------------------------------------------------------------------------

   Post type custom fields

---------------------------------------------------------------------------- */
function sohohotel_site_header() {
	
	if(!empty(get_theme_mod('sohohotel_header_style'))) {
		if( get_theme_mod('sohohotel_header_style') == 'header-1' ) {
			$sohohotel_header = 'sohohotel-header-1';
		} elseif( get_theme_mod('sohohotel_header_style') == 'header-2' ) {
			$sohohotel_header = 'sohohotel-header-2';
		} elseif( get_theme_mod('sohohotel_header_style') == 'header-3' ) {
			$sohohotel_header = 'sohohotel-header-3';
		} elseif( get_theme_mod('sohohotel_header_style') == 'header-4' ) {
			$sohohotel_header = 'sohohotel-header-4';
		}
	} else {	
		$sohohotel_header = 'sohohotel-header-1';	
	}
	
	return $sohohotel_header;
	
}



/* ----------------------------------------------------------------------------

   Disable Gutenberg

---------------------------------------------------------------------------- */
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );



/* ----------------------------------------------------------------------------

   Pagination

---------------------------------------------------------------------------- */
function sohohotel_pagination( $custom_query ) {
	
	$o = '';
	
    $total_pages = $custom_query->max_num_pages;
    $big = 999999999;

    if ($total_pages > 1) {
        
		$current_page = max(1, get_query_var('paged'));
		
		$defaults = array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'total' => $total_pages,
			'current' => $current_page,
			'aria_current' => 'page',
			'show_all' => false,
			'prev_next' => true,
			'prev_text' => __( '&laquo;' ),
			'next_text' => __( '&raquo;' ),
			'end_size' => 1,
			'mid_size' => 2,
			'type' => 'plain',
			'add_args' => array(),
			'add_fragment' => '',
			'before_page_number' => '',
			'after_page_number'  => '',
		);
		
		$o .= '<div class="sohohotel-pagination">';
		$o .= paginate_links($defaults);
		$o .= '</div>';
		
    }
	
	return $o;
	
}