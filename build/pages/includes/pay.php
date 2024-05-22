<?php

session_start();

require "conn.php";
if(isset($_POST['submit'])){
	//echo "Was clicked";
	
	$pid = $_POST['pid'];
	$amount = $_POST['amount'];
	$balance = $_POST['balance'];
	$pmethod = $_POST['pmethod'];
	$comment = $_POST['comment'];
	$total = $_POST['total'];
	$item = $_POST['item'];
	$balance = floatval($_POST['balance']);
$amount = floatval($_POST['amount']);
$nBalance = $balance - $amount;


	
    echo $nBalance;

	$sql = "INSERT INTO payments SET

	balance = '$nBalance',
	pid = '$pid',
	payment = '$amount',
	comment = '$comment',
	item = '$item',
	pmethod = '$pmethod'
	
    
	";

	$res = mysqli_query ($conn, $sql);
	if ($res = true) {
        $sql2 = "UPDATE sales SET 
        balance = '$nBalance'
        WHERE pid = $pid
        ";
    }
    $res2 = mysqli_query ($conn, $sql2);
    if($res2 = true){
		
		$_SESSION['paysuccess'] = "<div class='py-4 bg-gradient-to-tl from-green-600 to-lime-400 flex justify-center items-center text-white'>That Was Successifull</div>";
                        header ("Location:../bill.php");
	} 
	}else{
		$_SESSION['failed'] = "<div class='alert alert-success'> Failed to Add</div>";
                        header ("Location:../bill.php");

	}
	

