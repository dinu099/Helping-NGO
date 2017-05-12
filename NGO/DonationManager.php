<?php
error_reporting(0);
session_start();

if($_POST["view"]){
		
		$ngo=new DonationManager;
		$ngo->viewDonations();
	}
	else if($_POST["arrange_pickup"]){
		$ngo=new DonationManager;
		$ngo->viewVolunteer();
		
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