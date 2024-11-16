<?php



/* ----------------------------------------------------------------------------

   Map Theme Shortcodes To WP Bakery Page Builder

---------------------------------------------------------------------------- */



// Accommodation Listing 1
function shb_accommodation_listing_1_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Accommodation Listing 1", 'sohohotel' ),
		"description"			=> '',
		"base"					=> "shb_accommodation_listing_1",
		'category'				=> "Soho Hotel Booking",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Columns", 'sohohotel' ),
				"param_name"	=> "columns",
				"std"           => "3",
				"value"			=> array(
					'2' 	=> '2',
					'3' 	=> '3',
				),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Rooms per page", 'sohohotel' ),
				"param_name"	=> "posts_per_page",
				"std"           => "9",
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
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Accommodation Category Slug (Leave blank to display all)", 'sohohotel' ),
				"param_name"	=> "hotel_category",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Hide Pagination", 'sohohotel' ),
				"param_name"	=> "hide_pagination",
				"value"			=> array(
					'No' 	=> '1',
					'Yes' 	=> '2'
				),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Hide Filter", 'sohohotel' ),
				"param_name"	=> "hide_filter",
				"value"			=> array(
					'No' 	=> '1',
					'Yes' 	=> '2'
				),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Hide Order", 'sohohotel' ),
				"param_name"	=> "hide_order",
				"value"			=> array(
					'No' 	=> '1',
					'Yes' 	=> '2'
				),
			),
		)
	) );
}
add_action( 'vc_before_init', 'shb_accommodation_listing_1_vc' );



// Accommodation Listing 2
function shb_accommodation_listing_2_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Accommodation Listing 2", 'sohohotel' ),
		"description"			=> '',
		"base"					=> "shb_accommodation_listing_2",
		'category'				=> "Soho Hotel Booking",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Columns", 'sohohotel' ),
				"param_name"	=> "columns",
				"std"           => "3",
				"value"			=> array(
					'2' 	=> '2',
					'3' 	=> '3',
				),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Rooms per page", 'sohohotel' ),
				"param_name"	=> "posts_per_page",
				"std"           => "9",
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
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Accommodation Category Slug (Leave blank to display all)", 'sohohotel' ),
				"param_name"	=> "hotel_category",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Hide Pagination", 'sohohotel' ),
				"param_name"	=> "hide_pagination",
				"value"			=> array(
					'No' 	=> '1',
					'Yes' 	=> '2'
				),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Hide Filter", 'sohohotel' ),
				"param_name"	=> "hide_filter",
				"value"			=> array(
					'No' 	=> '1',
					'Yes' 	=> '2'
				),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Hide Order", 'sohohotel' ),
				"param_name"	=> "hide_order",
				"value"			=> array(
					'No' 	=> '1',
					'Yes' 	=> '2'
				),
			),
		)
	) );
}
add_action( 'vc_before_init', 'shb_accommodation_listing_2_vc' );



// Accommodation Listing 3
function shb_accommodation_listing_3_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Accommodation Listing 3", 'sohohotel' ),
		"description"			=> '',
		"base"					=> "shb_accommodation_listing_3",
		'category'				=> "Soho Hotel Booking",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Columns", 'sohohotel' ),
				"param_name"	=> "columns",
				"std"           => "3",
				"value"			=> array(
					'2' 	=> '2',
					'3' 	=> '3',
				),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Rooms per page", 'sohohotel' ),
				"param_name"	=> "posts_per_page",
				"std"           => "9",
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
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Accommodation Category Slug (Leave blank to display all)", 'sohohotel' ),
				"param_name"	=> "hotel_category",
				"value"			=> "",
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Hide Pagination", 'sohohotel' ),
				"param_name"	=> "hide_pagination",
				"value"			=> array(
					'No' 	=> '1',
					'Yes' 	=> '2'
				),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Hide Filter", 'sohohotel' ),
				"param_name"	=> "hide_filter",
				"value"			=> array(
					'No' 	=> '1',
					'Yes' 	=> '2'
				),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Hide Order", 'sohohotel' ),
				"param_name"	=> "hide_order",
				"value"			=> array(
					'No' 	=> '1',
					'Yes' 	=> '2'
				),
			),
		)
	) );
}
add_action( 'vc_before_init', 'shb_accommodation_listing_3_vc' );



