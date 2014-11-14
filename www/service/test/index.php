<?php
	require_once ('config.php');
	require_once ('filter.php');
?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Index</title>



<meta name="MSSmartTagsPreventParsing" content="True">
<meta http-equiv="MSThemeCompatible" content="Yes">

<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
		<script src="kindeditor/kindeditor.js"></script>
		<script src="kindeditor/lang/en.js"></script>
		<script>
			KindEditor.ready(function(K) {
				var editor = K.editor({
					allowFileManager : true
				});
				K('#image1').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							imageUrl : K('#url1').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#url1').val(url);
								editor.hideDialog();
							}
						});
					});
				});
			
			});
		</script>
	 

<style type="text/css">

</style>


<body>
<a href="addPlace.php">Place</a>
<br/>
	Current User:<?php echo $_SESSION["user"]; ?><br/>
	<form action="upload.php" method="post">
	Upload:<input type="text" id="url1" name="images" /> <input type="button" name="images" id="image1" value="Select" /><br/>
	<input type="submit" value="submit" />
	</form>
	
	<table border="1">
		<tr>
			<td><span style="font-weight:bold">Images</span></td>
			<td><span style="font-weight:bold">Url</span></td>
			<td><span style="font-weight:bold">Username</span></td>
			<td><span style="font-weight:bold">date</span></td>
			<td><span style="font-weight:bold">Oper</span></td>
		</tr>
		
				  <?php
		

	
		$str = "SELECT * FROM IMAGE";
	
		
		$result = mysql_query($str);
		$count = mysql_num_rows($result);
		$i = 0;
		
		while($row = mysql_fetch_array($result)){
		
		?> 
				  
                  <tr>
			<td><span style="font-weight:bold"><a href="<?php echo $row["location"]; ?>"><img src="<?php echo $row["location"]; ?>" style="max-width:300px" /></a></span></td>
			<td><?php echo $row["location"]; ?></td>
			<td><?php echo $row["owner"]; ?></td>
			<td><?php echo $row["create_time"]; ?></td>
			<td><a href="del.php?id=<?php echo $row["image_id"]; ?>">Delete</a></td>
		</tr>
		<?php } ?>  
	</table>

</body>
</html> 