<?php
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
require_once(COMPONENTS_DIR."/auth_guru.php");
require_once(COMPONENTS_DIR."/config.php");
?>
<?php
// DECLARING GLOBAL VARIABLE START
$dbObj = new DatabaseMySqli();
$conn = $dbObj->getConnection();
// DECLARING GLOBAL VARIABLE END
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.4.0/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="css/sidebar.css"/>
    
    <!-- Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />

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
    </style>

</head>

<body id="body-pd" style="background-color:#ffff;">
    <header class="header" id="header" style="background-color:#ffff;">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="dashboard.php" class="nav_link"> <i class="fa-solid fa-house"></i><span class="nav_logo-name">E - HEALTH</span> </a>
                <div class="nav_list"> <a href="dashboard.php" class="nav_link "> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                <a href="urus2.php" class="nav_link "> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Pengesahan Pelajar</span> </a>
                <a href="senarai.php" class="nav_link active"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Cetak pelajar</span> </a> </div>
            </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Log Keluar</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-900" style="background-color:#ffff;">
    <div class="text-center">
          <img src="images/logoremove.png" alt="Logo" width="250" height="85" class="img-fluid">
        <img src="images/logo2remove.png" alt="Logo" width="260" height="100" class="img-fluid">
</div>

    <p class="display-4 text-center" >Cetak Maklumat pelajar</p>

    
    <!--<table border="0" cellspacing="5" cellpadding="5" class="d-print-none">
        <tbody><tr>
            <td>Minimum date:</td>
            <td><input type="text" id="min" name="min" class="d-print-none"></td>
        </tr>
        <tr>
            <td>Maximum date:</td>
            <td><input type="text" id="max" name="max" class="d-print-none"></td>
        </tr>
    </tbody></table>-->
    <!--<button class="btn btn-outline-primary d-print-none" onclick="window.print()"><i class="fa-solid fa-print"></i>&nbsp;Cetak</button>-->
   
    <div class="mycontainer">
    <div class="table-responsive">
            <table id="example" class="display" style="width:100%">
            <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No. Kad Pengenalan</th>
                    <th>Program</th>
                    <th>Tahun</th>	
			        <th>Waktu Janji Temu</th>
			        <th>Tarikh Janji Temu</th>
                    <th>No Telefon Pelajar</th>
					<th>No Telefon Penjaga</th>
					<th>Sebab</th>
			        <th>Status</th>
			        
                
                </thead>
                <tbody>
                        <!-- loading all leave applications from database -->
                        <?php
                                require_once(COMPONENTS_DIR."/config.php");
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
                                            <td>{$row['notel']}</td>
                                            <td>{$row['notelpen']}</td>
                                            <td>{$row['sebab']}</td>
                                            <td>{$row['status']}</td>
                                          
                                                    
                                                  </tr>";  
                                         $cnt++; }       
                                    }
                                }
                                else{
                                    echo "Query Error : " . "SELECT * FROM janjitemu WHERE status='dalam proses'" . "<br>" . mysqli_error($conn);
                                }
							
                       ?> 
                    
                </tbody>
            </table>
    </div>

    <footer class="footer navbar navbar-expand-lg navbar-light bg-light" style="color:white;">
    <div>

      
    </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script src= "https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src= "https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
		<script src= "https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src= "https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src= "https://cdn.datatables.net/datetime/1.4.0/js/dataTables.dateTime.min.js"></script>
        <script src= ""></script>
        <script src= "https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
        <script src ="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
        <script src=""></script>

        <script>
            
       </script>
		
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <script src="js/sidebar.js"></script>
 <script>
    function showData(dataArray){
        //Create date input
        var minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(
     function( settings, data, dataIndex ) {
         var min = minDate.val();
         var max = maxDate.val();
         var date = new Date( data[4] );
  
         if (
             ( min === null && max === null ) ||
             ( min === null && date <= max ) ||
             ( min <= date   && max === null ) ||
             ( min <= date   && date <= max )
         ) {
             return true;
         }
         return false;
     }
 );
    }
    $(document).ready(function() {
        // Create date inputs
     minDate = new DateTime($('#min'), {
         format: 'MMMM Do YYYY'
     });
     maxDate = new DateTime($('#max'), {
         format: 'MMMM Do YYYY'
     });
       
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
    // Refilter the table
    $('#min, #max').on('change', function () {
         table.draw();
     });
} );
 </script>
 
</body>

</html>
<?php include(COMPONENTS_DIR . "/footer.php");?>
<?php


ini_set('display_errors', true);
error_reporting(E_ALL);
?>