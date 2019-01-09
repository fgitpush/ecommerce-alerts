

<?php

/*
12. Sends email to user
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

