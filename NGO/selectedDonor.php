<?php
	error_reporting(0);
	session_start();
	$user_NGO=$_SESSION['NGO'];
	if(isset($user_NGO) and !empty($user_NGO)){
		$mysql_host='localhost';
		$mysql_user='root';
		$mysql_password='';
		if(!@mysql_connect($mysql_host,$mysql_user,$mysql_password))
		{
			echo("cannot connect to database");
		}
		else
		{
			$arr=array();
				if(!@mysql_select_db('donor')){
					echo("No database with this name");
				}
				else{
					if(!empty($_POST['selected'])) {
						foreach($_POST['selected'] as $check) {
							array_push($arr,$check);
						}
					}
				}
		}
		  
				$cnt=count($arr);
				for($i=0;$i<$cnt;$i++)
				{
					$result=mysql_query("SELECT fullname,emailid,mobile,address,pincode,item,quantity,volunteer FROM pledgeinfo WHERE pincode='$arr[$i]'");
					while( $row = mysql_fetch_assoc( $result ) ){
						echo
						"<tr>
						  <td>{$row['fullname']}</td>
						  <td>{$row['emailid']}</td>
						  <td>{$row['mobile']}</td>
						  <td>{$row['address']}</td>
						  <td>{$row['pincode']}</td>
						  <td>{$row['item']}</td>
						  <td>{$row['quantity']}</td>
						  <td>{$row['volunteer']}</td>
						</tr>\n";
						
					}
				}
	}
	else{
		header("refresh:0; url=loginNGO.php");
		echo "<script>alert('Please Login to continue.');</script>";
	}
       
?>