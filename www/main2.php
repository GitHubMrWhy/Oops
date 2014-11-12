<?php
session_start();

$username = $_SESSION["username"];

 if(empty($username))
    exit;

echo <<<_END
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet" media="screen">

  <title>Oops</title>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body,#map-canvas {
        margin: 0;
        padding: 0;
        height: 100%;
     }
       .gm-style-iw > div { height: 100% !important; width: 100% !important; overflow: hidden !important; }  
     
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>

	</head>

	<body onload="initialize()">

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Oops</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" onsubmit=" return false;">
        <div class="form-group">
          <input type="text" id="autocomplete" class="form-control" placeholder="Enter a City">
          <select class="form-control" name="searchby" onchange="dropdownTest(this.value)">
			<option value="defaultopts" selected>--Search by--</option>
			<option value="events">Events</option>
			<option value="users">Users</option>
			<option value="pictures">Pictures</option>
			</select>
        </div>
        <button type="button" class="btn btn-default btn-lg" onclick="testloc()">Loc test 1</button>
        <button type="button" class="btn btn-default brn-lg" onclick="hideMarkers()">Hide test</button>
		<button type="button" class="btn btn-default brn-lg" onclick="eventTest()">Event test</button>
		
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" >User <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu"> 
                <li><a href="#">
                 $username
                
                </a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">My Event</a></li>
                <li><a href="#">My Photo</a></li>
                <li class="divider"></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    
		
		<div id="map-canvas"></div>

<script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/map.js"></script>

		 
	</body>


_END;

?>


