<?php
/*
13. Below code shows the admin page for the plugin

Function: plugin_options_page()

*/


add_action('admin_menu', 'woo_alerts_waffs_plugin_admin_add_page');
function woo_alerts_waffs_plugin_admin_add_page() {
	
add_options_page('Woo Alerts Heartbeat', 'Woo Alerts Heartbeat', 'manage_options', 'plugin', 'woo_alerts_waffs_plugin_options_page');
}

?>
<?php // display the admin options page
function woo_alerts_waffs_plugin_options_page() {
?>
<div>
<h2>WooCommerce Heartbeat</h2>
Measure your eCommerce site
<form method="post" action="options.php"> 

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
    <td><span class="<?php echo woo_alerts_waffs_is_valid('page_view') ?>"></span>Page Views</td>
    <td><?php echo get_option('page_view_last'); ?></td>
    <td><?php echo get_option('page_view_time_display'); ?></td>
	<td><?php echo get_option('page_view'); ?></td>
	<td>
		<input type="number" name="page_view_number"  value="<?php echo get_option('page_view_expiry_int_part'); ?>" >
		<?php woo_alerts_waffs_select_time("page_view",get_option('page_view_isactive')); ?>
	</td>
	<td>
	<?php woo_alerts_waffs_select_active("page_view",get_option('page_view_isactive')); ?>

	</td>
  </tr>
  <tr>
    <td><span class="<?php echo woo_alerts_waffs_is_valid('single_product') ?>"></span>Product Views</td>
    <td><?php echo get_option('single_product_last'); ?></td>
    <td><?php echo get_option('single_product_time_display'); ?></td>
	<td><?php echo get_option('single_product'); ?></td>
	<td>
		<input type="number" name="single_product_number"    value="<?php echo get_option('single_product_expiry_int_part'); ?>">
		
		<?php woo_alerts_waffs_select_time("single_product",get_option('single_product_expiry_s_h_m_d_y')); ?>
		
	</td>
	<td>
	<?php woo_alerts_waffs_select_active("single_product",get_option('single_product_isactive')); ?>
	</td>
	
  </tr>
  <tr>
    <td><span class="<?php echo woo_alerts_waffs_is_valid('checkout') ?>"></span>Checkouts</td>
    <td><?php echo get_option('checkout_last'); ?></td>
    <td><?php echo get_option('checkout_time_display'); ?></td>
	<td><?php echo get_option('checkout'); ?></td>
	<td>
		<input type="number" name="checkout_number"    value="<?php echo get_option('checkout_expiry_int_part'); ?>">
		<?php woo_alerts_waffs_select_time("checkout",get_option('checkout_expiry_s_h_m_d_y')); ?>
	</td>
	<td>
	<?php woo_alerts_waffs_select_active("checkout",get_option('checkout_isactive')); ?>
	</td>
  </tr>
  <tr>
    <td><span class="<?php echo woo_alerts_waffs_is_valid('coupon') ?>"></span>Coupon code used</td>
    <td><?php echo get_option('coupon_last'); ?></td>
    <td><?php echo get_option('coupon_time_display'); ?></td>
	<td><?php echo get_option('coupon'); ?></td>
	<td>
		<input type="number" name="coupon_number"    value="<?php echo get_option('coupon_expiry_int_part'); ?>">
		<?php woo_alerts_waffs_select_time("coupon",get_option('coupon_expiry_s_h_m_d_y')); ?>
	</td>
	<td>
	<?php woo_alerts_waffs_select_active("coupon",get_option('coupon_isactive')); ?>
	</td>
  </tr>
  <tr>
    <td><span class="<?php echo woo_alerts_waffs_is_valid('cart') ?>"></span>Add to Carts</td>
    <td><?php echo get_option('cart_last'); ?></td>
    <td><?php echo get_option('cart_time_display'); ?></td>
	<td><?php echo get_option('cart'); ?></td>
	<td>
		<input type="number" name="cart_number"    value="<?php echo get_option('cart_expiry_int_part'); ?>">
		<?php woo_alerts_waffs_select_time("cart",get_option('cart_expiry_s_h_m_d_y')); ?>
	</td>
	<td>
	<?php woo_alerts_waffs_select_active("cart",get_option('cart_isactive')); ?>
	</td>
  </tr>
  <tr>
    <td><span class="<?php echo woo_alerts_waffs_is_valid('orders') ?>"></span>Orders</td>
    <td><?php echo get_option('orders_last'); ?></td>
    <td><?php echo get_option('orders_time_display'); ?></td>
	<td><?php echo get_option('orders'); ?></td>
	<td>
		<input type="number" name="orders_number"    value="<?php echo get_option('orders_expiry_int_part'); ?>">
		<?php woo_alerts_waffs_select_time("orders",get_option('orders_expiry_s_h_m_d_y')); ?>
	</td>
	<td>
	<?php woo_alerts_waffs_select_active("orders",get_option('orders_isactive')); ?>
	</td>
  </tr>
</table>
<?php submit_button(); ?>
</form>

<?php
}?>

<?php // add the admin settings and such
//add_action('admin_init', 'plugin_admin_init');
/*
function plugin_admin_init(){
	register_setting( 'plugin_options', 'plugin_options', 'plugin_options_validate' );
}
*/

function plugin_options_validate(){
	$woo_alerts_waffs_mapping= array("page_view", "single_product", "checkout", "coupon", "cart", "orders");
	foreach ($woo_alerts_waffs_mapping as $item)
    {
		//echo $item."<br> validate <br> ";
        woo_alerts_waffs_add_data_db($item);
        woo_alerts_waffs_sendthemail($item);
    }
}

?>