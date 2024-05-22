<?php 
    require "includes/conn.php";
    //include "includes/auth.php";
  $today = date("Y-m-d", strtotime(date("Y-m-d")));
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
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

  <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
    <!-- sidenav  -->
    
  <?php
   require "includes/sidebar.php";
  ?>
    <!-- end sidenav -->

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
      <!-- Navbar -->
      <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
          <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
              <li class="text-sm leading-normal">
                <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
              </li>
              <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="mb-0 font-bold capitalize">Dashboard</h6>
          </nav>

          <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
              
            </div>
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
             
              <li class="flex items-center">
                <a href="includes/logout.php" class="block px-0 py-2 text-sm font-semibold transition-all ease-nav-brand text-slate-500">
                  <i class="fa fa-user sm:mr-1"></i>
                  <span class="hidden sm:inline">Sign out</span>
                </a>
              </li>
              <li class="flex items-center pl-4 xl:hidden">
                <a href="javascript:;" class="block p-0 text-sm transition-all ease-nav-brand text-slate-500" sidenav-trigger>
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

      <!-- end Navbar -->

      <!-- cards -->
      <div class="w-full px-6 py-6 mx-auto">
        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3">
          <!-- card1 -->
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-sm font-semibold leading-normal">Today's Money</p>
                      <?php 
                      $sql ="SELECT SUM(payment) as 'payment' FROM payments WHERE pdate = '$today'";
                        //create a query that fetch data from the database
                        $res = mysqli_query($conn,$sql);
                        $data = mysqli_fetch_array($res);	
									   ?>
                      <h5 class="mb-0 font-bold">
                      <?php echo $data['payment'];?>
                        <span class="text-sm leading-normal font-weight-bolder text-lime-500">
                        <?php 
                          $ttotal = $data['payment'];
                          $pttotal  = $ttotal * 10 / 100;
                        ?> 
                        <?php echo $pttotal;?>%</span>
                      </h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-green-600 to-lime-400">
                      <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- card2 -->
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-sm font-semibold leading-normal">Today's Patients</p>
                      <?php 
                      $sql ="SELECT COUNT(name) as 'name' FROM patients WHERE rdate = '$today'";
                        //create a query that fetch data from the database
                        $res = mysqli_query($conn,$sql);
                        $data = mysqli_fetch_array($res);	
									   ?>
                      <h5 class="mb-0 font-bold">
                      <?php echo $data['name'];?>
                      <span class="text-sm leading-normal font-weight-bolder text-lime-500">
                        <?php 
                          $ttotal = $data['name'];
                          $pttotal  = $ttotal * 10 / 100;
                        ?> 
                        <?php echo $pttotal;?>%</span>
                      </h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-green-600 to-lime-400">
                      <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- card3 -->
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-sm font-semibold leading-normal">Suppliers</p>
                      <?php 
                      $sql ="SELECT COUNT(name) as 'name' FROM suppliers";
                        //create a query that fetch data from the database
                        $res = mysqli_query($conn,$sql);
                        $data = mysqli_fetch_array($res);	
									   ?>
                      <h5 class="mb-0 font-bold">
                      <?php echo $data['name'];?>
                    <span class="text-sm leading-normal font-weight-bolder text-lime-500">
                        <?php 
                          $ttotal = $data['name'];
                          $pttotal  = $ttotal * 10 / 100;
                        ?> 
                        <?php echo $pttotal;?>%</span>
                      </h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-green-600 to-lime-400">
                      <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- card4 -->
          <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-sm font-semibold leading-normal">Total Sales</p>
                      <?php 
                      $sql ="SELECT SUM(payment) as 'payment' FROM payments";
                        //create a query that fetch data from the database
                        $res = mysqli_query($conn,$sql);
                        $data = mysqli_fetch_array($res);	
									   ?>
                      <h5 class="mb-0 font-bold">
                      <?php echo $data['payment'];?>
                      <span class="text-sm leading-normal font-weight-bolder text-lime-500">
                        <?php 
                          $ttotal = $data['payment'];
                          $pttotal  = $ttotal * 10 / 100;
                        ?> 
                        <?php echo $pttotal;?>%</span>
                      </h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-green-600 to-lime-400">
                      <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- charts -->
       

        <!-- cards row 4 -->

        <div class="w-full px-6 py-6 mx-auto">
          <!-- table 1 -->
  
          <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
              <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                  <h6>Patients table</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                  <div class="p-0 overflow-x-auto">
                  <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                      <thead class="align-bottom">
                        <tr>
                          <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Patients Info</th>
                          <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Phone No.</th>
                          <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Date of Birth</th>
                          <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Location</th>
                          <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                        </tr>
                      </thead>
                      <?php 
                      require "includes/conn.php";
                             $sql ="SELECT * FROM patients";
                                                    //create a query that fetch data from the database
                                                    $res = mysqli_query($conn,$sql);
                    
                                                    //check if there are any records in the database
                                                    if ($res == TRUE) {
                                                        $count = mysqli_num_rows($res);
                                                        $sn=1;
                                                        if($count > 0){
                                                            while ($rows=mysqli_fetch_assoc($res)) {
                                                                $id = $rows['id'];
                                                                $name=$rows['name'];
                                                                $dob=$rows['dob'];
                                                                $phone=$rows['phone'];
                                                                $location=$rows['location'];
                                                                $balance=$rows['balance'];
                                                                $email=$rows['email'];
                                                                $conditions=$rows['conditions'];
                                                                $ocondition = $rows['ocondition'];
                                                                $allergic = $rows['allergic'];
                                                               
                                                           ?>
                      <tbody>
                        <tr>
                          <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 py-1">
                             
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-sm leading-normal"><?php echo $name;?></h6>
                                <p class="mb-0 text-xs leading-tight text-slate-400"><?php echo $email;?></p>
                              </div>
                            </div>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight"><?php echo $phone;?></p>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight"><?php echo $dob;?></p>
                          </td>
                          <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <span class="px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-slate-400">
                              <?php echo $location;?>
                            </span>
                          </td>
                          
                          <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <a href="updatePatient.php?id=<?php echo $id;?>" class="text-xs font-semibold leading-tight text-slate-400"> Edit </a>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <a href="profile.php?id=<?php echo $id;?>" class="text-xs font-semibold leading-tight text-slate-400"> View </a>
                          </td>
                        </tr>
                      </tbody>
                      <?php
                                    }
                                  }
                                }
                                ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
          <!-- card 2 -->
  
        </div>

        <footer class="pt-4">
          <div class="w-full px-6 mx-auto">
            <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
              <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                  ©
                  <script>
                    document.write(new Date().getFullYear() + ",");
                  </script>
                  made with <i class="fa fa-heart"></i> by
                  <a href="https://www.creative-tim.com" class="font-semibold text-slate-700" target="_blank">MediCare</a>
                </div>
              </div>
              
            </div>
          </div>
        </footer>
      </div>
      <!-- end cards -->
    </main>
 
  </body>
  <!-- plugin for charts  -->
  <script src="../assets/js/plugins/chartjs.min.js" async></script>
  <!-- plugin for scrollbar  -->
  <script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
  <!-- github button -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</html>
