<?php
$user = new loginManager;
$user->verifyCredentials();
class loginManager{
	public function verifyCredentials(){
		$mysql_host="localhost";
		$mysql_user='root';
		$mysql_password='';
		if(!@mysql_connect($mysql_host,$mysql_user,$mysql_password))
		{
			echo("cannot connect to database");
		}
		else{
			if(@mysql_select_db("donor")){
				$mail=$_POST["user_mail"];
				$pass=$_POST["user_password"];
				$flag=0;
				$querydb="select email,password from `new_donor`";
				$result=mysql_query($querydb);
				$count=mysql_num_rows($result);
			if($count>0){
				while($row=mysql_fetch_assoc($result)){
					if($row["email"]=== $mail  && $row["password"]===$pass ){
						$userlogin=new loginManager;
						$userlogin->login();
						$flag=1;
						break;
					}	
				}
				if($flag===0){
					header( "refresh:0; url=login.php" );
					echo "<script type='text/javascript'>alert('Wrong Email/Password!!!')</script>";
				}
			}
			else{
				echo "No Records found!!!!!";
				}
			}
		else{
			echo('cannot connect to database');
			//header ("Location: Signup-login.php");
			}	
		}
}
	
	public function login(){
		$mail=$_POST["user_mail"];
		session_start();
		$_SESSION['user']=$mail;
		header( "refresh:0; url=pledge.php" );
		//echo 'Successfully Logged In</br>Go Ahead and donate!!!';
	}
	
}	

?>
