<?php
	require_once ('config.php');
?>

<?php
	
	
	$username = $_POST["username"];
	$password = $_POST["password"];


	$str = "SELECT user_id, username,full_name,valid FROM login WHERE username='".$username."' AND userpass='".$password."'";

	$result = mysql_query($str);
	if($row = mysql_fetch_array($result)){
		
		$_SESSION["user"] = $username;
		$_SESSION["userid"] = $row["user_id"];
		echo "<script type='text/javascript'>alert('The successful landing!');window.location.href='index.php';</script>";
	}else{
		echo "<script type='text/javascript'>alert('Login failed!');window.location.href='login.php';</script>";
	}
	
	
	
?>