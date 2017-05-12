<?php
$user = new Signupmanager;
$user->verifyCredentials();
class SignUpManager{
	function verifyCredentials(){
		$mysql_host="localhost";
		$mysql_user='root';
		$mysql_password='';
		
		if(!@mysql_connect($mysql_host,$mysql_user,$mysql_password))
		{
			echo("cannot connect to database");
		}
		else{
			if(@mysql_select_db("donor")){
				$nameError=array();
			$name= $_POST["Fullname"];
			$mail=$_POST["email"];
			
			$contact=$_POST["mobile"];
			$pass=$_POST["password"];
			$confirm=$_POST["cpswd"];
			if (strlen($contact) < 10) {
				$nameError[] = "Contact number  must have 10 characters.";
			} 
			if (strlen($pass) < 6 || strlen($pass) >12) {
				$nameError[] = "Password should be within 6-12 characters";
			} 
  
			//basic email validation
			if ( !filter_var($mail,FILTER_VALIDATE_EMAIL) ) {
				$nameError[] = "Please enter valid email address.";
			} 
			if(count($nameError)===0){
				
				$flag=0;
				//$query="INSERT INTO `new_donor` ( `name`, `email`, `contact`, `password`) VALUES ('$name', '$mail', '$contact', '$pass')";
				$querydb="select email from `new_donor`";
				$result=mysql_query($querydb);
				$count=mysql_num_rows($result);
				if($count>0){
					while($row=mysql_fetch_assoc($result)){
						if($row["email"]=== $mail){
							header( "refresh:0; url=Signup.php" );
							echo '<script language="javascript">';
							echo 'alert("Donor Already Registered on this Email-id")';
							echo '</script>';
							$flag=1;
							//header ("Location: Signup-login.php");
							break;
						}
					}
					if($flag===0){
						$login=new SignUpManager;
						$login->register($name,$mail,$contact,$pass);
						//$insertion=mysql_query($query);
						//echo "Donor Successfully Registered";
					}
				}
				else{
					$login=new SignUpManager;
					$login->register($name,$mail,$contact,$pass);
					//echo'<script language="javascript">';
					//echo 'alert("Donor Successfully Registered")';
					//echo '</script>';
				}
			}
			else{
				if(count($nameError)==1){
					print_r($nameError);
				}
				else{
					header( "refresh:0; url=Signup.php" );
					echo "Please Enter the valid details";
					
				}
		
			}
			}
			else{
				echo('cannot connect to database');
			}
		}
	}
	function register($name,$mail,$contact,$pass){
		
		$query="INSERT INTO `new_donor` ( `name`, `email`, `contact`, `password`) VALUES ('$name', '$mail', '$contact', '$pass')";
		$insertion=mysql_query($query);
		header( "refresh:0; url=login.php" );
		echo "<script>alert('Successfully Registered. Please Sign In')</script>";
			
	}
}

?>