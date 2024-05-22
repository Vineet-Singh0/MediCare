<?php 

if(isset($_POST['submit'])){
	session_start();
	
	require "conn.php";
	
	
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$location = $_POST['location'];
	
	$sql = "UPDATE suppliers SET
	
	name = '$name',
	email = '$email',
	location = '$location'
	
	WHERE id = $id
	
	";
	
	$res = mysqli_query($conn, $sql);

		if ($res = true){
			$_SESSION['updated_supplier'] = "<div class='alert alert-success'>Item Updated successifuly </div>";
							header ("Location:../suppliers.php");
	}else{
		$_SESSION['failed_item'] = "<div class='alert alert-danger'> Failed to Update Item </div>";
		header ("Location:../suppliers.php");
		}

}
	
?>

						
						