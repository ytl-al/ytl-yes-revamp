<?php 
    /**
     * Function to check the targeted promo url
     * 
     * @param    string     $promo_id 		The promo ID and unique ID pair
     * @param    string     $unique_id 		The unique ID and promo ID pair 
     * 
     * @since    1.1.0
     */
	function ywos_tp_url_check($promo_id, $unique_id) 
	{
		global $wpdb;
		$table_name = $wpdb->prefix.'ywos_targeted_promo_customers';
		$data = $wpdb->get_row($wpdb->prepare("SELECT ID, promo_id, unique_user_id, user_meta, meta, has_purchased, created_at FROM $table_name WHERE promo_id = %s AND unique_user_id = %s", $promo_id, $unique_id));
		if ($data->user_meta) $data->user_meta = unserialize($data->user_meta);
		if ($data->meta) $data->meta = ($data->meta) ? unserialize($data->meta) : $data->meta;
		if ($data) {
			return $data;
		}
		return false;
	}


    /**
     * Function to update the has_purchased flag for a record
     * 
     * @param    string     $promo_id 		The promo ID and unique ID pair
     * @param    string     $unique_id 		The unique ID and promo ID pair 
     * 
     * @since    1.1.0
     */
	function ywos_tp_update_has_purchased_flag($promo_id, $unique_id)
	{
		global $wpdb;
		$table_name = $wpdb->prefix.'ywos_targeted_promo_customers';

		$getRecordID 	= $wpdb->get_var("SELECT ID FROM $table_name WHERE promo_id = '$promo_id' AND unique_user_id = '$unique_id'");
		$curTimestamp 	= current_time('mysql');
		if ($getRecordID) {
			$params = [
				'has_purchased' => 1, 
				'updated_at' 	=> $curTimestamp 
			];
			return $wpdb->update(
				$table_name,
				$params, 
				array(
					'ID' => $getRecordID
				)
			);
		}
		return false;
	}
?>