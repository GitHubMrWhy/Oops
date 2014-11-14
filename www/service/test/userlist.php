<?php
	require_once ('config.php');
?>

<?php
	
	echo $_SESSION["user"]."<br/>";


	$str = "SELECT user_id, username,full_name,userpass,valid FROM login";
	$result = mysql_query($str);
	while($row = mysql_fetch_array($result)){
		echo $row["username"].":";
		echo $row["userpass"]."<br/>";
		
	}
	
	
	
?>