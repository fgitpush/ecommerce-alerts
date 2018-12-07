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
date_default_timezone_set('Asia/Karachi');
if ( is_admin() ){ // admin actions
  //add_action( 'admin_menu', 'add_mymenu' );
  add_action( 'admin_init', 'plugin_options_validate' );
} else {
  // non-admin enqueues, actions, and filters
}
// wp_enqueue_style( 'style', get_stylesheet_uri() );
?>
<style>
.ffs_valid{
    height: 15px;
    border-radius: 10px;
    width: 15px;
    display: inline-block;
    float: left;
	margin: 4px;
    background: green;
}
.ffs_invalid{
    height: 15px;
    border-radius: 10px;
    width: 15px;
    display: inline-block;
    float: left;
	margin: 4px;
    background: red;
}
.ffs_pause{
    height: 15px;
    border-radius: 10px;
    width: 15px;
    display: inline-block;
    float: left;
	margin: 4px;
    background: #dddddd;
}
td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
</style>
<?php

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


function ffs_coupon() {
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
	$ffs_to="ifahaduddin@gmail.com";
	$subject = "Site Report";
	$message = "Coupon applied";
	wp_mail( $ffs_to, $subject, $message);
	*/
	update_option( 'coupon',$coupon);
	update_option( 'coupon_last',$time);
}

add_action( 'woocommerce_applied_coupon', 'ffs_coupon' );

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
function ffs_user_ordered() {
	$orders=0;
	if(get_option('orders'))
	{
		$orders= get_option('orders');
	}
	else
		update_option( 'orders', 0 );
	$orders++;
	$time = date('h:i:s');
	/*
	$ffs_to="ifahaduddin@gmail.com";
	$subject = "Orders";
	$message = "Ordered";
	wp_mail( $ffs_to, $subject, $message);
	*/
	update_option('orders',$orders);
	update_option( 'orders_last',$time);
}

add_action( 'woocommerce_thankyou', 'ffs_user_ordered' );

add_action('admin_menu', 'plugin_admin_add_page');
function plugin_admin_add_page() {
	
add_options_page('Woo Alerts Heartbeat', 'Woo Alerts Heartbeat', 'manage_options', 'plugin', 'plugin_options_page');
}

