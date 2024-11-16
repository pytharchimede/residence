<?php

function shb_create_woocommerce_order($data) {
	
	$booking_data = get_post_meta(get_the_ID());
	
	if(empty($booking_data['shb_woocommerce_id'][0])) {
		
		$address_arr = array(
			'first_name',
			'last_name',
			'company',
			'email',
			'phone',
			'address_1',
			'address_2',
			'city',
			'state',
			'postcode',
			'country'
		);
		
		foreach($address_arr as $address_id) {
			
			if(!empty($booking_data['shb_custom_form_' . $address_id][0])) {
				$address[$address_id] = $booking_data['shb_custom_form_' . $address_id][0];
			} else {
				$address[$address_id] = '';
			}
			
		}
		
		$order = wc_create_order();
		$order->add_product( wc_get_product( get_option('shb_woocommerce_product_id') ), 1, [
			'subtotal'     => $data['total'],
			'total'        => $data['total'],
		] );
		
		$order->set_address( $address, 'billing' );
		$order->set_address( $address, 'shipping' );
		$order->calculate_totals();
	
		update_post_meta(get_the_ID(),'shb_woocommerce_id',$order->get_id());
		update_post_meta(get_the_ID(),'shb_woocommerce_price',$data['total']);
		
	}
	
}

function shb_update_woocommerce_order($data) {
	
	$order_id = $data['id'];
	$order = wc_get_order( $order_id );
	
	foreach( $order->get_items() as $item_id => $item ){
		$new_product_price = $data['total'];
		$product_quantity = (int) $item->get_quantity();
		$new_line_item_price = $new_product_price * $product_quantity;
		$item->set_subtotal( $new_line_item_price ); 
		$item->set_total( $new_line_item_price );
		$item->calculate_taxes();
		$item->save();
	}
	
	$order->calculate_totals();
	update_post_meta(get_the_ID(),'shb_woocommerce_price',$data['total']);
	
}

// Get booking price
$booking_data = get_post_meta(get_the_ID());
$shb_get_booking_summary = shb_get_booking_summary($booking_data);

if(!empty($shb_get_booking_summary['total_price'])) {
	$wc_order_amount = $shb_get_booking_summary['total_price'];
	$data['total'] = $shb_get_booking_summary['total_price'];
} else {
	$wc_order_amount = 0;
	$data['total'] = 0;
}

// If create order button is clicked
if(!empty($_GET['shb-create-wc-order'])) {
	
	// Create WooCommerce order
	shb_create_woocommerce_order($data);
	
	// Get the post data again, so the updated status is displayed below
	$booking_data = get_post_meta(get_the_ID());
	
}

// If update order button is clicked
if(!empty($_GET['shb-update-wc-order'])) {
	
	$data['id'] = $booking_data['shb_woocommerce_id'][0];
	
	// Create WooCommerce order
	shb_update_woocommerce_order($data);
	
	// Get the post data again, so the updated status is displayed below
	$booking_data = get_post_meta(get_the_ID());
	
}

