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
	<title>addreport</title>
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
	<form action="<?php echo base_url().'index.php/welcome/addReport'?>" method="post">
		<div style="margin-left:50px;margin-top:20px;" id="top">
			<div style="font-size:18px;font-weight:bold;">POST FLIGHT REPORT</div>
			<div style="margin-top:20px;">
				Date:<input class="myinput" type="text" name="time" />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Aircraft:VH<input class="myinput" type="text" name="aircraft" />
			</div>
			<div style="margin-top:5px;">
				Client:<input class="myinput" type="text" name="client" />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Task Number<input class="myinput" type="text" name="taskNumber" />
			</div>
			<div style="margin-top:10px;">
				Pilot:<input class="myinput" type="text" name="pilot" />
			</div>
			<div style="margin-top:10px;">
				Co Pilot:<input class="myinput" type="text" name="copilot" />
			</div>
			<div style="margin-top:10px;">
				Paramedic/Doctor:<input class="myinput" type="text" name="paramedic" />
				<input class="myinput" type="text" name="paramedic1" />
				<input class="myinput" type="text" name="paramedic2" />(up to 3)
			</div>
			<div style="margin-top:10px;">Passenger Details(up to 3)</div>
			<div style="margin-top:10px;width:800px;">
				<div style="display:inline;width:250px;border:1px dashed #000;float:left;margin-left:10px;">
					<div style="margin-top:10px;margin-left:5px;">
						Name:<input class="myinput" type="text" name="pname" />
					</div>
					<div style="margin-top:10px;margin-left:5px;">
						Company:<input class="myinput" type="text" name="pcompany" />
					</div>
				</div>
				<div style="display:inline;;width:250px;border:1px dashed #000;float:left;margin-left:10px;">
					<div style="margin-top:10px;margin-left:5px;">
						Name:<input class="myinput" type="text" name="pname1" />
					</div>
					<div style="margin-top:10px;margin-left:5px;">
						Company:<input class="myinput" type="text" name="pcompany1" />
					</div>
				</div>
				<div style="display:inline;;width:250px;border:1px dashed #000;float:left;margin-left:10px;">
					<div style="margin-top:10px;margin-left:5px;">
						Name:<input class="myinput" type="text" name="pname2" />
					</div>
					<div style="margin-top:10px;margin-left:5px;">
						Company:<input class="myinput" type="text" name="pcompany2" />
					</div>
				</div>
			<div>
			<div style="margin-top:10px;">Patient Details(up to 3)</div>
			<div style="margin-top:10px;width:1000px;">
				<div style="display:inline;width:320px;border:1px dashed #000;float:left;margin-left:10px;">
					<div style="margin-top:10px;margin-left:5px;">
						Name:<input class="myinput" type="text" name="paname" />
					</div>
					<div style="margin-top:10px;margin-left:5px;">
						Date of Birth/Age:<input class="myinput" type="text" name="pabirth" />
					</div>
					<div style="margin-top:10px;margin-left:5px;">
						Address:<input class="myinput" type="text" name="paaddress" />
					</div>
				</div>
				<div style="display:inline;;width:320px;border:1px dashed #000;float:left;margin-left:10px;">
					<div style="margin-top:10px;margin-left:5px;">
						Name:<input class="myinput" type="text" name="paname1" />
					</div>
					<div style="margin-top:10px;margin-left:5px;">
						Date of Birth/Age:<input class="myinput" type="text" name="pabirth1" />
					</div>
					<div style="margin-top:10px;margin-left:5px;">
						Address:<input class="myinput" type="text" name="paaddress1" />
					</div>
				</div>
				<div style="display:inline;;width:320px;border:1px dashed #000;float:left;margin-left:10px;">
					<div style="margin-top:10px;margin-left:5px;">
						Name:<input class="myinput" type="text" name="paname2" />
					</div>
					<div style="margin-top:10px;margin-left:5px;">
						Date of Birth/Age:<input class="myinput" type="text" name="pabirth2" />
					</div>
					<div style="margin-top:10px;margin-left:5px;">
						Address:<input class="myinput" type="text" name="paaddress2" />
					</div>
				</div>
			<div>
			<div style="margin-top:10px;">Detail of injuries</div>
			<div>
				<textarea rows="5" cols="100" name="detail">
				</textarea>
			<div>
			<div style="margin-top:10px;">
				<textarea rows="3" cols="100" name="comments">
					Paramedics Comments
				</textarea>
			</div>
			<div>
				<a href="#_self" onclick = "next()">next</a>
			</div>
		</div>
		<div style="margin-top:-1820px;" id="bottom">
			<div style="font-size:18px;font-weight:bold;">POST FLIGHT REPORT</div>
			<div style="margin-top:20px;">
				job Type: &nbsp;&nbsp;&nbsp;&nbsp;Accident <input type="checkbox" name="jobType1">&nbsp;&nbsp;&nbsp;&nbsp;Medical <input type="checkbox" name="jobType2"> &nbsp;&nbsp;&nbsp;&nbsp;Training <input type="checkbox" name="jobType3"> &nbsp;&nbsp;&nbsp;&nbsp;Other <input type="checkbox" name="jobType4">
			</div> 
			<div style="margin-top:5px;">
				if 'other' please describe:<br/><textarea rows="3" cols="100" name="jobdescribe">
				</textarea>
			</div>
			<div style="margin-top:5px;">
				<textarea rows="5" cols="100" name="jobDesc">
					Job Description
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
				    <td><input class="myinput2" type="text" name="fightDetails<?php echo $i.$j ?>" /></td>
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
				    <td><input class="myinput1" type="text" name="fuelAt" /></td>
				    <td><input class="myinput1" type="text" name="fuelAdd" /></td>
				    <th><input class="myinput1" type="text" name="fuelshut" /></th>
				    <th><input class="myinput1" type="text" name="fuelused" /></th>
				  </tr>
				</table>
			<div>
			<div style="margin-top:10px;">Fuel Added:(up to 4)</div>
			<div style="margin-top:10px;">
				Location:<input class="myinput" type="text" name="location" />
			</div>
			<div style="margin-top:10px;">
				Supplier:<input class="myinput" type="text" name="supplier" />
			</div>
			<div>
				<a href="#_self" onclick = "topPage()">back</a>
			</div>
			<div>
				<input style="margin-left:300px;" type="submit" id="mysubmit" value="save"/>
			</div>
		</div>
	</form>
	</body>
</html>
<script>
function next(){
	$("#top").css("margin-top","-640px");
	$("#bottom").css("margin-top","30px");
}
function topPage(){
	$("#top").css("margin-top","20px");
	$("#bottom").css("margin-top","-1820px");
}
</script>