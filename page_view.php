<?php
/*
1. Gets page views
*/

function ffs_page_view() {
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

add_action( 'get_header', 'ffs_page_view' );
?>