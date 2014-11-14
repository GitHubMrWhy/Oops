<?php
	require_once ('config.php');

?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Place</title>



<meta name="MSSmartTagsPreventParsing" content="True">
<meta http-equiv="MSThemeCompatible" content="Yes">


	 

<style type="text/css">

</style>


<body>
<a href="index.php">photo</a>
<br/>
<form action="addPlaces.php" method="post">
	Place&nbsp;&nbsp;&nbsp;&nbsp;:<input type="text" name="place" /><br/>
	Longitude:<input type="text" name="longitude" /><br/>
	Latitude&nbsp;:<input type="text" name="latitude" /><br/>
	<input type="submit" value="Submit" />
</form>

<br/><br/>
	<table border="1">
		<tr>
			<td><span style="font-weight:bold">Place</span></td>
			<td><span style="font-weight:bold">Longitude</span></td>
			<td><span style="font-weight:bold">Latitude</span></td>

		</tr>
		
				  <?php
		

	
		$str = "SELECT * FROM PLACE WHERE USER_ID=".$_SESSION["userid"];
	
		
		$result = mysql_query($str);
		$count = mysql_num_rows($result);
		$i = 0;
		
		while($row = mysql_fetch_array($result)){
		
		?> 
				  
                  <tr>
			<td><?php echo $row["place"]; ?></td>
			<td><?php echo $row["Longitude"]; ?></td>
			<td><?php echo $row["Latitude"]; ?></td>
			
		</tr>
		<?php } ?>  
	</table>

</body></html> 