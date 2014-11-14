<?php
	require_once ('config.php');
	require_once ('filter.php');
?>

<?php
	

	$images = $_POST["images"];
	$username =$_SESSION["user"];
	$date = date('Y-m-d H:i:s',time());

		$str = "INSERT INTO photo(USERNAME,url,dates) VALUES('".$username."','".$images."','".$date."')";

		$result = mysql_query($str);
		if($result>=1){
			echo "<script type='text/javascript'>alert('upload successfully!');window.location.href='index.php';</script>";
		}else{
			echo "<script type='text/javascript'>alert('Failed to add a plate!');window.location.href='index.php';</script>";
		}
	
?>