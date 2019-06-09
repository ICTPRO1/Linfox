<?php
include_once('config.php');
$conn = db_connect();
$sub_id =$_POST['sub_id'];

 if($_FILES['file']['name'] != '')
 {
   $file = $_FILES['file'];
   $fileName = $_FILES['file'] ['name'];
   $fileTmpName = $_FILES['file'] ['tmp_name'];
   $fileSize = $_FILES['file'] ['size'];
   $fileError = $_FILES['file'] ['error'];
   $fileType = $_FILES['file'] ['type'];


      $fileExt = explode(".", $fileName);
      $extension = strtolower(end($fileExt));
      $allowed_type = array("jpg", "jpeg", "png", "gif");
      if(in_array($extension, $allowed_type))
      {
          if ($fileSize < 500000)
          {
            $new_name = uniqid('',true).".".$extension;
              $path = "../uploads/images/asset/sub/" . $new_name;

              if(move_uploaded_file($_FILES['file']['tmp_name'], $path))
              {
                //$path = substr($path, 3);
                  $sub_id =$_POST['sub_id'];

                  $sqlQuery = <<<SQL
                  UPDATE plc_assets_sub
                  SET image='$path'
                  WHERE id = $sub_id;
SQL;
                  if($conn->query($sqlQuery) === TRUE){
                  //echo "New record created successfully" ;
                  }
                  else{
                    //echo "Death" ;
                  }
                  //replace preview new images
                  $sqlQueryImg = <<<SQL
                  SELECT image FROM `plc_assets_sub` where id= $sub_id;
SQL;

                  $result = $conn->query($sqlQueryImg);
                  if($result){
                    $row = $result->fetch_assoc();
                    $path = $row['image'];

                   echo '
                        <div>
                             <img src="'.$path.'" class="img-responsive" />
                        </div>
                        <div>
                             <button type="button" data-path="'.$path.'" id="remove_button" class="btn btn-danger">Remove Image</button>
                        </div>
                        ';
                      }
              }

          }
          else{
              echo '<script>alert("File Too BIG")</script>';
          }

      }
      else
      {
           echo '<script>alert("Invalid File Formate")</script>';
      }
 }
 else
 {
      //echo '<script>alert("Please Select File")</script>';
 }
 ?>
