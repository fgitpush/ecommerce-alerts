<?php

/*
11. Writes new data to DB
*/


function ffs_add_data_db($ffs_entry){
	if($_POST[$ffs_entry.'_isactive'])
		update_option( $ffs_entry.'_isactive',$_POST[$ffs_entry.'_isactive']);

	//echo $ffs_entry;
	//echo "<br>";
	//echo "add data db";

	//var_dump($_POST[$ffs_entry.'_other_time']);
	//update_option( $ffs_entry.'_expiry_s_h_m_d_y',100);
    //update_option( 'alert_timezone',$_POST[$ffs_entry]);
	
	if($_POST[$ffs_entry.'_other_time'])
	{
	//	echo $_POST[$ffs_entry.'_other_time'];
	//	echo "<br>";
		update_option( $ffs_entry.'_expiry_int_part',$_POST[$ffs_entry.'_number']);
		//update_option( '_expiry_int_part',$expire_time);
		if($_POST[$ffs_entry.'_other_time'] == "seconds")
		{
		//	echo "seconds";
		//	echo "<br>";
			$expire_time = 1 * get_option($ffs_entry.'_expiry_int_part');
			update_option( $ffs_entry.'_expiry_s_h_m_d_y',$_POST['page_view_other_time']);
			update_option( $ffs_entry.'_expiry_time',$expire_time);

		}
		else if($_POST[$ffs_entry.'_other_time'] == "minutes")
		{
			$expire_time = 1 * get_option($ffs_entry.'_expiry_int_part')*60;
			update_option( $ffs_entry.'_expiry_s_h_m_d_y',$_POST['page_view_other_time']);
			update_option( $ffs_entry.'_expiry_time',$expire_time);
		}
		else if($_POST[$ffs_entry.'_other_time'] == "hours")
		{
			$expire_time = 1 * get_option($ffs_entry.'_expiry_int_part')*60*60;
			update_option( $ffs_entry.'_expiry_s_h_m_d_y',$_POST['page_view_other_time']);
			update_option( $ffs_entry.'_expiry_time',$expire_time);
		}
		else if($_POST[$ffs_entry.'_other_time'] == "days")
		{
			$expire_time = 1 * get_option($ffs_entry.'_expiry_int_part')*60*60*24;
			update_option( $ffs_entry.'_expiry_s_h_m_d_y',$_POST['page_view_other_time']);
			update_option( $ffs_entry.'_expiry_time',$expire_time);
		}
		else if($_POST[$ffs_entry.'_other_time'] == "weeks")
		{			
			$expire_time = 1* get_option($ffs_entry.'_expiry_int_part')*60*60*24*7;
			update_option( $ffs_entry.'_expiry_s_h_m_d_y',$_POST['page_view_other_time']);
			update_option( $ffs_entry.'_expiry_time',$expire_time);
		}
		else ;
	}
	ffs_expire_time_value($ffs_entry);
	
}
?>