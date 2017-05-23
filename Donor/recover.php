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
		if(@mysql_select_db("donor")){
			$flag=0;
			$query="select email,password from `new_donor`";
			$result=mysql_query($query);
			
			$counts=mysql_num_rows($result);
			
			if($counts>0){
				while($row=mysql_fetch_assoc($result)){
					
					if( $row["email"]==$_POST["user_mail"]){
						$password = $row["password"];
						$to = $row["email"];
						$subject = "Your Recovered Password";
						$message = "Please use this password to login " . $password;
						$header = "From:chinmayanand598@gmail.com \r\n";
						$header .= "Cc:chinmayanand598@gmail.com  \r\n";
						$header .= "MIME-Version: 1.0\r\n";
						$header .= "Content-type: text/html\r\n";
						//echo $to ."</br>";
						$flag=1;
						if(mail($to, $subject, $message,$header)){
							header( "refresh:0; url=login.php" ); 
							echo "<script>alert('Your Password has been sent to your email id')</script>";
						}
						else{
							echo "Failed to Recover your password, try again";
						}
						break;
					}
				}
				if($flag==0){
					header( "refresh:0; url=forgot.php" ); 
					echo "<script>alert('Wrong Password!!')</script>";
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