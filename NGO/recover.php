<?php
$call=new ManagePassword;
$call->recoverPassword();
class ManagePassword{
function recoverPassword(){
	$mysql_host="localhost";
	$mysql_user='root';
	$mysql_password='';
	if(!@mysql_connect($mysql_host,$mysql_user,$mysql_password))
	{
		echo("cannot connect to database");
	}
	else{
		if(@mysql_select_db("ngo")){
			$flag=0;
			$query="select email,username,password from `ngodetails`";
			$result=mysql_query($query);
			
			$counts=mysql_num_rows($result);
			
			if($counts>0){
				while($row=mysql_fetch_assoc($result)){
					
					if( $row["email"]==$_POST["user_mail"]){
						$password = $row["password"];
						$username=$row["username"];
						$to = $row["email"];
						$subject = "Your Recovered Password";
						$message = "Please use this credentials to login, Username: ".$username.", Password: " . $password;
						$header = "From:chinmayanand598@gmail.com \r\n";
						$header .= "Cc:chinmayanand598@gmail.com  \r\n";
						$header .= "MIME-Version: 1.0\r\n";
						$header .= "Content-type: text/html\r\n";
						//echo $to ."</br>";
						$flag=1;
						if(mail($to, $subject, $message,$header)){
							header( "refresh:0; url=loginNGO.php" ); 
							echo "<script>alert('Your Username and Password has been sent to your email id')</script>";
						}
						else{
							echo "Failed to Recover your password, try again";
						}
						break;
					}
				}
				if($flag==0){
					header ("Location: forgot.php");
				}
			}
	
			else{
				header ("Location: forgot.php");
			}
		}
		else{
			echo "No Connection";
		}
	}
}
}

?>
