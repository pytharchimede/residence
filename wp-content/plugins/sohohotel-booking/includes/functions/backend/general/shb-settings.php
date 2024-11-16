<?php
	
function shb_admin_page_settings(){ 
	
	if(!empty($_GET["tab"])) {
		$shb_settings_tab = $_GET["tab"];
	} else {
		$shb_settings_tab = 'general';
	} ?>
	
	<!-- BEGIN .wrap -->
	<div class="wrap">

		<nav class="shb-admin-settings-tabs shb-clearfix">
			
			<a href="admin.php?page=shb-settings&tab=general" <?php if($shb_settings_tab == 'general' || $shb_settings_tab == '') {echo 'class="shb-admin-settings-tabs-active"';} ?>>
				<?php esc_html_e('General', 'sohohotel_booking'); ?>
			</a>
			
			<a href="admin.php?page=shb-settings&tab=forms" <?php if($shb_settings_tab == 'forms') {echo 'class="shb-admin-settings-tabs-active"';} ?>>
				<?php esc_html_e('Forms', 'sohohotel_booking'); ?>
			</a>
			
			<a href="admin.php?page=shb-settings&tab=emails" <?php if($shb_settings_tab == 'emails') {echo 'class="shb-admin-settings-tabs-active"';} ?>>
				<?php esc_html_e('Emails', 'sohohotel_booking'); ?>
			</a>
			
			<a href="admin.php?page=shb-settings&tab=messages" <?php if($shb_settings_tab == 'messages') {echo 'class="shb-admin-settings-tabs-active"';} ?>>
				<?php esc_html_e('Messages', 'sohohotel_booking'); ?>
			</a>
			
			<a href="admin.php?page=shb-settings&tab=payments" <?php if($shb_settings_tab == 'payments') {echo 'class="shb-admin-settings-tabs-active"';} ?>>
				<?php esc_html_e('Payments', 'sohohotel_booking'); ?>
			</a>
			
		</nav>
		
		<?php if ( $shb_settings_tab == 'forms' ) {
			echo load_template( SHB_PLUGIN_DIR . '/includes/templates/backend/settings/shb-settings-forms.htm.php' );
		} elseif ( $shb_settings_tab == 'emails' ) {
			echo load_template( SHB_PLUGIN_DIR . '/includes/templates/backend/settings/shb-settings-emails.htm.php' );
		} elseif ( $shb_settings_tab == 'messages' ) {
			echo load_template( SHB_PLUGIN_DIR . '/includes/templates/backend/settings/shb-settings-messages.htm.php' );
		} elseif ( $shb_settings_tab == 'payments' ) {
			echo load_template( SHB_PLUGIN_DIR . '/includes/templates/backend/settings/shb-settings-payments.htm.php' );
		} else {
			echo load_template( SHB_PLUGIN_DIR . '/includes/templates/backend/settings/shb-settings-general.htm.php' );
		} ?>	
		
	<!-- END .wrap -->
	</div>
		
<?php }