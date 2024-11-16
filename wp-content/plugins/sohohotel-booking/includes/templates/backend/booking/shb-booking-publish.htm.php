<div id="submitpost" class="submitbox">

	<select name="post_status">
		<option value="shb_confirmed" <?php if($post->post_status == 'shb_confirmed') {echo 'selected';}; ?>><?php _e('Confirmed','sohohotel_booking'); ?></option>
		<option value="shb_pending" <?php if($post->post_status == 'shb_pending') {echo 'selected';}; ?>><?php _e('Pending','sohohotel_booking'); ?></option>
		<option value="shb_cancelled" <?php if($post->post_status == 'shb_cancelled') {echo 'selected';}; ?>><?php _e('Cancelled','sohohotel_booking'); ?></option>
		<option value="shb_maintenance" <?php if($post->post_status == 'shb_maintenance') {echo 'selected';}; ?>><?php _e('Maintenance','sohohotel_booking'); ?></option>
	</select>

	<div id="major-publishing-actions">
	
		<div id="delete-action">
			<?php if ( current_user_can( 'delete_post', $post->ID ) ) { ?>
				<a class="submitdelete deletion" href="<?php echo esc_url( get_delete_post_link( $post->ID ) ); ?>"><?php echo __( 'Move to trash', 'sohohotel_booking' ); ?></a>
			<?php } ?>
		</div>
	
		<div id="publishing-action">
			<span class="spinner"></span>
			<input name="save" type="submit" class="button button-primary button-large" id="publish" value="<?php echo 'auto-draft' === $post->post_status ? esc_html__( 'Book Now', 'sohohotel_booking' ) : esc_html__( 'Update', 'sohohotel_booking' ); ?>" />
		</div>
	
		<div class="clear"></div>
		
	</div>
	
</div>