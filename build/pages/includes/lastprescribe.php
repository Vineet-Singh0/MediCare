<?php

session_start ();
require "conn.php";

if(isset($_POST['submit'])){
	$pid = $_POST['id'];
	$name = $_POST['name'];
	$dosage = $_POST['dosage'];
	$consultation = $_POST['consultation'];
	$labFee = $_POST['labFee'];
	$total = $_POST['total'];
	//$pharmacy_Qty = $_POST['pharmacy_Qty'];
	$drug = $_POST['drug'];
	$sprice = $_POST['sprice'];
	$qty = $_POST['qty'];
	$stock = $_POST['stock'];
	$total = $_POST['total'];

	//echo "$dosage";
	//echo"<br>";
	//echo "$name";
	//echo"<br>";
	//echo "$pharmacy_Qty";
	//echo"<br>";
	//echo "$sprice";
	//echo"<br>";
	//echo "$medicine_name";
	//echo"<br>";
	//echo "$qty";
	//echo"<br>";
	

	//new pharmacy balance
	$new_balance = $stock - $qty;
	
	
	//echo "$new_balance";
	//check whether the pharmacy is stocked

	if ($stock <= 0) {
		$_SESSION['out-stock'] = "<div class='alert alert-danger'> The medicine is out of stock</div>";
						header ("Location:../patients.php");
						exit();

		//if the pharmacy is stocked insert the data collected to sales order
	}
	elseif ($stock < $qty) {
		$_SESSION['stock-exceeds'] = "<div class='bg-gradient-to-tl from-red-600 to-red-400 flex justify-center items-center text-white'> The Quantity Requested Exceeds the  Stock Available</div>";
						header ("Location:../patients.php");
						exit();
	}
	elseif ($stock > 0) {
		$sql = "INSERT INTO sales SET
	
	pid = '$pid',
	qty = '$qty',
	sprice = '$sprice',
	name = '$name',
	drug = '$drug',
	total= '$total',
	balance= '$total',
	consultation  = '$consultation',
	dosage  = '$dosage',
	labFee ='$labFee'

	";
	$res = mysqli_query($conn, $sql);

	if ($res = true) {
		$_SESSION ['sessionpatient'] = $pid;
	}
	}
	if($stock > 0 ){
		
		$sql2 = " UPDATE drugs SET
		
		stock = '$new_balance'
		WHERE name = '$drug';
		";
		$res2 = mysqli_query($conn, $sql2);

		if ($res2 = true) {
			$sql3 = "INSERT INTO payments SET
			pid = '$pid'
			
			";
		}
		$res3 = mysqli_query($conn, $sql3);
		if($res3 = true){
			$_SESSION['prescriptionSuccess'] = "<div class='py-4 bg-gradient-to-tl from-green-600 to-lime-400 flex justify-center items-center text-white'>That Was Successifull</div>
			";
			header("Location:../patients.php");
		}else{
			$_SESSION['failed'] = "<div class='alert alert-danger'> Failed to Update</div>
			";
			header("Location:../patients.php");
		}
	}
	

	
}


?>