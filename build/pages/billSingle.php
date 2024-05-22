<?php 
  session_start();
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //echo $id;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>MediCare</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="../assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5" rel="stylesheet" />
    
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  </head>

  <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">

  <?php
   require "includes/sidebar.php";
  ?>

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
      <!-- Navbar -->
      <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
          <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
              <li class="leading-normal text-sm">
                <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
              </li>
              <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Billing</li>
            </ol>
            <h6 class="mb-0 font-bold capitalize">Billing</h6>
          </nav>

          <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
              
            </div>
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
              <!-- online builder btn  -->
              <!-- <li class="flex items-center">
                <a class="inline-block px-8 py-2 mb-0 mr-4 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro border-fuchsia-500 ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs text-fuchsia-500 hover:border-fuchsia-500 active:bg-fuchsia-500 active:hover:text-fuchsia-500 hover:text-fuchsia-500 tracking-tight-soft hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
              </li> -->
              <li class="flex items-center">
                <a href="../includes/logout.php" class="block px-0 py-2 font-semibold transition-all ease-nav-brand text-sm text-slate-500">
                  <i class="fa fa-user sm:mr-1" aria-hidden="true"></i>
                  <span class="hidden sm:inline">Sign Out</span>
                </a>
              </li>
              <li class="flex items-center pl-4 xl:hidden">
                <a href="javascript:;" class="block p-0 transition-all ease-nav-brand text-sm text-slate-500" sidenav-trigger>
                  <div class="w-4.5 overflow-hidden">
                    <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                    <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                    <i class="ease-soft relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                  </div>
                </a>
              </li>
              

            </ul>
          </div>
        </div>
      </nav>

      <div class="w-full px-6 py-6 mx-auto">
        <!-- content -->

        <div class="flex flex-wrap -mx-3">
          <div class="w-full max-w-full px-3 mt-6 md:w-7/12 md:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
            
              <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                <h6 class="mb-0">Pay Bill</h6>
              </div>
              <div class="flex-auto p-4 pt-6">
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                  
                <?php 
                  require "includes/conn.php";
                  $sql ="SELECT * FROM sales WHERE pid = $id LIMIT 1";
                  //create a query that fetch data from the database
                  $res = mysqli_query($conn,$sql);
                    
                  //check if there are any records in the database
                  if ($res == TRUE) {
                      $count = mysqli_num_rows($res);
                      $sn=1;
                      if($count > 0){
                          while ($rows=mysqli_fetch_assoc($res)) {
                              $id = $rows['pid'];
                              $name=$rows['name'];
                              $dos=$rows['dos'];
                              $total=$rows['total'];                              
                              $balance=$rows['balance'];                              
                                ?>
                <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50">
                    <div class="flex flex-col">
                      <h6 class="mb-4 leading-normal text-sm"><?php echo $name;?></h6>
                      <span class="mb-2 leading-tight text-xs">Date of Service: <span class="font-semibold text-slate-700 sm:ml-2"><?php echo $dos;?></span></span>
                      <?php 
                        $sql ="SELECT SUM(total) as 'total' FROM sales WHERE pid = $id";
                        //create a query that fetch data from the database
                        $res = mysqli_query($conn,$sql);
                        $data = mysqli_fetch_array($res);	
                             ?>
                      <span class="leading-tight text-xs">Total Bill: <span class="font-semibold text-slate-700 sm:ml-2">Rs. <?php echo $data['total'];?></span></span>
                      <?php 
                        $sql ="SELECT balance as 'balance' FROM sales WHERE pid = $id ORDER BY id DESC LIMIT 1";
                        //create a query that fetch data from the database
                        $res = mysqli_query($conn,$sql);
                        $datab = mysqli_fetch_array($res);	
                        
                             ?>
                      <span class="leading-tight text-xs">Balance: <span class="font-semibold text-slate-700 sm:ml-2">Rs. 
                        <?php 
                        $value1 = $datab['balance'];
                        $value2 = $data['total'];
                        $balance = $value2 - $value1;
                        echo $value1;
                        ?></span></span>
                    </div>
                    <div class="ml-auto text-right">
                      <a class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 bg-gradient-to-tl from-green-600 to-lime-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text" href="billSingle.php?id=<?php echo $id;?>"></i>
                      
                    </a>
                     
                    </div>
                  </li>
                  <?php
                                    }
                                  }
                                }
                                ?>
                  <form action="includes/pay.php" method="post">
                  <div class="mb-4">
                      <input type="text" name="amount" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Amount" aria-label="Name" aria-describedby="email-addon" />
                    </div>
                  <div class="mb-4">
                      <input type="text" name="item" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Item" aria-label="Name" aria-describedby="email-addon" />
                    </div>
                  <div class="mb-4">
                      <input type="text" name="pmethod" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Payment Method" aria-label="Name" aria-describedby="email-addon" />
                    </div>
                  <div class="mb-4">
                      <input type="text" name="comment" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Comment" aria-label="Name" aria-describedby="email-addon" />
                      <input type="hidden" name="total" value="<?php echo $data['total'];?>" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Comment" aria-label="Name" aria-describedby="email-addon" />
                      <input type="hidden" name="balance" value="<?php echo $datab['balance'];?>" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Comment" aria-label="Name" aria-describedby="email-addon" />
                      <input type="hidden" name="pid" value="<?php echo $id;?>" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Comment" aria-label="Name" aria-describedby="email-addon" />
                    </div>
                    
                    <div class="text-center">
                      <button type="submit" name="submit" class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-green-600 to-lime-400 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Pay</button>
                    </div>
                  </form>
                  <div class="flex justify-between p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                <h6 class="mb-10">Payment History</h6>
                <a href="receipt.php?id=<?php echo $id?>" class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-md ease-soft-in bg-150 bg-gradient-to-tl from-green-600 to-lime-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text" href="billSingle.php?id=<?php echo $id;?>"></i>
                      Print Receipt
                    </a>
                    </div>
                  <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                  
                <?php 
                  require "includes/conn.php";
                  $sql ="SELECT * FROM payments WHERE pid = $id ORDER BY id DESC";
                  //create a query that fetch data from the database
                  $res = mysqli_query($conn,$sql);
                    
                  //check if there are any records in the database
                  if ($res == TRUE) {
                      $count = mysqli_num_rows($res);
                      $sn=1;
                      if($count > 0){
                          while ($rows=mysqli_fetch_assoc($res)) {
                              $payment = $rows['payment'];
                              $pmethod=$rows['pmethod'];
                              $comment=$rows['comment'];
                              $pdate=$rows['pdate'];                              
                                                          
                                ?>
                <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg- shadow-soft-xl">
                    <div class="flex flex-col">
                      <h6 class="mb-4 leading-normal text-sm"><?php echo $pmethod;?></h6>
                      <span class="mb-2 leading-tight text-xs">Payment Date: <span class="font-semibold text-slate-700 sm:ml-2"><?php echo $pdate;?></span></span>
                      
                      <span class="leading-tight text-xs">Payment: <span class="font-semibold text-slate-700 sm:ml-2">Rs. <?php echo $payment;?></span></span>
                    </div>
                    <div class="ml-auto text-right">
                      <a class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 bg-gradient-to-tl from-green-600 to-lime-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text" href="billSingle.php?id=<?php echo $id;?>"></i>
                      
                    </a>
                      <a class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700" href="#">...</a>
                    </div>
                  </li>
                  <?php
                                    }
                                  }else{
                                    echo "Nothing to show here.. Make payments and then check later";
                                  }
                                }
                                ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="w-full max-w-full px-3 mt-6 md:w-5/12 md:flex-none">
            <div class="relative flex flex-col h-full min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                <div class="flex flex-wrap -mx-3">
                  <div class="max-w-full px-3 md:w-1/2 md:flex-none">
                    <h6 class="mb-0">Bill Breakdown</h6>
                  </div>
                  <div class="flex space-x-2 items-center justify-end max-w-full px-3 md:w-1/2 md:flex-none">
                    <span class="mr-2 font-semibold">Dos</span>
                    <i class="mr-2 far fa-calendar-alt"></i>
                    <small><?php echo $dos;?></small>
                  </div>
                </div>
              </div>
              <div class="flex-auto p-4 pt-6">
               
                <h6 class="my-4 font-bold leading-tight uppercase text-xs text-slate-500">Services</h6>
                <?php 
                  require "includes/conn.php";
                  $sql ="SELECT * FROM sales WHERE pid = $id LIMIT 1";
                  //create a query that fetch data from the database
                  $res = mysqli_query($conn,$sql);
                    
                  //check if there are any records in the database
                  if ($res == TRUE) {
                      $count = mysqli_num_rows($res);
                      $sn=1;
                      if($count > 0){
                          while ($rows=mysqli_fetch_assoc($res)) {
                              $id = $rows['pid'];
                              $labFee=$rows['labFee'];                              
                              $consultation=$rows['consultation'];                            
                                ?>
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                  <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 rounded-t-inherit text-inherit rounded-xl">
                    <div class="flex items-center">
                      <button class="leading-pro ease-soft-in text-xs bg-150 w-6.35 h-6.35 p-1.2 rounded-3.5xl tracking-tight-soft bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-lime-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-lime-500 transition-all hover:opacity-75"><i class="fas fa-arrow-up text-3xs"></i></button>
                      <div class="flex flex-col">
                        <h6 class="mb-1 leading-normal text-sm text-slate-700">Consultation</h6>
                      </div>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                      <p class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 text-sm bg-clip-text">Rs. <?php echo $consultation;?></p>
                    </div>
                  </li>
                  <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 border-t-0 text-inherit rounded-xl">
                    <div class="flex items-center">
                      <button class="leading-pro ease-soft-in text-xs bg-150 w-6.35 h-6.35 p-1.2 rounded-3.5xl tracking-tight-soft bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-lime-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-lime-500 transition-all hover:opacity-75"><i class="fas fa-arrow-up text-3xs"></i></button>
                      <div class="flex flex-col">
                        <h6 class="mb-1 leading-normal text-sm text-slate-700">Lab</h6>
                      </div>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                      <p class="relative line-through z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 text-sm bg-clip-text">Rs. <?php echo $labFee;?></p>
                    </div>
                  </li>
                  <?php
                     }
                   }
                 }
                 ?>
              <h6>Drugs</h6>
              <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
                <?php 
                  require "includes/conn.php";
                  $sql ="SELECT * FROM sales WHERE pid = $id";
                  //create a query that fetch data from the database
                  $res = mysqli_query($conn,$sql);
                    
                  //check if there are any records in the database
                  if ($res == TRUE) {
                      $count = mysqli_num_rows($res);
                      $sn=1;
                      if($count > 0){
                          while ($rows=mysqli_fetch_assoc($res)) {
                              $id = $rows['pid'];
                              $drug=$rows['drug'];
                              $sprice=$rows['sprice'];                              
                              $qty=$rows['qty'];                              
                              $labFee=$rows['labFee'];                              
                              $consultation=$rows['consultation'];
                              $price = $sprice * $qty;                              
                                ?>
                  <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 border-t-0 text-inherit rounded-xl">
                    <div class="flex items-center">
                      <button class="leading-pro ease-soft-in text-xs bg-150 w-6.35 h-6.35 p-1.2 rounded-3.5xl tracking-tight-soft bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-lime-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-lime-500 transition-all hover:opacity-75"><i class="fas fa-arrow-up text-3xs"></i></button>
                      <div class="flex flex-col">
                        <h6 class="mb-1 leading-normal text-sm text-slate-700"><?php echo $drug;?></h6>
                      </div>
                    </div>
                  </li>
                  <?php
                     }
                   }
                 }
                 ?>
                </ul>
                
              </div>
            </div>
          </div>
        </div>

        <footer class="pt-4">
          <div class="w-full px-6 mx-auto">
            <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
              <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                <div class="leading-normal text-center text-sm text-slate-500 lg:text-left">
                  ©
                  <script>
                    document.write(new Date().getFullYear() + ",");
                  </script>
                  made with <i class="fa fa-heart"></i> by
                  <a href="https://www.creative-tim.com" class="font-semibold text-slate-700" target="_blank">MediCare</a>
                  
                </div>
              </div>
              <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                  
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </main>
    <div fixed-plugin>
      <a fixed-plugin-button class="bottom-7.5 right-7.5 text-xl z-990 shadow-soft-lg rounded-circle fixed cursor-pointer bg-white px-4 py-2 text-slate-700">
        <i class="py-2 pointer-events-none fa fa-cog"> </i>
      </a>
    </div>
  </body>
  <!-- plugin for scrollbar  -->
  <script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
  <!-- github button -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</html>
