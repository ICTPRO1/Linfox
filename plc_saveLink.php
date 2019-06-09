<?php

	require_once("config.php");
	$imageData = isset($_POST["assets_id"]) ? $_POST["assets_id"] : false;

	if ($imageData) {
		
	
		$output = '';
		$query = "update plc_assets set link='".$_POST["plc_link"]."' where id = '".$_POST["assets_id"]."'";
		$connect = db_connect();
		$result = mysqli_query($connect, $query);

		if (!$result = $connect->query($query)) {
			$err
			= "QUERY FAIL: "
			. $query
			. ' ERRNO: '
			. $conn->errno
			. ' ERROR: '
			. $conn->error
			;
			trigger_error($err, E_USER_ERROR);
		}

		
      $output = 'update success';
		echo $output;
 }




?>
