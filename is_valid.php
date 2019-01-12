<?php
/*
8. Check if heartbeat is expired or not.If expired turn red, else turn green using css.
*/

function ffs_is_valid($ffs_name){
	
	$time_last = get_option($ffs_name.'_last');
    $time_last_seconds = strtotime("1970-01-01 $time_last UTC");
	$time = $time = date('h:i:s');
	$time_now = new DateTime("1970-01-01 ".$time, new DateTimeZone('UTC'));
	$time_now_seconds = (int)$time_now->getTimestamp(); 
	$time_expiry =get_option($ffs_name.'_time_display');
    $time_expiry_seconds = strtotime("1970-01-01 $time_expiry UTC");
	//echo "fahad ".$ffs_name." ".$time_last_seconds." ".$time_now_seconds;
	if (get_option($ffs_name.'_isactive')=="No")
		return "ffs_isactive";
	else if($time_expiry_seconds>$time_now_seconds)
		return "ffs_valid";
	else
		return "ffs_invalid";
}
?>