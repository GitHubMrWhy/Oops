<?php // Example 21-12: logout.php
session_start();

if (isset($_SESSION['username']))
{
    //destroySession();
    
	$_SESSION=array();
    
    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();


    echo "<script language=javascript>window.location.href='index.php'</script>"; 
}


