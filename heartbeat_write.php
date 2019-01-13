<?php
/*
function woo_alerts_waffs_heart_write($item) {
	$count=0;
	if(get_option($item))
	{
		$count= get_option($item);
	}
	else
		update_option( $item, 0 );
	$count++;
	$time = get_the_time('G:i:s');
	
	$woo_alerts_waffs_to="";
	$subject = "Site Report";
	$message = "Page View";
	wp_mail( "", $subject, $message);
	
	update_option( $item,$count);
	update_option( $item.'_last',$time);
}
*/
?>