<?php
session_start();
require "conn.php";
if(isset($_POST['submit'])){
	//echo "Was clicked";
    $id = $_POST['id'];
    
    $sql = "DELETE FROM suppliers WHERE id= $id";

    $res = mysqli_query ($conn, $sql);
	if($res = true){
		$_SESSION['Dsuccess'] = "<div class='py-4 bg-gradient-to-tl from-green-600 to-lime-400 flex justify-center items-center text-white'>That Was Successifull</div>
			";
         header ("Location:../suppliers.php");
	} 
	}else{
		$_SESSION['Dfailed'] = "<div class='alert alert-success'> Failed to Delete</div>";
                        header ("Location:../suppliers.php");

	}


    ?>