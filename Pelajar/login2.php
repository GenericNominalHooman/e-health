<?php
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once($_SERVER["DOCUMENT_ROOT"]."/hospital/site_config.php");
?>
<?php
// Importing components
require_once COMPONENTS_DIR."/models.php";
require_once COMPONENTS_DIR."/redirect.php";
require_once COMPONENTS_DIR."/verify.php";
$verificationBuilderObj = VerificationRulesBuilder::createNew();
$modelsFactoryObj = new ModelsFactory();
$userModelObj = $modelsFactoryObj->createUserModel();
$redirectObj = new Redirect();

include 'config.php';

if(isset($_POST['submit'])){

   $nama = mysqli_real_escape_string($conn, $_POST['nama']);
   $nokp = mysqli_real_escape_string($conn, $_POST['nokp']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   // Check for each user input fields whether it conforms to the rules provided
  //  $verificationBuilderObj->setIsNotEmpty()->set

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE nokp = '$nokp' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
      $redirectObj->redirectToWithError("/".SITE_NAME.'/Pelajar/login2.php', 'Nama pengguna sudah berada di dalam pangkalan data, sila gunakkan nama pengguna yang lain.');
   }else{
      if($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(nama, nokp, password, image) VALUES('$nama', '$nokp', '$pass', '$image')") or die('query failed');
         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:login3.php');
         }else{
            $message[] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p><strong>Pendaftaran tidak berjaya</strong> Sila cuba sekali lagi. Sila pastikan No Kad Pengenalan anda tidak pernah didaftarkan di sistem ini.</p>
            <hr>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
         }
      }
   }

}


    /*$data = "nama=".$nama."&nokp=".$nokp;

    if (empty($nokp)) {
    	$em = "sila masukkan No. Kad Pengenalan";
    	header("Location: ../login2.php?error=$em&$data");
	    exit;
    }else if(empty($nama)){
    	$em = "Sila Masukkan Nama";
    	header("Location: ../login2.php?error=$em&$data");
	    exit;
    }else if(empty($password)){
    	$em = "Sila masukkan password";
    	header("Location: ../login2.php?error=$em&$data");
	    exit;
    }else {
      // hashing the password
      $password = password_hash($password, PASSWORD_DEFAULT);
    $insert = "INSERT INTO user_form( nama, nokp,  password) VALUES('$nama','$nokp','$password')";
         mysqli_query($conn, $insert);
         header('location:login3.php');
  
    }*/
  

?>
<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Daftar Masuk</title>

   <!-- custom css file link  
   <link rel="stylesheet" href="css/style.css">-->
   <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  <style>
  body{
    background-color:aliceblue;
  }
  </style>

</head>
<body>

<section class="gradient-custom" >
  <div class="container py-5 h-100" >
    <div class="row justify-content-center align-items-center h-100" >
      <div class="col-12 col-lg-9 col-xl-7" >
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px; border-color:skyblue;" >
          <div class="card-body p-4 p-md-5" >
            <?php
              echo('<img src="'.IMG_URL.'/pelajar2remove.png" class="rounded mx-auto d-block" witdh="200" height="150">');
            ?>
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">DAFTAR MASUK PELAJAR</h3>
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a href ="login2.php" class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
      aria-controls="pills-login" aria-selected="true">Daftar Masuk</a>
  </li>
  <li class="nav-item" role="presentation">
    <a href="login3.php" class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
      aria-controls="pills-register" aria-selected="false">Log Masuk</a>
  </li>
</ul>
            <form autocomplete="off" action="login2.php" method="post" enctype="multipart/form-data">
                <?php
                if(isset($_GET['error'])) {
                  echo("<div class='message'>".$_GET['error']."</div>");
                }
                ?>
                <div class="col-md-6 mb-4">
                            </div>
                            <div class="form-outline mb-4">
                            <div class="form-floating">
                              <input type="text"  name="nama" class="form-control" placeholder="Nama Penuh" />
                              <label  for="floatingPassword">Nama Penuh</label></div>
                                </div>

                               <div class="form-outline mb-4">
                            <div class="form-floating">
                              <input type="text"  name="nokp" class="form-control" placeholder="No.Kad Pengenalan" />
                              <label  for="floatingPassword">No. Kad Pengenalan</label></div>
                                </div>

                          <!-- Password input -->
                             <div class="form-outline mb-4">
                             <div class="form-floating">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password"/>
                                <label class="form-label" for="password">Password</label>
                                <label for="floatingPassword">Password</label>
                                <div class="mt-3">
                                <input type="checkbox" onclick="myFunction()">&nbsp;Show Password
                              </div></div></div>
                             <div class="mb-3">
                              <input type="file" id="image" name="image" class="box form-control" accept="image/jpg, image/jpeg, image/png" value="">
    </div>
                              <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Daftar </button>
              <div class="mt-3">
              <p>Kembali untuk <a href="login3.php">Log In</a></p>
              </div> 
          
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src= "https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src= "https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
		<script src= "https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
		<script src="./js/app.js"></script>
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
<?php mysqli_close($conn); 
include(COMPONENTS_DIR."/footer.php");
?>