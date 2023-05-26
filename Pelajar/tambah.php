v<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>E-HOSPITAL KVG</title>

   <!-- custom css file link  
   <link rel="stylesheet" href="css/style.css">-->
   <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container">
  <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
          <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="update.php">Halaman Kemaskini</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="pelajarhome.php">Kembali ke Halaman Utama</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="janjitemu.php">Kembali ke janjitemu</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  href="logout"></a>
  </li>
 
</ul>
<div class="mt-3">
<form action="tambah.php" method="POST">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">KEMASKINI MAKLUMAT PELAJAR</h3>
<!--<script type="text/javascript">
                    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                    <script type="text/javascript">
                   $(function () {
                   $("#kategori").change(function () {
                         if ($(this).val() == 4) {
                        $("#LAIN").removeAttr("disabled");
                        $("#LAIN").focus();
                        } else {
                         $("#LAIN").attr("disabled", "disabled");
            }
        });
    });
              </script>
              </script>-->
                <div class="row">
              <div class="col-md-6 mb-4">
                  <select class="form-select form-select-lg mb-3" name="kategori" id="kategori" onchange="showfield(this.option[this.selectedIndex].value">
                   <option selected ="kategori" >KATEGORI PENYAKIT</option>
		               <option value ="COVID-19">COVID-19</option>
		               <option value ="INFLUENZA">INFLUENZA</option>
                   <option value ="SAKIT BERGEJALA">SAKIT BERGEJALA</option>
                   <option value ="LAIN" >LAIN-LAIN :</option>
                  </select></div>

                  <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" name="LAIN" id="LAIN" class="form-control form-control-lg" />
                    <label class="form-label" for="LAIN" id="LAIN" disabled="disabled">LAIN-LAIN</label>
                  </div>
                </div>
              </div>

              <div class="row">
              <div class="col-md-6 mb-4">
                  <select class="form-select form-select-lg mb-3" name="tempat" id="tempat" onchange="showfield(this.option[this.selectedIndex].value">
                   <option selected ="tempat" >TEMPAT RAWATAN</option>
		               <option value ="Hospital Gerik">Hospital Gerik</option>
		               <option value ="Klinik 1Malaysia">Klinik 1Malaysi</option>
                   <option value ="Hospital Taiping">Hospital Taiping</option>
                   <option value ="LAIN" >LAIN-LAIN :</option>
                  </select></div>

                  <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" name="LAIN" id="LAIN" class="form-control form-control-lg" />
                    <label class="form-label" for="LAIN" id="LAIN" disabled="disabled">LAIN-LAIN</label>
                  </div>
                </div>
              </div>
              
              

  
        <div class="input-group">
        <div class="form-text">SILA MASUKKAN SIJIL CUTI SAKIT PELAJAR(MC) JIKA ADA</div>
        <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">SILA MASUKKAN SIJIL CUTI SAKIT PELAJAR(MC) JIKA ADA</span>
        </div>
        <button class="btn btn-outline-secondary" name="submit" type="button" id="button-addon2">PILIH FILE</button>
        </div>
        <div class="form-text">SILA MASUKKAN DALAM BENTUK GAMBAR .JPG, .PNG DAN .JPEG SAHAJA</div>
    <div class="mt-3">
              <input type="submit" class="btn btn-outline-info" name="submit" value="EDIT"></div>
			  </div>
              <?php

if (isset($_POST['submit'])) {
	$kategori=$_POST['kategori'];
	$LAIN=$_POST['LAIN'];
	$tempat=$_POST['tempat'];
	$LAIN_TEMPAT=$_POST['LAIN_TEMPAT'];
	
}
    include("config.php");
    include("insertmc.php");
    ?>
        </form>

</div>

</body>
</html>