<?php

include 'config.php';
session_start();
$id_pelajar = $_SESSION['id_pelajar'];

if(isset($_POST['update_profile'])){

   $update_nama = mysqli_real_escape_string($conn, $_POST['update_nama']);
   $update_nokp = mysqli_real_escape_string($conn, $_POST['update_nokp']);

   mysqli_query($conn, "UPDATE `user_form` SET nama = '$update_nama', nokp = '$update_nokp' WHERE id_pelajar = '$id_pelajar'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$id_pelajar'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id_pelajar = '$id_pelajar'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

}

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
<body>
   
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id_pelajar = '$id_pelajar'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>
   <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
          <?php
         if($fetch['image'] == ''){
            echo '<img class=" rounded-circle rounded mx-auto d-block" width="95" height="150" src="images/default-avatar.png">';
         }else{
            echo '<img class=" rounded-circle rounded mx-auto d-block" width="160" height="100" src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">UPDATE PROFILE</h3>
            
            <form autocomplete="off" action="" method="post" enctype="multipart/form-data">

                            <div class="form-outline mb-4">
                            <div class="form-floating">
                              <input type="text" name="update_nama" value="<?php echo $fetch['nama']; ?>"   class="form-control" placeholder="Nama Penuh" />
                              <label  for="floatingPassword">Nama Penuh</label></div>
                                </div>

                               <div class="form-outline mb-4">
                            <div class="form-floating">
                              <input type="text"  name="update_nokp" value="<?php echo $fetch['nokp']; ?>" class="form-control" placeholder="No.Kad Pengenalan" />
                              <label  for="floatingPassword">No. Kad Pengenalan</label></div>
                                </div>

                          <!-- Password input -->
                             <div class="form-outline mb-4">
                             <div class="form-floating">
                                <input type="password" id="password"  name="old_pass" onclick="myFunction()" value="<?php echo $fetch['password']; ?>" class="form-control" placeholder="Password"/>
                                <label class="form-label" for="password">Password</label>
                                <label for="floatingPassword">Password</label>
                                </div></div>

                                <!-- Password input -->
                             <div class="form-outline mb-4">
                             <div class="form-floating">
                                <input type="password"  name="update_pass"  onclick="myFunction()" class="form-control" placeholder="Old Password"/>
                                <label for="floatingPassword">Password</label>
                                </div></div>


                               
                              <div class="mb-3">
                              <input type="file"  name="update_image" class="box form-control" accept="image/jpg, image/jpeg, image/png">
    </div>
                              <input type="submit" value="Simpan" name="update_profile" class="btn btn-primary btn-lg btn-block">
              <div class="mt-3">
              <p>Kembali ke <a href="pelajarhome.php">halaman utama</a></p>
              </div> 

            </form>
            <script>
            function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                } else {
                 x.type = "password";
                }
                }
        </script>
</body>
</html>