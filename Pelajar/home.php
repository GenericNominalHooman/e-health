<?php

include 'config.php';
session_start();
$id_pelajar = $_SESSION['id_pelajar'];

if(!isset($id_pelajar)){
   header('location:login3.php');
};

if(isset($_GET['logout'])){
   unset($id_pelajar);
   session_destroy();
   header('location:login3.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id_pelajar = '$id_pelajar'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img class=" rounded-circle rounded mx-auto d-block" width="160" height="100" src="images/default-avatar.png">';
         }else{
            echo '<img class=" rounded-circle rounded mx-auto d-block" width="160" height="100" src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h3><?php echo $fetch['nama']; ?></h3>
      <a href="update_profile.php" class="btn">update profile</a>
      <a href="home.php?logout=<?php echo $id_pelajar; ?>" class="delete-btn">logout</a>
      <p>new <a href="login.php">login</a> or <a href="register.php">register</a></p>
   </div>

</div>

</body>
</html>