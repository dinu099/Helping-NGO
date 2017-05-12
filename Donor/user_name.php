<?php
error_reporting(0);
$mysql_host="localhost";
$mysql_user='root';
$mysql_password='';

if(!@mysql_connect($mysql_host,$mysql_user,$mysql_password))
	{
		echo("cannot connect to database");
	}
else{
	if(@mysql_select_db("donor")){
	session_start();
	$user=$_SESSION['user'];
	$querydb="select name from `new_donor` where email='$user'";
	$result=mysql_query($querydb);
	$name=mysql_fetch_assoc($result);
	//echo $name['name'];
	}
	else{
		echo('cannot connect to database');
		
	}
}	
	
?>