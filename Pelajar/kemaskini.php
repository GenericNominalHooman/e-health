<?php
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once($_SERVER["DOCUMENT_ROOT"] . "/hospital/site_config.php");
?>
<?php
@include 'config.php';
include 'auth.php';
$id_pelajar = $_SESSION['id_pelajar'];

if(!isset($id_pelajar)){
  header('location:login3.php');
};

if(isset($_GET['logout'])){
  unset($id_pelajar);
  session_destroy();
  header('location:login3.php');
}
/*if(!isset($_SESSION['user'])){
   header('location:logintest.php');
}*/

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-HEALTH</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
  <link rel="stylesheet" href="https://kit.fontawesome.com/c7ad192f5f.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <link rel="stylesheet" href="css/search.css" />
  <style>
    html,
    body {
      background-color: aliceblue;
    }
  </style>
</head>

<body>

  <body>
    <div class="container" style="background-color:aliceblue;">
      <div class="container  py-3 my-3" style="background-color:aliceblue;">
        <nav class="navbar navbar-expand-lg " style="background-color:aliceblue;">
          <div class="container-fluid" style="background-color:aliceblue;">
            <a class="navbar-brand" href="pelajarhome.php">
              <img src="images/logoremove.png" alt="Logo" width="250" height="85" class="d-inline-block align-text-top">
              <img src="images/logo2remove.png" alt="Logo" width="260" height="100" class="d-inline-block align-text-top">
            </a>


            <header>
              <!-- Navbar -->
              <nav class="navbar navbar-expand-lg navbar-light" style="background-color:aliceblue;">


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" style="background-color:aliceblue;">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="background-color:aliceblue;">
                  <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="pelajarhome.php"><i class="fa-solid fa-house"></i>&nbsp;Utama</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../Admin/jadual2.php"><i class="fa-regular fa-calendar-days"></i>&nbsp;Jadual Guru Bertugas</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="janjitemu.php">Janji Temu</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="kemaskini.php"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;Semak Status</a>
                    </li>
                    </ul>
                  </div>
                </div>
                <span class="navbar-text">
                  <button class="btn btn-outline-info " onclick="window.location.href='logout.php';"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;Log Keluar</button>
                </span>
          </div>
      </div>
      </nav>
      <!-- Navbar -->


      <div class="col-md-12">
        <div class="card p-4 mt-3 mb-4">
          <h3 class="heading mt-5 text-center">SILA MASUKKAN NO K/P </h3>
          <div class="d-flex justify-content-center px-5">
            <div class="search">
              <form action="kemaskini.php" method="POST">
                <input type="text" class="search-input" placeholder="NO KAD PENGENALAN" name="search" autocomplete="off">
                <button type="submit" name="submit" class="search-icon"> <i class="fa fa-search"></i> </a>
            </div>
          </div>

          </form>
          <table class="table table-bordered table-stripted mt-3 " style="width:100%; border-color:darkblue;">
            <?php
              if (isset($_POST['submit'])) {
                $search =  $_POST['search'];

                $sql = "SELECT * FROM `janjitemu` WHERE id_janjitemu='$search' OR nokp='$search'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                  if (mysqli_num_rows($result) > 0) {
                    echo '<thead>
                  <tr>
                  
                              <th class="text-center">Nama</th>
                              <th class="text-center">No.K/P</th>
                              <th class="text-center">Waktu Janji Temu</th>
                              <th class="text-center">Tarikh Janji Temu</th>
                              <th class="text-center">Sebab</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Butang</th>
                            
                          </tr>
                      </thead>
                  ';
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tbody>
                          <tr>
                          
                          <td >' . $row['nama'] . '</td>
                          <td>' . $row['nokp'] . '</td>
                          <td>' . $row['waktu'] . '</td>
                          <td>' . $row['tarikh'] . '</td>
                          <td>' . $row['sebab'] . '</td>
                          <td>' . $row['status'] . '</td>'; ?>
                      <td class="d-print-none">
                        <!-- <a href="lanjut.php?id_janjitemu=<?= $row['id_janjitemu']; ?>"class="btn btn-outline-secondary"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Maklumat Lanjut</a>-->
                        <!-- <a href="update.php?id_janjitemu=<?= $row['id_janjitemu']; ?>"class="btn btn-sm btn-outline-secondary"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit</a>-->
                        <a href="butiran.php?id_janjitemu=<?= $row['id_janjitemu']; ?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i>&nbsp;Butiran</a>
                        <a href="padam.php?id_janjitemu=<?= $row['id_janjitemu']; ?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                        <a href="../Admin/upload2.php" class="btn btn-sm btn-outline-success "><i class="fa-solid fa-upload"></i>&nbsp;Muat Naik MC/Time Slip</a>
                      </td>
                      </tr>
                      </tbody>

              <?php
                    }
                  } else {
                    echo '<h2> Maklumat Tiada dalam rekod sila buat <a href="janjitemu.php">janjitemu</a> terlebih dahulu</h2>';
                  }
                }
              }
            ?>
          </table>
        </div>
      </div>
    </div>
  </body>

</html>
<?php include(COMPONENTS_DIR . "/footer.php"); ?>