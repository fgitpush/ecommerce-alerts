<?php
/*
4.Gets Coupon code used count
*/

function woo_alerts_waffs_coupon() {
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
	$woo_alerts_waffs_to="ifahaduddin@gmail.com";
	$subject = "Site Report";
	$message = "Coupon applied";
	wp_mail( $woo_alerts_waffs_to, $subject, $message);
	*/
	update_option( 'coupon',$coupon);
	update_option( 'coupon_last',$time);
}

add_action( 'woocommerce_applied_coupon', 'woo_alerts_waffs_coupon' );
?>