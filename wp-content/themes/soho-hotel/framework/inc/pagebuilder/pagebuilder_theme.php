<?php

// Remove VC Items
/*vc_remove_element("vc_zigzag");
vc_remove_element("vc_cta");
vc_remove_element("vc_btn");
vc_remove_element("vc_custom_heading");
vc_remove_element("vc_tta_tour");
vc_remove_element("vc_masonry_grid");
vc_remove_element("vc_basic_grid");
vc_remove_element("vc_line_chart");
vc_remove_element("vc_round_chart");
vc_remove_element("vc_pie");
vc_remove_element("vc_progress_bar");
vc_remove_element("vc_gmaps");
vc_remove_element("vc_video");
vc_remove_element("vc_posts_slider");
vc_remove_element("vc_tta_pageable");
vc_remove_element("vc_text_separator");
vc_remove_element("vc_message");
vc_remove_element("vc_hoverbox");
vc_remove_element("vc_images_carousel");
vc_remove_element("vc_section");
vc_remove_element("vc_icon");
vc_remove_element("vc_media_grid");
vc_remove_element("vc_masonry_media_grid");*/

/* ----------------------------------------------------------------------------

   Map theme shortcodes for WP Bakery Page Builder plugin

---------------------------------------------------------------------------- */

// Title
function sohohotel_title_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Title", 'soho-hotel' ),
		"description"			=> esc_html__( "Add a title", 'soho-hotel' ),
		"base"					=> "sohohotel_title",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title", 'soho-hotel' ),
				"param_name"	=> "title",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Size", 'soho-hotel' ),
				"param_name"	=> "size",
				"value"			=> array(
					esc_html__( "20px", 'soho-hotel' ) => '20px',
					esc_html__( "25px", 'soho-hotel' ) => '25px',
					esc_html__( "28px", 'soho-hotel' ) => '28px',
					esc_html__( "35px", 'soho-hotel' ) => '35px'
				),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Alignment", 'soho-hotel' ),
				"param_name"	=> "align",
				"value"			=> array(
					esc_html__( "Left", 'soho-hotel' ) => 'left',
					esc_html__( "Center", 'soho-hotel' ) => 'center'
				),
			),
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_title_vc' );

// Title
function sohohotel_hotel_listing_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Hotel Listing", 'soho-hotel' ),
		"description"			=> esc_html__( "Add a hotel listing", 'soho-hotel' ),
		"base"					=> "sohohotel_hotel_listing",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Columns", 'soho-hotel' ),
				"param_name"	=> "columns",
				"value"			=> array(
					esc_html__( "2 Columns", 'soho-hotel' ) => '2',
					esc_html__( "3 Columns", 'soho-hotel' ) => '3'
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 1", 'soho-hotel' ),
				"param_name"	=> "title_1",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Link URL 1", 'soho-hotel' ),
				"param_name"	=> "link_1",
				"value"			=> "",
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image 1", 'soho-hotel' ),
				"param_name"	=> "image_1",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 2", 'soho-hotel' ),
				"param_name"	=> "title_2",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Link URL 2", 'soho-hotel' ),
				"param_name"	=> "link_2",
				"value"			=> "",
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image 2", 'soho-hotel' ),
				"param_name"	=> "image_2",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 3", 'soho-hotel' ),
				"param_name"	=> "title_3",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Link URL 3", 'soho-hotel' ),
				"param_name"	=> "link_3",
				"value"			=> "",
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image 3", 'soho-hotel' ),
				"param_name"	=> "image_3",
				"value"			=> "",
			),
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_hotel_listing_vc' );

// Contact Details
function sohohotel_contact_details_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Contact Details", 'soho-hotel' ),
		"description"			=> esc_html__( "Display contact details in icon list", 'soho-hotel' ),
		"base"					=> "sohohotel_contact_details",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Type", 'soho-hotel' ),
				"param_name"	=> "type",
				"value"			=> array(
					esc_html__( "Type 1", 'soho-hotel' ) => '1',
					esc_html__( "Type 2", 'soho-hotel' ) => '2'
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Address", 'soho-hotel' ),
				"param_name"	=> "address",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Phone", 'soho-hotel' ),
				"param_name"	=> "phone",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Email", 'soho-hotel' ),
				"param_name"	=> "email",
				"value"			=> "",
			),
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_contact_details_vc' );

// Google Map
function sohohotel_google_map_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Google Map", 'soho-hotel' ),
		"description"			=> esc_html__( "Display Google Map", 'soho-hotel' ),
		"base"					=> "sohohotel_googlemap",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Map ID", 'soho-hotel' ),
				"param_name"	=> "map_id",
				"value"			=> "1",
				),
		
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Width", 'soho-hotel' ),
				"param_name"	=> "width",
				"value"			=> "100%",
				),
			
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Height", 'soho-hotel' ),
				"param_name"	=> "height",
				"value"			=> "550px",
				),
		
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Map Type", 'soho-hotel' ),
				"param_name"	=> "maptype",
				"value"			=> "road",
				),
			
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Zoom", 'soho-hotel' ),
				"param_name"	=> "zoom",
				"value"			=> "14",
				),
			
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Latitude", 'soho-hotel' ),
				"param_name"	=> "latitude",
				"value"			=> "40.703316",
				),
			
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Longitude", 'soho-hotel' ),
				"param_name"	=> "longitude",
				"value"			=> "-73.988145",
				),
			
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Marker Content", 'soho-hotel' ),
				"param_name"	=> "marker_content",
				"value"			=> "Soho Hotel",
				),
			
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Map Color", 'soho-hotel' ),
				"param_name"	=> "map_color",
				"value"			=> "#cc4452",
				),
				array(
					"type"			=> "textfield",
					"admin_label"	=> false,
					"class"			=> "",
					"heading"		=> esc_html__( "Marker Color", 'soho-hotel' ),
					"param_name"	=> "marker_color",
					"value"			=> "#cc4452",
					),
			),	
	) );
}
add_action( 'vc_before_init', 'sohohotel_google_map_vc' );

