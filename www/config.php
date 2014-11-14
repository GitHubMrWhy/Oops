<?php


 $hostname="23.229.205.68"; //mysql地址
 $basename="cs307"; //mysql用户名
 $basepass="cs307group"; //mysql密码
 $database="cs307"; //mysql数据库名称
 $conn=mysql_connect($hostname,$basename,$basepass)or die("error!"); //连接mysql              
 mysql_select_db($database,$conn); //选择mysql数据库
 mysql_query("set names 'utf8'");//mysql编码
?>