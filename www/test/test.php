<?php
$q = intval($_GET['q']);

$con = mysqli_connect("23.229.205.68","cs307","cs307group","cs307");
if (!$con) {
	die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"cs307");

switch ($_POST['command']) {
	
	
	case "showEvent":
	showEvent();break;
	
	default:
	showUser();
	break;


}



function showEvent() {
	$sql="SELECT * FROM `event` WHERE 1";
	$result = mysqli_query($con,$sql);
	echo $result;
	echo "<table border='1'>
	<tr>
		<th>subject</th>
		<th>content</th>
		<th>owner</th>
		<th>latitude</th>
		<th>longitude</th>
	</tr>";

	while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . $row['subject'] . "</td>";
		echo "<td>" . $row['content'] . "</td>";
		echo "<td>" . $row['owner'] . "</td>";
		echo "<td>" . $row['latitude'] . "</td>";
		echo "<td>" . $row['longitude'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";

}

function showUser() {
	$sql="SELECT * FROM login WHERE user_id = '".$q."'";
	$result = mysqli_query($con,$sql);

	echo "<table border='1'>
	<tr>
		<th>username</th>
		<th>userpass</th>
		<th>fullname</th>
		<th>gender</th>
		<th>email</th>
	</tr>";

	while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . $row['username'] . "</td>";
		echo "<td>" . $row['userpass'] . "</td>";
		echo "<td>" . $row['fullName'] . "</td>";
		echo "<td>" . $row['gender'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";

}

mysqli_close($con);
?>