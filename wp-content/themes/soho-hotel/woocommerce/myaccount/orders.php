<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.2.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_account_orders', $has_orders ); 

if(function_exists('switch_to_blog')){
	$current_blog_id = get_current_blog_id();
	switch_to_blog(1);
}

$booking_ids_query = get_posts(array(
    'fields'          => 'ids',
    'posts_per_page'  => -1,
	'post_type' => 'shb_booking',
	'post_status' => array('shb_confirmed','shb_ical','shb_maintenance')
));


if(!empty($booking_ids_query)) {
	
	foreach($booking_ids_query as $key) {
		
		$order_id = get_post_meta($key,'shb_woocommerce_id',TRUE);
		
		if(!empty($order_id)) {
			$order = wc_get_order($order_id);
			$user_id = $order->get_user_id();
			
			if($user_id == get_current_user_id()) {
				$booking_ids[$key] = $key;
			}

		}
		
	} 
	
}



if(function_exists('switch_to_blog')){
	switch_to_blog($current_blog_id);
}

if(!empty($booking_ids)) {
	
	echo '<table>';
	echo '<tr>';
	echo '<th>' . __('Booking ID','soho-hotel') . '</th>';
	echo '<th>' . __('Date','soho-hotel') . '</th>';
	echo '<th>' . __('Status','soho-hotel') . '</th>';
	echo '<th>' . __('Total','soho-hotel') . '</th>';
	echo '</tr>';

	foreach($booking_ids as $key) {
	
		echo '<tr>';
		echo '<td>#' . $key . '</td>';
		echo '<td>' . get_the_time('F jS, Y', $key) . '</td>';
		echo '<td>' . shb_get_display_text(get_post_status($key)) .'</td>';
		echo '<td>' . shb_get_price(get_post_meta($key,'shb_woocommerce_price',TRUE)) . '</td>';
		echo '</tr>';
			
	}

	echo '</table>';
	
} else {
	
	echo '<p>' . __('No bookings have been placed yet.','soho-hotel') . '</p>';
	
} ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>