?>
<?php // display the admin options page
function plugin_options_page() {
?>
<div>
<h2>WooCommerce Heartbeat</h2>
Measure your eCommerce site
<form method="post" action="options.php"> 
<?php // settings_fields( 'plugin_options_validate' );?>
<?php  // do_settings_sections( 'plugin_options_validate' );?>

<table>
  <tr>
    <th>Name</th>
    <th>Last Received At</th>
    <th>Will Expire At</th>
	<th>Count</th>
	<th>Expire Time</th>
	<th>Active</th>
  </tr>
  <tr>
    <td><span class="<?php echo ffs_is_valid('page_view') ?>"></span>Page Views</td>
    <td><?php echo get_option('page_view_last'); ?></td>
    <td><?php echo get_option('page_view_time_display'); ?></td>
	<td><?php echo get_option('page_view'); ?></td>
	<td>
		<input type="number" name="page_view_number"  value="<?php echo get_option('page_view_expiry_int_part'); ?>" >
		<?php ffs_select("page_view",get_option('page_view_expiry_s_h_m_d_y')); ?>
		
	</td>
	<td>
	<select>
	  <option value="yes">Yes</option>
	  <option value="no">No</option>
	</select>
	</td>
  </tr>
  <tr>
    <td><span class="<?php echo ffs_is_valid('page_view') ?>"></span>Product Views</td>
    <td><?php echo get_option('single_product_last'); ?></td>
    <td><?php echo get_option('single_product_time_display'); ?></td>
	<td><?php echo get_option('single_product'); ?></td>
	<td>
		<input type="number" name="single_product_number"    value="<?php echo get_option('single_product_expiry_int_part'); ?>">
		
		<?php ffs_select("single_product",get_option('single_product_expiry_s_h_m_d_y')); ?>
		
	</td>
	<td>
	<select>
	  <option value="yes">Yes</option>
	  <option value="no">No</option>
	</select>
	</td>
	
  </tr>
  <tr>
    <td><span class="<?php echo ffs_is_valid('page_view') ?>"></span>Checkouts</td>
    <td><?php echo get_option('checkout_last'); ?></td>
    <td><?php echo get_option('checkout_time_display'); ?></td>
	<td><?php echo get_option('checkout'); ?></td>
	<td>
		<input type="number" name="checkout_number"    value="<?php echo get_option('checkout_expiry_int_part'); ?>">
		<?php ffs_select("checkout",get_option('checkout_expiry_s_h_m_d_y')); ?>
	</td>
	<td>
	<select>
	  <option value="yes">Yes</option>
	  <option value="no">No</option>
	</select>
	</td>
  </tr>
  <tr>
    <td><span class="<?php echo ffs_is_valid('coupon') ?>"></span>Coupon code used</td>
    <td><?php echo get_option('coupon_last'); ?></td>
    <td><?php echo get_option('coupon_time_display'); ?></td>
	<td><?php echo get_option('coupon'); ?></td>
	<td>
		<input type="number" name="coupon_number"    value="<?php echo get_option('coupon_expiry_int_part'); ?>">
		<?php ffs_select("coupon",get_option('coupon_expiry_s_h_m_d_y')); ?>
	</td>
	<td>
	<select>
	  <option value="yes">Yes</option>
	  <option value="no">No</option>
	</select>
	</td>
  </tr>
  <tr>
    <td><span class="<?php echo ffs_is_valid('cart') ?>"></span>Add to Carts</td>
    <td><?php echo get_option('cart_last'); ?></td>
    <td><?php echo get_option('cart_time_display'); ?></td>
	<td><?php echo get_option('cart'); ?></td>
	<td>
		<input type="number" name="cart_number"    value="<?php echo get_option('cart_expiry_int_part'); ?>">
		<?php ffs_select("cart",get_option('cart_expiry_s_h_m_d_y')); ?>
	</td>
	<td>
	<select>
	  <option value="yes">Yes</option>
	  <option value="no">No</option>
	</select>
	</td>
  </tr>
  <tr>
    <td><span class="<?php echo ffs_is_valid('orders') ?>"></span>Orders</td>
    <td><?php echo get_option('orders_last'); ?></td>
    <td><?php echo get_option('orders_time_display'); ?></td>
	<td><?php echo get_option('orders'); ?></td>
	<td>
		<input type="number" name="orders_number"    value="<?php echo get_option('orders_expiry_int_part'); ?>">
		<?php ffs_select("orders",get_option('orders_expiry_s_h_m_d_y')); ?>
	</td>
	<td>
	<select>
	  <option value="yes">Yes</option>
	  <option value="no">No</option>
	</select>
	</td>
  </tr>
</table>
<?php submit_button(); ?>
</form>

<?php
}?>

<?php // add the admin settings and such
add_action('admin_init', 'plugin_admin_init');
function ffs_is_valid($ffs_name){
	$time_last = get_option($ffs_name.'_last');
    $time_last_seconds = strtotime("1970-01-01 $time_last UTC");
	$time_expiry =get_option($ffs_name.'_time_display');
    $time_expiry_seconds = strtotime("1970-01-01 $time_expiry UTC");
   // echo "time_last_seconds: ".$time_last_seconds;
    //echo " time_expiry_seconds".$time_expiry_seconds;
	if ($time_expiry_seconds>$time_last_seconds)
		return "ffs_valid";
	else
		return "ffs_invalid";
}
function plugin_admin_init(){
register_setting( 'plugin_options', 'plugin_options', 'plugin_options_validate' );
//register_setting('bp-settings-group', 'bp_options', 'bp_options_sanitize');
//add_settings_section('plugin_main', 'Main Settings', 'plugin_options_validate', 'plugin');
//add_settings_field('plugin_text_string', 'Plugin Text Input', 'plugin_options_validate', 'plugin', 'plugin_main');
}

function plugin_options_validate(){
	
	$ffs_mapping= array("page_view", "single_product", "checkout", "coupon", "cart", "orders");
	foreach ($ffs_mapping as $item)
    {
        ffs_add_data_db($item);
        sendthemail($item);
    }


}


