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
		$user_donate=new userManager;
		$user_donate->update();
		
	}
	else{
		echo('cannot connect to database');
		
	}
}
class userManager{
function update(){
		session_start();
		$user=$_SESSION['user'];
		$nameError=array();
		$name= $_POST["name"];
		$user_contact=$_POST["contact"];
		$password=$_POST["password"];
		$querydb=mysql_query("select password from new_donor where email='$user'");
		$check=mysql_fetch_assoc( $querydb );
		if($check['password']==$password){
		
		if (strlen($user_contact) < 10) {
			$nameError[] = "Contact number  must have 10 characters.";
		} 
		if(count($nameError)===0){
			$query="update new_donor set name='$name', contact='$user_contact' where email='$user'";
			$updation=mysql_query($query);
			header( "refresh:0; url=editUser.php" );
			echo "<script>alert('Updated');</script>";
		}
		else{
			header( "refresh:0; url=editUser.php" );
			echo "<script>alert('Invalid Details');</script>";
		}
		}
		else{
			header( "refresh:0; url=editUser.php" );
			echo "<script>alert('Wrong Password');</script>";
		}
	}	
}

?>