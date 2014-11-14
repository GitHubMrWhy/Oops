<?php




require_once 'config.php';


$str ="SELECT * FROM event";
$result = mysql_query($str);
while($row=mysql_fetch_array($result)){
	echo $row["owner"]."<br/>";
}
?>



