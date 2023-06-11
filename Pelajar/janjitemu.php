<?php
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once($_SERVER["DOCUMENT_ROOT"]."/hospital/site_config.php");
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
<?php @include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-HEALTH</title>

  <!-- custom css file link  
   <link rel="stylesheet" href="css/style.css">-->
  <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <?php include "index.html"; ?>
    <div class="alert alert-danger d-flex align-items-center mt-3 " role="alert">
      <div>
        <h4 class="alert-heading"><strong>NOTIS PEMBERITAHUAN :</strong></h4>
        <p class="text-dark">Pelajar hanya dibenarkan berurusan di Hospital Gerik,
          Klinik Komuniti, Klinik Kesihatan dan Hospital Taiping.
          Pelajar hanya boleh dibenarkan pergi ke hospital
          pada 2 waktu sahaja iaitu pada waktu <strong>9.00 pagi</strong> dan <strong>3.00 petang</strong>.
          Pihak asrama dan warden hanya boleh membawa pelajar ke
          hospital pada kes kecemasan sahaja.</p>
      </div>
    </div>

    <section class="vh-100 gradient-custom" style="background-color:aliceblue;">
      <div class="container py-5 h-100" style="background-color:aliceblue;">
        <div class="row justify-content-center align-items-center h-100">
          <!--<div class="col-12 col-lg-9 col-xl-7" >-->
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px; border-color:skyblue; background-color:aliceblue;">
            <div class="card-body p-4 p-md-5">

              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">BORANG JANJI TEMU</h3>
              <form action="janjitemu.php" method="POST">

                <?php include "message.php"; ?>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <div class="form-floating">
                        <input type="text" name="nama" class="form-control form-control-lg" placeholder="Nama" />
                        <label for="floatingPassword">Nama</label>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <div class="form-floating">
                        <input type="text" name="nokp" class="form-control form-control-lg" placeholder="No.Kad Pengenalan" />
                        <label class="form-label" for="nokp">No. Kad Pengenalan</label>
                        <label for="floatingPassword">No. Kad Pengenalan</label>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-6 mb-4">
                    <select class="form-select form-select-lg mb-3" name="program" id="program">
                      <option value="program" disabled>Program</option>
                      <option value="KPD">KPD</option>
                      <option value="KSK">KSK</option>
                      <option value="HSK">HSK</option>
                      <option value="HBP">HBP</option>
                      <option value="BAK">BAK</option>
                      <option value="BPP">BPP</option>
                      <option value="MTK">MTK</option>
                      <option value="WTP">WTP</option>
                    </select>
                    </select>
                  </div>
                  <div class="col-md-6 mb-4">
                    <select class="form-select form-select-lg mb-3" name="tahun" id="tahun">
                      <option value="tahun" disabled>Tahun</option>
                      <option value="Tahun 1 SVM">Tahun 1 SVM</option>
                      <option value="Tahun 2 SVM">Tahun 2 SVM</option>
                      <option value="Tahun 1 DVM">Tahun 1 DVM</option>
                      <option value="Tahun 2 DVM">Tahun 2 DVM</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <div class="form-floating">
                        <input type="tel" name="notel" class="form-control form-control-lg" placeholder="No.Telefon Pelajar" />
                        <label for="floatingPassword">No. Telefon Pelajar</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <div class="form-floating">
                        <input type="tel" name="notelpen" class="form-control form-control-lg" placeholder="No.Kad Pengenalan" />
                        <label for="floatingPassword">No. Telefon Penjaga</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-outline mb-4">
                    <label for="alamat" class="form-label">Alamat :</label>
                    <textarea class="form-control form-control-lg" style="resize:none;" name="alamat" cols="25" rows="5"></textarea>
                  </div>

                  <div class="form-outline mb-4">
                    <h6 class="mb-2 pb-1">Jantina: </h6>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="jantina" value="perempuan" checked />
                      <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="jantina" value="lelaki" />
                      <label class="form-check-label" for="lelaki">Lelaki</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <select class="form-select form-select-lg mb-3" name="waktu" id="waktu">
                      <option value="Tiada">Pilihan Waktu</option>
                      <option value="WAKTU" disabled>Pilihan Waktu hanya</option>
                      <option value="9.00 A.M">9.00 A.M</option>
                      <option value="3.00 P.M">3.00 P.M</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="date" name="tarikh" class="form-control form-control-lg" />
                      <label class="form-label" for="tarikh">Tarikh Janji Temu</label>
                    </div>
                  </div>

                  <div class="form-outline mb-4">
                    <div class="form-floating">
                      <input type="text" name="sebab" class="form-control" placeholder="Sebab Ke Hospital" />
                      <label for="floatingPassword">Sebab Ke Hospital</label>
                    </div>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="submit" class="btn btn-primary btn-lg active" name="submit" value="HANTAR">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--NANTI LETAK UPDATE.PHP DEKAT SINI-->
  <?php include "insert.php"; ?>

  <?php

  if (isset($_POST['submit'])) {

    $nama = $_POST['nama'];
    $nokp = $_POST['nokp'];
    $program = $_POST['program'];
    $tahun = $_POST['tahun'];
    $waktu = $_POST['waktu'];
    $tarikh = $_POST['tarikh'];
    $notel = $_POST['notel'];
    $notelpen = $_POST['notelpen'];
    $alamat = $_POST['alamat'];

    if (isset($_POST['program'])) {
      $program = $_POST['program'];
    } else {
      $program = "";
    }

    if (isset($_POST['tahun'])) {
      $tahun = $_POST['tahun'];
    } else {
      $tahun = "";
    }

    if (isset($_POST['jantina'])) {
      $jantina = $_POST['jantina'];
    } else {
      $jantina = "";
    }
    $sebab = $_POST['sebab'];
  }

  ?>
</body>

</html>
<?php
mysqli_close($conn);
include(COMPONENTS_DIR . "/footer.php");
?>