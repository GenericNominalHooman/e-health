<?php
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once($_SERVER["DOCUMENT_ROOT"]."/hospital/site_config.php");
?>
<?php
require_once(COMPONENTS_DIR."/models.php");
$modelFactory = new ModelsFactory();
$userModel = $modelFactory->createUserModel();
// d($userModel->getAllGuruBertugas());


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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>E-HEALTH</title>

        <!--- Bootstrap CSS --->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
        <link rel="stylesheet" href="https://kit.fontawesome.com/c7ad192f5f.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>

        <style>
        
        .body{
            background-color: aliceblue;
        }

        .container1 {
            display: flex;
        }

        .left-container {
            flex: 1;
            float: left;
        }

        </style>
    </head>
    <body>

    <?php 
    include "index.html";
    ?>

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
<div class="container1">
    <div class="left-container">
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

    </body>
</html>