// Social Media
function sohohotel_social_media_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Social Media", 'soho-hotel' ),
		"description"			=> esc_html__( "Display social media icon links", 'soho-hotel' ),
		"base"					=> "sohohotel_social_media",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Facebook", 'soho-hotel' ),
				"param_name"	=> "facebook",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Flickr", 'soho-hotel' ),
				"param_name"	=> "flickr",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Google Plus", 'soho-hotel' ),
				"param_name"	=> "googleplus",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Instagram", 'soho-hotel' ),
				"param_name"	=> "instagram",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Pinterest", 'soho-hotel' ),
				"param_name"	=> "pinterest",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Skype", 'soho-hotel' ),
				"param_name"	=> "skype",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Soundcloud", 'soho-hotel' ),
				"param_name"	=> "soundcloud",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Tumblr", 'soho-hotel' ),
				"param_name"	=> "tumblr",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Twitter", 'soho-hotel' ),
				"param_name"	=> "twitter",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Vimeo", 'soho-hotel' ),
				"param_name"	=> "vimeo",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Vine", 'soho-hotel' ),
				"param_name"	=> "vine",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Yelp", 'soho-hotel' ),
				"param_name"	=> "yelp",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Youtube", 'soho-hotel' ),
				"param_name"	=> "youtube",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Trip Advisor", 'soho-hotel' ),
				"param_name"	=> "tripadvisor",
				"value"			=> "",
			),
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_social_media_vc' );

// Image Text
function sohohotel_image_text_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Image Text", 'soho-hotel' ),
		"description"			=> esc_html__( "Add a large image with text and a button beside it", 'soho-hotel' ),
		"base"					=> "sohohotel_image_text",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Image Alignment", 'soho-hotel' ),
				"param_name"	=> "type",
				"value"			=> array(
					esc_html__( "Left Align Image", 'soho-hotel' ) => '1',
					esc_html__( "Right Align Image", 'soho-hotel' ) => '2'
				),
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image", 'soho-hotel' ),
				"param_name"	=> "image",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title", 'soho-hotel' ),
				"param_name"	=> "title",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Text", 'soho-hotel' ),
				"param_name"	=> "content",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button Text", 'soho-hotel' ),
				"param_name"	=> "button_text",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button URL", 'soho-hotel' ),
				"param_name"	=> "button_url",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button Icon", 'soho-hotel' ),
				"param_name"	=> "button_icon",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image Gallery IDs", 'soho-hotel' ),
				"param_name"	=> "gallery_ids",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Open link in new window", 'soho-hotel' ),
				"param_name"	=> "button_target",
				"value"			=> array(
					esc_html__( "Yes", 'soho-hotel' ) => '1',
					esc_html__( "No", 'soho-hotel' ) => '2'
				),
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Background color", "soho-hotel" ),
				"param_name" => "background_color",
				"value" => '#ffffff'
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Primary text color", "soho-hotel" ),
				"param_name" => "primary_text_color",
				"value" => '#181b20'
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Secondary text color", "soho-hotel" ),
				"param_name" => "secondary_text_color",
				"value" => '#656a70'
			)
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_image_text_vc' );

// Image Testimonial
function sohohotel_image_testimonial_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Image Testimonial", 'soho-hotel' ),
		"description"			=> esc_html__( "Add a large image with a testimonial beside it", 'soho-hotel' ),
		"base"					=> "sohohotel_image_testimonial",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Image Alignment", 'soho-hotel' ),
				"param_name"	=> "type",
				"value"			=> array(
					esc_html__( "Left Align Image", 'soho-hotel' ) => '1',
					esc_html__( "Right Align Image", 'soho-hotel' ) => '2'
				),
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image", 'soho-hotel' ),
				"param_name"	=> "image",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Testimonial Text", 'soho-hotel' ),
				"param_name"	=> "content",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Guest Name", 'soho-hotel' ),
				"param_name"	=> "guest",
				"value"			=> "",
			)
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_image_testimonial_vc' );

// Video Text
function sohohotel_video_text_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Video Text", 'soho-hotel' ),
		"description"			=> esc_html__( "Add a video and text", 'soho-hotel' ),
		"base"					=> "sohohotel_video_text",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Image Alignment", 'soho-hotel' ),
				"param_name"	=> "type",
				"value"			=> array(
					esc_html__( "Left Align Image", 'soho-hotel' ) => '1',
					esc_html__( "Right Align Image", 'soho-hotel' ) => '2'
				),
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image", 'soho-hotel' ),
				"param_name"	=> "image",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title", 'soho-hotel' ),
				"param_name"	=> "title",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Text", 'soho-hotel' ),
				"param_name"	=> "content",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button Text", 'soho-hotel' ),
				"param_name"	=> "button_text",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button URL", 'soho-hotel' ),
				"param_name"	=> "button_url",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button Icon", 'soho-hotel' ),
				"param_name"	=> "button_icon",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Open link in new window", 'soho-hotel' ),
				"param_name"	=> "button_target",
				"value"			=> array(
					esc_html__( "Yes", 'soho-hotel' ) => '1',
					esc_html__( "No", 'soho-hotel' ) => '2'
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Video URL", 'soho-hotel' ),
				"param_name"	=> "video_url",
				"value"			=> "",
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Background color", "soho-hotel" ),
				"param_name" => "background_color",
				"value" => '#ffffff'
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Primary text color", "soho-hotel" ),
				"param_name" => "primary_text_color",
				"value" => '#181b20'
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Secondary text color", "soho-hotel" ),
				"param_name" => "secondary_text_color",
				"value" => '#656a70'
			)
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_video_text_vc' );

