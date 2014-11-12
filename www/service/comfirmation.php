<?php

include('lib.php');
require("api.php");

// Passkey that got from link 
$passkey=$_GET['passkey'];
$tbl_name1="login";
//$username = query("SELECT username FROM login WHERE confirm_code ='%s' limit 1", $passkey);
// Retrieve data from table where row that match this passkey 
//If successfully queried 


$checkValid = query("SELECT username FROM login WHERE confirmationCode='%s' limit 1", $passkey);

if (count($checkValid['result'])>0) {


	//success

	
		$result=query("UPDATE login SET valid='1',confirmationCode='' WHERE confirmationCode='%s'",$passkey);
		if (!$result['error']) {
			//echo "success";
	} else {
	//error
		// if not found passkey, display message "Wrong Confirmation code" 
		errorJson('Wrong Confirmation code');
		//echo "wrong";
	}
}else{
	//echo "wrong code";
}

?>