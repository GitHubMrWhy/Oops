<?php



require_once 'header.php';
require_once 'config.php';




?>

<div id="allImg" style="width:1000px;margin:0px auto;background-color:#fff;color:#fff;">
<div style="line-height:50px;width:1000px;margin:0px auto;margin-bottom:20px;background-color:#a5a4a2;color:#000;font-size:20px;text-align:center;font-weight:bold;">
Photo Wall
</div>
<?php 
	$i=0;
	$result = mysql_query("SELECT * FROM image WHERE owner='".$_SESSION["username"]."'");
	while($row=mysql_fetch_array($result)){
		
?>
	<div class="photolist" style="width:200px;float:left;margin-left:40px;background-color:#fff;color:#fff;text-align:center;margin-top:20px;border:1px solid black;">
		<div style="width:198px;height:200px;overflow:hidden;border-bottom:1px solid black;">
		
		<a href="#.html"><img src="<?php echo $row["src"]; ?>" style="min-width:200px;min-height:200px;" /></a>
		</div>
		<div style="padding:5px;">
		<span style="color:rgb(34,177,76)"><?php echo $row["location"]; ?>(<?php echo $row["latitude"]; ?>,<?php echo $row["longitude"]; ?>)</span><br/>
		<span style="color:#000"><?php echo $row["create_time"]; ?></span><br/>
		<span style="color:#2e3192"><?php echo $row["caption"]; ?></span>
		</div>
	</div>

<?php 
	$i=$i+1;
	if($i%4==0){
		echo "<div style='clear:both'></div>";
	}
} ?>
<div style="clear:both"></div><br/><br/>
</div>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/layer/layer.min.js"></script>
<script type="text/javascript">

$(function(){
	layer.use('extend/layer.ext.js', function(){
    layer.ext = function(){
        layer.photosPage({
            id: 112, //相册id，可选
            parent: "#allImg"
        });
    };
});
});

</script>

