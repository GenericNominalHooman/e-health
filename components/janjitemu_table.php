<?php
// Janji temu table with search functionality

// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/hospital/site_config.php");
?>
<?php
require_once(COMPONENTS_DIR."/models.php");
$modelsFactory = new ModelsFactory();
$janjitemuModel = $modelsFactory->createJanjitemuModel();

?>
<table id="myTable"  class="display table table-bordered table-hover table-striped" style="border-color:darkblue;">

<thead>
    <th>No</th>
    <th>Nama</th>
    <th>No. Kad Pengenalan</th>
    <th>Program</th>
    <th>Tahun</th>	
    <th>Waktu Janji Temu</th>
    <th>Tarikh Janji Temu</th>
    <th>Sebab</th>
    <th>Status</th>
    <th>Butang Aksi</th>
</thead>
<tbody>
        <!-- loading all leave applications from database -->
        <?php

                global $row;
                $query = $janjitemuModel->getAllJanjiTemu();
                $numrow = sizeof($query);

               if($query){
                    
                    if($numrow!=0){
                         $cnt=0;

                          while($cnt<$numrow){
                            $row = $query[$cnt];
                            
                            echo "<tr>
                                    <td>$cnt</td>
                                    <td>{$row['nama']}</td>
                                    <td>{$row['nokp']}</td>
                                    <td>{$row['program']}</td>
                                    <td>{$row['tahun']}</td>
                                    <td>{$row['waktu']}</td>
                                    <td>{$row['tarikh']}</td>
                                    <td>{$row['sebab']}</td>
                                    <td>{$row['status']}</td>
                          
                                    <td><a href=\"updateStatusAccept.php?id_janjitemu={$row['id_janjitemu']}\"><button class='btn btn-sm btn-outline-success' ><i class='fa-solid fa-check'></i></button></a>
                                    <a href=\"updateStatusReject.php?id_janjitemu={$row['id_janjitemu']}\"><button class='btn btn-sm btn-outline-danger' ><i class='fa-solid fa-xmark'></i></button></a>
                                    <a href=\"butiran.php?id_janjitemu={$row['id_janjitemu']}\"><button class='btn btn-sm btn-outline-primary' ><i class='fas fa-eye'></i></button></a></td>						
                                  </tr>";  
                         $cnt++; }       
                    }
                }
                else{
                    echo "Query Error : " . "SELECT * FROM janjitemu WHERE status='pending'" . "<br>" . mysqli_error($conn);
                }
            
       ?> 
    
</tbody>
</table>