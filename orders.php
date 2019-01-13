<?php
/*
7. Gets Order count
*/

function woo_alerts_waffs_user_ordered() {
	$orders=0;
	if(get_option('orders'))
	{
		$orders= get_option('orders');
	}
	else
		update_option( 'orders', 0 );
	$orders++;
	$time = date('h:i:s');
	/*
	$woo_alerts_waffs_to="ifahaduddin@gmail.com";
	$subject = "Orders";
	$message = "Ordered";
	wp_mail( $woo_alerts_waffs_to, $subject, $message);
	*/
	update_option('orders',$orders);
	update_option( 'orders_last',$time);
}

add_action( 'woocommerce_thankyou', 'woo_alerts_waffs_user_ordered' );
?>
