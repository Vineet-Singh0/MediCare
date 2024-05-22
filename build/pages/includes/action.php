
<?php

// Create connection
require "conn.php";

?>

  <?php 
                      require "conn.php";
                      $sql = "SELECT * FROM patients WHERE name LIKE '%".$_POST['name']."%'";
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
                      <?php
                                    }
                                  }else {
                                    echo "No records";
                                  }
                                }
                                ?>