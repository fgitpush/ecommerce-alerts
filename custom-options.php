<?php
//require("../wp-admin/options.php");
	$ffs_mapping= array("page_view", "single_product", "checkout", "coupon", "cart", "orders");
	foreach ($ffs_mapping as $item)
    {
		echo $item."<br> validate <br> ";
        ffs_add_data_db($item);
        sendthemail($item);
    }
?>