<?php
require_once("config.php");
$connect = db_connect();

 $subComponent= $_POST["subComponent"];
 $assets_id= $_POST["assets_id"];

 if(isset($subComponent))
 {
   $sql = "SELECT * FROM plc_assets_sub WHERE description = '".$subComponent."'";
   $result = $connect->query($sql);
   if ($result->num_rows > 0)
   {
     $row = $result->fetch_assoc();

$output =<<< TABLE
     <table class="table table-bordered">
         <tr>
              <td><Strong>Component Name</Strong></td>
              <td>{$row["description"]}</td>
         </tr>
         <tr>
              <td><Strong>Component item Number</Strong></td>
              <td>{$row["item_number"]}</td>
         </tr>
         <tr>

                    <td>
						<script type="text/javascript">
							function saveLinkSub(){
								if($('#sublink').val()==''){
									alert("Please enter value and then click save.");
									return;
								}
								$.ajax({
									url:"include/plc_saveLink_sub.php",
									method:'post',
									data:{plc_sub_link:$('#sublink').val(),sub_id:$('#sub_id').val()},
								}).done(function(data){
									
									$('#actualSubLink').html($('#sublink').val());
									$('#actualSubLink').attr('href',$('#sublink').val());
									$('#checkSub').hide();
									$('#editSub').show();
									$('#sublink').hide();
									$('#actualSubLink').show();
								});
							}
							function showEditSub(){
								$('#sublink').show();
								$('#checkSub').show();
								$('#editSub').hide();
								$('#actualSubLink').hide();
							}
						</script>
						<label>Link</label>
						<button id="editSub" type="button" class="btn btn-default" style="float: right; display:none;" onclick="showEditSub()">Edit</button>
						<button id="checkSub" type="button" class="btn btn-default" style="float: right; display:none;" onclick="saveLinkSub()">Save</button>
					</td>
                    <td>
						<a href="{$row->link}" target="_blank" id="actualSubLink">{$row->link}</a>
						<input type="text" name="sublink" id="sublink" style="width: 100%; display:none;" value="{$row->link}">
					</td>
                </tr>
		 <tr>
			<td colspan='2'><label>Upload image</label></td>
		</tr>
		<tr>
			<td colspan='2'>
				<form id="submit_form" action="include/plc_upload_subimg.php" method="post" enctype="multipart/form-data">
					<input type="file" name="file" id="file" accept="image/*" style="float: left;">
					<button type="submit" class="btn btn-success" name="submit" style="float: centre;">Upload Image</button>
					<button type="button" class="btn btn-danger" style="float: right;" onclick="deleteImage()" >Remove Image</button>
					<input type="hidden" name="sub_id" id="sub_id" value='{$row["id"]}' />
				</form>
			</td>
		</tr>
		<tr>
			<td colspan='2'><img id="assetSubImage" src="{$row["image"]}"> </td>
		</tr>
     </table>



TABLE;
$output .= <<< SCRIPT2
<script>
$(document).ready(function(){
     $('#submit_form').on('submit', function(e){
          e.preventDefault();
		  var file = $('#file').prop('files')[0];
			var reader = new FileReader();
			reader.onloadend = function() {

				$('#assetSubImage').attr('src',reader.result);
			}
			reader.readAsDataURL(file);
          $.ajax({
               url:"include/plc_upload_subimg.php",
               method:"POST",
               data:new FormData(this),
               contentType:false,
               //cache:false,
               processData:false,
               success:function(data)
               {
					alert("Upload success.");
               }
          })
     });
     
});

	function deleteImage(){
          if(confirm("Are you sure you want to remove this image?"))
          {
			  $('#assetSubImage').attr('src',null);
			 $.ajax({
			  url:"include/plc_deleteSub.php",
			  method:'post',
			  data:{assets_id:$('#sub_id').val()},
			}).done(function(data){
			  alert(data);
			});
          }
          else
          {
               return false;
          }
	}
</script>
SCRIPT2;
  echo $output;
   }
 }
 else {
   // code...
 }


 ?>
