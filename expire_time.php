<?php

/*
10. Calculate expire time value
*/


function ffs_expire_time_value($ffs_name){
		//Formulat=(last receive + expire duration). do in sec and show in time
		$ffs_last_time = get_option($ffs_name.'_last');
		//$time = '21:30:10'; right now its like this
		$dt = new DateTime("1970-01-01 ".$ffs_last_time, new DateTimeZone('UTC'));
		$seconds_ffs_last_time = (int)$dt->getTimestamp(); // last occurred
		$ffs_expire_time = get_option($ffs_name.'_expiry_time'); //expiry set
		$ffs_expire_time_seconds = $seconds_ffs_last_time+ $ffs_expire_time;
		$ffs_expire_time_display = gmdate("H:i:s", $ffs_expire_time_seconds%86400);	
		update_option( $ffs_name.'_time_display',$ffs_expire_time_display);
		//update_option( $ffs_name.'_time_display','12:00:00');
}


?>