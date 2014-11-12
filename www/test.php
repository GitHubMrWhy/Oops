<!DOCTYPE html>
<html> <!-- urlpost.html -->
  <head>
    <title>AJAX Example</title>
  </head>
  <body style='text-align:center'>
    <h1>Loading a web page into a DIV</h1>
    <div id='info'>This sentence will be replaced</div>
  
    <script>
      params  = "command=showImageList"  
      request = new ajaxRequest()
      
      request.open("POST", "service/index.php", true)
      request.setRequestHeader("Content-type",
        "application/x-www-form-urlencoded")
      request.setRequestHeader("Content-length", params.length)
      request.setRequestHeader("Connection", "close")
        
      request.onreadystatechange = function()
      {
        if (this.readyState == 4)
        {
          if (this.status == 200)
          {
            if (this.responseText != null)
            {
                data = JSON.parse(this.responseText)
          
                document.getElementById('info').innerHTML =data[1].src

            }
            else alert("Ajax error: No data received")
          }
          else alert( "Ajax error: " + this.statusText)
        }
      }
      
      request.send(params)
       console.log(data[0].owner)
      
      function ajaxRequest()
      {
        try
        {
          var request = new XMLHttpRequest()
        }
        catch(e1)
        {
          try
          {
            request = new ActiveXObject("Msxml2.XMLHTTP")
          }
          catch(e2)
          {
            try
            {
              request = new ActiveXObject("Microsoft.XMLHTTP")
            }
            catch(e3)
            {
              request = false
            }
          }
        }
        return request
      }
    </script>
  </body>
</html>
