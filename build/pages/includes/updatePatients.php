<?php 

if(isset($_POST['submit'])){
	session_start();
	
	require "conn.php";
	
    $id =  $_POST['id'];
    $name= $_POST['name'];
    $dob= $_POST['dob'];
    $phone= $_POST['phone'];
    $location= $_POST['location'];
    $email= $_POST['email'];
    $conditions= $_POST['conditions'];
    $ocondition =  $_POST['ocondition'];
    $allergic =  $_POST['allergic'];
	
	$sql = "UPDATE  patients SET
	
	name = '$name',
	dob = '$dob',
	phone = '$phone',
	location = '$location',
	email = '$email',
	conditions = '$conditions',
	allergic = '$allergic',
	ocondition = '$ocondition'
	WHERE id = $id
	
	";
	
	$res = mysqli_query($conn, $sql);

		if ($res = true){
			$_SESSION['updated_item'] = "<div class='alert alert-success'>Item Updated successifuly </div>";
							header ("Location:../patients.php");
	}else{
		$_SESSION['failed_item'] = "<div class='alert alert-danger'> Failed to Update Item </div>";
		header ("Location:../patients.php");
		}

}
	
?>

						
						