// Accommodation Carousel
function shb_accommodation_carousel_1_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Accommodation Carousel 1", 'sohohotel' ),
		"description"			=> '',
		"base"					=> "shb_accommodation_carousel_1",
		'category'				=> "Soho Hotel Booking",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Order", 'sohohotel' ),
				"param_name"	=> "order",
				"value"			=> array(
					'Newest First' 	=> 'newest',
					'Oldest First' 	=> 'oldest',
				),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Columns", 'sohohotel' ),
				"param_name"	=> "columns",
				"value"			=> array(
					'2' 	=> '2',
					'3' 	=> '3',
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Accommodation Category Slug (Leave blank to display all)", 'sohohotel' ),
				"param_name"	=> "hotel_category",
				"value"			=> "",
			),
		)
	) );
}
add_action( 'vc_before_init', 'shb_accommodation_carousel_1_vc' );



// Accommodation Carousel
function shb_accommodation_carousel_2_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Accommodation Carousel 2", 'sohohotel' ),
		"description"			=> '',
		"base"					=> "shb_accommodation_carousel_2",
		'category'				=> "Soho Hotel Booking",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Order", 'sohohotel' ),
				"param_name"	=> "order",
				"value"			=> array(
					'Newest First' 	=> 'newest',
					'Oldest First' 	=> 'oldest',
				),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Columns", 'sohohotel' ),
				"param_name"	=> "columns",
				"value"			=> array(
					'2' 	=> '2',
					'3' 	=> '3',
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Accommodation Category Slug (Leave blank to display all)", 'sohohotel' ),
				"param_name"	=> "hotel_category",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Show specific accommodation IDs (Leave blank to display all)", 'sohohotel' ),
				"param_name"	=> "show_accommodation",
				"value"			=> "",
			),
		)
	) );
}
add_action( 'vc_before_init', 'shb_accommodation_carousel_2_vc' );



// Booking Form 1
function shb_booking_form_1_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Booking Form 1", 'sohohotel' ),
		"description"			=> '',
		"base"					=> "shb_booking_form_1",
		'category'				=> "Soho Hotel Booking",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Display location selection", 'sohohotel' ),
				"param_name"	=> "hotel_selection",
				"std"           => true,
				"value"			=> array(
					__('Yes','sohohotel_booking') => true,
					__('No','sohohotel_booking') => false,
				),
			),	
		),
	) );
}
add_action( 'vc_before_init', 'shb_booking_form_1_vc' );



// Booking Form With Background 1
function shb_booking_form_with_background_1_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Booking Form With Background 1", 'sohohotel' ),
		"description"			=> '',
		"base"					=> "shb_booking_form_with_background_1",
		'category'				=> "Soho Hotel Booking",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 1", 'sohohotel' ),
				"param_name"	=> "title_1",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 2", 'sohohotel' ),
				"param_name"	=> "title_2",
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
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Offset", 'sohohotel' ),
				"param_name"	=> "offset",
				"value"			=> "",
			),
		),
	) );
}
add_action( 'vc_before_init', 'shb_booking_form_with_background_1_vc' );



// Booking Form With Background 2
function shb_booking_form_with_background_2_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Booking Form With Background 2", 'sohohotel' ),
		"description"			=> '',
		"base"					=> "shb_booking_form_with_background_2",
		'category'				=> "Soho Hotel Booking",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 1", 'sohohotel' ),
				"param_name"	=> "title_1",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 2", 'sohohotel' ),
				"param_name"	=> "title_2",
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
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Offset", 'sohohotel' ),
				"param_name"	=> "offset",
				"value"			=> "",
			),
		),
	) );
}
add_action( 'vc_before_init', 'shb_booking_form_with_background_2_vc' );



// Booking Form With Background 3
function shb_booking_form_with_background_3_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Booking Form With Background 3", 'sohohotel' ),
		"description"			=> '',
		"base"					=> "shb_booking_form_with_background_3",
		'category'				=> "Soho Hotel Booking",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 1", 'sohohotel' ),
				"param_name"	=> "title_1",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 2", 'sohohotel' ),
				"param_name"	=> "title_2",
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
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Offset", 'sohohotel' ),
				"param_name"	=> "offset",
				"value"			=> "",
			),
		),
	) );
}
add_action( 'vc_before_init', 'shb_booking_form_with_background_3_vc' );



