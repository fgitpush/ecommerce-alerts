<?php
/*
9. Dropdown for time selection of admin page
*/


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
?>