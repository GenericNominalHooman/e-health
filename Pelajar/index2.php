<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	 <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="form-container">
     <form action="logintest.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	
     	<input type="text" name="uname" placeholder="User Name" autocomplete="off"><br>

     	<input type="password" name="password" placeholder="Password" autocomplete="off"><br>

     	<input type="submit" value="login now" class="form-btn" >
		<a href="register_form.php">DAFTAR</a>&nbsp;BAGI PENGGUNA BAHARU
     </form>
	 </div>
</body>
</html>