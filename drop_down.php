<?php
/*
9. Dropdown for time selection of admin page
*/


function woo_alerts_waffs_select_time($name, $selected){
	?>
	<select name="<?php echo $name ?>_other_time">

	<?php
	$woo_alerts_waffs_select_mapping= array("seconds", "minutes", "hours", "days", "weeks");
	foreach($woo_alerts_waffs_select_mapping as $item)
	{
		$woo_alerts_waffs_value_option= "value='".$item."'";
		if($item == $selected)
			$woo_alerts_waffs_value_option=$woo_alerts_waffs_value_option.' selected="selected"';
		?>
		<option <?php echo $woo_alerts_waffs_value_option; ?>> <?php echo $item ?></option>
		<?php
	}
		
}

function woo_alerts_waffs_select_active($name, $selected){
	?>
	<select name="<?php echo $name ?>_isactive">

	<?php
	$woo_alerts_waffs_select_mapping= array("Yes", "No");
	foreach($woo_alerts_waffs_select_mapping as $item)
	{
		$woo_alerts_waffs_value_option= "value='".$item."'";
		if($item == $selected)
			$woo_alerts_waffs_value_option=$woo_alerts_waffs_value_option.' selected="selected"';
		?>
		<option <?php echo $woo_alerts_waffs_value_option; ?>> <?php echo $item ?></option>
		<?php
	}
		
}
?>