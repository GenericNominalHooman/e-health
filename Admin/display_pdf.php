<?php
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once($_SERVER["DOCUMENT_ROOT"] . "/hospital/site_config.php");
?>
<?php
require_once(COMPONENTS_DIR."/auth_admin.php");
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
    <link rel="stylesheet" href="css/sidebar.css"/>
    <style media="screen">
      embed{
        border: 2px solid black;
        margin-top: 30px;
      }
      .div1{
        margin-left: 170px;
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
                <div class="nav_list"> <a href="dashboard.php" class="nav_link  "> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                <a href="jadual.php" class="nav_link "> <i class="fa-regular fa-calendar-days"></i><span class="nav_name">Jadual Guru Bertugas/span> </a>
                <a href="display_pdf.php" class="nav_link active"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">MC/Time Slip Pelajar</span> </a>  
                 </div>
            </div> <a href="logout.php" class="nav_link "> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Log Keluar</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-900" style="background-color:aliceblue;">
    <div class="text-center">
          <img src="images/logoremove.png" alt="Logo" width="250" height="85" class="img-fluid">
        <img src="images/logo2remove.png" alt="Logo" width="260" height="100" class="img-fluid">
    </div>
    <div class="div1">
    <div class="div1">
    <table id="example" class="display">

    <thead>
                    <th>NO</th>
                    <th class="text-center">JENIS</th>
                    <th class="text-center">MC</th>
                    <th class="text-center">BUANG/DELETE</th>
    </thead>
    <tbody>
      <?php
      include 'config.php';
      
                                global $row;
                                $query = mysqli_query($conn,"SELECT * FROM mc ");
                                
                                $numrow = mysqli_num_rows($query);

                               if($query){
                                    
                                    if($numrow!=0){
                                         $cnt=1;
                                         while($row = mysqli_fetch_assoc($query)){
                                          echo "<tr>
                                          <td>$cnt</td>
                                          <td class='text-center'>{$row['jenis']}</td>
                                          ";
        ?>
        
       
      <td><embed type="application/pdf" src="pdf/<?php echo $row['pdf'] ; ?>" width="900" height="500" ></td>
    
      <td class="text-center"><a href="delete2.php?id=<?= $row['id'];?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i>&nbsp;Delete</a></td>
      <?php
      $cnt++; }       
                                    }
                                }

      ?>
    </tbody>
                              </table>
    </div>
 <!-- Bootstrap JS Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script src= "https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src= "https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
		<script src= "https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <script src="js/sidebar.js"></script>
  </body>
</html>
<?php include(COMPONENTS_DIR . "/footer.php");?>
