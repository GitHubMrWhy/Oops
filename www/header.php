<?php // header.php
session_start();
echo "<!DOCTYPE html>\n<html><head><script src='OSC.js'></script>"; include 'functions.php';
$userstr = ' (Guest)';
if (isset($_SESSION['user'])) {
	$user = $_SESSION['user']; $loggedin = TRUE;
	$userstr = " ($user)";
}
else $loggedin = FALSE;
echo "<title>$appname$userstr</title><link rel='stylesheet'" . "href='styles.css' type='text/css' />" .
"</head><body><div class='appname'>$appname$userstr</div>";



 ?>