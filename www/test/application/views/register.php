<html>
	<body style="TEXT-ALIGN: center;">	
	<form action="<?php echo base_url().'index.php/welcome/register'?>" method="post">
		<div style="margin-top:200px">
				<div style="font-weight:bold;font-size:20px;margin-bottom: 20px;">
					Register New Pilot
				</div>
				<div style='color:red'>
					<?php if(isset($error)){
						echo "error:".$error;
					} ?>
				</div>
				<div>
					Customer Name:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" />
				</div>
				<div>
					Passward:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password" />
				</div>
				<div>
					Confirm Passward: <input type="password" name="confrimPassword" />
				</div>
				<div>
					Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" />
				</div>
				<div>
					Phone Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="phone" />
				</div>
				<div>
					&nbsp;&nbsp;&nbsp;<input type="submit" id="mysubmit" value="Register"/>
				</div>
				<div>
					Already Registered?<a href="<?php echo base_url().'index.php/welcome/login'?>">Login here</a>
				</div>
		</div>
	</from>
	</body>
</html>