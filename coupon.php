<?php
/*
4.Gets Coupon code used count
*/

function ffs_coupon() {
	$coupon=0;
	if(get_option('coupon'))
	{
		$coupon= get_option('coupon');
	}
	else
		update_option( 'coupon', 0 );
	$coupon++;
	$time = get_the_time('G:i:s');
	/*
	$ffs_to="ifahaduddin@gmail.com";
	$subject = "Site Report";
	$message = "Coupon applied";
	wp_mail( $ffs_to, $subject, $message);
	*/
	update_option( 'coupon',$coupon);
	update_option( 'coupon_last',$time);
}

add_action( 'woocommerce_applied_coupon', 'ffs_coupon' );
?>