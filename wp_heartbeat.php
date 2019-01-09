<?php
/**
 * @package wp-heartbeat
 * @version 1.0
 */
/*
Plugin Name: WooAlerts
Plugin URI: 
Description: WordPress heartbeat service
Author: Fahad Uddin
Version: 1.6
Author URI: 
Text Domain: woo-alerts
*/
require("loader.php");				//loads css, js and admin
require("page_view.php");			//Gets page views
require("single_product.php");		//Gets Single Product page count
require("checkout.php");			//Gets Checkout page count
require("coupon.php");				//Gets Coupon code used count
require("add_cart.php");			//Gets Add to cart count
require("out_stock.php");			//Gets out of stock count (commented)
require("orders.php");				//Gets Order count
require("is_valid.php");			//Check if heartbeat is expired
require("drop_down.php");			//Dropdown for time selection of admin page
require("expire_time.php");			//Calculate expire time value
require("update_db.php");			//Writes new data to DB
require("email.php");				//Sends email to user
require("admin_page.php");			//Shows the admin page for the plugin
//require("heartbeat_write.php");	//Commented write heartbeat function 

/*
Table of contents
1. Loader
2. Gets Page views
3. Gets Product page count
4. Gets Checkout page count
5. Gets Coupon code used count
6. Gets Add to cart count
7. Gets out of stock count (commented)
8. Gets Order count
9. Check if heartbeat is expired
10. Dropdown for time selection of admin page
11. Calculate expire time value
12. Writes new data to DB
13. Sends email to user
14. Below code shows the admin page for the plugin
15. Commented write heartbeat function
*/
?>