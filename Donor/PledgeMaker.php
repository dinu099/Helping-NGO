<?php
error_reporting(0);
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
		$user_donate=new PledgeMaker;
		$user_donate->makePledge();
		
	}
	else{
		echo('cannot connect to database');
		
	}
}
class PledgeMaker{
function makePledge(){
		$arr=array();
		session_start();
		$user=$_SESSION['user'];
		$nameError=array();
		$name= $_POST["name"];
		$mail=$_POST["email"];
		$user_contact=$_POST["contact"];
		$address=$_POST["address"];
		$zip=$_POST["pin"];
		$quantity=$_POST["quantity"];
		$latitude=$_POST["latitude"];
		$longitude=$_POST["longitude"];
		if(!empty($_POST['drop'])) {
						foreach($_POST['drop'] as $check) {
							$items.=$check.", ";
						}
					}
		if(isset($latitude) and !empty($latitude)){
			
		if (strlen($user_contact) < 10) {
			$nameError[] = "Contact number  must have 10 characters.";
		} 
		if ( !filter_var($mail,FILTER_VALIDATE_EMAIL) ) {
			$nameError[] = "Please enter valid email address.";
		} 
		if(count($nameError)===0){
			$query="INSERT INTO `pledgeinfo` ( `fullname`, `emailid`, `mobile`,`latitude`,`longitude`, `address`, `pincode`, `item`, `quantity`) VALUES ('$name', '$mail', '$user_contact', '$latitude', '$longitude', '$address', '$zip', '$items', '$quantity')";
			$insertion=mysql_query($query);
			header( "refresh:0; url=home.php" );
			echo "<script>alert('Thanks For Donating!!!');</script>";
		}
		else{
			if(count($nameError)==1){
				print_r($nameError);
			}
			else{
				echo "Please Enter the valid details";
			}
		
		}
		}
		else{
			header( "refresh:0; url=pledge.php" );
			echo "<script>alert('Use computer to make donation');</script>";
		}
	}
function viewPledge(){
	$query="select pincode as area,count(*) as Total_Donor from `pledgeinfo` group by `pincode`";
	$result=mysql_query($query);
	$count=mysql_num_rows($result);
	if($count>0){
	 echo "<table border='2' bgcolor='#3456UY'><tr><th>Select</th><th>Area</th><th>DonorCount</th></tr>";
    // output data of each row
    while($row=mysql_fetch_assoc($result)) {
		$checkboxes = "<input type='checkbox' name='selected[]' value='{$row['area']}'/><br />";
        echo "<tr><td>".$checkboxes."</td><td>".$row["area"]."</td><td>".$row["Total_Donor"]."</td></tr>";
    }
    echo "</table>";
	echo "\n";
	
	}
	else{
		echo "No Records found";
	}
	
}	
}

?>