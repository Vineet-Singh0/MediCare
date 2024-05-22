<?php 
  session_start();
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
    <!-- Main Styling -->
    <link href="../assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5" rel="stylesheet" />

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  </head>

  <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
    
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
              <li class="text-sm leading-normal">
                <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
              </li>
              <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Patients</li>
            </ol>
            <h6 class="mb-0 font-bold capitalize">Patients</h6>
          </nav>

          <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
              <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
                <span class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                  <i class="fas fa-search" aria-hidden="true"></i>
                </span>
                <input type="text" id="search" class="pl-8.75 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Type here..." />
              </div>
            </div>
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
              <!-- online builder btn  -->
              <!-- <li class="flex items-center">
                <a class="inline-block px-8 py-2 mb-0 mr-4 text-xs font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro border-fuchsia-500 ease-soft-in hover:scale-102 active:shadow-soft-xs text-fuchsia-500 hover:border-fuchsia-500 active:bg-fuchsia-500 active:hover:text-fuchsia-500 hover:text-fuchsia-500 tracking-tight-soft hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
              </li> -->
              <li class="flex items-center">
                <a href="../index.php" class="block px-0 py-2 text-sm font-semibold transition-all ease-nav-brand text-slate-500">
                  <i class="fa fa-user sm:mr-1" aria-hidden="true"></i>
                  <span class="hidden sm:inline">Sign In</span>
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
              <li class="flex items-center px-4">
                <a href="javascript:;" class="p-0 text-sm transition-all ease-nav-brand text-slate-500">
                  <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog" aria-hidden="true"></i>
                  <!-- fixed-plugin-button-nav  -->
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <div class="flex flex-wrap -mx-3">
        
          <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <?php 
                        if (isset($_SESSION['stock-exceeds'])) {
                            echo $_SESSION['stock-exceeds'];
                            unset ($_SESSION['stock-exceeds']);
                        }
               ?>
			    <?php 
                        if (isset($_SESSION['stock-exceeds'])) {
                            echo $_SESSION['stock-exceeds'];
                            unset ($_SESSION['stock-exceeds']);
                        }
               ?>
            <?php 
                        if (isset($_SESSION['prescriptionSuccess'])) {
                            echo $_SESSION['prescriptionSuccess'];
                            unset ($_SESSION['prescriptionSuccess']);
                        }
               ?>
			    <?php 
                        if (isset($_SESSION['prescriptionSuccess'])) {
                            echo $_SESSION['prescriptionSuccess'];
                            unset ($_SESSION['prescriptionSuccess']);
                        }
               ?>
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
                      <tbody id="output">
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

  <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.js"></script>
	<script type="text/javascript">
  $(document).ready(function(){
    $("#search").keypress(function(){
      $.ajax({
        type:'POST',
        url:'includes/action.php',
        data:{
          name:$("#search").val(),
        },
        success:function(data){
          $("#output").html(data);
        }
      });
    });
  });
</script>

  </html>
