<?php
    require "conn.php";
if (isset($_POST['submit'])) {
    //echo "I was clicked";

    $drugName = $_POST['drugName'];
    $type = $_POST['type'];
    $buyingPrice = $_POST['buyingPrice'];
    $sellingPrice = $_POST['sellingPrice'];
    $profit = $_POST['profit'];
    $stock = $_POST['stock'];
    $supplier = $_POST['supplier'];


    //echo $drugName;
    //echo $type;
   // echo $buyingPrice;
   // echo $sellingPrice;
    //echo $profit;
    //echo $drugName;

    $sql = "INSERT INTO products SET 
        name = '$drugName',
        type = '$type',
        bPrice = '$buyingPrice',
        sPrice = '$sellingPrice',
        profit = '$profit',
        supplier = '$supplier',
        stock = '$stock'

    ";
    $res =mysqli_query($conn,$sql);
        if($res3 = true){
            $_SESSION['update'] = "<div class='alert alert-success'> Updated Succesifuly</div>
            ";
            header("Location:../drugs.php");
        }else{
            $_SESSION['failed'] = "<div class='alert alert-danger'> Failed to Update</div>
            ";
            header("Location:../drugs.php");
        }
}