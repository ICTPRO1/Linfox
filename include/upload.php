<?php
 
	require_once("config.php");
	$imageData = isset($_POST["imageData"]) ? $_POST["imageData"] : false;
 
	if ($imageData) {
		$output = '';
		$query = "update assets set img='".$_POST["imageData"]."' where id = '".$_POST["assets_id"]."'";
		$connect = mysqli_connect("localhost", "", "", "ictatjcu_linfox");
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
  
      $output .= 'upload success';
		echo $output;  
 }
?>