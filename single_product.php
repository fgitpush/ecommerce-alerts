<?php
/*
2. Gets Product page count


*/

function ffs_single_product_view() {
	$single_product=0;
	if(get_option('single_product'))
	{
		$single_product= get_option('ffs_page_view');
	}
	else
		update_option( 'single_product', 0 );
	$single_product++;
	$time = date('h:i:s');
	/*
	$ffs_to="ifahaduddin@gmail.com";
	$subject = "Site Report";
	$message = "Single Product Viewed";
	wp_mail( $ffs_to, $subject, $message);
	*/
	update_option( 'single_product',$single_product);
	update_option( 'single_product_last',$time);
}

add_action( 'woocommerce_before_single_product', 'ffs_single_product_view' );

?>