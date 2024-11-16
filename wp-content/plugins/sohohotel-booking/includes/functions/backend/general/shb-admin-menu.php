<?php
	
add_action( 'admin_menu', 'shb_admin_menu' );

function shb_admin_menu() {
	
	$parent_slug = 'shb_booking_calendar';
	
	add_menu_page(
		esc_html__('Hotel Booking', 'sohohotel_booking'),
		esc_html__('Hotel Booking', 'sohohotel_booking'),
		'manage_options',
		$parent_slug,
		'shb_booking_calendar',
		'dashicons-calendar-alt',
		50
	);
	
	add_submenu_page(
		$parent_slug,
		null,
		esc_html__('Bookings', 'sohohotel_booking'),
		'manage_options',
		'edit.php?post_type=shb_booking',
		null
	);
	
	add_submenu_page(
		$parent_slug,
		null,
		esc_html__('Add Booking', 'sohohotel_booking'),
		'manage_options',
		'post-new.php?post_type=shb_booking',
		null
	);
	
	add_submenu_page(
		$parent_slug,
		esc_html__('Calendar', 'sohohotel_booking'),
		esc_html__('Calendar', 'sohohotel_booking'),
		'manage_options',
		'shb-booking-calendar',
		'shb_booking_calendar'
	);
	
	add_submenu_page(
		$parent_slug,
		null,
		esc_html__('Additional Fees', 'sohohotel_booking'),
		'manage_options',
		'edit.php?post_type=shb_additionalfee',
		null
	);
	
	add_submenu_page(
		$parent_slug,
		null,
		esc_html__('Add Additional Fee', 'sohohotel_booking'),
		'manage_options',
		'post-new.php?post_type=shb_additionalfee',
		null
	);
	
	add_submenu_page(
		$parent_slug,
		null,
		esc_html__('Conditions', 'sohohotel_booking'),
		'manage_options',
		'edit.php?post_type=shb_condition',
		null
	);
	
	add_submenu_page(
		$parent_slug,
		null,
		esc_html__('Add Condition', 'sohohotel_booking'),
		'manage_options',
		'post-new.php?post_type=shb_condition',
		null
	);
	
	add_submenu_page(
		$parent_slug,
		null,
		esc_html__('Guest Classes', 'sohohotel_booking'),
		'manage_options',
		'edit.php?post_type=shb_guestclass',
		null
	);
	
	add_submenu_page(
		$parent_slug,
		null,
		esc_html__('Add Guest Class', 'sohohotel_booking'),
		'manage_options',
		'post-new.php?post_type=shb_guestclass',
		null
	);
	
	add_submenu_page(
		$parent_slug,
		null,
		esc_html__('Rates', 'sohohotel_booking'),
		'manage_options',
		'edit.php?post_type=shb_rate',
		null
	);
	
	add_submenu_page(
		$parent_slug,
		null,
		esc_html__('Add Rate', 'sohohotel_booking'),
		'manage_options',
		'post-new.php?post_type=shb_rate',
		null
	);
	
	add_submenu_page(
		$parent_slug,
		null,
		esc_html__('Rate Variations', 'sohohotel_booking'),
		'manage_options',
		'edit.php?post_type=shb_ratevariation',
		null
	);
	
	add_submenu_page(
		$parent_slug,
		null,
		esc_html__('Add Rate Variation', 'sohohotel_booking'),
		'manage_options',
		'post-new.php?post_type=shb_ratevariation',
		null
	);
	
	add_submenu_page(
		$parent_slug,
		null,
		esc_html__('Seasons', 'sohohotel_booking'),
		'manage_options',
		'edit.php?post_type=shb_season',
		null
	);
	
	add_submenu_page(
		$parent_slug,
		null,
		esc_html__('Add Season', 'sohohotel_booking'),
		'manage_options',
		'post-new.php?post_type=shb_season',
		null
	);

	add_submenu_page(
		$parent_slug,
		null,
		esc_html__('Offers', 'sohohotel_booking'),
		'manage_options',
		'edit.php?post_type=shb_offer',
		null
	);
	
	add_submenu_page(
		$parent_slug,
		null,
		esc_html__('Add Offer', 'sohohotel_booking'),
		'manage_options',
		'post-new.php?post_type=shb_offer',
		null
	);
	
	add_submenu_page(
		$parent_slug,
		esc_html__('iCal Feeds', 'sohohotel_booking'),
		esc_html__('iCal Feeds', 'sohohotel_booking'),
		'manage_options',
		'shb-ical',
		'shb_admin_ical_settings'
	);

	add_submenu_page(
		$parent_slug,
		esc_html__('Settings', 'sohohotel_booking'),
		esc_html__('Settings', 'sohohotel_booking'),
		'manage_options',
		'shb-settings',
		'shb_admin_page_settings'
	);
	
}