<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: pelajarhome.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $nama = $_POST["nama"];
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
     $email = $_POST["email"];
     $password = $_POST["password"];
     $passwordRepeat = $_POST["repeat_password"];
         
         
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($nama) OR empty($email) OR empty($nokp) OR empty ($notel) OR empty($password) OR empty($passwordRepeat))  {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
	  if (!filter_var($nokp, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
	}
	 if (!filter_var($notel, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
         }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "config.php";
           $sql = "SELECT * FROM user_form WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO user_form(usernama, nama, nokp, notel, notelpen, alamat, program, tahun, jantina , email , password) VALUES('$usernama','$nama','$nokp','$notel','$notelpen', '$alamat','$program','$tahun','$jantina','$email','$pass')";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$nama, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
       <form action="register_form.php" method="post">
      <h3>DAFTAR MASUK</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="usernama" required placeholder="Masukkan username disini">
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
	  
      <input type="password" name="cpassword" required placeholder="Masukkan kata laluan sekali lagi">
	  
      
      <input type="submit" name="submit" value="DAFTAR" class="form-btn">
      <p>Kembali untuk <a href="login_form.php">Log In</a></p>
</form>
      </div>
    </div>
</body>
</html>