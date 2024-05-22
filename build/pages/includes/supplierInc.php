<?php
    require "conn.php";
if (isset($_POST['submit'])) {
    //echo "I was clicked";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    //echo $drugName;
    //echo $type;
   // echo $buyingPrice;
   // echo $sellingPrice;
    //echo $profit;
    //echo $drugName;

    $sql = "INSERT INTO suppliers SET 
        name = '$name',
        email = '$email',
        phone = '$phone',
        location = '$location' 
    ";
    $res =mysqli_query($conn,$sql);
        if($res3 = true){
            $_SESSION['update'] = "<div class='alert alert-success'> Updated Succesifuly</div>
            ";
            header("Location:../suppliers.php");
        }else{
            $_SESSION['failed'] = "<div class='alert alert-danger'> Failed to Update</div>
            ";
            header("Location:../suppliers.php");
        }
}