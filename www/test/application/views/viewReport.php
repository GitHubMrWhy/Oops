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
	<title>report</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">
	<style>
		.myinput {
		   border-left: 0;
		   border-right: 0;
		   border-top: 0;
		   border-bottom: 1px dashed #000000;
		}
		.myinput1 {
		   border-left: 0;
		   border-right: 0;
		   border-top: 0;
		}
		.myinput2 {
		   border-left: 0;
		   border-right: 0;
		   border-top: 0;
		   width: 120px;
		}
	</style>
	<script src="<?php echo base_url();?>js/jquery-1.7.2.min.js"></script>
	</head>
	<body>
	<form action="<?php echo base_url().'index.php/welcome/editReport?id='.$report->id?>" method="post">
		<div style="margin-left:50px;margin-top:20px;" id="top">
			<div style="font-size:18px;font-weight:bold;">POST FLIGHT REPORT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="<?php echo base_url().'index.php/welcome/export?id='.$report->id?>" target="_blank">csv</a>
			</div>
			<div style="margin-top:20px;">
				Date:<input class="myinput" type="text" name="time" value="<?php echo $report->time ?>"/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Aircraft:VH<input class="myinput" type="text" name="aircraft" value="<?php echo $report->aircraft ?>" />
			</div>
			<div style="margin-top:5px;">
				Client:<input class="myinput" type="text" name="client" value="<?php echo $report->client ?>"/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Task Number<input class="myinput" type="text" name="taskNumber" value="<?php echo $report->taskNumber ?>"/>
			</div>
			<div style="margin-top:10px;">
				Pilot:<input class="myinput" type="text" name="pilot" value="<?php echo $report->pilot ?>"/>
			</div>
			<div style="margin-top:10px;">
				Co Pilot:<input class="myinput" type="text" name="copilot" value="<?php echo $report->copilot ?>"/>
			</div>
			<div style="margin-top:10px;">
				Paramedic/Doctor:<input class="myinput" type="text" name="paramedic" value="<?php echo $report->paramedic ?>"/>
				<input class="myinput" type="text" name="paramedic1" value="<?php echo $report->paramedic1 ?>"/>
				<input class="myinput" type="text" name="paramedic2" value="<?php echo $report->paramedic2 ?>"/>(up to 3)
			</div>
			<div style="margin-top:10px;">Passenger Details(up to 3)</div>
			<div style="margin-top:10px;width:800px;">
				<div style="display:inline;width:250px;border:1px dashed #000;float:left;margin-left:10px;">
					<div style="margin-top:10px;margin-left:5px;">
						Name:<input class="myinput" type="text" name="pname"  value="<?php echo $report->pname ?>"/>
					</div>
					<div style="margin-top:10px;margin-left:5px;">
						Company:<input class="myinput" type="text" name="pcompany"  value="<?php echo $report->pcompany ?>"/>
					</div>
				</div>
				<div style="display:inline;;width:250px;border:1px dashed #000;float:left;margin-left:10px;">
					<div style="margin-top:10px;margin-left:5px;">
						Name:<input class="myinput" type="text" name="pname1" value="<?php echo $report->pname1 ?>"/>
					</div>
					<div style="margin-top:10px;margin-left:5px;">
						Company:<input class="myinput" type="text" name="pcompany1" value="<?php echo $report->pcompany1 ?>"/>
					</div>
				</div>
				<div style="display:inline;;width:250px;border:1px dashed #000;float:left;margin-left:10px;">
					<div style="margin-top:10px;margin-left:5px;">
						Name:<input class="myinput" type="text" name="pname2" value="<?php echo $report->pname2 ?>"/>
					</div>
					<div style="margin-top:10px;margin-left:5px;">
						Company:<input class="myinput" type="text" name="pcompany2" value="<?php echo $report->pcompany2 ?>"/>
					</div>
				</div>
			<div>
			<div style="margin-top:10px;">Patient Details(up to 3)</div>
			<div style="margin-top:10px;width:1000px;">
				<div style="display:inline;width:320px;border:1px dashed #000;float:left;margin-left:10px;">
					<div style="margin-top:10px;margin-left:5px;">
						Name:<input class="myinput" type="text" name="paname" value="<?php echo $report->paname ?>"/>
					</div>
					<div style="margin-top:10px;margin-left:5px;">
						Date of Birth/Age:<input class="myinput" type="text" name="pabirth" value="<?php echo $report->pabirth ?>"/>
					</div>
					<div style="margin-top:10px;margin-left:5px;">
						Address:<input class="myinput" type="text" name="paaddress" value="<?php echo $report->paaddress ?>"/>
					</div>
				</div>
				<div style="display:inline;;width:320px;border:1px dashed #000;float:left;margin-left:10px;">
					<div style="margin-top:10px;margin-left:5px;">
						Name:<input class="myinput" type="text" name="paname1" value="<?php echo $report->paname1 ?>"/>
					</div>
					<div style="margin-top:10px;margin-left:5px;">
						Date of Birth/Age:<input class="myinput" type="text" name="pabirth1" value="<?php echo $report->pabirth1 ?>"/>
					</div>
					<div style="margin-top:10px;margin-left:5px;">
						Address:<input class="myinput" type="text" name="paaddress1" value="<?php echo $report->paaddress1 ?>"/>
					</div>
				</div>
				<div style="display:inline;;width:320px;border:1px dashed #000;float:left;margin-left:10px;">
					<div style="margin-top:10px;margin-left:5px;">
						Name:<input class="myinput" type="text" name="paname2" value="<?php echo $report->paname2 ?>"/>
					</div>
					<div style="margin-top:10px;margin-left:5px;">
						Date of Birth/Age:<input class="myinput" type="text" name="pabirth2" value="<?php echo $report->pabirth2 ?>"/>
					</div>
					<div style="margin-top:10px;margin-left:5px;">
						Address:<input class="myinput" type="text" name="paaddress2" value="<?php echo $report->paaddress2 ?>"/>
					</div>
				</div>
			<div>
			<div style="margin-top:10px;">Detail of injuries</div>
			<div>
				<textarea rows="5" cols="100" name="detail" value="<?php echo $report->detail ?>">
					<?php echo $report->detail ?>
				</textarea>
			<div>
			<div style="margin-top:10px;">
				<textarea rows="3" cols="100" name="comments" >
					<?php echo $report->comments ?>
				</textarea>
			</div>
			<div>
				<a href="#_self" onclick = "next()">next</a>
			</div>
		</div>
		<div style="margin-top:-1820px;" id="bottom">
			<div style="font-size:18px;font-weight:bold;">POST FLIGHT REPORT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="<?php echo base_url().'index.php/welcome/export?id='.$report->id?>" target="_blank">csv</a>

			</div>
			<div style="margin-top:20px;">
				job Type: &nbsp;&nbsp;&nbsp;&nbsp;Accident <input type="checkbox" name="jobType1" <?php if($report->jobType1) echo 'checked' ?>>&nbsp;&nbsp;&nbsp;&nbsp;Medical <input type="checkbox" name="jobType2" <?php if($report->jobType2) echo 'checked' ?>> &nbsp;&nbsp;&nbsp;&nbsp;Training <input type="checkbox" name="jobType3"  <?php if($report->jobType3) echo 'checked' ?>> &nbsp;&nbsp;&nbsp;&nbsp;Other <input type="checkbox" name="jobType4" <?php if($report->jobType4) echo 'checked' ?>>
			</div> 
			<div style="margin-top:5px;">
				if 'other' please describe:<br/>
				<textarea rows="3" cols="100" name="jobdescribe">
				<?php echo $report->jobdescribe ?>
				</textarea>
			</div>
			<div style="margin-top:5px;">
				<textarea rows="5" cols="100" name="jobDesc">
					<?php echo $report->jobDesc ?>
				</textarea>
			</div>
			<div style="margin-top:10px;">
				<table border="1" >
				  <tr>
				    <th >leg No</th>
				    <th>Date</th>
				    <th>From</th>
				    <th>To</th>
				    <th>Start</th>
				    <th>Life Off</th>
				    <th>Land</th>
				    <th>ShutDown</th>
				  </tr>
				  <?php for($i=1;$i<=6;$i++){ ?>
				  <tr>
				  	<?php for($j=1;$j<=8;$j++){ ?>
				    <td><input class="myinput2" type="text" name="fightDetails<?php echo $i.$j ?>" value="<?php echo $details[$i][$j] ?>" /></td>
				    <?php } ?>
				  </tr>
				  <?php } ?>
				</table>
			<div>
			<div style="margin-top:10px;">
				<table border="1">
				  <tr>
				    <th>Fuel at start up</th>
				    <th>Total fuel Added</th>
				    <th>Fuel on Shutdown</th>
				    <th>Fuel uesed&nbsp;&nbsp;&nbsp;&nbsp;</th>
				  </tr>
				  <tr>
				    <td><input class="myinput1" type="text" name="fuelAt" value="<?php echo $report->fuelAt ?>" /></td>
				    <td><input class="myinput1" type="text" name="fuelAdd" value="<?php echo $report->fuelAdd ?>" /></td>
				    <th><input class="myinput1" type="text" name="fuelshut" value="<?php echo $report->fuelshut ?>" /></th>
				    <th><input class="myinput1" type="text" name="fuelused" value="<?php echo $report->fuelused ?>" /></th>
				  </tr>
				</table>
			<div>
			<div style="margin-top:10px;">Fuel Added:(up to 4)</div>
			<div style="margin-top:10px;">
				Location:<input class="myinput" type="text" name="location" value="<?php echo $report->location ?>" />
			</div>
			<div style="margin-top:10px;">
				Supplier:<input class="myinput" type="text" name="supplier" value="<?php echo $report->supplier ?>" />
			</div>

			<div>
				<a href="#_self" onclick = "topPage()">back</a>
			</div>
			<div>
				<input style="margin-left:300px;" type="submit" id="mysubmit" value="save"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
			<div>
				<a href="<?php echo base_url().'index.php/welcome/top'?>">return</a>
			</div>
		</div>
	</form>
	</body>
</html>
<script>
<?php if(!isset($editFlag)){ ?>
	$("input").attr("disabled","disabled");
	$("textarea").attr("disabled","disabled");
	$("#mysubmit").hide();
<?php } ?>
$("#mysubmit").hide();
function next(){
	$("#top").css("margin-top","-640px");
	$("#bottom").css("margin-top","30px");
	$("#mysubmit").show();
}
function topPage(){
	$("#top").css("margin-top","20px");
	$("#bottom").css("margin-top","-1830px");
	$("#mysubmit").hide();
}
</script>