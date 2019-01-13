<?php
/*
8. Check if heartbeat is expired or not.If expired turn red, else turn green using css.
*/

function woo_alerts_waffs_is_valid($woo_alerts_waffs_name){
	
	$time_last = get_option($woo_alerts_waffs_name.'_last');
    $time_last_seconds = strtotime("1970-01-01 $time_last UTC");
	$time = $time = date('h:i:s');
	$time_now = new DateTime("1970-01-01 ".$time, new DateTimeZone('UTC'));
	$time_now_seconds = (int)$time_now->getTimestamp(); 
	$time_expiry =get_option($woo_alerts_waffs_name.'_time_display');
    $time_expiry_seconds = strtotime("1970-01-01 $time_expiry UTC");
	//echo "fahad ".$woo_alerts_waffs_name." ".$time_last_seconds." ".$time_now_seconds;
	if (get_option($woo_alerts_waffs_name.'_isactive')=="No")
		return "woo_alerts_waffs_isactive";
	else if($time_expiry_seconds>$time_now_seconds)
		return "woo_alerts_waffs_valid";
	else
		return "woo_alerts_waffs_invalid";
}
?>