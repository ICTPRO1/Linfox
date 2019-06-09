<?php

	require_once("config.php");
	$imageData = isset($_POST["assets_id"]) ? $_POST["assets_id"] : false;

	if ($imageData) {
		$getQuery = '';
			$getQuery .= "SELECT img FROM plc_assets WHERE id = '".$_POST["assets_id"]."'";
		
		$connect = db_connect();
		$resultSet = mysqli_query($connect, $getQuery);
		while ($row = $resultSet->fetch_object()) {
			$imageURL = $row->img;
			if($imageURL != null && $imageURL !=''){
				unlink($imageURL);
				$query = '';
					$query .= "update plc_assets set img=null where id = '".$_POST["assets_id"]."'";
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
			}	
		}
		
		$output = '';
		$output .= 'Delete success';
		echo $output;
 }




?>
