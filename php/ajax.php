<?php
if(!empty($_POST))
{
	//database settings
	// include "config.php";
  require_once 'db_connect.php';
	foreach($_POST as $field_name => $val)
	{
		//clean post values
		$field_userid = strip_tags(trim($field_name));
		// $val = strip_tags(trim(mysql_real_escape_string($val)));

		//from the fieldname:user_id we need to get user_id
		$split_data = explode(':', $field_userid);
		$user_id = $split_data[1];
		$field_name = $split_data[0];
		if(!empty($user_id) && !empty($field_name) && !empty($val))
		{
			//update the values
			$affected_rows=$db->exec("UPDATE translation SET $field_name = '$val',approved=0 WHERE en = '".$user_id."'");

			echo "Updated";
		} else {
			echo "Invalid Requests";
		}
	}
} else {
	echo "Invalid Requests";
}
?>
