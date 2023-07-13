<?php 
include 'config.php';
include "auth.php";



?>
<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>E-HEALTH</title>

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
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">

            <form autocomplete="off" action="login3.php" method="post">
                
                            
               
                            <!-- No K/P input -->
              
                            <div class="form-group">
                            <div class="form-floating">
                              <input type="text" id="nokp" name="username" class="form-control" placeholder="Username" />
                              <label  for="floatingPassword">Username</label></div>
                                </div>

                          <!-- Password input -->
                             <div class="form-group mt-3">
                             <div class="form-floating">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email"/>
                                <label class="form-label" for="password">Email</label>
                                <label for="floatingPassword">Email</label>
</div>
                                <div class="mt-3">

                                <div class="form-group">
                             
                                <input type="file" id="file" name="file" class="form-control" placeholder="Email"/>
                                <div class="mt-3">
                              </div></div></div>
                                
                    

      <!-- Submit button -->
      
      </div>
      
    </form>
    
               <!--<div class="row">
               <div class="col-6">
               <div class="form-outline">
                  <div class="form-floating">
                    <input type="text" name="nokp" class="form-control form-control-lg" placeholder="No.Kad Pengenalan" />
                    <label  for="floatingPassword">No. Kad Pengenalan</label></div>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-outline">
                  <div class="form-floating">
                  <input type="password" class="form-control" name="password" placeholder="Password"  id="password" autocomplete="off">
                  <label for="floatingPassword">Password</label>
                  <input type="checkbox" onclick="myFunction()">&nbsp;Show Password
                    </div>
                  </div>
                </div>
              </div>
              <a href="login2.php" class="btn btn-outline-info">Daftar Masuk</a>
              <input type="submit" class="btn btn-outline-info" name="submit" value="Log Masuk">-->
              <div class="mt-3">

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
<?php include "footer.php"; ?>
<?php mysqli_close($conn); ?>