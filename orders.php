<?php
/*
7. Gets Order count
*/

function ffs_user_ordered() {
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
	$ffs_to="ifahaduddin@gmail.com";
	$subject = "Orders";
	$message = "Ordered";
	wp_mail( $ffs_to, $subject, $message);
	*/
	update_option('orders',$orders);
	update_option( 'orders_last',$time);
}

add_action( 'woocommerce_thankyou', 'ffs_user_ordered' );
?>
