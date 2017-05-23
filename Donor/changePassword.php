<?php
$mysql_host="localhost";
$mysql_user='root';
$mysql_password='';
$user="";
if(!@mysql_connect($mysql_host,$mysql_user,$mysql_password))
	{
		echo("cannot connect to database");
	}
else{
	if(@mysql_select_db("donor")){
		$user_donate=new changePassword;
		$user_donate->update();
		
	}
	else{
		echo('cannot connect to database');
		
	}
}
class changePassword{
function update(){
		session_start();
		$user=$_SESSION['user'];
		$nameError=array();
		$password=$_POST["password"];
		$new_password=$_POST["new_password"];
		$querydb=mysql_query("select password from new_donor where email='$user'");
		$check=mysql_fetch_assoc( $querydb );
		if($check['password']==$password){
		if(count($nameError)===0){
			$query="update new_donor set password='$new_password' where email='$user'";
			$updation=mysql_query($query);
			header( "refresh:0; url=user.php" );
			echo "<script>alert('Password Updated');</script>";
		}
		else{
			header( "refresh:0; url=user.php" );
			echo "<script>alert('Invalid Details');</script>";
		}
		}
		else{
			header( "refresh:0; url=newPassword.php" );
			echo "<script>alert('Wrong Password');</script>";
		}
	}	
}

?>