<?php
	require_once ('config.php');
	require_once ('filter.php');
?>

<?php
		$id = $_GET['id'];
		$str = "DELETE FROM Photo WHERE ID=".$id;
      $result = mysql_query($str);
		if($result>=1){
			echo "<script type='text/javascript'>alert('Successfully deleted!');window.location.href='index.php';</script>";
		}else{
			echo "<script type='text/javascript'>alert('Failed to delete, unknown error!');window.location.href='index.php';</script>";
		}
?>