if(!empty($booking_data['shb_woocommerce_translated_id'][0]) ) {
	
	$wc_order_translated_id_site = $booking_data['shb_woocommerce_translated_id_site'][0];
	switch_to_blog($wc_order_translated_id_site);
	
	// Check if the WooCommerce order ID still exists
	if ( get_post_status ( $booking_data['shb_woocommerce_translated_id'][0] ) ) {
		
		$wc_order_translated_id = $booking_data['shb_woocommerce_translated_id'][0];
		$wc_order = wc_get_order( $wc_order_translated_id );
		$wc_button_label = __('View WooCommerce Order','sohohotel_booking');
		$wc_button_url = get_admin_url() . 'post.php?post=' . $wc_order_translated_id . '&action=edit';
		$wc_order_status  = wc_get_order_status_name($wc_order->get_status());
		$wc_button_target = "_blank";
		$wc_display_button = true;
		
		// If the booking has been edited display a button to update the WooCommerce order price		
		if($wc_order_amount != $booking_data['shb_woocommerce_price'][0]) {
			$wc_update_price = true;
			$wc_update_price_url = get_admin_url() . 'post.php?post=' . get_the_ID() . '&action=edit&shb-update-wc-order=1';
		} else {
			$wc_update_price = false;
		}
	
	// If the WooCommerce order ID was deleted
	} else {
		$wc_button_label = __('Create WooCommerce Order','sohohotel_booking');
		$wc_button_url = get_admin_url() . 'post.php?post=' . get_the_ID() . '&action=edit&shb-create-wc-order=1';
		$wc_order_translated_id = '';
		$wc_order_status  = '-';
		$wc_button_target = "_self";
		$wc_display_button = true;
		$wc_update_price = false;
		
		// Delete the WooCommerce ID from the booking so it can be added again
		update_post_meta(get_the_ID(),'shb_woocommerce_id','');
		
	}
	
	switch_to_blog(1);
	
} else {
	
	$wc_order_translated_id_site = 1;
	$wc_order_translated_id = 0;
	
	// If WooCommerce order has been generated
	if(!empty($booking_data['shb_woocommerce_id'][0]) ) {
	
		// Check if the WooCommerce order ID still exists
		if ( get_post_status ( $booking_data['shb_woocommerce_id'][0] ) ) {
			$wc_order_id = $booking_data['shb_woocommerce_id'][0];
			$wc_order = wc_get_order( $wc_order_id );
			$wc_button_label = __('View WooCommerce Order','sohohotel_booking');
			$wc_button_url = get_admin_url() . 'post.php?post=' . $wc_order_id . '&action=edit';
			$wc_order_status  = wc_get_order_status_name($wc_order->get_status());
			$wc_button_target = "_blank";
			$wc_display_button = true;
		
			// If the booking has been edited display a button to update the WooCommerce order price		
			if($wc_order_amount != $booking_data['shb_woocommerce_price'][0]) {
				$wc_update_price = true;
				$wc_update_price_url = get_admin_url() . 'post.php?post=' . get_the_ID() . '&action=edit&shb-update-wc-order=1';
			} else {
				$wc_update_price = false;
			}
	
		// If the WooCommerce order ID was deleted
		} else {
			$wc_button_label = __('Create WooCommerce Order','sohohotel_booking');
			$wc_button_url = get_admin_url() . 'post.php?post=' . get_the_ID() . '&action=edit&shb-create-wc-order=1';
			$wc_order_id = '';
			$wc_order_status  = '-';
			$wc_button_target = "_self";
			$wc_display_button = true;
			$wc_update_price = false;
		
			// Delete the WooCommerce ID from the booking so it can be added again
			update_post_meta(get_the_ID(),'shb_woocommerce_id','');
		
		}
	
	// If WooCommerce order has not been generated
	} else {
		$wc_button_label = __('Create WooCommerce Order','sohohotel_booking');
		$wc_button_url = get_admin_url() . 'post.php?post=' . get_the_ID() . '&action=edit&shb-create-wc-order=1';
		$wc_order_id = '';
		$wc_order_status  = '-';
		$wc_button_target = "_self";
		$wc_update_price = false;
	
		// Do not display the button if the booking price is 0
		if($wc_order_amount > 0) {
			$wc_display_button = true;
		} else {
			$wc_display_button = false;
		}
	
	}
	
}

echo '<ul>';
	echo '<li><strong>' . __('Amount','sohohotel_booking') . ':</strong> ' . shb_get_price($wc_order_amount) . '</li>';
	echo '<li><strong>' . __('Payment','sohohotel_booking') . ':</strong> ' . $wc_order_status .'</li>';
echo '</ul>';

echo "<input type='hidden' name='shb_woocommerce_translated_id_site' value='" . $wc_order_translated_id_site . "' />";
echo "<input type='hidden' name='shb_woocommerce_translated_id' value='" . $wc_order_translated_id . "' />";
echo "<input type='hidden' name='shb_woocommerce_id' value='" . $wc_order_id . "' />";
echo "<input type='hidden' name='shb_woocommerce_price' value='" . $wc_order_amount . "' />";

if($wc_display_button == true) {
	echo '<a target="' . $wc_button_target . '" href="' . $wc_button_url . '" class="button button-primary button-large">' . $wc_button_label . '</a>';	
}

if($wc_update_price == true) {
	echo '<a href="' . $wc_update_price_url . '" class="button button-primary button-large shb-update-price-button">' . __('Update Price','sohohotel-booking') . '</a>';	
}
		
?>