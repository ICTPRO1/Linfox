<?php

	require_once("config.php");
	$imageData = isset($_POST["assets_id"]) ? $_POST["assets_id"] : false;

	if ($imageData) {
		$getQuery = '';
			$getQuery .= "SELECT image FROM assets_sub WHERE id = '".$_POST["assets_id"]."'";
		
		$connect = db_connect();
		$resultSet = mysqli_query($connect, $getQuery);
		while ($row = $resultSet->fetch_object()) {
			$imageURL = $row->image;
			if($imageURL != null && $imageURL !=''){
				unlink($imageURL);
				$query = '';
					$query .= "update assets_sub set image=null where id = '".$_POST["assets_id"]."'";
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
