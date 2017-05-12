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
			if(!@mysql_select_db('donor')){
				echo("No database with this name");
			}
			else{
				session_start();
				$user=$_SESSION['user'];
				$result=mysql_query("SELECT fullname,emailid,mobile,address,pincode,item,quantity FROM pledgeinfo where donor_id='$user';");
			}
	}
	 
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
				</tr>\n";
			  }       
	?>