<?php



require_once 'header.php';

$location =$_POST['location'];
$caption =$_POST['caption'];
$owner =$_POST['owner'];
$latitude=$_POST['latitude'];
$longitude=$_POST['longitude'];
//echo $caption;
//echo $location;



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
    //echo "Uploaded image '$name' as '$n':<br />";
    //echo "<img src='$n' />";
     //echo "uploading.......:<br />";
    $result = query("INSERT INTO image(owner,location,caption,src,latitude,longitude) VALUES('$owner','$location','$caption','$n','$latitude','$longitude')");
    //echo "finish uploading......";
    //echo $result['error'];
  }
  //else echo "'$name' is not an accepted image file"; 
}
  //else echo "No image has been uploaded";
  //echo "</body></html>"; 



echo <<<_END





<body onload="initialize()">

	



  <!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->



  <div class="container">

    <div class="row vertical-offset-100">

      <div class="col-md-4 col-md-offset-4">

        <div class="panel panel-default">

          <div class="panel-heading">

            <h3 class="panel-title">Upload new Picture</h3>

          </div>

          <div class="panel-body">

            <form method='post' action='new_pic.php' enctype='multipart/form-data'>

              <fieldset>


                <div class="fileinput fileinput-new form-class" data-provides="fileinput">

                  <input type='file' name='filename'  />
                  <br>
                  <input type='submit' value='Upload' />

                </div>



                <div class="form-group">

                  <textarea id="feeling" class="text form-control" placeholder="Write a cpation ..."  name="caption" ></textarea>

                </div>

                  
                    <div class="form-group">

                    <input id="event_autocomplete" class="form-control" placeholder="Event location" name="location" type="text">

                </div>
                    <input id="owner" name="owner" value=$username type="hidden" />
 
                   <input id="event_lat" name="latitude" type="hidden" />
                   <input id="event_lng" name="longitude" type="hidden" />

              </fieldset>



            </form>


          </div>
        </div>
      </div>
    </div>
  </div>





  <script src="js/registercustom.js"></script>
  <script src="js/event_map.js"></script>


</body>











</html>







_END;



?>





