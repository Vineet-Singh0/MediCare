<?php 
                      require "conn.php";
                      $sql = "SELECT * FROM drugs WHERE name LIKE '%".$_POST['name']."%'";
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
                                  $type=$rows['type'];
                                  $supplier=$rows['supplier'];
                                  $sPrice=$rows['sPrice'];
                                  $bPrice=$rows['bPrice'];
                                  $profit=$rows['profit'];
                                  $stock=$rows['stock'];
                                  $expiryDate=$rows['expiryDate'];
                                  $today = date("Y-m-d", strtotime(date("Y-m-d")));
                                                             
                              ?>
                        <tr>
                          <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 py-1">
                             
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-sm leading-normal"><?php echo $name;?></h6>
                                <p class="mb-0 text-xs leading-tight text-slate-400"><?php echo $type;?></p>
                              </div>
                            </div>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight">Ksh.<?php echo $sPrice;?></p>
                          </td>
                          <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <?php 
                              if ($expiryDate < $today) {
                                ?>
                                <span class="bg-gradient-to-tl from-red-600 to-red-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                  <?php echo $expiryDate;?>
                                </span>
                                <?php
                              }else {
                                ?>
                                <span class="bg-gradient-to-tl from-green-600 to-lime-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                  <?php echo $expiryDate;?>
                                </span>
                                <?php
                              }
                            ?>
                            
                          </td>
                          <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <span class="text-xs font-semibold leading-tight text-slate-400"><?php echo $stock;?></span>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <a href="updatedrugs.php?id=<?php echo $id;?>" class="text-xs font-semibold leading-tight text-slate-400"> Edit </a>
                          </td>
                          
                        </tr>
                      <?php
                                    }
                                  }else {
                                    echo "No Suggestion!!";
                                  }

                                }
                                ?>