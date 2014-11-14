<?php
session_start();


require("api.php");



//checkCRN('10520');
//deleteCourseItem('test','123');
//echo("here");
//echo (    $_POST    );

	
switch ($_POST['command']) {
	
	
	case "login": 
		login($_POST['username'], $_POST['password']); break;
	
	case "register":
		register($_POST['username'],$_POST['password'],$_POST['email'],$_POST['gender']); break;

	case "showEventList":
		showEventList();break;
	case "showImageList":
		showImageList();break;
	case "JoinEventCheck":
		joinEventCheck($_POST['username'],$_POST['eventID']);break;
	case "AddNewEvent":
		AddNewEvent($_POST['username'], $_POST['subject'], $_POST['content'], $_POST['location'], $_POST['event_time'], $_POST['latitude'], $_POST['longitude']); break;
	
	
	/*
	case "show_profile": 
		load_profile($_POST['username']);break;
	case "creating_identicons":
		creating_identicons($_POST['username'],$_POST['password'],$_POST['email'],$_POST['gender']); break;
	case "changeBio":
		changeBio($_POST['username'], $_POST['bio']); break;
 	case "AddCourseToList":
		AddCourseToList($_POST['username'], $_POST['crn']); break;
	case "AddTradeToList":
		AddTradeToList($_POST['username'], $_POST['have'], $_POST['exchange'], $_POST['emailPrivacy'], $_POST['note'],$_POST['gender']); break;
	case "showCourseList":
		showCourseList($_POST['username']); break;
	case "deleteCourseItem":
		deleteCourseItem($_POST['username'], $_POST['crn']); break;
	case "deleteTradeItem":
		deleteTradeItem($_POST['username'], $_POST['crn']); break;
 	case "checkCRN":
 		checkCRN($_POST['crn']); break;
    case "photoUpload":
        photoUpload($_POST['username'],$_FILES['file'],$_POST['title']);break;
    case "retrievePhoto":
    	retrievePhoto($_POST['username']);break;
    
    case "showInfo":
    	showInfo($_POST['username']);break;
    */
    default:
    /*
    $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
	
	fwrite($myfile,"Hello World. Testing!");
	fclose($myfile); 

	print_r($_POST);
	print_r($_POST['command']);

	*/

}


    

exit();
?>