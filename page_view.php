<?php
/*
1. Gets page views
*/

function woo_alerts_waffs_page_view() {
	$page_views=0;
	if(get_option('page_view'))
	{
		$page_views= get_option('page_view');
	}
	else
		update_option( 'page_view', 0 );
	$page_views++;
	$time = date('h:i:s');
	update_option( 'page_view',$page_views);
	update_option( 'page_view_last',$time);
}

add_action( 'get_header', 'woo_alerts_waffs_page_view' );
?>