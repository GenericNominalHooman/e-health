<?php
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php");
require_once(E_HEALTH_DIR."/site_config.php");

require_once(COMPONENTS_DIR."/auth_pelajar.php");
?>
<?php
require_once(COMPONENTS_DIR."/models.php");
$modelFactory = new ModelsFactory();
$userModel = $modelFactory->createUserModel();
// d($userModel->getAllGuruBertugas());


@include 'config.php';
include 'auth.php';
$id_pelajar = $_SESSION['id_pelajar'];

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
    <style>
      body{
  background-color:aliceblue;
}
    </style>
</head>
<body >
  

   <?php include "index.html";?>
   
	<div class="container">

   <div class="alert alert-danger d-flex align-items-center mt-3" role="alert">
  <div>
  <h4 class="alert-heading"><strong>NOTIS PEMBERITAHUAN:</strong></h4>
                      <p class="text-dark">Pelajar hanya dibenarkan pergi ke Hospital Gerik,
                         Klinik Komuniti, Klinik Kesihatan dan Hospital Taiping hanya pada pukul 2 
                         Pelajar hanya boleh dibenarkan pergi ke hospital hanya
                         pada 2 waktu sahaja iaitu pada waktu <strong>9.00 pagi</strong> dan <strong>3.00 petang</strong>.  
                         Pihak asrama dan warden hanya boleh membawa pelajar ke  
	                      hospital hanya pada kes kecemasan sahaja.</p>
   </div></div>
  <div class="card text-center mb-3 mt-3" style ="border-color:skyblue;">
    <div class="card-header " style="background-color:skyblue; ">
    <i class="fa-regular fa-pen-to-square"></i>&nbsp;KEMASKINI PROFIL
    </div>
    <div class="card-body" style="background-color:aliceblue;">
      
      
    <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id_pelajar = '$id_pelajar'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img class="img-fluid rounded-circle rounded mx-auto d-block" src="images/default-avatar.png" >';
         }else{
            echo '<img class="img-fluid rounded-circle rounded mx-auto d-block"  src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      
    <h5 class="card-title  mt-3">SILA MASUKKAN MAKLUMAT DENGAN BETUL</h5>
    <p class="card-text"></p>
    <a href="update_profile.php" class="btn btn-primary">PROFIL</a>
  </div></div>
        
   <div class="card text-center mb-3 mt-3" style ="border-color:skyblue;">
    <div class="card-header" style="background-color:skyblue;">
    <i class="fa-solid fa-square-check"></i>&nbsp;SEMAK STATUS
    </div>
    <div class="card-body" style="background-color:aliceblue;">
    <img src="images/check.webp" width="150" height="150">
    <h5 class="card-title">PROSES PENGESAHAN MENGAMBIL MASA SEKURANG-KURANGNYA 1 JAM SEBELUM </h5>
    <p class="card-text"> </p>
    <a href="kemaskini.php" class="btn btn-primary">SEMAK STATUS / KEMASKINI</a>
  </div>
  <!--<div class="card-footer text-muted">-->
   
  </div>
</div>
<div class="card text-center mb-3 mt-3" style ="border-color:skyblue;">
    <div class="card-header " style="background-color:skyblue;">
    <i class="fa-solid fa-clipboard-list" ></i>&nbsp;JANJI TEMU
    </div>
    <div class="card-body" style="background-color:aliceblue;">
      <img src="images/janjitemu.png">
    <h5 class="card-title">SILA MASUKKAN MAKLUMAT YANG SAH DAN BETUL</h5>
    <p class="card-text"></p>
    <a href="janjitemu.php" class="btn btn-primary">JANJI TEMU</a>
  </div>
  <!--<div class="card-footer text-muted">-->
  </div>
</div>
</div>
</div>

 <!-- Bootstrap JS Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
 
<?php include(COMPONENTS_DIR."/footer.php"); ?>

