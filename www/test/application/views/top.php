<html>
	<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta charset="utf-8">
	<title>top</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">
	</head>
	<body>
		<div style="margin-top:200px">
		<div style="width:270px;font-size:18px;margin-left: 280px;margin-left: 280px;margin-bottom:20px">
			<a href="<?php echo base_url().'index.php/welcome/addReport'?>">ADD report</a>
		</div>
		<div style="width:270px;font-size:18px;margin-left: 280px;margin-bottom:20px">
			<a href="<?php echo base_url().'index.php/welcome/reportList'?>">View Completed report</a>
		</div>
		<div style="width:270px;font-size:18px;margin-left: 280px;margin-bottom:20px">
			<a href="<?php echo base_url().'index.php/welcome/admin'?>">Admin page</a>
		</div>
		<div style="width:270px;font-size:18px;margin-left: 280px;margin-bottom:20px">
			<?php echo $userName ?>
			<a href="<?php echo base_url().'index.php/welcome/layout'?>">layout</a>
		</div>
		</div>
	</body>
</html>