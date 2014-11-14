<?php
	require_once ('config.php');
?>
<?php
	if($_SESSION["user"]!=null){
		
	}else{
		echo "<script type='text/javascript'>alert('Please Login!');window.location.href='login.php';</script>";
		return;
	}
?>