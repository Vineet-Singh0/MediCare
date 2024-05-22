<?php

session_start();

require "conn.php";
if(isset($_POST['submit'])){
	//echo "Was clicked";
	
	$name = $_POST['name'];
	$dob = $_POST['dob'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$location = $_POST['location'];
	$allergic = $_POST['allergic'];
	$condition = $_POST['condition'];
	$ocondition = $_POST['ocondition'];

    
	
	$sql = "INSERT INTO patients SET
	name = '$name',
	dob = '$dob',
	email = '$email',
	phone = '$phone',
	allergic = '$allergic',
	conditions = '$condition',
	ocondition = '$ocondition',
	location = '$location'

	";

	$res = mysqli_query ($conn, $sql);
	if($res = true){
		
		$_SESSION['success'] = "<div class='alert alert-success'> Added Successifuly</div>";
                        header ("Location:../patients.php");
	} 
	}else{
		$_SESSION['failed'] = "<div class='alert alert-success'> Failed to Add</div>";
                        header ("Location:../patients.php");

	}
	

