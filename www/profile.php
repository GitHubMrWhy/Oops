<?php

require_once 'header.php';








echo <<<_END
    



<body>
<div id="page" class="container">
  <div id="header">
    <div id="logo">
      <img src="sys_img/profile_$username.png" alt="" with="200" height="200"/>    <!--  This is user profile pic-->
      <h1><a href="#">$username</a></h1>    <!--  This is user profile name-->
      <h3><a href="#">$gender</a></h3>    <!--  This is user profile gender-->
      <h3><a href="#">Location</a></h3>    <!--  This is user profile location-->
    </div>
    <div id="menu">
      <ul>
        <li class="current_page_item"><a href="#" accesskey="1" title="">Homepage</a></li>
        <li><a href="" accesskey="3" title="">Message Board</a></li>
        <li><a href="myphoto.php" accesskey="4" title="">Photo Wall</a></li>
        <li><a href="myevent.php" accesskey="5" title="">My Events</a></li>
        <li><a href="profile_edit.php" accesskey="5" title="">Profile</a></li>
      </ul>
    </div>
  </div>
  <div id="main">
    <div id="banner">
      <img src="img/test.jpg" alt="" class="image-full" />   <!--  This is user chose home pic-->
    </div>
    <div id="welcome">
      <div class="title">
        <h2>Welcome to My Homepage</h2>
        <span class="byline">Enjoy.</span>
      </div>
      <p>This is <strong>My Homepage</strong> Please hang around and check my photos and events. Leave me a message. Have fun :) </p>
      <ul class="actions">
        <li><a href="#" class="button">Etiam posuere</a></li>
      </ul>
    </div>

  </div>
</div>
</body>
</html>

_END;

?>
