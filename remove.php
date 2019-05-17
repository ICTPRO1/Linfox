<?php
 require_once("config.php");
$assets_id = isset($_POST["assets_id"]) ? $_POST["assets_id"] : false;

$connect = mysqli_connect("localhost", "ictatjcu_linfox", "123zxc", "ictatjcu_linfox");
if($_POST["action"] == "delete")
 {
	
 $query = "update assets set img=null where id = '".$_POST["assets_id"]."'";
	
  
  if(mysqli_query($connect, $query))
  {
   echo 'Image Deleted from Database';
  }
 }
	
?>