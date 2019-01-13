<?php

/*
12. Sends email to user
*/
function woo_alerts_waffs_sendthemail($woo_alerts_waffs_name){
	
	$time_last = get_option($woo_alerts_waffs_name.'_last');
    $time_last_seconds = strtotime("1970-01-01 $time_last UTC");
	$time = $time = date('h:i:s');
	$time_now = new DateTime("1970-01-01 ".$time, new DateTimeZone('UTC'));
	$time_now_seconds = (int)$time_now->getTimestamp(); 
	$time_expiry =get_option($woo_alerts_waffs_name.'_time_display');
    $time_expiry_seconds = strtotime("1970-01-01 $time_expiry UTC");
	//echo "fahad ".$woo_alerts_waffs_name." ".$time_last_seconds." ".$time_now_seconds;
	if (get_option($woo_alerts_waffs_name.'_isactive')=="No")
		return ;
	else if($time_expiry_seconds>$time_now_seconds)
	{
		$woo_alerts_waffs_to= get_option('admin_email');
        $subject = "Site Report";
        $message = $woo_alerts_waffs_name;
        wp_mail( $woo_alerts_waffs_to, $subject, $message);
	}
	else
		return;
	/*
    $time_last = $woo_alerts_waffs_name.'_time_display';
    $time_last_seconds = strtotime("1970-01-01 $time_last UTC");
    $time_expiry =get_option($woo_alerts_waffs_name.'_time_display');
    $time_expiry_seconds = strtotime("1970-01-01 $time_expiry UTC");
    // echo "time_last_seconds: ".$time_last_seconds;
    //echo " time_expiry_seconds".$time_expiry_seconds;
	
    if ($time_expiry_seconds<$time_last_seconds)
    {
        
    }
	*/
}
?>

