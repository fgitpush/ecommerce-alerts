<?php

/*
11. Writes new data to DB
*/


function woo_alerts_waffs_add_data_db($woo_alerts_waffs_entry){
	if($_POST[$woo_alerts_waffs_entry.'_isactive'])
		update_option( $woo_alerts_waffs_entry.'_isactive',$_POST[$woo_alerts_waffs_entry.'_isactive']);

	//echo $woo_alerts_waffs_entry;
	//echo "<br>";
	//echo "add data db";

	//var_dump($_POST[$woo_alerts_waffs_entry.'_other_time']);
	//update_option( $woo_alerts_waffs_entry.'_expiry_s_h_m_d_y',100);
    //update_option( 'alert_timezone',$_POST[$woo_alerts_waffs_entry]);
	
	if($_POST[$woo_alerts_waffs_entry.'_other_time'])
	{
	//	echo $_POST[$woo_alerts_waffs_entry.'_other_time'];
	//	echo "<br>";
		update_option( $woo_alerts_waffs_entry.'_expiry_int_part',$_POST[$woo_alerts_waffs_entry.'_number']);
		//update_option( '_expiry_int_part',$expire_time);
		if($_POST[$woo_alerts_waffs_entry.'_other_time'] == "seconds")
		{
		//	echo "seconds";
		//	echo "<br>";
			$expire_time = 1 * get_option($woo_alerts_waffs_entry.'_expiry_int_part');
			update_option( $woo_alerts_waffs_entry.'_expiry_s_h_m_d_y',$_POST['page_view_other_time']);
			update_option( $woo_alerts_waffs_entry.'_expiry_time',$expire_time);

		}
		else if($_POST[$woo_alerts_waffs_entry.'_other_time'] == "minutes")
		{
			$expire_time = 1 * get_option($woo_alerts_waffs_entry.'_expiry_int_part')*60;
			update_option( $woo_alerts_waffs_entry.'_expiry_s_h_m_d_y',$_POST['page_view_other_time']);
			update_option( $woo_alerts_waffs_entry.'_expiry_time',$expire_time);
		}
		else if($_POST[$woo_alerts_waffs_entry.'_other_time'] == "hours")
		{
			$expire_time = 1 * get_option($woo_alerts_waffs_entry.'_expiry_int_part')*60*60;
			update_option( $woo_alerts_waffs_entry.'_expiry_s_h_m_d_y',$_POST['page_view_other_time']);
			update_option( $woo_alerts_waffs_entry.'_expiry_time',$expire_time);
		}
		else if($_POST[$woo_alerts_waffs_entry.'_other_time'] == "days")
		{
			$expire_time = 1 * get_option($woo_alerts_waffs_entry.'_expiry_int_part')*60*60*24;
			update_option( $woo_alerts_waffs_entry.'_expiry_s_h_m_d_y',$_POST['page_view_other_time']);
			update_option( $woo_alerts_waffs_entry.'_expiry_time',$expire_time);
		}
		else if($_POST[$woo_alerts_waffs_entry.'_other_time'] == "weeks")
		{			
			$expire_time = 1* get_option($woo_alerts_waffs_entry.'_expiry_int_part')*60*60*24*7;
			update_option( $woo_alerts_waffs_entry.'_expiry_s_h_m_d_y',$_POST['page_view_other_time']);
			update_option( $woo_alerts_waffs_entry.'_expiry_time',$expire_time);
		}
		else ;
	}
	woo_alerts_waffs_expire_time_value($woo_alerts_waffs_entry);
	
}
?>