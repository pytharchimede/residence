<?php function shb_update_settings($fields) {
	
	foreach ($fields['fields'] as $val) {
		
		if (!empty($_POST['shb_' . $val['id']])) {
			update_option( 'shb_' . $val['id'], $_POST['shb_' . $val['id']] );
		}
		
		$data['shb_' . $val['id']][0] = str_replace('\\',"",get_option('shb_' . $val['id']));
		
	}
	
	return $data;
	
}

function shb_get_user_data($fields,$user) {
	
	foreach ($fields['fields'] as $val) {
		$data['shb_' . $val['id']][0] = get_the_author_meta( 'shb_' . $val['id'], $user );
	}
	
	return $data;
	
}

function shb_save_user_data($fields,$user) {
	
	foreach ($fields['fields'] as $val) {
		if(!empty($_POST['shb_' . $val['id']])) {
			update_user_meta( $user, 'shb_' . $val['id'], $_POST['shb_' . $val['id']] );
		} else {
			update_user_meta( $user, 'shb_' . $val['id'], '' );
		}
	}
	
} ?>