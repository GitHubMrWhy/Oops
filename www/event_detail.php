<?php

require_once 'header.php';
//echo $_GET["event_id"];
$event_id = $_GET["event_id"];
$eventInfo = showEventInfo($event_id);
 
$json_o =json_decode($eventInfo);
 $event_name = $json_o ->subject;
 $event_location =$json_o ->location;
 $event_content = $json_o ->content;
  $owner = $json_o ->owner;

echo <<<_END


<body onload="initialize()">

	



  <!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->



  <div class="container">

    <div class="row vertical-offset-100">

      <div class="col-md-4 col-md-offset-4">

        <div class="panel panel-default">

          <div class="panel-heading">

            <h3 class="panel-title">$event_name </h3>

          </div>

          <div class="panel-body">

            <form accept-charset="UTF-8" role="form" id="AddNewEvent" action="service/index.php" method="post" onsubmit ="return AddNewEvent();">

              <fieldset>

               <strong>  </strong>
               <br>
               <strong> Location:$event_location </strong>

                <p> content: <br>$event_content </p>
                   <p> create_by: $owner </p>

                <div class="form-group">
                 <input type="hidden" name="command" value="JoinEventCheck" />
                 <input id="username" name="username" value=$username type="hidden" />
                 <input id="username" name="eventID" value=$event_id type="hidden" />
                 
                <input class="btn btn-lg btn-success btn-block" type="submit" value="Join the event">

                </div>

              </fieldset>

            </form>

          </div>

        </div>

      </div>

    </div>

  </div>



  <script src="js/registercustom.js"></script>

 





</body>




</html>









_END;








?>

