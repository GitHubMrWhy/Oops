<html>



<head>

  <title>Register User</title>

  <meta charset="utf-8">

  <title>Page Title</title>



  <meta name="viewport" content="width=device-width, initial-scale=1.0">



  <link href="css/bootstrap-theme.css" rel="stylesheet">

  <link href="css/bootstrap.css" rel="stylesheet">

  <link href="css/registercustom.css" rel="stylesheet">

  <script src="js/bootstrap.min.js"></script>

  <script src="js/jquery-2.1.1.min.js"></script>







</head>





<body>

	



  <!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->



  <div class="container">

    <div class="row vertical-offset-100">

      <div class="col-md-4 col-md-offset-4">

        <div class="panel panel-default">

          <div class="panel-heading">

            <h3 class="panel-title">Register</h3>

          </div>

          <div class="panel-body">

            <form accept-charset="UTF-8" role="form" id="registerform" action="service/index.php" method="post" onsubmit ="return registerform();">

              <fieldset>



                <div class="form-group">

                  <input class="form-control" placeholder="Username" name="username" type="text" required pattern="\w+">

                </div>



                <div class="form-group">

                  <input class="form-control" placeholder="E-mail" name="email" type="email">

                </div>

                <div class="form-group">

                  <input class="form-control" placeholder="Password" name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"  onchange="form.password2.pattern = this.value;">

                </div>



                <div class="form-group">

                  <input class="form-control" placeholder="Confirm Password" name="password2" type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">

                </div>
                <div class="form-group">            
                 <label> Gender
                  <select class="form-control" id="gender" name="gender">
                    <option value="Male">MALE</option>
                    <option value="Female">FEMALE</option>
                  </select>
                </label>
              </div>

              <div class="checkbox">

                <label>

                  <input name="remember" type="checkbox" value="Remember Me"> Remember Me

                </label>

              </div>

              <input type="hidden" name="command" value="register" />
              <input class="btn btn-lg btn-success btn-block" type="submit" value="Register">
              

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



