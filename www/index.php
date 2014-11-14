

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script type="text/javascript">

var slideimages = new Array() // create new array to preload images
slideimages[0] = new Image() // create new instance of image object
slideimages[0].src = "sys_img/sys_HGH.jpg" // set image object src property to an image's src, preloading that image in the process
slideimages[1] = new Image()
slideimages[1].src = "sys_img/sys_LAS.jpg"
slideimages[2] = new Image()
slideimages[2].src = "sys_img/sys_LAX.jpg"
slideimages[2] = new Image()
slideimages[2].src = "sys_img/sys_SFO.jpg"
slideimages[2] = new Image()
slideimages[2].src = "sys_img/sys_TYO.jpg"

</script>

<title>Welcome to Oops</title>
<style>
<!--
@charset "utf-8";
body {
	background-color: #DEDECA;
	margin: 0;
	padding: 0;
	background: #000;
}

body, td, th {
	color: #666633;
}

h1, h2 {
	color: #663300;
}

h3, h4, h5, h6 {
	color: #996633;
}

a {
	color: #996633;
}
.gallery_img{
	background-size: cover;
	background-position: center;
}
.container {
	width: 80%;
	max-width: 1260px;
	min-width: 780px;
	background-image: url('backstar.jpeg');
	background-size: cover;
	margin: 0 auto;
}

.img1{
	width: 50%;
	height: 15em;
	margin: 0 auto;
	overflow: hidden;
}

.img2{
	width: 50%;
	height: 15em;
	margin: 0 auto;
	overflow: hidden;
}

.img3{
	background-size: cover; 
	position: fixed;
}

.img4{
	background-size: cover;
}
.img5{
	background-size: cover; 
}
.header {
	background: #6F7D94;
}

.logo{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
	font-family: "Times New Roman", Times, serif;
	font-size: 75px;
	color: #fff;
	
}

.sidebar1 {
	float: right;
	width: 25%;
	background: #background: #666633;;
	padding-bottom: 10px;
}
.content {

	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.content input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.content input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.content input[type=button]:hover{
	opacity: 0.8;
}
.content input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.content input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.content input[type=submit]{
	width: 250px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.content input[type=submit]:hover{
	opacity: 0.8;
}

.content input[type=submit]:focus{
	outline: none;
}

.content input[type=button]{
	width: 90px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding:6px;
	margin-top:10px;

}
.content input[type=button]:hover{
	opacity: 0.3;
	filter: alpha(opacity=30);
}

.content input[type=button]:focus{
	outline: none;
}

::-webkit-input-placeholder{
	color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
	color: rgba(255,255,255,0.6);
}
.content ul, .content ol { 
	padding: 0 15px 15px 40px; 
}

ul.nav {
	list-style: none;
	border-top: 1px solid #666;
	margin-bottom: 15px; 
}
ul.nav li {
	border-bottom: 1px solid #666; 
}
ul.nav a, ul.nav a:visited { 
	padding: 5px 5px 5px 15px;
	display: block;
	text-decoration: none;
	background: #c0b895;
	color: #663300;
}
ul.nav a:hover, ul.nav a:active, ul.nav a:focus { 
	background: #996633;
	color: #FFF;
}

.header {
	padding: 5px 0;
	background-size: cover;
	background-image: url('oops.jpg');
}

.fltrt { 
	float: right;
	margin-left: 8px;
}
.fltlft { 
	float: left;
	margin-right: 8px;
}
.clearfloat { 
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
-->
</style></head>


<body>
	<img src="sys_img/sys_HGH.jpg" id="slide" width="100%" height="1365px" />

	<script type="text/javascript">

		//variable that will increment through the images
		var step=0

		function slideit(){
	 	//if browser does not support the image object, exit.
	 	if (!document.images)
	 		return
	 	document.getElementById('slide').src = slideimages[step].src
	 	if (step<2)
	 		step++
	 	else
	 		step=0
	 	//call function "slideit()" every 2.5 seconds
	 	setTimeout("slideit()",4500)
		}

		slideit()

	</script>

	<ilayer id="main" width=&{scrollerwidth}; height=&{scrollerheight}; bgColor=&{scrollerbgcolor}; visibility=hide>
		<layer id="first" left=1 top=0 width=&{scrollerwidth}; >
			<script language="JavaScript">
			if (document.layers)
				document.write(slideimages[0])
			</script>
		</layer>
		<layer id="second" left=0 top=0 width=&{scrollerwidth}; visibility=hide>
			<script language="JavaScript1.2">
			if (document.layers)
				document.write(slideimages[1])
			</script>
		</layer>
	</ilayer>

	<script language="JavaScript">
	if (ie||dom){
		document.writeln('<div id="main2" style="position:relative;width:'+scrollerwidth+';height:'+scrollerheight+';overflow:hidden;background-color:'+scrollerbgcolor+'">')
		document.writeln('<div style="position:absolute;width:'+scrollerwidth+';height:'+scrollerheight+';clip:rect(0 '+scrollerwidth+' '+scrollerheight+' 0);left:0px;top:0px">')
		document.writeln('<div id="first2" style="position:absolute;width:'+scrollerwidth+';left:1px;top:0px;">')
		document.write(slideimages[0])
		document.writeln('</div>')
		document.writeln('<div id="second2" style="position:absolute;width:'+scrollerwidth+';left:0px;top:0px">')
		document.write(slideimages[1])
		document.writeln('</div>')
		document.writeln('</div>')
		document.writeln('</div>')
	}
	</script>


<div class="logo">

	<div>

		OOPS

		<span></span>
	</div>

</div>
<br></br>

<div class="content"><h2></h2>
	<table BORDER = 0>
		<form id="loginform" action="service/index.php" method="post" onsubmit="return loginform();">
			<input type="text" name="username" placeholder="Username"></input>

			<br></br>

			<input type="password" name="password" placeholder="Password"></input>

			<br></br>


			<input type="hidden" name="command" value="login" />
			<input type="submit" value="Login" /> 
			<br></br>
			<input type="button" onclick="location.href='register.php'" value="Register">
		</form>
	</table>


			<!-- end .content --></div>
			<!-- end .container --></div>
		</body>
		</html>
