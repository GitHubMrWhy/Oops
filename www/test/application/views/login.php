<html>
	<body style="TEXT-ALIGN: center;">	
	<form action="<?php echo base_url().'index.php/welcome/login'?>" method="post">
		<div style="margin-top:200px">
				<div style="font-weight:bold;font-size:20px;margin-bottom: 20px;">
					Login
				</div>

				<div style='color:red'>
					<?php if(isset($message)){
						echo $message;
					} ?>
				</div>
				<div>
					Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" />
				</div>
				<div>
					Passward:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password" />
				</div>
				<div>
					&nbsp;&nbsp;&nbsp;<input type="submit" id="mysubmit" value="Login"/>
				</div>
				<div>
					New member?<a href="<?php echo base_url().'index.php/welcome/register'?>">Register here</a>
				</div>
		</div>
	</from>
	</body>
</html>