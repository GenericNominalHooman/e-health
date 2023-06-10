<?php
// Importing site configuration
require_once($_SERVER["DOCUMENT_ROOT"]."/hospital/site_config.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Log Masuk</title>

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
<div class="form-container">
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100" >
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px; border-color:skyblue;">
          <div class="card-body p-4 p-md-5" >
          <img src="images/gururemove.png" class="rounded mx-auto d-block mb-3" witdh="200" height="150">
		  <h2 class="text-center mb-3">LOG MASUK GURU BERTUGAS</h2>
     <form autocomplte="off" action="logintest.php"  method="post" >

     	<?php 
        if(isset($_GET['error'])) {
          echo("<p class='error'>".$_GET['error']."</p>");
        }
      ?>
     	<div class="form-outline mb-4">
                            <div class="form-floating">
                              <input type="uname" id="uname" name="uname"  class="form-control" placeholder="Username" >
                              <label  for="floatingPassword">Username</label></div>
                                </div>

                          <!-- Password input -->
                             <div class="form-outline mb-4">
                             <div class="form-floating">
                                <input type="password" id="password" name="password"  class="form-control" placeholder="Password"/>
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
<?php include(COMPONENTS_DIR."/footer.php"); ?>
