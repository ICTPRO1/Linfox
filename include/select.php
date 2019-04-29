<?php
 
	require_once("config.php");
	$assets_id = isset($_POST["assets_id"]) ? $_POST["assets_id"] : false;
 
	if ($assets_id) {
		$output = '';
		$query = "SELECT * FROM assets WHERE id = '".$_POST["assets_id"]."'";
		$connect = mysqli_connect("localhost", "ictatjcu_linfox", "123zxc", "ictatjcu_linfox");
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
                  
                     <td><label>Component description</label></td>  
                     <td>{$row->main_component_description}</td>  
                </tr>
				<tr>
                  
                     <td><label>Component material type</label></td>  
                     <td>{$row->main_component_material_type}</td>  
                </tr>
				<tr>
                  
                     <td><label>Link</label></td>  
                     <td><a href="{$row->link}" target="_blank">{$row->link}</a></td>  
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
						<button type="button" class="btn btn-default" style="float: right;"  onclick="linkToOpen($('#subComponent').val())">Go</button>
					</td>  
                </tr>
				
ROW;

		$output .= "<tr><td colspan='2'>";  
		$querySub = "SELECT * FROM assets_sub WHERE FK_ASSET = '".$_POST["assets_id"]."'";
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
									  url:"include/upload.php",  
									  method:'post',  
									  data:{imageData:reader.result,assets_id:$('#assetId').val()},
									}).done(function(data){  
									  alert(data); 
									}); 
								}
								reader.readAsDataURL(file);
							}
							
						</script>
						<input type="file" name="pic" id="pic" accept="image/*" style="float: left;">
						<button type="button" class="btn btn-default" style="float: right;" onclick="encodeImagetoBase64($('#pic'))" >Upload</button>
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