// Icon Text
function sohohotel_icon_text_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Icon Text", 'soho-hotel' ),
		"description"			=> esc_html__( "Add an icon with text", 'soho-hotel' ),
		"base"					=> "sohohotel_icon_text",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Type", 'soho-hotel' ),
				"param_name"	=> "type",
				"value"			=> array(
					esc_html__( "Left Aligned Icons", 'soho-hotel' ) => '1',
					esc_html__( "Center Aligned Icons", 'soho-hotel' ) => '2'
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Icon 1", 'soho-hotel' ),
				"param_name"	=> "icon1",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 1", 'soho-hotel' ),
				"param_name"	=> "title1",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Content 1", 'soho-hotel' ),
				"param_name"	=> "content1",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Icon 2", 'soho-hotel' ),
				"param_name"	=> "icon2",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 2", 'soho-hotel' ),
				"param_name"	=> "title2",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Content 2", 'soho-hotel' ),
				"param_name"	=> "content2",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Icon 3", 'soho-hotel' ),
				"param_name"	=> "icon3",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 3", 'soho-hotel' ),
				"param_name"	=> "title3",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Content 3", 'soho-hotel' ),
				"param_name"	=> "content3",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Icon 4", 'soho-hotel' ),
				"param_name"	=> "icon4",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 4", 'soho-hotel' ),
				"param_name"	=> "title4",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Content 4", 'soho-hotel' ),
				"param_name"	=> "content4",
				"value"			=> "",
			),
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_icon_text_vc' );

// Button
function sohohotel_button_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Button", 'soho-hotel' ),
		"description"			=> esc_html__( "Add a button", 'soho-hotel' ),
		"base"					=> "sohohotel_button",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button Text", 'soho-hotel' ),
				"param_name"	=> "text",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Link", 'soho-hotel' ),
				"param_name"	=> "link",
				"value"			=> "",
				"description"   => 'e.g. http://website.com'
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Align", 'soho-hotel' ),
				"param_name"	=> "align",
				"value"			=> array(
					esc_html__( "Left", 'soho-hotel' ) => 'left',
					esc_html__( "Right", 'soho-hotel' ) => 'right',
					esc_html__( "Center", 'soho-hotel' ) => 'center'
				),
			),
			array(
				"type"			=> "colorpicker",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Background Color", 'soho-hotel' ),
				"param_name"	=> "background_color",
				"value"			=> "",
			),
			array(
				"type"			=> "colorpicker",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Text Color", 'soho-hotel' ),
				"param_name"	=> "text_color",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Margin Bottom", 'soho-hotel' ),
				"param_name"	=> "margin",
				"value"			=> "",
				"description"   => esc_html__( 'e.g. 30px', 'soho-hotel' )
			),
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_button_vc' );

// Video Thumbnail
function sohohotel_video_thumbnail_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Video Thumbnail", 'soho-hotel' ),
		"description"			=> esc_html__( "Add a video with a thumbnail image", 'soho-hotel' ),
		"base"					=> "sohohotel_video_thumbnail",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Thumbnail Image", 'soho-hotel' ),
				"param_name"	=> "thumbnail_url",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Video URL", 'soho-hotel' ),
				"param_name"	=> "video_url",
				"value"			=> "",
				"description"   => 'e.g. https://www.youtube.com/watch?v=9ATwmA0AZOM'
			),
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_video_thumbnail_vc' );

// Fixed height image
function sohohotel_fixed_height_text_image_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Fixed Height Text Image", 'soho-hotel' ),
		"description"			=> esc_html__( "Add text and an image with a fixed height", 'soho-hotel' ),
		"base"					=> "sohohotel_fixed_height_text_image",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image", 'soho-hotel' ),
				"param_name"	=> "image_url",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title", 'soho-hotel' ),
				"param_name"	=> "title",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea_html",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Content", 'soho-hotel' ),
				"param_name"	=> "content",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Layout", 'soho-hotel' ),
				"param_name"	=> "align",
				"value"			=> array(
					esc_html__( "Image on right", 'soho-hotel' ) => 'image-right',
					esc_html__( "Image on left", 'soho-hotel' ) => 'image-left'
				),
			),
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_fixed_height_text_image_vc' );

// Fixed height image
function sohohotel_single_testimonial_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Single Testimonial", 'soho-hotel' ),
		"description"			=> esc_html__( "Add single testimonial with an image", 'soho-hotel' ),
		"base"					=> "sohohotel_single_testimonial",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image", 'soho-hotel' ),
				"param_name"	=> "image_url",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea_html",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Testimonial Text", 'soho-hotel' ),
				"param_name"	=> "content",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Guest Name", 'soho-hotel' ),
				"param_name"	=> "guest_name",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Layout", 'soho-hotel' ),
				"param_name"	=> "align",
				"value"			=> array(
					esc_html__( "Image on right", 'soho-hotel' ) => 'image-right',
					esc_html__( "Image on left", 'soho-hotel' ) => 'image-left'
				),
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Background color", "soho-hotel" ),
				"param_name" => "background_color",
				"value" => '#ffffff'
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Primary text color", "soho-hotel" ),
				"param_name" => "primary_text_color",
				"value" => '#181b20'
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Secondary text color", "soho-hotel" ),
				"param_name" => "secondary_text_color",
				"value" => '#656a70'
			)
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_single_testimonial_vc' );

