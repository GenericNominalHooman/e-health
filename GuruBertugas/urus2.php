<?php
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once($_SERVER["DOCUMENT_ROOT"] . "/hospital/site_config.php");
?>
<?php
require_once("config.php");

/*if(!isset($_SESSION["gurubertugas"])){
  header("Location: gurubertugashome.php");
}*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-HEALTH</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
    <link rel="stylesheet" href="https://kit.fontawesome.com/c7ad192f5f.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link rel="stylsheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="css/sidebar.css"/>
    

    <style>
        h1 {
            text-align: center;
            font-size: 2.5em;
            font-weight: bold;
            padding-top: 1em;
        }

        .mycontainer {
            width: 90%;
            margin: 1.5rem auto;
            min-height: 60vh;
        }

        .mycontainer table {
            margin: 1.5rem auto;
        }
        table:hover{
            background-color:aliceblue;
        }
        
    </style>

</head>


<body id="body-pd" style="background-color:aliceblue;">
    <header class="header" id="header" style="background-color:aliceblue;">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="dashboard.php" class="nav_link"> <i class="fa-solid fa-house"></i><span class="nav_logo-name">E - HEALTH</span> </a>
                <div class="nav_list"> <a href="dashboard.php" class="nav_link "> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                <a href="urus2.php" class="nav_link active"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Pengesahan Pelajar</span> </a><a href="senarai.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Cetak pelajar</span> </a> </div>
            </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Log Keluar</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-900" style="background-color:aliceblue;">
    <div class="text-center">
          <img src="images/logoremove.png" alt="Logo" width="250" height="85" class="img-fluid">
        <img src="images/logo2remove.png" alt="Logo" width="260" height="100" class="img-fluid">
</div>

    

    <div class="mycontainer">
         <p class="display-3 text-center" >Urusan maklumat pelajar</p>
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
                                $query = mysqli_query($conn,"SELECT * FROM janjitemu");
                                
                                $numrow = mysqli_num_rows($query);

                               if($query){
                                    
                                    if($numrow!=0){
                                         $cnt=1;

                                          while($row = mysqli_fetch_assoc($query)){
                                           
                                            
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
    </div>
    <script src= "https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src= "https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
		<script src= "https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
		<script src ="https://cdn.datatables.net/datetime/1.3.1/css/dataTables.dateTime.min.css"></script>
		<script src ="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
		<script src ="https://cdn.datatables.net/datetime/1.3.1/js/dataTables.dateTime.min.js"></script>
		<script src="./js/sidebar.js"></script>

		<script src="./js/app.js"></script>
		<script>
            $(document).ready(function () {
                $('#example').DataTable();
                    });
                    let table = new DataTable('#myTable');
        </script>
   
</body>

</html>

<?php

//include "footer.php";
ini_set('display_errors', true);
error_reporting(E_ALL);
?>
<?php include(COMPONENTS_DIR . "/footer.php");?>