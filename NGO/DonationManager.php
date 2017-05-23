<?php
error_reporting(0);

	if($_POST["view"]){
			
			$ngo=new DonationManager;
			session_start();
			$user_NGO=$_SESSION['NGO'];
			if(isset($user_NGO) and !empty($user_NGO)){
				$ngo->viewDonations();
			}
			else{
				header("refresh:0; url=loginNGO.php");
				echo "<script>alert('Please Login to continue.');</script>";
			}
	}
		else if($_POST["arrange_pickup"]){
			$ngo=new DonationManager;
			session_start();
			$user_NGO=$_SESSION['NGO'];
			if(isset($user_NGO) and !empty($user_NGO)){
				$ngo->viewVolunteer();
			}
			else{
				header("refresh:0; url=loginNGO.php");
				echo "<script>alert('Please Login to continue.');</script>";
			}
		}
	class DonationManager{
	function viewDonations(){
		include_once("Donation.php");
		$donate=new Donation;
		$donate->getData();
		
	}
	function viewVolunteer(){
		include_once("arrange.php");
		$gather=new Arrange;
		$gather->assignArea();
	}
	function assignVolunteer(){
		
	}
	}



?>