// Testimonials Carousel
function sohohotel_testimonials_carousel_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Testimonials Carousel", 'soho-hotel' ),
		"description"			=> esc_html__( "Display testimonials in a carousel", 'soho-hotel' ),
		"base"					=> "sohohotel_testimonials_carousel",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title", 'soho-hotel' ),
				"param_name"	=> "title",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Type", 'soho-hotel' ),
				"param_name"	=> "type",
				"value"			=> array(
					'Light' 	=> 'light',
					'Dark' 	=> 'dark'
				),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Post quantity to display", 'soho-hotel' ),
				"param_name"	=> "posts_per_page",
				"value"			=> array(
					'1' 	=> '1',
					'2' 	=> '2',
					'3' 	=> '3',
					'4' 	=> '4',
					'5' 	=> '5',
					'6' 	=> '6',
					'7' 	=> '7',
					'8' 	=> '8',
					'9' 	=> '9',
					'10' 	=> '10',
					'11' 	=> '11',
					'12' 	=> '12',
					'13' 	=> '13',
					'14' 	=> '14',
					'15' 	=> '15',
					'16' 	=> '16',
					'17' 	=> '17',
					'18' 	=> '18',
					'19' 	=> '19',
					'20' 	=> '20',
					'21' 	=> '21',
					'22' 	=> '22',
					'23' 	=> '23',
					'24' 	=> '24',
					'25' 	=> '25',
					'26' 	=> '26',
					'27' 	=> '27',
					'28' 	=> '28',
					'29' 	=> '29',
					'30' 	=> '30',
					'31' 	=> '31',
					'32' 	=> '32',
					'33' 	=> '33',
					'34' 	=> '34',
					'35' 	=> '35',
					'36' 	=> '36',
					'37' 	=> '37',
					'38' 	=> '38',
					'39' 	=> '39',
					'40' 	=> '40',
					'41' 	=> '41',
					'42' 	=> '42',
					'43' 	=> '43',
					'44' 	=> '44',
					'45' 	=> '45',
					'46' 	=> '46',
					'47' 	=> '47',
					'48' 	=> '48',
					'49' 	=> '49',
					'50' 	=> '50',
					'51' 	=> '51',
					'52' 	=> '52',
					'53' 	=> '53',
					'54' 	=> '54',
					'55' 	=> '55',
					'56' 	=> '56',
					'57' 	=> '57',
					'58' 	=> '58',
					'59' 	=> '59',
					'60' 	=> '60',
					'61' 	=> '61',
					'62' 	=> '62',
					'63' 	=> '63',
					'64' 	=> '64',
					'65' 	=> '65',
					'66' 	=> '66',
					'67' 	=> '67',
					'68' 	=> '68',
					'69' 	=> '69',
					'70' 	=> '70',
					'71' 	=> '71',
					'72' 	=> '72',
					'73' 	=> '73',
					'74' 	=> '74',
					'75' 	=> '75',
					'76' 	=> '76',
					'77' 	=> '77',
					'78' 	=> '78',
					'79' 	=> '79',
					'80' 	=> '80',
					'81' 	=> '81',
					'82' 	=> '82',
					'83' 	=> '83',
					'84' 	=> '84',
					'85' 	=> '85',
					'86' 	=> '86',
					'87' 	=> '87',
					'88' 	=> '88',
					'89' 	=> '89',
					'90' 	=> '90',
					'91' 	=> '91',
					'92' 	=> '92',
					'93' 	=> '93',
					'94' 	=> '94',
					'95' 	=> '95',
					'96' 	=> '96',
					'97' 	=> '97',
					'98' 	=> '98',
					'99' 	=> '99',
					'100' 	=> '100',
				),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Order", 'soho-hotel' ),
				"param_name"	=> "order",
				"value"			=> array(
					'Newest First' 	=> 'newest',
					'Oldest First' 	=> 'oldest',
			),
				),
				array(
					"type"			=> "attach_image",
					"admin_label"	=> true,
					"class"			=> "",
					"heading"		=> esc_html__( "Background Image", 'soho-hotel' ),
					"param_name"	=> "background_url",
					"value"			=> "",
				),
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_testimonials_carousel_vc' );

