<html>

<head>
<title>Form Test</title>

<link rel="stylesheet" type="text/css" href="css/uberlike.css">

</head>









<body>


<form id="loginform" action="service/index.php" method="post" onsubmit="return loginform();">
<pre>
username <input type="text" name="username" /> 
password <input type="text" name="password" /> 

<input type="hidden" name="command" value="login" />
<input type="submit" value="Login" /> 
</pre></form>





  <form method="post" class="form" action="service/index.php"  novalidate="">
    <input type="hidden" name="_csrf_token" value="8dad2cb091a643ac870a2999d508860d">
    <input type="hidden" data-js="access-token" name="access_token">
    <input type="hidden" name="command" value="login" />
    
      <a href="https://login.uber.com/login#" class="btn btn--full btn--facebook push-tiny--top" data-js="facebook-connect">
          <span class="push-huge--left flush">Login With Facebook </span>
      </a>
      <p class="background-line push-large--top">
        <span>or use email</span>
      </p>

    <div class="form-group push--bottom">
      <label class="label" for="email">Email</label>
      <input type="email" class="text-input " name="username" autofocus="autofocus" placeholder="hi@gmail.com" value="" id="email">
    </div>

    <div class="form-group push--bottom">
      <label class="label" for="password">Password</label>
      <input type="password" class="text-input " name="password" placeholder="xxxxx" id="password">
    </div>
    <div class="form-group push--bottom">
      <input type="checkbox" id="checkbox-rememberme" class="hidden">
      <label class="checkbox" for="checkbox-rememberme">
        Remember Me
      </label>
    </div>
    <button class="btn btn--huge btn--full" type="submit">Login in </button>
  </form>



</body> 

</html>