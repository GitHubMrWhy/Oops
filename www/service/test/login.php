<?php
	require_once ('config.php');
	$_SESSION["user"] = "";
?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Login</title>



<meta name="MSSmartTagsPreventParsing" content="True">
<meta http-equiv="MSThemeCompatible" content="Yes">


	 

<style type="text/css">

</style>


<body>

<form action="logins.php" method="post">
	Username:<input type="text" name="username" /><br/>
	Password:<input type="password" name="password" /><br/>
	<input type="submit" value="Login" />
</form>
</body></html> 