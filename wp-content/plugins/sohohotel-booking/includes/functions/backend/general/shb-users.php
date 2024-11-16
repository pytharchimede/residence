<?php function shb_guest_user_role() { 

	add_role(
		'shb_guest',
		__('Guest','sohohotel_booking'),
		array(
			'read' => true,
		)
	);

}
add_action('admin_init', 'shb_guest_user_role');

function shb_guest_login_redirect(){
	
	if( is_admin() && !defined('DOING_AJAX') && ( current_user_can('shb_guest') ) && !current_user_can('administrator') ) {
		wp_redirect(home_url());
		exit;
	}
}
add_action('init','shb_guest_login_redirect'); 

function shb_register_account(){
    
    $user = ( isset($_POST['username']) ? $_POST['username'] : '' );
    $pass = ( isset($_POST['password']) ? $_POST['password'] : '' );
    $email = ( isset($_POST['email']) ? $_POST['email'] : '' );
	
	if(!empty($user) && !empty($email)) {
		
	    if ( !username_exists( $user )  && !email_exists( $email ) ) {
		
	       $user_id = wp_create_user( $user, $pass, $email );
	       if( !is_wp_error($user_id) ) {
	           $user = new WP_User( $user_id );
	           $user->set_role( 'shb_guest' );
		   
			   echo '<p class="shb-msg shb-success">' . __('Registration successful, you may login now','sohohotel_booking') . '</p>';
		   
	       } else {
          
			  echo '<p class="shb-msg shb-fail">' . __('Username or email is already registered','sohohotel_booking') . '</p>';
		  
	       }
	    
		} else {
	    	
			echo '<p class="shb-msg shb-fail">' . __('Username or email is already registered','sohohotel_booking') . '</p>';
			
	    }
		
	}
	
}

function shb_register_form() { ?>
	
    <form method="post" id="shb-register-form">
        
		<label for="shb-username"><?php _e('Username','sohohotel_booking'); ?></label>
		<input type="text" id="shb-username" name="username" />
		
		<label for="shb-email"><?php _e('Email','sohohotel_booking'); ?></label>
        <input id="shb-email" id="shb-email" type="text" name="email" />
		
		<label for="shb-password"><?php _e('Password','sohohotel_booking'); ?></label>
        <input type="password" id="shb-password" name="password" />
		
        <input type="submit" value="<?php _e('Register','sohohotel_booking'); ?>" />
		
    </form>
	
<?php }

add_action( 'show_user_profile', 'shb_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'shb_show_extra_profile_fields' );

function shb_show_extra_profile_fields( $user ) { ?>
	
	<h3><?php esc_html_e( 'Contact Details', 'sohohotel_booking' ); ?></h3>
	
	<?php $shb_general_field_names = shb_custom_form_field_names();
	$booking_data = shb_get_user_data($shb_general_field_names,$user->ID);

	$shb_booking_fields = array(
		'fields' => array(
			array(
				'type' => 'custom',
				'custom' => shb_custom_form($booking_data)
			),
		)
	); ?>
	
	<table class="form-table">
		<tbody>
			<tr class="user-description-wrap">
				<th>
					<label><?php _e('Custom Fields','sohohotel_booking')?></label>
				</th>
				<td>
					
					<div id="shb_booking_guest_information" class="shb-profile-guest-information">
						<div class="inside">
							<?php echo shb_cpt_fields($shb_booking_fields,$booking_data); ?>
						</div>
					</div>
							
				</td>
			</tr>
		</tbody>
	</table>
	
<?php }

add_action( 'personal_options_update', 'shb_update_profile_fields' );
add_action( 'edit_user_profile_update', 'shb_update_profile_fields' );

function shb_update_profile_fields( $user_id ) {
	
	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}
	
	$fields = shb_custom_form_field_names();
	shb_save_user_data($fields,$user_id);
	
} ?>