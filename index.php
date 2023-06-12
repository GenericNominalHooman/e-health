<?php
// Site configuration
require_once("./site_config.php");
require_once("./components/login_header.php");
?>
<section class="vh-100" style="background-color: aliceblue;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify content align-items-center h-100">
      <!--<div class="col col-xl-10">-->
      <div class="card shadow p-3 mb-5" style="border-radius:1rem; background-color: #D4F1F4; border-color:skyblue;">
        <div class="row g-0 justify-center">
          <div class="col-md-6 col-lg-12 d-none d-md-block container-fluid">

            <body class="d-flex flex-column min-vh-100">
              <div class="container py-3 my-3 col-lg-12">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                  <div class="container-fluid">

                    <img src="img/logoremove.png" alt="Logo" width="300" height="100" class=" img2"></li>


                    <img src="img/logo2remove.png" alt="Logo" width="290" height="130" class="rounded"></li>


                    <!--<a class="navbar-brand" href="#">
                  <center>
                    <img src="img/logoremove.png" alt="Logo" width="300" height="100" class="d-inline-block align-text-top">
                    <img src="img/logo2remove.png" alt="Logo" width="290" height="130" class="d-inline-block align-text-top">
                  </center>-->
                    </a>
                  </div>
              </div>
          </div>
          </nav>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <div class="card card text-center mb-3  img-fluid rounded" style=" border-color:skyblue;">
                <div class="card-body ">
                  <h5 class="card-title">PENDTADBIR</h5>
                  <img src="img/admin.png" width="90" height="100">
                  <p class="card-text"></p>
                  <a href="Admin/login3.php" class="btn btn-primary">LOG MASUK</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card card text-center mb-3" style="border-color:skyblue;">
                <div class="card-body">
                  <h5 class="card-title">GURU BERTUGAS</h5>
                  <img src="img/gururemove.png" width="95" height="100">
                  <p class="card-text"></p>
                  <a href="GuruBertugas/index2.php" class="btn btn-primary">LOG MASUK</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card card text-center mb-3 " style="border-color:skyblue;">
                <div class="card-body">
                  <h5 class="card-title">PELAJAR</h5>
                  <img src="img/pelajar2remove.png" width="95" height="100">
                  <p class="card-text"></p>

                  <a href="Pelajar/login3.php" class="btn btn-primary">LOG MASUK</a>

                </div>
              </div>
            </div>
          </div>
          <div class="mb-4">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!--<div class="row mt-3">
            <div class="col-6 offset-sm-3">
            <center>
        <img src="img/img2.png" class="img-fluid" alt="A WORD" width="200" height="200" ></a>
    <H2>PENTADBIR</H2>
<button class="btn btn1"  onclick="window.location.href='Admin/loginadmin.php';">LOG MASUK</button>
<script>
function msg(){
alert("WELCOME");
}</script>

<center>
<a href="#">
<img src="img/img2.png" class="img-fluid" alt="A WORD" width="200" height="200"></a>
<H2>GURU BERTUGAS</H2>
<button class="btn btn1"  onclick="window.location.href='GuruBertugas/index2.php';">LOG MASUK/DAFTAR</button>
<script>
function msg(){
alert("WELCOME");
}</script>


<center>
<img src="img/img2.png" class="img-fluid" alt="A WORD" width="200" height="200"></a>
<H2>PELAJAR</H2>
<button class="btn btn1"  onclick="window.location.href='Pelajar/index2.php';">LOG MASUK/DAFTAR</button>
<script>
function msg(){
alert("WELCOME");
}</script>
</script>
</div></div>

</div></div>-->
</BODY>

</HTML>
<?php require_once(COMPONENTS_DIR . "/footer.php"); ?>