// Testimonials Page
function sohohotel_testimonials_page_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Testimonials Page", 'soho-hotel' ),
		"description"			=> esc_html__( "Display the testimonials page content", 'soho-hotel' ),
		"base"					=> "sohohotel_testimonials_page",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Posts per page", 'soho-hotel' ),
				"param_name"	=> "posts_per_page",
				"value"			=> array(
					'1' 	=> '1',
					'2' 	=> '2',
					'3' 	=> '3',
					'4' 	=> '4',
					'5' 	=> '5',
					'6' 	=> '6',
					'7' 	=> '7',
					'8' 	=> '8',
					'9' 	=> '9',
					'10' 	=> '10',
					'11' 	=> '11',
					'12' 	=> '12',
					'13' 	=> '13',
					'14' 	=> '14',
					'15' 	=> '15',
					'16' 	=> '16',
					'17' 	=> '17',
					'18' 	=> '18',
					'19' 	=> '19',
					'20' 	=> '20',
					'21' 	=> '21',
					'22' 	=> '22',
					'23' 	=> '23',
					'24' 	=> '24',
					'25' 	=> '25',
					'26' 	=> '26',
					'27' 	=> '27',
					'28' 	=> '28',
					'29' 	=> '29',
					'30' 	=> '30',
					'31' 	=> '31',
					'32' 	=> '32',
					'33' 	=> '33',
					'34' 	=> '34',
					'35' 	=> '35',
					'36' 	=> '36',
					'37' 	=> '37',
					'38' 	=> '38',
					'39' 	=> '39',
					'40' 	=> '40',
					'41' 	=> '41',
					'42' 	=> '42',
					'43' 	=> '43',
					'44' 	=> '44',
					'45' 	=> '45',
					'46' 	=> '46',
					'47' 	=> '47',
					'48' 	=> '48',
					'49' 	=> '49',
					'50' 	=> '50',
					'51' 	=> '51',
					'52' 	=> '52',
					'53' 	=> '53',
					'54' 	=> '54',
					'55' 	=> '55',
					'56' 	=> '56',
					'57' 	=> '57',
					'58' 	=> '58',
					'59' 	=> '59',
					'60' 	=> '60',
					'61' 	=> '61',
					'62' 	=> '62',
					'63' 	=> '63',
					'64' 	=> '64',
					'65' 	=> '65',
					'66' 	=> '66',
					'67' 	=> '67',
					'68' 	=> '68',
					'69' 	=> '69',
					'70' 	=> '70',
					'71' 	=> '71',
					'72' 	=> '72',
					'73' 	=> '73',
					'74' 	=> '74',
					'75' 	=> '75',
					'76' 	=> '76',
					'77' 	=> '77',
					'78' 	=> '78',
					'79' 	=> '79',
					'80' 	=> '80',
					'81' 	=> '81',
					'82' 	=> '82',
					'83' 	=> '83',
					'84' 	=> '84',
					'85' 	=> '85',
					'86' 	=> '86',
					'87' 	=> '87',
					'88' 	=> '88',
					'89' 	=> '89',
					'90' 	=> '90',
					'91' 	=> '91',
					'92' 	=> '92',
					'93' 	=> '93',
					'94' 	=> '94',
					'95' 	=> '95',
					'96' 	=> '96',
					'97' 	=> '97',
					'98' 	=> '98',
					'99' 	=> '99',
					'100' 	=> '100',
				),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Order", 'soho-hotel' ),
				"param_name"	=> "order",
				"value"			=> array(
					'Newest First' 	=> 'newest',
					'Oldest First' 	=> 'oldest',
				),
			),
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_testimonials_page_vc' );

// Blog Carousel
function sohohotel_blog_carousel_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Blog Carousel", 'soho-hotel' ),
		"description"			=> esc_html__( "Display blog posts in a carousel", 'soho-hotel' ),
		"base"					=> "sohohotel_blog_carousel",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Post quantity to display", 'soho-hotel' ),
				"param_name"	=> "posts_per_page",
				"value"			=> array(
					'1' 	=> '1',
					'2' 	=> '2',
					'3' 	=> '3',
					'4' 	=> '4',
					'5' 	=> '5',
					'6' 	=> '6',
					'7' 	=> '7',
					'8' 	=> '8',
					'9' 	=> '9',
					'10' 	=> '10',
					'11' 	=> '11',
					'12' 	=> '12',
					'13' 	=> '13',
					'14' 	=> '14',
					'15' 	=> '15',
					'16' 	=> '16',
					'17' 	=> '17',
					'18' 	=> '18',
					'19' 	=> '19',
					'20' 	=> '20',
					'21' 	=> '21',
					'22' 	=> '22',
					'23' 	=> '23',
					'24' 	=> '24',
					'25' 	=> '25',
					'26' 	=> '26',
					'27' 	=> '27',
					'28' 	=> '28',
					'29' 	=> '29',
					'30' 	=> '30',
					'31' 	=> '31',
					'32' 	=> '32',
					'33' 	=> '33',
					'34' 	=> '34',
					'35' 	=> '35',
					'36' 	=> '36',
					'37' 	=> '37',
					'38' 	=> '38',
					'39' 	=> '39',
					'40' 	=> '40',
					'41' 	=> '41',
					'42' 	=> '42',
					'43' 	=> '43',
					'44' 	=> '44',
					'45' 	=> '45',
					'46' 	=> '46',
					'47' 	=> '47',
					'48' 	=> '48',
					'49' 	=> '49',
					'50' 	=> '50',
					'51' 	=> '51',
					'52' 	=> '52',
					'53' 	=> '53',
					'54' 	=> '54',
					'55' 	=> '55',
					'56' 	=> '56',
					'57' 	=> '57',
					'58' 	=> '58',
					'59' 	=> '59',
					'60' 	=> '60',
					'61' 	=> '61',
					'62' 	=> '62',
					'63' 	=> '63',
					'64' 	=> '64',
					'65' 	=> '65',
					'66' 	=> '66',
					'67' 	=> '67',
					'68' 	=> '68',
					'69' 	=> '69',
					'70' 	=> '70',
					'71' 	=> '71',
					'72' 	=> '72',
					'73' 	=> '73',
					'74' 	=> '74',
					'75' 	=> '75',
					'76' 	=> '76',
					'77' 	=> '77',
					'78' 	=> '78',
					'79' 	=> '79',
					'80' 	=> '80',
					'81' 	=> '81',
					'82' 	=> '82',
					'83' 	=> '83',
					'84' 	=> '84',
					'85' 	=> '85',
					'86' 	=> '86',
					'87' 	=> '87',
					'88' 	=> '88',
					'89' 	=> '89',
					'90' 	=> '90',
					'91' 	=> '91',
					'92' 	=> '92',
					'93' 	=> '93',
					'94' 	=> '94',
					'95' 	=> '95',
					'96' 	=> '96',
					'97' 	=> '97',
					'98' 	=> '98',
					'99' 	=> '99',
					'100' 	=> '100',
				),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Order", 'soho-hotel' ),
				"param_name"	=> "order",
				"value"			=> array(
					'Newest First' 	=> 'newest',
					'Oldest First' 	=> 'oldest',
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Category", 'soho-hotel' ),
				"param_name"	=> "category",
				"value"			=> "",
				"description" => esc_html__( "Leave blank to display all post categories", 'soho-hotel' )
			),
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_blog_carousel_vc' );

