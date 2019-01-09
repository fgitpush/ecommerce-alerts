<?php
/*
3. Gets Checkout page count
*/

function ffs_user_checkout() {
	$checkout=0;
	if(get_option('checkout'))
	{
		$checkout= get_option('checkout');
	}
	else
		update_option( 'checkout', 0 );
	$checkout++;
	$time = date('h:i:s');
	/*
	$ffs_to="ifahaduddin@gmail.com";
	$subject = "Site Report";
	$message = "Checkout";
	wp_mail( $ffs_to, $subject, $message);
	*/
	update_option( 'checkout',$checkout);
	update_option( 'checkout_last',$time);
}

add_action( 'woocommerce_before_checkout_billing_form', 'ffs_user_checkout' );

?>