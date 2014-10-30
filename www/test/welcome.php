<?php
session_start();


      $username = $_SESSION["username"];
      echo $username;

      
echo "</head><body>Form data successfully validated: $username,
</body></html>";
?>