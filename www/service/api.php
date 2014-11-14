<?php
ob_start();
session_start();
require("lib.php");
//API implementation to come here
function errorJson($msg){
	print json_encode(array('error' => $msg));
	exit();
}

//=========================USER==========================

function register($user,$pass,$email,$gender) {
	//check if username exists
	$login = query("SELECT username FROM login WHERE username='%s' ", $user);
	
	if (count($login['result'])>0) {
		//errorJson('Username already exists');
		//echo "sername already exists";
		//echo $login;
	}else{
		//try to register the user
	// Random confirmation code 
		$confirm_code=md5(uniqid(rand())); 
	//echo  $confirm_code. '     '.$user.'    '.$email."\n";
		creating_identicons($user,$pass,$email,$gender);

		$result = query("INSERT INTO login(username,userpass,gender,email,confirmation_code) VALUES('$user','$pass','$gender','$email','$confirm_code')");
	//echo $result;
		if (!$result['error']) {
	//success


		//sendComformation( $user, $email, $confirm_code);
			login($user, $pass);


		} else {
	//error
				//errorJson('Registration failed');
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
		echo "<script language=javascript>window.location.href='../index.php'</script>"; 
		//errorJson('Authorization failed');
	}
}


function showUserInfo($user) {
	//check if username exists
	$login = query("SELECT bio,gender FROM login WHERE username='%s' ", $user);
	
	if (count($login['result'])>0) {
		//errorJson('Username already exists');
		//echo "sername already exists";
		return json_encode($login['result'][0]);
		
	}else{
		//try to register the user
	// Random confirmation code 



	}

}


function changeBio($user, $bio){

	$result = query("UPDATE login SET bio='%s' WHERE username='%s' ", $bio,$user);
	//print json_encode($result);
	
	

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


function showEventInfo($event_id){
	$result=query("SELECT * FROM event WHERE event_id='%s' ",$event_id);
	//$result = query("SELECT * FROM course_List WHERE username='%s' AND crn='%s'ORDER BY id DESC limit 1", $user,$crn);
	if ($result['error']) {
		//echo "error when find username";
		errorJson('ERROR: Event List retrieve error');
	}else{
		
		return json_encode($result['result'][0]);
	}
}


function JoinEventCheck($username,$event_id) {
	$check=query("SELECT * FROM join_event ORDER BY event_id DESC");

	if (count($check['result'])>0) {
		errorJson('already joined');
		//echo "sername already exists";
	}else{

		$result = query("INSERT INTO join_event(username,event_id) VALUES('$username','$event_id')");
		if (!$result['error']) {
			print json_encode("success");

		} else {
	//error
			errorJson('join error');

		}




	}
	

}


function AddNewEvent($owner,$subject,$content,$location,$event_time,$latitude,$longitude){

	

	
	$result = query("INSERT INTO event(owner,content,location,event_time,subject,latitude,longitude) VALUES('$owner','$content','$location','$event_time','$subject','$latitude','$longitude')");
	
	if (!$result['error']) {
				//print json_encode("$result");
		echo "<script language=javascript>window.location.href='../new_event.php'</script>"; 
	} else {
	//error
				//errorJson($result['error']);
		echo "<script language=javascript>window.location.href='../new_event.php'</script>"; 
	}







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

//===================================== image ==========================================

function showImageList(){
	$result=query("SELECT * FROM image ORDER BY image_id DESC");
	if ($result['error']) {
		//echo "error when find username";
		errorJson('ERROR: Event List retrieve error');
	}else{
		
		print json_encode($result['result']);
	}
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

function creating_identicons($user,$pass,$email,$gender){

	// Convert string to MD5
	$hash = md5($user . $pass . $email . $gender);
	// Get color from first 6 characters
	$color = substr($hash, 0, 6);
// Create an array to store our boolean "pixel" values
	$pixels = array();

// Make it a 5x5 multidimensional array
	for ($i = 0; $i < 5; $i++) {
		for ($j = 0; $j < 5; $j++) {
			$pixels[$i][$j] = hexdec(substr($hash, ($i * 5) + $j + 6, 1))%2 === 0;
		}
	}

// Create image
	$image = imagecreatetruecolor(400, 400);
// Allocate the primary color. The hex code we assigned earlier needs to be decoded to RGB
	$color = imagecolorallocate($image, hexdec(substr($color,0,2)), hexdec(substr($color,2,2)), hexdec(substr($color,4,2)));
// And a background color
	$bg = imagecolorallocate($image, 238, 238, 238);

// Color the pixels
	for ($k = 0; $k < count($pixels); $k++) {
		for ($l = 0; $l < count($pixels[$k]); $l++) {
        // Default pixel color is the background color
			$pixelColor = $bg;

        // If the value in the $pixels array is true, make the pixel color the primary color
			if ($pixels[$k][$l]) {
				$pixelColor = $color;
			}

        // Color the pixel. In a 400x400px image with a 5x5 grid of "pixels", each "pixel" is 80x80px
			imagefilledrectangle($image, $k * 80, $l * 80, ($k + 1) * 80, ($l + 1) * 80, $pixelColor);
		}
	}

// Output the image

	imagePNG($image,"../sys_img/profile_".$user.".png");

		//header("content-type: image/jpeg");
		//echo imageJPEG($image);;
}


ob_clean();

?>