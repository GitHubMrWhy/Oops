<?php

session_start();
ob_start();
//API implementation to come here
function errorJson($msg){
	print json_encode(array('error' => $msg));
	exit();
}

//=========================USER==========================

function register($user,$fullName, $pass,$email,$year,$college,$gender,$photoData,$bio) {
	//check if username exists
	$login = query("SELECT username FROM login WHERE username='%s' ", $user);
	
	if (count($login['result'])>0) {
		errorJson('Username already exists');
		//echo "sername already exists";
	}else{
	//try to register the user
	// Random confirmation code 
	$confirm_code=md5(uniqid(rand())); 
	//echo  $confirm_code. '     '.$user.'    '.$email."\n";
	
	$result = query("INSERT INTO login(username,fullName,userpass,gender,email,confirmationCode,year,college,bio) VALUES('$user','$fullName','$pass','$gender','$email','$confirm_code','$year','$college','$bio')");
	if (!$result['error']) {
	//success

		/*
		//check if there was no error during the file upload
			//get the last automatically generated id
			//$IdPhoto = mysqli_insert_id($link);
				$IdPhoto = $user."_profile";
			//move the temporarily stored file to a convenient location
				if (move_uploaded_file($photoData['tmp_name'], "img/".$IdPhoto.".jpg")) {
				//file moved, all good, generate thumbnail
				thumb("img/".$IdPhoto.".jpg", 50);
				
				} else {
				 query("DELETE FROM login WHERE username='%s' ", $user);
				errorJson('Upload on server problem');
				
				}
			*/
			
		//echo "success into data try to send email";
		//sendComformation( $user, $email, $confirm_code);
		login($user, $pass);
		

	} else {
	//error
		errorJson('Registration failed');
		//echo "Registration failed";
	}

}

}



function login($username, $pass) {
	$result = query("SELECT user_id, username,full_name,valid FROM login WHERE username='%s' AND userpass='%s' ", $username, $pass);
	if (count($result['result'])>0) {
		//authorized
		$_SESSION['username'] = $result['result'][0]['username'];
		//print json_encode($result);
		
		//echo $result['result'][0]['username'];
		//echo $_SESSION['username'];
		echo "<script language=javascript>window.location.href='../main.php'</script>"; 
	} else {
		//not authorized
		 echo "<script language=javascript>window.location.href='../login.html'</script>"; 
		//errorJson('Authorization failed');
	}
}

//=======================event=================================

function showEventList(){
	$result=query("SELECT * FROM event ORDER BY event_id DESC");
	if ($result['error']) {
		//echo "error when find username";
		errorJson('ERROR: Event List retrieve error');
	}else{
		
		print json_encode($result['result']);
	}
}





function showInfo($username){
	$result = query("SELECT username,email,gender FROM login WHERE username='%s' ", $username);
	if ($result['error']) {
		//echo "error when find username";
		errorJson('bad ');
	}else{
		
		print json_encode($result);
	}
}

function AddTradeToList($username,$have,$exchange,$emailPrivacy,$note,$gender){



	$result = query("INSERT INTO trade_List(username,have,exchange,emailPrivacy,note,gender) VALUES('$username','$have','$exchange','$emailPrivacy','$note','$gender')");
		if ($res['error']) {
	//echo "error when find username";
			print json_encode($result);
		}else{	
			print json_encode($result);
		}
		//echo "error when find username";
	
}
function AddCourseToList($user, $crn){

	$result = query("SELECT * FROM course_List WHERE username='%s' AND crn='%s'ORDER BY id DESC limit 1", $user,$crn);
	if ($result['error']) {

	}
	if (count($result['result'])>0) {
		errorJson('crn already exists');
		//echo "sername already exists";
	}else{
		$result = query("INSERT INTO course_List(username,crn) VALUES('$user','$crn')");
		if ($res['error']) {
	//echo "error when find username";
		}else{	
			showCourseList($user);
		}
		//echo "error when find username";
	}
}

function changeBio($user, $bio){

	$result = query("UPDATE login SET bio='%s' WHERE username='%s' ", $bio,$user);
	print json_encode($result);
	
	

}


function showCourseList($user){
	$result = query("SELECT * FROM course_List WHERE username='%s' ORDER BY id DESC", $user);
	if ($res['error']) {
	//echo "error when find username";
	}else{	
		print json_encode($result);
	}
	}
	function deleteCourseItem($user, $crn){
	$result = query("DELETE FROM course_List  WHERE username='%s' AND crn='%s'" , $user,$crn);

	if ($res['error']) {
	echo "error when delete an item ";
	}else{	
		showCourseList($user);
	}


}


function sendComformation($user, $email,$confirm_code) {
///SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require 'MailService/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtpout.secureserver.net";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 80;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "no-reply@mingshengxu.com";
//Password to use for SMTP authentication
$mail->Password = "x921017Z";
//Set who the message is to be sent from
$mail->setFrom('no-reply@mingshengxu.com', 'myPurdue-assistance');

//Set who the message is to be sent to
$mail->addAddress($email);
//Set the subject line
$mail->Subject = "Your confirmation link here";
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$subject="Your confirmation link here";
// From
// Your message
$message="Your Comfirmation link \r\n";
$message.="Click on this link to activate your account \r\n";
$message.="http://www.mingshengxu.com/promos/comfirmation.php?passkey=$confirm_code";
$mail->Body    = $message;
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.gif');

//send the message, check for errors
if (!$mail->send()) {
   // echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    //echo "Message sent!";
}
}


function checkCRN($crn){
	$preurl='https://selfservice.mypurdue.purdue.edu/prod/bwckschd.p_disp_detail_sched?term_in=201410&crn_in=';
	$num="";
	$url=$preurl.$crn;
	$page = file_get_contents($url);
	$domain = strstr($page, 'Seats');
	$domain = substr($domain, 0,200);
	$domain = strstr($domain, '<TD CLASS="dddefault">');

	for ($x=0; $x<=2; $x++)
  	{
  	$pre= stripos($domain,'<TD CLASS="dddefault">') +22;
	$pro = stripos($domain,'</TD>') ;
  	$num[$x]= substr($domain,$pre,$pro-$pre) .PHP_EOL;
   	$domain = substr($domain, $pro+6);
 	}
 	$arr = array('Capacity' => $num[0], 'Actual' => $num[1], 'Remaining' => $num[2]);

	print json_encode($arr);
	
} 

function photoUpload($username, $photoData, $title) {
	//check if a user id is passed
	if (!$username) 
		errorJson('Authorization required');
	//check if there was no error during the file upload
	if ($photoData['error']==0) {
		
		if (!$result['error']) {
			//database link
			global $link;
			
			//get the last automatically generated id
			//$IdPhoto = mysqli_insert_id($link);
			$IdPhoto = $username."_profile";
			//move the temporarily stored file to a convenient location
			if (move_uploaded_file($photoData['tmp_name'], "img/".$IdPhoto.".jpg")) {
				//file moved, all good, generate thumbnail
				thumb("img/".$IdPhoto.".jpg", 50);
				print json_encode(array('successful'=>1));
			} else {
				errorJson('Upload on server problem');
			};
		} else {
			errorJson('Upload database problem.'.$result['error']);
		}
	} else {
		errorJson('Upload malfunction');
	}
}


function retrievePhoto($username){
	$result = query("select Idphoto from photos where photos.username = username");


}


?>