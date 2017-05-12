<?php
		
	$mysql_host='localhost';
	$mysql_user='root';
	$mysql_password='';
	if(!@mysql_connect($mysql_host,$mysql_user,$mysql_password))
	{
		echo("cannot connect to database");
	}
	else{
			if(!@mysql_select_db('donor')){
				echo("No database with this name");
			}
			else{
				$result=mysql_query("SELECT pincode,count(*) as Donors from pledgeinfo group by pincode");
			}
	}
          while( $row = mysql_fetch_assoc( $result ) ){
			  $checkboxes = "<input type='checkbox' name='selected[]' value='{$row['pincode']}'/><br />";
            echo
            "<tr><td>$checkboxes</td>
              <td>{$row['pincode']}</td>
              <td>{$row['Donors']}</td>
            </tr>\n";
			
          }
        ?>