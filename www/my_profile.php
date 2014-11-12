<?php

require_once 'header.php';
echo <<<_END
    
  <body>
    <div id="persona-page" class="nav">
      <div class="nav-wrap">
      <div class="nav-primary clearfix">
        <div class="nav-logo">
          <p>Welcom to My Home</p>
        </div>

      </div>
      </div>
    </div>
    <div class="touxiang">
    <img src="sys_img/profile_$username.png""></img>

    <div class="info">

        <ul>
            <li class="name"></li>
            <li class="loc"></li>
      </ul>
    </div>
    
    <div id="content">
      <h1><div class="head-nav">Picture Wall</div></h1>  
      <div class="group-list group-cards">
        <ul>
           <li class="">
            <div class="pic1">
              <a href="http://www.google.com"><img src="pics/background.jpg"  width="110" height="90" alt="" align="middle"/></a>
            </div>
            
            </li>
          <li class="">
            <div class="pic2">
              <a href="http://www.google.com"><img src="pics/backstar.jpeg"  width="110" height="90" alt="" align="middle"/></a>
            </div>
            
            </li>
        </ul>
      </div>    
    </div> 

      <p>
        <h1><div class="hd">Events</div></h1> 
    
      </p>  
      <table class="orz">
          
            <tr>
              <td class="title">
                <a href="http://www.google.com" title="EVENT">EVENT A</a>
              </td>
            </tr>
          <tr>
              <td class="title">
                <a href="http://www.google.com" title="EVENT">EVENT B</a>
              </td>
            </tr>
      </table>

    </div>

   

  </body>
</html>


_END;

?>
