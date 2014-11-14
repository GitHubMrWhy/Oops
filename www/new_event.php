

<?php



require_once 'header.php';

echo <<<_END







<body onload="initialize()">

	



  <!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->



  <div class="container">

    <div class="row vertical-offset-100">

      <div class="col-md-4 col-md-offset-4">

        <div class="panel panel-default">

          <div class="panel-heading">

            <h3 class="panel-title">My Event</h3>

          </div>

          <div class="panel-body">

            <form accept-charset="UTF-8" role="form" id="AddNewEvent" action="service/index.php" method="post" onsubmit ="return AddNewEvent();">

              <fieldset>



                <div class="form-group">

                  <input class="form-control" placeholder="Event name" name="subject" type="text">

                </div>

                

                <div class="form-group">

                  <input id="event_autocomplete" class="form-control" placeholder="Event location" name="location" type="text">

                </div>

                <div class="form-group">
                  <input class="form-control" placeholder="Event time" name="event_time" type="text">

                </div>

                <div class="form-group">

                  <textarea id="feeling" class="text form-control" placeholder="Event description..." name="content"></textarea>

                </div>

                
                <input type="hidden" name="username" value=$username />
                <input type="hidden" name="command" value="AddNewEvent" />
                <input id="event_lat" name="latitude" type="hidden" />
                <input id="event_lng" name="longitude" type="hidden" />


                <input class="btn btn-lg btn-success btn-block" type="submit" value="Post">

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



