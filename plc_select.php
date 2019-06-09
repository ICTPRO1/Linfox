<?php

	require_once("config.php");
	$assets_id = isset($_POST["assets_id"]) ? $_POST["assets_id"] : false;

	if ($assets_id) {
		$output = '';
		$query = "SELECT * FROM plc_assets WHERE id = '".$_POST["assets_id"]."'";
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

      $output .= <<< HTML
      <div class="table-responsive">
           <table class="table table-bordered">
HTML;
      while ($row = $result->fetch_object()) {

           $output .= <<< ROW
                <tr>
                     <td><label>Component name</label></td>
                     <td>{$row->main_component_name }</td>
                </tr>
			 
				<tr>

                    <td>
						<script type="text/javascript">
							function saveLink(){
								if($('#plc_link').val()==''){
									alert("Please enter value and then click save.");
									return;
								}
								$.ajax({
									url:"include/plc_saveLink.php",
									method:'post',
									data:{plc_link:$('#link').val(),assets_id:$('#assetId').val()},
								}).done(function(data){
									
									$('#actualLink').html($('#link').val());
									$('#actualLink').attr('href',$('#link').val());
									$('#check').hide();
									$('#edit').show();
									$('#link').hide();
									$('#actualLink').show();
								});
							}
							function showEdit(){
								$('#link').show();
								$('#check').show();
								$('#edit').hide();
								$('#actualLink').hide();
							}
						</script>
						<label>Link</label>
						<button id="edit" type="button" class="btn btn-default" style="float: right; display:none;" onclick="showEdit()">Edit</button>
						<button id="check" type="button" class="btn btn-default" style="float: right; display:none;" onclick="saveLink()">Save</button>
					</td>
                    <td>
						<a href="{$row->link}" target="_blank" id="actualLink">{$row->link}</a>
						<input type="text" name="link" id="link" style="width: 100%; display:none;" value="{$row->link}">
					</td>
                </tr>
				<tr>

                    <td colspan='2'>
						<script type="text/javascript">
							function linkToOpen(link){
								if(link==null || link ==''){
									alert('URL not configured to open');
									return;
								}
								window.open(link,'_blank');
							}
						</script>
						<label>Sub component</label>
					<!--	<button type="button" class="btn btn-default" style="float: right;"  onclick="linkToOpen($('#subComponent').val())">Go</button> -->

						<button id="loadSub" type="button" class="btn btn-default" style="float: right;" onclick="loadSub()" data-toggle="modal" data-target="#subModal" >Go</button>
					</td>
                </tr>

ROW;

		$output .= "<tr><td colspan='2'>";
		$querySub = "SELECT * FROM plc_assets_sub WHERE FK_ASSET = '".$_POST["assets_id"]."'";
		$resultSub = mysqli_query($connect, $querySub);

		$output .= "<select id='subComponent' name='subComponent' style='width: 100%;'>";
		while ($rowSub = $resultSub->fetch_object()) {
			$output .= <<< ROWSUB
				<option value="{$rowSub->link}">{$rowSub->description}</option>
ROWSUB;
		}
		$output .= "</select>";

		$output .= "</td></tr>";

		$output .= <<< UPLOAD
				<tr>
                    <td colspan='2'><label>Upload image</label></td>
                </tr>
				<tr>
                    <td colspan='2'>
						<script type="text/javascript">
							function encodeImagetoBase64(object) {
								if(object.val()==null || object.val()==''){
									alert('Please select image and then click upload button.');
									return;
								}
								var file = object.prop('files')[0];
								var reader = new FileReader();
								reader.onloadend = function() {

									$('#assetImage').attr('src',reader.result);
									$.ajax({
									  url:"include/plc_upload.php",
									  method:'post',
									  data:{imageData:reader.result,assets_id:$('#assetId').val()},
									}).done(function(data){
									  alert(data);
									});
								}
								reader.readAsDataURL(file);
							}

							function deleteImage(){
								var image = $('#assetImage').attr('src');
								if(image!=null && image !=''){
									if (confirm("Are you sure you want to remove this image from database?")){
										$('#assetImage').attr('src',null);
										$.ajax({
										  url:"include/plc_delete.php",
										  method:'post',
										  data:{assets_id:$('#assetId').val()},
										}).done(function(data){
										  alert(data);
										});
									}
								}
							}

						</script>




						<input type="file" name="pic" id="pic" accept="image/*" style="float: left;">
						<button type="button" class="btn btn-success" style="float: centre;" onclick="encodeImagetoBase64($('#pic'))" >Upload Image</button>
						<button type="button" class="btn btn-danger" style="float: right;" onclick="deleteImage()" >Remove Image</button>
						<input type="hidden" id="assetId" value="{$_POST["assets_id"]}">
					</td>
                </tr>
				<tr>
					<td colspan='2'><img id="assetImage" src="{$row->img}"> </td>
				</tr>
UPLOAD;

    }
		$output .= "</table></div>";
		echo $output;
 }
?>