// Blog Page
function sohohotel_blog_page_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Blog Page", 'soho-hotel' ),
		"description"			=> esc_html__( "Display blog posts", 'soho-hotel' ),
		"base"					=> "sohohotel_blog_page",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Style", 'soho-hotel' ),
				"param_name"	=> "style",
				"value"			=> array(
					'Style 1' 	=> '1',
					'Style 2 - 2 Columns' 	=> '2-2',
					'Style 2 - 3 Columns' 	=> '2-3',
					'Style 3' 	=> '3'
				),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Posts per page", 'soho-hotel' ),
				"param_name"	=> "posts_per_page",
				"value"			=> array(
					'1' 	=> '1',
					'2' 	=> '2',
					'3' 	=> '3',
					'4' 	=> '4',
					'5' 	=> '5',
					'6' 	=> '6',
					'7' 	=> '7',
					'8' 	=> '8',
					'9' 	=> '9',
					'10' 	=> '10',
					'11' 	=> '11',
					'12' 	=> '12',
					'13' 	=> '13',
					'14' 	=> '14',
					'15' 	=> '15',
					'16' 	=> '16',
					'17' 	=> '17',
					'18' 	=> '18',
					'19' 	=> '19',
					'20' 	=> '20',
					'21' 	=> '21',
					'22' 	=> '22',
					'23' 	=> '23',
					'24' 	=> '24',
					'25' 	=> '25',
					'26' 	=> '26',
					'27' 	=> '27',
					'28' 	=> '28',
					'29' 	=> '29',
					'30' 	=> '30',
					'31' 	=> '31',
					'32' 	=> '32',
					'33' 	=> '33',
					'34' 	=> '34',
					'35' 	=> '35',
					'36' 	=> '36',
					'37' 	=> '37',
					'38' 	=> '38',
					'39' 	=> '39',
					'40' 	=> '40',
					'41' 	=> '41',
					'42' 	=> '42',
					'43' 	=> '43',
					'44' 	=> '44',
					'45' 	=> '45',
					'46' 	=> '46',
					'47' 	=> '47',
					'48' 	=> '48',
					'49' 	=> '49',
					'50' 	=> '50',
					'51' 	=> '51',
					'52' 	=> '52',
					'53' 	=> '53',
					'54' 	=> '54',
					'55' 	=> '55',
					'56' 	=> '56',
					'57' 	=> '57',
					'58' 	=> '58',
					'59' 	=> '59',
					'60' 	=> '60',
					'61' 	=> '61',
					'62' 	=> '62',
					'63' 	=> '63',
					'64' 	=> '64',
					'65' 	=> '65',
					'66' 	=> '66',
					'67' 	=> '67',
					'68' 	=> '68',
					'69' 	=> '69',
					'70' 	=> '70',
					'71' 	=> '71',
					'72' 	=> '72',
					'73' 	=> '73',
					'74' 	=> '74',
					'75' 	=> '75',
					'76' 	=> '76',
					'77' 	=> '77',
					'78' 	=> '78',
					'79' 	=> '79',
					'80' 	=> '80',
					'81' 	=> '81',
					'82' 	=> '82',
					'83' 	=> '83',
					'84' 	=> '84',
					'85' 	=> '85',
					'86' 	=> '86',
					'87' 	=> '87',
					'88' 	=> '88',
					'89' 	=> '89',
					'90' 	=> '90',
					'91' 	=> '91',
					'92' 	=> '92',
					'93' 	=> '93',
					'94' 	=> '94',
					'95' 	=> '95',
					'96' 	=> '96',
					'97' 	=> '97',
					'98' 	=> '98',
					'99' 	=> '99',
					'100' 	=> '100',
				),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Order", 'soho-hotel' ),
				"param_name"	=> "order",
				"value"			=> array(
					'Newest First' 	=> 'newest',
					'Oldest First' 	=> 'oldest',
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Category ID (Leave empty to display all categories)", 'soho-hotel' ),
				"param_name"	=> "category",
				"value"			=> "",
			),
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_blog_page_vc' );

// Call To Action Small
function sohohotel_call_to_action_small_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Call To Action Small", 'soho-hotel' ),
		"description"			=> esc_html__( "Display call to action", 'soho-hotel' ),
		"base"					=> "sohohotel_call_to_action_small",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Text", 'soho-hotel' ),
				"param_name"	=> "text",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button Text", 'soho-hotel' ),
				"param_name"	=> "button_text",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button URL", 'soho-hotel' ),
				"param_name"	=> "button_url",
				"value"			=> "",
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Background Image", 'soho-hotel' ),
				"param_name"	=> "background_url",
				"value"			=> "",
			),
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_call_to_action_small_vc' );

