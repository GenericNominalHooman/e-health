<?php
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
require_once(TEMPLATES_DIR."/sidebar_pelajar.php");
?>
<?php

include 'config.php';
session_start();
$id_pelajar = $_SESSION['id_pelajar'];

if (isset($_POST['update_profile'])) {

   $update_nama = mysqli_real_escape_string($conn, $_POST['update_nama']);
   $update_nokp = mysqli_real_escape_string($conn, $_POST['update_nokp']);

   mysqli_query($conn, "UPDATE `user_form` SET nama = '$update_nama', nokp = '$update_nokp' WHERE id_pelajar = '$id_pelajar'") or die('query failed');


   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
      if ($update_pass != $update_pass) {
         $message[] = 'old password not matched!';
      } elseif ($new_pass != $confirm_pass) {
         $message[] = 'confirm password not matched!';
      } else {
         mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id_pelajar = '$id_pelajar'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/' . $update_image;

   if (!empty($update_image)) {
      if ($update_image_size > 2000000) {
         $message[] = 'image is too large';
      } else {
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id_pelajar = '$id_pelajar'") or die('query failed');
         if ($image_update_query) {
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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
   <style>
      body {
         background-color: aliceblue;
      }
   </style>
</head>

<body>

   <div class="update-profile">

      <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id_pelajar = '$id_pelajar'") or die('query failed');
      if (mysqli_num_rows($select) > 0) {
         $fetch = mysqli_fetch_assoc($select);
      }
      ?>
      <section class="gradient-custom">
         <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
               <div class="col-12 col-lg-9 col-xl-7">
                  <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                     <div class="card-body p-4 p-md-5">
                        <?php
                        if ($fetch['image'] == '') {
                           echo '<img class=" rounded-circle rounded mx-auto d-block" width="130px" height="130px" src="images/default-avatar.png">';
                        } else {
                           echo '<img class=" rounded-circle rounded mx-auto d-block" width="130px" height="130px" src="uploaded_img/' . $fetch['image'] . '">';
                        }

                        ?>
                        <br>
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">KEMASKINI PROFIL</h3>
                        <?php

                        if (isset($message)) {
                           foreach ($message as $message) {
                              echo '<div class="message alert alert-dark" role="alert">' . $message . '</div>';
                           }
                        }
                        ?>
                        <form autocomplete="off" action="" method="post" enctype="multipart/form-data">

                           <!-- Nama Penuh Pelajar -->
                           <div class="form-outline mb-4">
                              <div class="form-floating">
                                 <input type="text" name="update_nama" value="<?php echo $fetch['nama']; ?>" class="form-control" placeholder="Nama Penuh" />
                                 <label for="floatingPassword">Nama Penuh Pelajar</label>
                              </div>
                           </div>
                           
                           <!-- No. Kad Pengenalan -->
                           <div class="form-outline mb-4">
                              <div class="form-floating">
                                 <input type="text" name="update_nokp" value="<?php echo $fetch['nokp']; ?>" class="form-control" placeholder="No.Kad Pengenalan" />
                                 <label for="floatingPassword">No. Kad Pengenalan</label>
                              </div>
                           </div>

                           <!-- No. Matrik -->
                           <div class="form-outline mb-4">
                              <div class="form-floating">
                                 <input type="bigint" name="update_nmPenjaga2" class="form-control" placeholder="No. Matrik" />
                                 <label for="floatingPassword">No. Matrik</label>
                              </div>
                           </div>

                           <!-- Dorm -->
                           <div class="form-outline mb-4">
                              <div class="form-floating">
                                 <input type="bigint" name="update_nmPenjaga2" class="form-control" placeholder="Dorm" />
                                 <label for="floatingPassword">Dorm</label>
                              </div>
                           </div>

                           <!-- Nombor Telefon Pelajar-->
                           <div class="form-outline mb-4">
                              <div class="form-floating">
                                 <input type="bigint" name="update_nmPenjaga2" class="form-control" placeholder="Nombor Telefon Pelajar" />
                                 <label for="floatingPassword">Nombor Telefon Pelajar</label>
                              </div>
                           </div>

                           <!-- Nama Bapa-->
                           <div class="form-outline mb-4">
                              <div class="form-floating">
                                 <input type="text" name="update_nmPenjaga2" class="form-control" placeholder="Nama Penuh Bapa" />
                                 <label for="floatingPassword">Nama Penuh Bapa</label>
                              </div>
                           </div>
                            
                           <!-- Nombor Telefon Bapa-->
                           <div class="form-outline mb-4">
                              <div class="form-floating">
                                 <input type="bigint" name="update_nmPenjaga2" class="form-control" placeholder="Nombor Telefon Bapa" />
                                 <label for="floatingPassword">Nombor Telefon Bapa</label>
                              </div>
                           </div>

                           <!-- Nama Ibu-->
                           <div class="form-outline mb-4">
                              <div class="form-floating">
                                 <input type="text" name="update_nmPenjaga" class="form-control" placeholder="Nama Penuh Ibu" />
                                 <label for="floatingPassword">Nama Penuh Ibu</label>
                              </div>
                           </div>

                           <!-- Nombor Telefon Ibu-->
                           <div class="form-outline mb-4">
                              <div class="form-floating">
                                 <input type="bigint" name="update_nmPenjaga2" class="form-control" placeholder="Nombor Telefon Ibu" />
                                 <label for="floatingPassword">Nombor Telefon Ibu</label>
                              </div>
                           </div>

                           <!-- Alahan -->
                           <div class="form-outline mb-4">
                              <div class="form-floating">
                                 <input type="text" name="update_nmPenjaga2" class="form-control" placeholder="Alahan" />
                                 <label for="floatingPassword">Alahan (Jika Ada)</label>
                              </div>
                           </div>

                            
                           <!-- Penyakit -->
                           <div class="form-outline mb-4">
                              <div class="form-floating">
                                 <input type="bigint" name="update_nmPenjaga2" class="form-control" placeholder="Penyakit" />
                                 <label for="floatingPassword">Penyakit</label>
                              </div>
                           </div>

                           <!-- Alamat -->
                           <div class="form-outline mb-4">
                              <div class="form-floating">
                                 <input type="varchar" name="update_nmPenjaga2" class="form-control" placeholder="Alamat" />
                                 <label for="floatingPassword">Alamat</label>
                              </div>
                           </div>

                           

                            
                           
                           <!-- Password input -->
                           <div class="form-outline mb-4">
                              <div class="form-floating">
                                 <input type="password" name="update_pass" class="form-control" placeholder="Kata laluan lama " />
                                 <label for="floatingPassword">Kata laluan lama </label>

                              </div>
                           </div>


                           <!-- Password input -->
                           <div class="form-outline mb-4">
                              <div class="form-floating">
                                 <input type="password" name="new_pass" class="form-control" placeholder=" kata laluan baru">
                                 <label for="floatingPassword"> kata laluan baru</label>

                              </div>
                           </div>

                           <!-- Password input -->
                           <div class="form-outline mb-4">
                              <div class="form-floating">
                                 <input type="password" name="confirm_pass" class="form-control" placeholder="Ulang kata laluan">
                                 <label for="floatingPassword"> Ulang kata laluan </label>

                              </div>
                           </div>

                           <div class="mb-3">
                              <input type="file" name="update_image" class="box form-control" accept="image/jpg, image/jpeg, image/png">
                           </div>
                           <input type="submit" value="Simpan" name="update_profile" class="btn btn-primary btn-lg btn-block">
                           <div class="mt-3">
                              <p>Kembali ke <a href="pelajarhome.php">halaman utama</a></p>
                           </div>

                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <?php include(COMPONENTS_DIR . "/footer.php"); ?>
</body>

</html>