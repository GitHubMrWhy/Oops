<html>
	<body style="TEXT-ALIGN: center;">
		<div style="margin-top:20px">
				<div style="font-weight:bold;font-size:24px;margin-bottom: 30px;">
					all reports
				</div>

				<table border="1"  style="margin-left: 30%;">
					<?php foreach($reports as $report){ ?>
					<tr>
						<td width="100px"><?php echo $report->id ?></td>
						<td width="200px"><?php echo $report->time ?></td>
						<td width="150px"><a style="margin-left: 20px" href="<?php echo base_url().'index.php/welcome/viewReport?id='.$report->id?>"><button type="button" style = "width:100px;">view</button></a>
</td>
						<td width="150px"><a style="margin-left: 20px" href="<?php echo base_url().'index.php/welcome/editReport?id='.$report->id?>"><button type="button" style = "width:100px;">edit</button></a>
</td>
					</tr>
					<?php } ?>
				</table>
				<div style="margin-left: -5%;margin-top: 40px;">
					<a href="<?php echo base_url().'index.php/welcome/top'?>"><button type="button">return</button></a>
				</div>
		</div>
	</body>
</html>
