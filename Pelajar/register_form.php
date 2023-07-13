<?php

@include 'config.php';


if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $nama=$_POST['nama'];
	$nokp=$_POST['nokp'];
	$notel=$_POST['notel'];
	$notelpen=$_POST['notelpen'];
	$alamat=$_POST['alamat'];
	if (isset($_POST['program'])) {
		$program=$_POST['program'];
	}
	
	if (isset($_POST['tahun'])) {
		$tahun=$_POST['tahun'];
	}
	if(isset($_POST['jantina'])){
		$jantina=$_POST['jantina'];
	}
		else {
			$jantina="";

		}
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   //$pass=$_POST['password'];
   //$pass = password_hash($pass, PASSWORD_DEFAULT);
   $pass = ($_POST['password']);
   //$pass = md5($_POST['password']);

   //$cpass = password_hash($cpass, PASSWORD_DEFAULT);
   //$cpass=$_POST['cpassword'];
   //$cpass = md5($_POST['cpassword']);


   $select = " SELECT * FROM user_form WHERE username = '$username' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      /*if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{*/
         $insert = "INSERT INTO user_form(username, nama, nokp, notel, notelpen, alamat, program, tahun, jantina , email , password) VALUES('$username','$nama','$nokp','$notel','$notelpen', '$alamat','$program','$tahun','$jantina','$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:login3.php');
      }
   }

/*};*/


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  
   <link rel="stylesheet" href="css/style.css">-->
   <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">DAFTAR MASUK</h3>
            <form action="register_form.php" method="post">

              
                <div class="col-md-6 mb-4">
                  
                     <?php if(isset($error)){
                        foreach($error as $error){
                           echo '<span class="error-msg">'.$error.'</span>';
                              };
                                 };
                      ?>
               </div>
               <div class="row">
               <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" name="username" class="form-control form-control-lg"  autocomplete="off"/>
                    <label class="form-label" for="username">Username</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <div class="form-floating">
                  <input type="password" class="form-control" name="password" placeholder="Password"  autocomplete="off">
                  <label for="floatingPassword">Password</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
               <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <div class="form-floating">
                    <input type="text" name="nama" class="form-control" placeholder="Nama"/>
                    <label for="floatingPassword">Nama</label></div>
                  </div>

                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <div class="form-floating">
                    <input type="text" name="nokp" class="form-control form-control-lg" placeholder="Nama"/>
                    <label  for="floatingPassword">No. Kad Pengenalan</label></div>
                  </div>
                </div>
              </div>

              <div class="row">
               <div class="col-md-6 mb-4">
                <div class="form-outline">
                <div class="form-floating">
                    <input type="tel" name="notel" class="form-control form-control-lg" placeholder="No.Telefon Pelajar" />
                    <label for="floatingPassword">No. Telefon Pelajar</label></div>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                <div class="form-outline">
                <div class="form-floating">
                    <input type="tel" name="notelpen" class="form-control form-control-lg" placeholder="No.Kad Pengenalan" />
                    <label for="floatingPassword">No. Telefon Penjaga</label></div>
               </div></div>


               <div class="form-outline">
                        <textarea class="form-control form-control-lg" style="resize:none;" name="alamat" cols="25" rows="5" ></textarea>
                        <label for="alamat" class="form-label">Alamat</label>
                </div>
                <div class="row">
                <div class="col-md-6 mb-4">
                <div class="form-outline">
                <div class="form-floating">
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="E-mail" />
                    <label for="floatingPassword">E- mail</label></div>
               </div></div>
                <div class="col-md-6 mb-4">
                  <h6 class="mb-2 pb-1">Jantina: </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jantina" 
                      value="perempuan" checked />
                    <label class="form-check-label" for="perempuan">Perempuan</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jantina" 
                      value="lelaki" />
                    <label class="form-check-label" for="lelaki">Lelaki</label>
                  </div>
                </div>
              </div>

              <div class="row">
              <div class="col-md-6 mb-4">
                  <select class="select form-control" name="program" id="program">
                     <option value="program" disabled>Program</option>
		               <option value ="KPD">KPD</option>
		               <option value ="KSK">KSK</option>
		               <option value ="HSK">HSK</option>
		               <option value ="HBP">HBP</option>
		               <option value ="BAK">BAK</option>
		               <option value ="BPP">BPP</option>
		               <option value ="MTK">MTK</option>
		               <option value ="MTP">MTP</option></select>
                  </select>
                </div>

                <div class="col-md-6 mb-4">
                <select class="select form-control" name="tahun" id="tahun">
                     <option value="tahun" disabled>Tahun</option>
                     <option value ="Tahun 1 SVM">Tahun 1 SVM</option>
		               <option value ="Tahun 2 SVM">Tahun 2 SVM</option>
		               <option value ="Tahun 1 DVM">Tahun 1 DVM</option>
		               <option value ="Tahun 2 DVM">Tahun 2 DVM</option>
		               </select>
                </div></div>
              </div>
              <input type="submit" class="btn btn-outline-info" name="submit" value="DAFTAR">
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
<!--<div class="form-container">

   
      <input type="text" name="username" required placeholder="Masukkan username disini">
	  <input type="text" name="nama" required placeholder="Masukkan nama disini">
	  <input type="text" name="nokp" required placeholder="Masukkan No Kad Pengenalan disini">
	  <input type="tel" name="notel" required placeholder="Masukkan Nombor Telefon disini">
	  <input type="tel" name="notelpen" required placeholder="Masukkan Nombot Telefon Penjaga disini">
	  <textarea placeholder="Masukkan Alamat" style="resize:none;  width: 100%;padding:10px 15px;font-size: 17px;margin:8px 0;background: #eee;border-radius: 5px;"name="alamat"cols="25" rows="5"></textarea> 
	  
	  <select name="program" id="program">
		<option>Pilih program di sini</option>
		<option value ="KPD">KPD</option>
		<option value ="KSK">KSK</option>
		<option value ="HSK">HSK</option>
		<option value ="HBP">HBP</option>
		<option value ="BAK">BAK</option>
		<option value ="BPP">BPP</option>
		<option value ="MTK">MTK</option>
		<option value ="MTP">MTP</option></select>
		
		<select name="tahun" id="tahun">
		<option>Pilih tahun di sini</option>
		<option value ="Tahun 1 SVM">Tahun 1 SVM</option>
		<option value ="Tahun 2 SVM">Tahun 2 SVM</option>
		<option value ="Tahun 1 DVM">Tahun 1 DVM</option>
		<option value ="Tahun 2 DVM">Tahun 2 DVM</option>
		</select>
		
		<input type="radio" style="display:inline;" name="jantina" value="Lelaki" id="lelaki"><label for="lelaki">Lelaki</label>
		<input type="radio" name="jantina" value="Perempuan" id="perempuan"><label for="perempuan">Perempuan</label>
		
		
		
      <input type="text" name="email" required placeholder="Masukkan email disini">
	  
	  
      <input type="password" name="password" required placeholder="Masukkan kata laluan disini">
	  
      <!--<input type="password" name="cpassword" required placeholder="Masukkan kata laluan sekali lagi">
	  
      
      <input type="submit" name="submit" value="DAFTAR" class="form-btn">
      <p>Kembali untuk <a href="login_form.php">Log In</a></p>
   </form>

</div>-->
<?include "footer.php";?>
</body>
</html>