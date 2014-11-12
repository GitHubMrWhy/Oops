<?php

$host="promotest.db.11464571.hostedresource.com"; // Host name 
$username="promotest"; // Mysql username 
$password="x921017Z"; // Mysql password 
$db_name="promotest"; // Database name 


//Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect to server"); 
mysql_select_db("$db_name")or die("cannot select DB");

?>