<?php
    if (isset($_GET['id'])) {
        $pid = $_GET['id'];
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MediCare</title>
    <meta name="robots" content="noindex, nofollow">
    <script src="https://cdn.tailwindcss.com/3.1.4"></script>
</head>

<body>

<div class="bg-white rounded-lg shadow-lg px-6 py-8 max-w-md mx-auto mt-16">
    <h1 class="font-bold text-2xl my-4 text-center uppercase text-green-600">MediCare</h1>
    <p class="flex justify-center text-gray-700">P.O Box 2300 20100</p>
    <p class="flex justify-center text-gray-700">0700 567 502</p>
    <hr class="mb-2">
    <div class="flex justify-between mb-6">
        <h1 class="text-lg font-bold">Receipt</h1>
    </div>
   
    <table class="w-full mb-8">
        <thead>
            <tr>
                <th class="text-left font-bold text-gray-700">Description</th>
                <th class="text-right font-bold text-gray-700">Amount</th>
            </tr>
        </thead>

        <?php
            require "includes/conn.php";
            $sql ="SELECT sales.pid, sales.name,payments.item,payments.pdate, payments.payment,payments.pmethod
            FROM sales 
            INNER JOIN payments ON sales.pid=payments.pid WHERE payments.pid ='$pid';";
                   //create a query that fetch data from the database
                    $res = mysqli_query($conn,$sql);
                    //check if there are any records in the database
                    if ($res == TRUE) {
                    $count = mysqli_num_rows($res);
                    $sn=1;
                    if($count > 0){
                    while ($rows=mysqli_fetch_assoc($res)) {
                    $pid = $rows['pid'];
                    $name = $rows['name'];
                    $pmethod = $rows['pmethod'];
                    $payment1=$rows['payment'];
                    $pdate=$rows['pdate'];
                    $item=$rows['item'];
                    
              ?>
        <tbody>
            <tr>
                <td class="text-left text-gray-700"><?php echo $item;?></td>
                <td class="text-right text-gray-700"><?php echo $payment1;?></td>
            </tr>
           
        </tbody>
        <?php
                          }
                         }
                     }
                  ?>
                  
        <tfoot>
            <tr>
                <td class="text-left font-bold text-gray-700">Total</td>
                <td class="text-right font-bold text-gray-700">
                    <?php 
                         $sql ="SELECT SUM(payment) as 'payment' FROM payments  WHERE pid ='$pid' ";
                         //create a query that fetch data from the database
                         $res = mysqli_query($conn,$sql);
                         $data = mysqli_fetch_array($res);
                    ?>
                    <?php echo $data['payment'];?>
                </td>
            </tr>
        </tfoot>
    </table>
    <hr class="mb-2">
    <div class="flex justify-between">
        <div class="text-gray-700">
                <div>Date: <?php echo $pdate;?></div>
                <div>Receipt #: Rept00<?php echo $pid;?></div>
            </div>
            <div class="mb-8 mt-4">
            <h2 class="text-lg font-bold mb-4">Customer Details:</h2>
            <div class="text-gray-700 mb-2"><?php echo $name;?></div>
            
        </div>
    </div>
</div>

</body>

</html>