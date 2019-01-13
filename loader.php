<?php
/*
Add styles using a .css file
*/
wp_register_style( 'wp-heartbeat', plugin_dir_url( __FILE__ ) . 'style.css' );
wp_enqueue_style( 'wp-heartbeat' );

/* Remove the code from the script below and make it useful. The code in it is not needed. */
/*
wp_enqueue_script( 'script', plugin_dir_url( __FILE__ ) . 'script.js');
wp_enqueue_style( 'script' );
*/
/* Need to change the timezone below to get it from user server */
date_default_timezone_set('Asia/Karachi');


if ( is_admin() ){ // admin actions
  //add_action( 'admin_menu', 'add_mymenu' );
  add_action( 'admin_init', 'plugin_options_validate' );
} else {
  // non-admin enqueues, actions, and filters
}
?>