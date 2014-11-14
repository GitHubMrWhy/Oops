<?php



require_once 'header.php';
require_once 'config.php';




?>

<div>
<table style="background-color:#fff;margin:0px auto;text-align:center;line-height:30px;font-family:楷体">
<tr style="line-height:40px;background-color:#a5a4a2;text-align:center;">
	<td style="font-size:22;font-weight:bold;" colspan="3">My Events</td>
	
	
</tr>
<tr style="line-height:30px;">
	<td style="text-align:left;" colspan="3">I have been to :</td>
	
	
</tr>
<?php 
	$i=0;
	$result = mysql_query("SELECT * FROM event WHERE owner='".$_SESSION["username"]."'");
	while($row=mysql_fetch_array($result)){
		$i=$i+1;
?>
		<tr>
			<td align="left" style="padding-left:20px;"><?php echo $i; ?>.<?php echo $row["location"]; ?>(<?php echo $row["latitude"]; ?>,<?php echo $row["longitude"]; ?>)</td>
			<td width="200" align="right" style="padding-right:20px;"><?php echo $row["create_time"]; ?></td>
			
			
			
		</tr>

<?php } ?>
<?php
	if($i=0){
?>
	<td align="center" colspan="3"> “I have not been to anywhere yet”</td>
<?php } ?>
</table>
</div>


