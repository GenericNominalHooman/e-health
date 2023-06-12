<?php
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once($_SERVER["DOCUMENT_ROOT"]."/hospital/site_config.php");
?>


<?php

session_start();
require 'config.php';

$username = $_POST["username"];
$password = $_POST["password"];

$result = mysqli_query($conn, "SELECT * FROM gurubertugas WHERE username = '$username' AND password = '$password'");

$row = mysqli_num_rows($result);

if ($row == 1) {
    header('Location: gurubertugashome.php');
} else {
    header('Location: logingurubertugas.php');
}

$result = mysqli_query($conn, "SELECT * FROM loginadmin WHERE username = '$username' AND password = '$password' LIMIT 1");

$row = mysqli_fetch_array($result);

if ($row && $row['username'] == $username && $row['password'] == $password) {
    echo "Login successful: " . $row['username'];
} else {
    echo "Login failed";
}
?>









 <!DOCTYPE html>
<html>
<head>
    
    <title>Login</title>
</head>
<body>
<main>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   custom css file link  
   <link rel="stylesheet" href="style.css">

    <form action="loginadmin.php" method="post">
        <h1>Login</h1>
        <div class="login">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <section>
            <button type="submit" class="button"onclick="windows.location.href='homeadmin.php';">Login</button>
        </section>
    </form>
</main>
</body>
</html>



















<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="loginadmin.php" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="username" required placeholder="Masukkan nama disini">
      <input type="password" name="password" required placeholder="Masukkan kata laluan disini ">
      <input type="submit" name="submit" value="login now" class="form-btn" class="";>
   </form>

</div>

</body>
</html>