<?php
//require("../wp-admin/options.php");
	$woo_alerts_waffs_mapping= array("page_view", "single_product", "checkout", "coupon", "cart", "orders");
	foreach ($woo_alerts_waffs_mapping as $item)
    {
		echo $item."<br> validate <br> ";
        woo_alerts_waffs_add_data_db($item);
        sendthemail($item);
    }
?>