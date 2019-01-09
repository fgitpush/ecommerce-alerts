<?php
/*
5. Gets Add to cart count
*/

function ffs_add_cart() {
	$cart=0;
	if(get_option('cart'))
	{
		$cart= get_option('cart');
	}
	else
		update_option( 'cart', 0 );
	$cart++;
	$time = date('h:i:s');
	/*
	$ffs_to="ifahaduddin@gmail.com";
	$subject = "Site Report";
	$message = "Added to cart";
	wp_mail( $ffs_to, $subject, $message);
	*/
	update_option( 'cart',$cart);
	update_option( 'cart_last',$time);	
}

add_action( 'woocommerce_add_to_cart', 'ffs_add_cart' );
?>