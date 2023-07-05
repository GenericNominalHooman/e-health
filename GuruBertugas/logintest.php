<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health/site_config.php");
?>
<?php 
// Import redirtect component
require_once(COMPONENTS_DIR."/redirect.php");

session_start(); 
include "config.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: login3.php?error=<div class='alert alert-dark' role='alert'>Sila masukkan Username terlebih dahulu</div>");
	    exit();
	}else if(empty($pass)){
        header("Location: login.php?error=<div class='alert alert-dark' role='alert'>Sila masukkan password terlebih</div>");
	    exit();
	}else{
		$sql = "SELECT * FROM gurubertugas WHERE username='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) {
            	$_SESSION['username'] = $row['username'];
            	
            	$_SESSION['id'] = $row['id'];
            	header("Location: dashboard.php");
		        exit();
            }else{
				header("Location: login3.php?error=<div class='alert alert-dark' role='alert'>Kata Laluan atau Password salah</div>");
		        exit();

			}
		}else{
			$redirectObj = new Redirect();
			$redirectObj->redirectToWithError("login3.php", "Kata laluan atau nama pengguna salah");
		}
	}
	
}else{
	header("Location: login3.php");
	exit();
}
?>