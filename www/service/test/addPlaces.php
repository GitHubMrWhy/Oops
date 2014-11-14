<?php
	require_once ('config.php');
	require_once ('filter.php');
?>

<?php
	

	$place = $_POST["place"];
	$Longitude = $_POST["longitude"];
	$Latitude = $_POST["latitude"];
$userid =$_SESSION["userid"];
		$str = "INSERT INTO Place(place,longitude,latitude,user_id) VALUES('".$place."','".$Longitude."','".$Latitude."',".$userid.")";

		$result = mysql_query($str);
		if($result>=1){
			echo "<script type='text/javascript'>alert('add successfully!');window.location.href='addPlace.php';</script>";
		}else{
			echo "<script type='text/javascript'>alert('Failed to add a plate!');window.location.href='addPlace.php';</script>";
		}
	
?>