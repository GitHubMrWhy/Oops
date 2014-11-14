<?php // uploadIMG.php


if ($_FILES) {
	$name = $_FILES['filename']['name'];
	switch($_FILES['filename']['type']) {
		case 'image/jpeg': $ext = 'jpg';break;
		case 'image/gif': $ext = 'gif';break;
		case 'image/png': $ext = 'png';break;
		case 'image/tiff': $ext = 'tif';break;
		default: $ext = '';break;
	}
	if ($ext) {

		//$validCharacters = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ+-*#&@!?";
		$validCharacters = "abcdefghijklmnopqrstuxyvwz";
		$validCharNumber = strlen($validCharacters);

		$IdPhoto = "";

		for ($i = 0; $i < 7; $i++) {
			$index = mt_rand(0, $validCharNumber - 1);
			$IdPhoto .= $validCharacters[$index];
		}

		
		$n = "img/".$IdPhoto.".".$ext; 
		move_uploaded_file($_FILES['filename']['tmp_name'], $n);
		echo "Uploaded image '$name' as '$n':<br />";
		echo "<img src='$n' />";
	}
	else echo "'$name' is not an accepted image file"; 
}
	else echo "No image has been uploaded";
	echo "</body></html>"; 


echo <<<_END
<form method='post' action='uploadIMG.php' enctype='multipart/form-data'> Select a JPG, GIF, PNG or TIF File:
  <input type='file' name='filename' size='10' />
  <input type='submit' value='Upload' />
</form>

_END
?>