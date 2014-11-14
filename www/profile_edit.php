<?php

require_once 'header.php';

  if(isset($_POST['username'], $_POST['bio'])){
   changeBio($_POST['username'], $_POST['bio']);
  }




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
        <li><a href="profile.php" accesskey="5" title="">Homepage</a></li>
        
        <li><a href="#" accesskey="3" title="">Message Board</a></li>
        <li><a href="#" accesskey="4" title="">Photo Wall</a></li>
        <li><a href="#" accesskey="5" title="">My Events</a></li>
        <li class="current_page_item"><a href="#" accesskey="1" title="">Profile</a></li>
      </ul>
    </div>
  </div>
  <div id="main">
    <div id="banner">
     
    </div>
    <div id="welcome">
      <div class="title">
        <table BORDER = 0>
        <form id="post_bio" action="profile_edit.php" method="post"  ">   
        <textarea rows="4" cols="50" name="bio" form="post_bio">
            $bio</textarea>
        <br></br>
        <input type="hidden" name="command" value="changeBio" />
        <input type="hidden" name="username" value=$username />
        <input type="submit" value="Submit"/>

      </form>
  </table>
     
    </div>

  </div>
</div>
</body>
</html>


_END;

?>