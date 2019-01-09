
<?php
/*
6. Gets out of stock count (commented)
*/
/*
function ffs_out_stock() {
	$out_stock=0;
	if(get_option('out_stock'))
	{
		$out_stock= get_option('out_stock');
	}
	else
		update_option( 'out_stock', 0 );
	$out_stock++;
	$ffs_to="ifahaduddin@gmail.com";
	$subject = "Out of stock";
	update_option( 'out_stock',$out_stock);
}

add_action( 'woocommerce_no_stock', 'ffs_out_stock' );
*/

?>