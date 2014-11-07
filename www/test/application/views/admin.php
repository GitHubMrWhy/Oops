<html>
	<body>	
		<div style="margin-top:20px">
				<div style="font-weight:bold;font-size:24px;margin-bottom: 30px;margin-left: 45%;">
					all users
				</div>
				<div style="margin-left: 15%;margin-top: 20px;font-weight:bold;">
					<div style = "width:200px;float:left">name</div>
					<div style = "width:250px;float:left">email</div>
					<div style = "width:200px;float:left">phone</div>
					<div style = "width:100px;float:left">
						admin
					</div>
				</div>
				<?php foreach($users as $user){ ?>
				<br/>
				<div style="margin-left: 15%;margin-top: 20px;">
					<div style = "width:200px;float:left"><?php echo $user->name ?></div>
					<div style = "width:auto;min-width:250px; float:left"><?php echo $user->email ?></div>
					<div style = "width:200px;float:left"><?php echo $user->phone ?></div>
					<div style = "width:100px;float:left">
						<a href="<?php echo base_url().'index.php/welcome/deleteUser?id='.$user->id?>"><button type="button">delete</button></a>
					</div>
				</div>
				<?php } ?>
				<br/>
				<div style="margin-left: 15%;margin-top: 20px;">
					<a href="<?php echo base_url().'index.php/welcome/top'?>"><button type="button">return</button></a>
				</div>
		</div>
	</body>
</html>

<script>
<?php if(isset($_GET['messaeg'])){ ?>
	alert("<?php echo $_GET['messaeg'] ?>");
<?php } ?>
</script>