// Call To Action Large
function sohohotel_call_to_action_large_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Call To Action Large", 'soho-hotel' ),
		"description"			=> esc_html__( "Display call to action", 'soho-hotel' ),
		"base"					=> "sohohotel_call_to_action_large",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title", 'soho-hotel' ),
				"param_name"	=> "title",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea_html",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Text", 'soho-hotel' ),
				"param_name"	=> "content",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button Text", 'soho-hotel' ),
				"param_name"	=> "button_text",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button URL", 'soho-hotel' ),
				"param_name"	=> "button_url",
				"value"			=> "",
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Background Image", 'soho-hotel' ),
				"param_name"	=> "background_url",
				"value"			=> "",
			),
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_call_to_action_large_vc' );

// Call To Action Video
function sohohotel_call_to_action_video_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Call To Action Video", 'soho-hotel' ),
		"description"			=> esc_html__( "Display call to action", 'soho-hotel' ),
		"base"					=> "sohohotel_call_to_action_video",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title", 'soho-hotel' ),
				"param_name"	=> "title",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Text", 'soho-hotel' ),
				"param_name"	=> "text",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Youtube Video URL", 'soho-hotel' ),
				"param_name"	=> "video_url",
				"value"			=> "",
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Background Image", 'soho-hotel' ),
				"param_name"	=> "background_url",
				"value"			=> "",
			),
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_call_to_action_video_vc' );

