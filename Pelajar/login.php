<?php
include "config.php";
session_start();
/*if (isset($_SESSION["user"])) {
   header("Location: pelajarhome.php");
}*/
?>
 <?php
		/*echo $_POST["username"];
		echo $_POST['password'];*/
        if (isset($_POST["login"])) {
           $username = $_POST["username"];
           $password = $_POST["password"];
           
            $sql = "SELECT * FROM user_form WHERE username= '$username'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {//echo 'user';echo password_hash($password, PASSWORD_DEFAULT). " || ". md5($password);
                if (password_verify($password, $user["password"])) {echo 'password';
                    session_start();
                    $_SESSION["user"] = $row['username'];;
                    header("Location: pelajarhome.php");
                    die();
                }else{
                     $error[] = 'Sila masukkan usernama/nama atau password yang betul';
                }
			}
        }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log masuk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
       
     <div class="form-container">
     <form action="login.php" method="post">
     	<h2>LOG MASUK</h2>
     	<?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
     	<input type="text" name="username" placeholder="User Name"><br>

     	<input type="password" name="password" placeholder="Password"><br>

     	<input type="submit" value="login now" name="login" class="form-btn" >
     
     <a href="register_form.php">Daftar</a>&nbsp;Bagi Pengguna Baharu
    
	 </form>
	 </div>
</body>
</html>