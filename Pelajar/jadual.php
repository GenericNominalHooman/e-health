<?php
// IMPORT SITE CONFIG BEGIN
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php");
require_once(E_HEALTH_DIR."/site_config.php");
// IMPORT SITE CONFIG ENDS
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
</head>
<body>
    <div class="container">
    <?php include "index.html"?>  
    <?php
    require_once(COMPONENTS_DIR."/config.php");
         $select = mysqli_query($conn, "SELECT image FROM `loginadmin` WHERE id = 4 ") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img class="img-fluid  rounded mx-auto d-block" src="images/default-avatar.png" >';
         }else{
            echo '<img class="img-fluid  rounded mx-auto d-block"  src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
    <?php include(COMPONENTS_DIR . "/footer.php");?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>