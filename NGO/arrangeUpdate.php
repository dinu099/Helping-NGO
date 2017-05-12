<?php
	$mysql_host='localhost';
	$mysql_user='root';
	$mysql_password='';
	if(!@mysql_connect($mysql_host,$mysql_user,$mysql_password))
	{
		echo("cannot connect to database");
	}
	else
	{
		$arr1=array();
		$arr=array();
			if(!@mysql_select_db('ngo')){
				echo("No database with this name");
			}
			else{
				if(!empty($_POST['selectedarea'])) {
					foreach($_POST['selectedarea'] as $check) {
						array_push($arr,$check);
					}
				}
				$result=mysql_query("SELECT email FROM volunteer;");
				while( $row = mysql_fetch_assoc( $result ) ){
					array_push($arr1,$row['email']);
				}
				$cnt=count($arr);
				for($i=0;$i<$cnt;$i++){
					if(is_numeric($arr[$i])){
						$query1="UPDATE volunteer SET Area='$arr[$i]' WHERE email='$arr1[$i]'";
						$insertion=mysql_query($query1);
					}
				}
			}
			$count=0;
			if(!@mysql_select_db('donor')){
				echo("No database with this name");
			}
			else{
				
				for($i=0;$i<$cnt;$i++){
					if(is_numeric($arr[$i])){
						$query2="UPDATE pledgeinfo SET volunteer='$arr1[$i]' WHERE pincode='$arr[$i]'";
						$insertion2=mysql_query($query2);
						$count++;
					}
				}
			}
			
	}
	header( "refresh:0; url=homeNGO.php" );
	if($count==0){
		echo "<script>alert('No Pickup Assigned.');</script>";
	}
	else{
		echo "<script>alert('Pickup Assigned.');</script>";
	}
?>