function ffs_add_data_db($ffs_entry){
	echo $ffs_entry;
	echo "<br>";
	//var_dump($_POST[$ffs_entry.'_other_time']);
	//update_option( $ffs_entry.'_expiry_s_h_m_d_y',100);
	
	
	if($_POST[$ffs_entry.'_other_time'])
	{
		echo $_POST[$ffs_entry.'_other_time'];
		echo "<br>";
		update_option( $ffs_entry.'_expiry_int_part',$_POST[$ffs_entry.'_number']);
		//update_option( '_expiry_int_part',$expire_time);
		if($_POST[$ffs_entry.'_other_time'] == "seconds")
		{
			echo "seconds";
			echo "<br>";
			$expire_time = 1 * get_option('page_view_expiry_int_part');
			update_option( $ffs_entry.'_expiry_s_h_m_d_y',$_POST['page_view_other_time']);
			update_option( $ffs_entry.'_expiry_time',$expire_time);

		}
		else if($_POST[$ffs_entry.'_other_time'] == "minutes")
		{
			$expire_time = 1 * get_option('page_view_expiry_int_part')*60;
			update_option( $ffs_entry.'_expiry_s_h_m_d_y',$_POST['page_view_other_time']);
			update_option( $ffs_entry.'_expiry_time',$expire_time);
		}
		else if($_POST[$ffs_entry.'_other_time'] == "hours")
		{
			$expire_time = 1 * get_option('page_view_expiry_int_part')*60*60;
			update_option( $ffs_entry.'_expiry_s_h_m_d_y',$_POST['page_view_other_time']);
			update_option( $ffs_entry.'_expiry_time',$expire_time);
		}
		else if($_POST[$ffs_entry.'_other_time'] == "days")
		{
			$expire_time = 1 * get_option('page_view_expiry_int_part')*60*60*24;
			update_option( $ffs_entry.'_expiry_s_h_m_d_y',$_POST['page_view_other_time']);
			update_option( $ffs_entry.'_expiry_time',$expire_time);
		}
		else if($_POST[$ffs_entry.'_other_time'] == "weeks")
		{			
			$expire_time = 1* get_option('page_view_expiry_int_part')*60*60*24*7;
			update_option( $ffs_entry.'_expiry_s_h_m_d_y',$_POST['page_view_other_time']);
			update_option( $ffs_entry.'_expiry_time',$expire_time);
		}
		else ;
	}
	ffs_expire_time_value($ffs_entry);
	
}

function ffs_select($name, $selected){
	?>
	<select name="<?php echo $name ?>_other_time">

	<?php
	$ffs_select_mapping= array("seconds", "minutes", "hours", "days", "weeks");
	foreach($ffs_select_mapping as $item)
	{
		$ffs_value_option= "value='".$item."'";
		if($item == $selected)
			$ffs_value_option=$ffs_value_option.' selected="selected"';
		?>
		<option <?php echo $ffs_value_option; ?>> <?php echo $item ?></option>
		<?php
	}
		
}

function ffs_expire_time_value($ffs_name){
		//last receive + expire team do in sec and show in time
		$ffs_last_time = get_option($ffs_name.'_last');
		//$time = '21:30:10';
		$dt = new DateTime("1970-01-01 ".$ffs_last_time, new DateTimeZone('UTC'));
		$seconds_ffs_last_time = (int)$dt->getTimestamp(); // last occurred
		$ffs_expire_time = get_option($ffs_name.'_expiry_time'); //expiry set
		$ffs_expire_time_seconds = $seconds_ffs_last_time+ $ffs_expire_time;
		$ffs_expire_time_display = gmdate("H:i:s", $ffs_expire_time_seconds%86400);	
		update_option( $ffs_name.'_time_display',$ffs_expire_time_display);
		//update_option( $ffs_name.'_time_display','12:00:00');
}
/*
function ffs_heart_write($item) {
	$count=0;
	if(get_option($item))
	{
		$count= get_option($item);
	}
	else
		update_option( $item, 0 );
	$count++;
	$time = get_the_time('G:i:s');
	
	$ffs_to="ifahaduddin@gmail.com";
	$subject = "Site Report";
	$message = "Page View";
	wp_mail( "ifahaduddin@gmail.com", $subject, $message);
	
	update_option( $item,$count);
	update_option( $item.'_last',$time);
}
*/

function sendthemail($ffs_name){
    $time_last = date("h:i:s");
    $time_last_seconds = strtotime("1970-01-01 $time_last UTC");
    $time_expiry =get_option($ffs_name.'_time_display');
    $time_expiry_seconds = strtotime("1970-01-01 $time_expiry UTC");
    // echo "time_last_seconds: ".$time_last_seconds;
    //echo " time_expiry_seconds".$time_expiry_seconds;
	/*
    if ($time_expiry_seconds<$time_last_seconds)
    {
        $ffs_to="ifahaduddin@gmail.com";
        $subject = "Site Report";
        $message = $ffs_name;
        wp_mail( "ifahaduddin@gmail.com", $subject, $message);
    }
	*/
}
?>