// Slideshow
function sohohotel_slideshow_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Slideshow", 'soho-hotel' ),
		"description"			=> esc_html__( "Create a simple slideshow", 'soho-hotel' ),
		"base"					=> "sohohotel_slideshow",
		'category'				=> "Soho Hotel",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Full screen", 'soho-hotel' ),
				"param_name"	=> "slide_full_screen",
				"value"			=> array(
					'No' 	=> 'no',
					'Yes' 	=> 'yes'
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Full screen offset", 'soho-hotel' ),
				"param_name"	=> "slide_full_screen_offset",
				"value"			=> "",
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image 1", 'soho-hotel' ),
				"param_name"	=> "slide_image_1",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 1", 'soho-hotel' ),
				"param_name"	=> "slide_title_1",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Text 1", 'soho-hotel' ),
				"param_name"	=> "slide_text_1",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button Text 1", 'soho-hotel' ),
				"param_name"	=> "slide_button_text_1",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button URL 1", 'soho-hotel' ),
				"param_name"	=> "slide_button_url_1",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Align 1", 'soho-hotel' ),
				"param_name"	=> "slide_align_1",
				"value"			=> array(
					'Center' 	=> 'center',
					'Left' 	=> 'left',
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Color 1 (e.g. '#000')", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_color_1",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Opacity 1 (e.g. '0.1' or '0.9' etc)", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_opacity_1",
				"value"			=> "",
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image 2", 'soho-hotel' ),
				"param_name"	=> "slide_image_2",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 2", 'soho-hotel' ),
				"param_name"	=> "slide_title_2",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Text 2", 'soho-hotel' ),
				"param_name"	=> "slide_text_2",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button Text 2", 'soho-hotel' ),
				"param_name"	=> "slide_button_text_2",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button URL 2", 'soho-hotel' ),
				"param_name"	=> "slide_button_url_2",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Align 2", 'soho-hotel' ),
				"param_name"	=> "slide_align_2",
				"value"			=> array(
					'Center' 	=> 'center',
					'Left' 	=> 'left',
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Color 2 (e.g. '#000')", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_color_2",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Opacity 2 (e.g. '0.1' or '0.9' etc)", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_opacity_2",
				"value"			=> "",
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image 3", 'soho-hotel' ),
				"param_name"	=> "slide_image_3",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 3", 'soho-hotel' ),
				"param_name"	=> "slide_title_3",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Text 3", 'soho-hotel' ),
				"param_name"	=> "slide_text_3",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button Text 3", 'soho-hotel' ),
				"param_name"	=> "slide_button_text_3",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button URL 3", 'soho-hotel' ),
				"param_name"	=> "slide_button_url_3",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Align 3", 'soho-hotel' ),
				"param_name"	=> "slide_align_3",
				"value"			=> array(
					'Center' 	=> 'center',
					'Left' 	=> 'left',
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Color 3 (e.g. '#000')", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_color_3",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Opacity 3 (e.g. '0.1' or '0.9' etc)", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_opacity_3",
				"value"			=> "",
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image 4", 'soho-hotel' ),
				"param_name"	=> "slide_image_4",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 4", 'soho-hotel' ),
				"param_name"	=> "slide_title_4",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Text 4", 'soho-hotel' ),
				"param_name"	=> "slide_text_4",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button Text 4", 'soho-hotel' ),
				"param_name"	=> "slide_button_text_4",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button URL 4", 'soho-hotel' ),
				"param_name"	=> "slide_button_url_4",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Align 4", 'soho-hotel' ),
				"param_name"	=> "slide_align_4",
				"value"			=> array(
					'Center' 	=> 'center',
					'Left' 	=> 'left',
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Color 4 (e.g. '#000')", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_color_4",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Opacity 4 (e.g. '0.1' or '0.9' etc)", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_opacity_4",
				"value"			=> "",
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image 5", 'soho-hotel' ),
				"param_name"	=> "slide_image_5",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 5", 'soho-hotel' ),
				"param_name"	=> "slide_title_5",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Text 5", 'soho-hotel' ),
				"param_name"	=> "slide_text_5",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button Text 5", 'soho-hotel' ),
				"param_name"	=> "slide_button_text_5",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button URL 5", 'soho-hotel' ),
				"param_name"	=> "slide_button_url_5",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Align 5", 'soho-hotel' ),
				"param_name"	=> "slide_align_5",
				"value"			=> array(
					'Center' 	=> 'center',
					'Left' 	=> 'left',
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Color 5 (e.g. '#000')", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_color_5",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Opacity 5 (e.g. '0.1' or '0.9' etc)", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_opacity_5",
				"value"			=> "",
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image 6", 'soho-hotel' ),
				"param_name"	=> "slide_image_6",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 6", 'soho-hotel' ),
				"param_name"	=> "slide_title_6",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Text 6", 'soho-hotel' ),
				"param_name"	=> "slide_text_6",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button Text 6", 'soho-hotel' ),
				"param_name"	=> "slide_button_text_6",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button URL 6", 'soho-hotel' ),
				"param_name"	=> "slide_button_url_6",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Align 6", 'soho-hotel' ),
				"param_name"	=> "slide_align_6",
				"value"			=> array(
					'Center' 	=> 'center',
					'Left' 	=> 'left',
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Color 6 (e.g. '#000')", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_color_6",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Opacity 6 (e.g. '0.1' or '0.9' etc)", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_opacity_6",
				"value"			=> "",
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image 7", 'soho-hotel' ),
				"param_name"	=> "slide_image_7",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 7", 'soho-hotel' ),
				"param_name"	=> "slide_title_7",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Text 7", 'soho-hotel' ),
				"param_name"	=> "slide_text_7",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button Text 7", 'soho-hotel' ),
				"param_name"	=> "slide_button_text_7",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button URL 7", 'soho-hotel' ),
				"param_name"	=> "slide_button_url_7",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Align 7", 'soho-hotel' ),
				"param_name"	=> "slide_align_7",
				"value"			=> array(
					'Center' 	=> 'center',
					'Left' 	=> 'left',
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Color 7 (e.g. '#000')", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_color_7",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Opacity 7 (e.g. '0.1' or '0.9' etc)", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_opacity_7",
				"value"			=> "",
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image 8", 'soho-hotel' ),
				"param_name"	=> "slide_image_8",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 8", 'soho-hotel' ),
				"param_name"	=> "slide_title_8",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Text 8", 'soho-hotel' ),
				"param_name"	=> "slide_text_8",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button Text 8", 'soho-hotel' ),
				"param_name"	=> "slide_button_text_8",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button URL 8", 'soho-hotel' ),
				"param_name"	=> "slide_button_url_8",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Align 8", 'soho-hotel' ),
				"param_name"	=> "slide_align_8",
				"value"			=> array(
					'Center' 	=> 'center',
					'Left' 	=> 'left',
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Color 8 (e.g. '#000')", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_color_8",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Opacity 8 (e.g. '0.1' or '0.9' etc)", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_opacity_8",
				"value"			=> "",
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image 9", 'soho-hotel' ),
				"param_name"	=> "slide_image_9",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 9", 'soho-hotel' ),
				"param_name"	=> "slide_title_9",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Text 9", 'soho-hotel' ),
				"param_name"	=> "slide_text_9",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button Text 9", 'soho-hotel' ),
				"param_name"	=> "slide_button_text_9",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button URL 9", 'soho-hotel' ),
				"param_name"	=> "slide_button_url_9",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Align 9", 'soho-hotel' ),
				"param_name"	=> "slide_align_9",
				"value"			=> array(
					'Center' 	=> 'center',
					'Left' 	=> 'left',
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Color 9 (e.g. '#000')", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_color_9",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Opacity 9 (e.g. '0.1' or '0.9' etc)", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_opacity_9",
				"value"			=> "",
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Image 10", 'soho-hotel' ),
				"param_name"	=> "slide_image_10",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 10", 'soho-hotel' ),
				"param_name"	=> "slide_title_10",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Text 10", 'soho-hotel' ),
				"param_name"	=> "slide_text_10",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button Text 10", 'soho-hotel' ),
				"param_name"	=> "slide_button_text_10",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Button URL 10", 'soho-hotel' ),
				"param_name"	=> "slide_button_url_10",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Align 10", 'soho-hotel' ),
				"param_name"	=> "slide_align_10",
				"value"			=> array(
					'Center' 	=> 'center',
					'Left' 	=> 'left',
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Color 10 (e.g. '#000')", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_color_10",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Overlay Opacity 10 (e.g. '0.1' or '0.9' etc)", 'soho-hotel' ),
				"param_name"	=> "slide_overlay_opacity_10",
				"value"			=> "",
			),
		)
	) );
}
add_action( 'vc_before_init', 'sohohotel_slideshow_vc' );

// Row fixed width
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => esc_html__( "Fixed Width", 'soho-hotel' ),
	"param_name" => "fixed_width",
	"value" => esc_html__( "yes", 'soho-hotel' ),
	"description" => esc_html__( "If you're using the unboxed full width page layout check this option to display boxed content", 'soho-hotel' )
));

// Row fixed width
vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => esc_html__( "Fixed Width", 'soho-hotel' ),
	"param_name" => "fixed_width",
	"value" => esc_html__( "yes", 'soho-hotel' ),
	"description" => esc_html__( "If you're using the unboxed full width page layout check this option to display boxed content", 'soho-hotel' )
));

// Row fixed width
vc_add_param("vc_column_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => esc_html__( "Fixed Width", 'soho-hotel' ),
	"param_name" => "fixed_width",
	"value" => esc_html__( "yes", 'soho-hotel' ),
	"description" => esc_html__( "If you're using the unboxed full width page layout check this option to display boxed content", 'soho-hotel' )
));

?>