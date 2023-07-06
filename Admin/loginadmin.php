<?php

include"config.php";

if(isset($_POST['username'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql = "select * from loginadmin where username = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            header("Location: dashboard.php");
        }  
        else{  
            echo  '<script>
                        window.location.href = "index.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }     
    }
    /*$result=mysqli_query("select*from loginadmin where username= '$username' and password = '$password'") or die("Failed".mysqli_error());
  $row=mysqli_fetch_array($result);

  if ($row['username'] == $username && $row['password'] == $password){
  echo "login succesful".$row['username'];
  } else {
  echo "failed";
  }
}
    $sql="select * from loginadmin where username='".$username."AND pasword='".$password."limit 1";
    
    $result=mysqli_query($sql);
    
    if(mysqli_num_rows($result)==1){
        echo " You Have Successfully Logged in";
        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }
        
}

	/*$result=mysql_query("select*from loginadmin where username= '$username' and password = '$password'") or die("Failed".mysql_error());
	$row=mysql_fetch_array($result);

if ($row['username'] == $username && $row['password'] == $password){
echo "login succesful".$row['username'];
}else {
echo "failed";
}*/
?>
<!-- <!DOCTYPE html>
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
</html>-->

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>E-HEATLH</title>

   <!-- custom css file link  
   <link rel="stylesheet" href="css/style.css">-->
   <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
  body{
    background-color:#ffff;
  }
  </style>

</head>
<body>
<div class="form-container">
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px; border-color:#172065;" >
          <div class="card-body p-4 p-md-5">
          <img src="img/admin.png" class="rounded mx-auto d-block mb-3" witdh="200" height="150">
		  <h2 class="text-center mb-3">LOG MASUK PENTADBIR</h2>
     <form action="loginadmin.php" method="post" autocomplete="off">

     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<div class="form-outline mb-4">
                            <div class="form-floating">
                              <input type="text"  name="username" class="form-control" placeholder="Username" />
                              <label  for="floatingPassword">Username</label></div>
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
                                
                    
        
      <!-- Submit button -->
      <div class="form-outline mb-4">
      <button type="submit" class="btn btn-primary btn-lg btn-block">Log Masuk</button>
      
      </div>
      Kembali&nbsp;<a href="../index.php">Halaman Utama</a>
      
    </form>
    
	
</body>
</html>
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
<?php include "footer2.php"; ?>
