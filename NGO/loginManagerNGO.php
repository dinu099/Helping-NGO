<?php
error_reporting(0);
$user_NGO = new loginManager;
$user_NGO->verifyCredentials();
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
			if(@mysql_select_db("ngo")){
				$id=$_POST["user_id"];
				$pass=$_POST["user_password"];
				$flag=0;
				$querydb="select username,password from `ngodetails`";
				$result=mysql_query($querydb);
				$count=mysql_num_rows($result);
			if($count>0){
				while($row=mysql_fetch_assoc($result)){
					if($row["username"]=== $id  && $row["password"]===$pass ){
						$user_NGOlogin=new loginManager;
						$user_NGOlogin->login();
						$flag=1;
						break;
					}	
				}
				if($flag===0){
					header( "refresh:0; url=loginNGO.php" );
					echo "<script type='text/javascript'>alert('Wrong Email/Password!!!')</script>";
				}
			}
			else{
				echo "No Records found!!!!!";
				}
			}
		else{
			echo('cannot connect to database');
			header( "refresh:1; url=loginNGO.php" );
			}	
		}
}
	
	public function login(){
		$current_user=$_POST["user_id"];
		session_start();
		$_SESSION['NGO']=$current_user;
		header( "refresh:0; url=homeNGO.php" );
	}
	
}	

?>
