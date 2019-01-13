<?php

/*
10. Calculate expire time value
*/


function woo_alerts_waffs_expire_time_value($woo_alerts_waffs_name){
		//Formulat=(last receive + expire duration). do in sec and show in time
		$woo_alerts_waffs_last_time = get_option($woo_alerts_waffs_name.'_last');
		//$time = '21:30:10'; right now its like this
		$dt = new DateTime("1970-01-01 ".$woo_alerts_waffs_last_time, new DateTimeZone('UTC'));
		$seconds_woo_alerts_waffs_last_time = (int)$dt->getTimestamp(); // last occurred
		$woo_alerts_waffs_expire_time = get_option($woo_alerts_waffs_name.'_expiry_time'); //expiry set
		$woo_alerts_waffs_expire_time_seconds = $seconds_woo_alerts_waffs_last_time+ $woo_alerts_waffs_expire_time;
		$woo_alerts_waffs_expire_time_display = gmdate("H:i:s", $woo_alerts_waffs_expire_time_seconds%86400);
		update_option( $woo_alerts_waffs_name.'_time_display',$woo_alerts_waffs_expire_time_display);
		//update_option( $woo_alerts_waffs_name.'_time_display','12:00:00');
}


?>