// Booking Form Single
function shb_booking_form_single_horizontal_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Booking Form Single Accommodation Horizontal", 'sohohotel' ),
		"description"			=> '',
		"base"					=> "shb_booking_form_single_horizontal",
		'category'				=> "Soho Hotel Booking",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Accommodation ID", 'sohohotel' ),
				"param_name"	=> "accommodation_id",
				"value"			=> "",
			),
		),
	) );
}
add_action( 'vc_before_init', 'shb_booking_form_single_horizontal_vc' );



// Booking Form Single Vertical
function shb_booking_form_single_vertical_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Booking Form Single Accommodation Vertical", 'sohohotel' ),
		"description"			=> '',
		"base"					=> "shb_booking_form_single_vertical",
		'category'				=> "Soho Hotel Booking",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Accommodation ID", 'sohohotel' ),
				"param_name"	=> "accommodation_id",
				"value"			=> "",
			),
		),
	) );
}
add_action( 'vc_before_init', 'shb_booking_form_single_vertical_vc' );



// Title With Icons
function shb_title_with_icons_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Title With Icons", 'sohohotel' ),
		"description"			=> '',
		"base"					=> "shb_title_with_icons",
		'category'				=> "Soho Hotel Booking",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Main Title", 'sohohotel' ),
				"param_name"	=> "main_title",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Secondary Title", 'sohohotel' ),
				"param_name"	=> "secondary_title",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Icon 1", 'sohohotel' ),
				"param_name"	=> "icon_1",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 1", 'sohohotel' ),
				"param_name"	=> "title_1",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Value 1", 'sohohotel' ),
				"param_name"	=> "value_1",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Icon 2", 'sohohotel' ),
				"param_name"	=> "icon_2",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 2", 'sohohotel' ),
				"param_name"	=> "title_2",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Value 2", 'sohohotel' ),
				"param_name"	=> "value_2",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Icon 3", 'sohohotel' ),
				"param_name"	=> "icon_3",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title 3", 'sohohotel' ),
				"param_name"	=> "title_3",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Value 3", 'sohohotel' ),
				"param_name"	=> "value_3",
				"value"			=> "",
			),
			
			
		),
	) );
}
add_action( 'vc_before_init', 'shb_title_with_icons_vc' );



// Booking Contact
function shb_booking_contact_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Booking Contact", 'sohohotel' ),
		"description"			=> '',
		"base"					=> "shb_booking_contact",
		'category'				=> "Soho Hotel Booking",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Title", 'sohohotel' ),
				"param_name"	=> "title",
				"value"			=> "",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Content", 'sohohotel' ),
				"param_name"	=> "main_content",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Address", 'sohohotel' ),
				"param_name"	=> "address",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Address URL", 'sohohotel' ),
				"param_name"	=> "address_url",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Phone", 'sohohotel' ),
				"param_name"	=> "phone",
				"value"			=> "",
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"class"			=> "",
				"heading"		=> esc_html__( "Email", 'sohohotel' ),
				"param_name"	=> "email",
				"value"			=> "",
			)
		),
	) );
}
add_action( 'vc_before_init', 'shb_booking_contact_vc' );




// Booking Contact
function shb_booking_page_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Booking Page", 'sohohotel' ),
		"description"			=> '',
		"base"					=> "shb_booking_page",
		'category'				=> "Soho Hotel Booking",
		"icon"					=> "",
		"params"				=> array(),
	) );
}
add_action( 'vc_before_init', 'shb_booking_page_vc' );




// Offer Carousel
function shb_offer_carousel_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Offer Carousel", 'sohohotel' ),
		"description"			=> esc_html__( "Display offer posts in a carousel", 'sohohotel' ),
		"base"					=> "shb_offer_carousel",
		'category'				=> "Soho Hotel Booking",
		"icon"					=> "",
		"params"				=> array(
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"class"			=> "",
				"heading"		=> esc_html__( "Post quantity to display", 'sohohotel' ),
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
				"heading"		=> esc_html__( "Order", 'sohohotel' ),
				"param_name"	=> "order",
				"value"			=> array(
					'Newest First' 	=> 'newest',
					'Oldest First' 	=> 'oldest',
				),
			),
		)
	) );
}
add_action( 'vc_before_init', 'shb_offer_carousel_vc' );



?>