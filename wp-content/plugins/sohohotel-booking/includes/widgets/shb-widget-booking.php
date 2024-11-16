<?php

// Widget Class
class shb_booking_widget extends WP_Widget {


/* ----------------------------------------------------------------------------

   Widget setup

---------------------------------------------------------------------------- */

	function __construct() {
		
		parent::__construct(false, $name = esc_html__('Soho Hotel Booking Form','soho-hotel'), array(
			'description' => esc_html__('Display Booking Form','soho-hotel')
		));
	
	}


/* ----------------------------------------------------------------------------

   Display widget

---------------------------------------------------------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );
		
		$hotel_select = apply_filters('hotel_select', $instance['hotel_select'] );
		
		$guestclass_ids = shb_get_all_ids('shb_guestclass');
	
		if(!empty(get_option('shb_booking_page'))) {
			$booking_page_url = get_permalink(get_option('shb_booking_page'));
		} else {
			$booking_page_url = '';
		}
	
		if ($hotel_select == 'yes') {
			$class_num = 5;
		} else {
			$class_num = 4;
		} ?>
		
		<!-- BEGIN .shb-booking-form-style-1 -->
		<form class="shb-booking-form-style-1 shb-booking-form-style-1-vertical shb-booking-form-1-column-5 shb-clearfix" action="<?php echo $booking_page_url; ?>" method="post">
	
			<?php if(!empty(get_option('shb_date_format'))) { 
				$date_format = get_option('shb_date_format');
			} else {
				$date_format = 'DD/MM/YYYY';
			}
		
			$shbdp_settings = array(
				'datepicker_first_day' => 1,
				'blocked_dates' => shb_get_blocked_dates_all(),
				'date_format' => $date_format,
				'panels' => 2,
				'inline' => false,
				'show_year_qty' => 1
			);
		
			echo shbdp($shbdp_settings);
		
			?>
		
			<?php if ($hotel_select == 'yes') { ?>
		
				<!-- BEGIN .shb-location-select-dropdown -->
				<div class="shb-location-select-dropdown">
				
					<ul>
						<?php $taxonomy = 'accommodation-categories';
						$terms = get_terms($taxonomy);

						if ( $terms && !is_wp_error( $terms ) ) :

						foreach ( $terms as $term ) { ?>
							<li data-id="<?php echo $term->term_id; ?>" data-name="<?php echo $term->name; ?>" class="shb-location-select"><?php echo $term->name; ?></li>
						        <?php } 
						endif;?>
					</ul>
		
					<input type="hidden" name="shb-location" class="shb-location" value="" />
	
				<!-- END .shb-location-select-dropdown -->
				</div>
		
			<?php } ?>
	
			<!-- BEGIN .shb-guestclass-select-dropdown -->
			<div class="shb-guestclass-select-dropdown">
			
				<?php foreach($guestclass_ids as $guestclass_id) { ?>
			
					<!-- BEGIN .shb-guestclass-select-section -->
					<div class="shb-guestclass-select-section shb-clearfix">
			
						<label><?php echo get_the_title($guestclass_id); ?> <span><?php echo get_post_meta($guestclass_id,'shb_guestclass_description',TRUE); ?></span></label>
			
						<div class="shb-qty-selection shb-clearfix">
							<button type="button" class="shb-qty-decrease">-</button>
							<div class="shb-qty-display">0</div>
							<button type="button" class="shb-qty-increase">+</button>
						</div>
			
						<input type="hidden" name="shb-guestclass-<?php echo $guestclass_id; ?>" class="shb-guestclass" value="0" />
		
					<!-- END .shb-guestclass-select-section -->
					</div>
			
				<?php } ?>
				
				<button type="button" class="shb-qty-done"><?php _e('Ok','sohohotel_booking'); ?></button>
	
			<!-- END .shb-guestclass-select-dropdown -->
			</div>
	 
		 	<?php if ($hotel_select == 'yes') { ?>
	 
				<!-- BEGIN .shb-booking-form-col -->
				<div class="shb-booking-form-col shb-location-selection shb-clearfix">
			
					<i class="fas fa-map-marker-alt"></i>
					<div class="shb-booking-form-col-field">
						<label><?php _e('Location','sohohotel_booking'); ?></label>
						<span class="shb-location-display"><?php _e('Select a location','sohohotel_booking'); ?></span>
					</div>
			
				<!-- END .shb-booking-form-col -->
				</div>
		
			<?php } ?>
		
			<!-- BEGIN .shb-booking-form-col -->
			<div class="shb-booking-form-col shbdp-checkin-wrapper shb-clearfix">
			
				<i class="far fa-calendar"></i>
				<div class="shb-booking-form-col-field">
					<label><?php _e('Check In','sohohotel_booking'); ?></label>
					<span class="shbdp-checkin-display"></span>
				</div>
			
			<!-- END .shb-booking-form-col -->
			</div>
		
			<!-- BEGIN .shb-booking-form-col -->
			<div class="shb-booking-form-col shbdp-checkout-wrapper shb-clearfix">
			
				<i class="far fa-calendar"></i>
				<div class="shb-booking-form-col-field">
					<label><?php _e('Check Out','sohohotel_booking'); ?></label>
					<span class="shbdp-checkout-display"></span>
				</div>
			
			<!-- END .shb-booking-form-col -->
			</div>
		
			<!-- BEGIN .shb-booking-form-col -->
			<div class="shb-booking-form-col shb-guestclass-selection shb-clearfix">
		
				<i class="fas fa-user-friends"></i>
				<div class="shb-booking-form-col-field">
					<label><?php _e('Guests','sohohotel_booking'); ?></label>
					<span><span class="shb-guestclass-total">0</span> <?php _e('Guest(s)','sohohotel_booking'); ?></span>
				</div>
			
			<!-- END .shb-booking-form-col -->
			</div>
		
			<!-- BEGIN .shb-booking-form-col -->
			<div class="shb-booking-form-col shb-clearfix">
			
				<input type="submit" value="<?php _e('Book Now','sohohotel_booking'); ?>" class="shb-booking-form-button" />
			
			<!-- END .shb-booking-form-col -->
			</div>
	
		<!-- END .shb-booking-form-style-1 -->
		</form>
		
<?php		
		
		
	}	
	
	
/* ----------------------------------------------------------------------------

   Update widget

---------------------------------------------------------------------------- */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['hotel_select'] = strip_tags( $new_instance['hotel_select'] );
		return $instance;
	}
	
	
/* ----------------------------------------------------------------------------

   Widget input form

---------------------------------------------------------------------------- */

	function form( $instance ) {
		$defaults = array(
		'hotel_select' => 'yes'
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'hotel_select' )); ?>"><?php esc_html_e('Show hotel select option:', 'soho-hotel'); ?></label>
			<select id="<?php echo esc_attr($this->get_field_id( 'hotel_select' )); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name( 'hotel_select' )); ?>">
				<option value="yes" <?php if ( $instance['hotel_select'] == 'yes' ) {echo 'selected="selected"';} ?>><?php esc_html_e('Yes', 'soho-hotel'); ?></option>
				<option value="no" <?php if ( $instance['hotel_select'] == 'no' ) {echo 'selected="selected"';} ?>><?php esc_html_e('No', 'soho-hotel'); ?></option>
			</select>
		</p>
		
	<?php
	}	
	
}

// Add widget function to widgets_init
add_action( 'widgets_init', 'shb_booking_widget' );

// Register Widget
function shb_booking_widget() {
	register_widget( 'shb_booking_widget' );
}