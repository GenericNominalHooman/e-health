<?php
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health2/site_config.php");
require_once(COMPONENTS_DIR . "/header.php");
require_once(COMPONENTS_DIR . "/config.php");
require_once(COMPONENTS_DIR . "/redirect.php");
require_once(COMPONENTS_DIR . "/auth.php");
require_once(COMPONENTS_DIR . "/verification.php");
require_once(TEMPLATE_DIR . "/sidebar2_guest.php");
require_once(COMPONENTS_DIR . "/header.php");
?>

<!-- CONTENT BEGIN -->
<?php
// Declaring global variables
$dbObj = new Database();
$authObj = new Auth($dbObj->getConnection());
$conn = ($dbObj->getConnection());
?>

<?php
// Redirect to profile page if user has already logged on
if($authObj->isAuth()){
  $userAuth = $_SESSION["Auth"];
  switch($userAuth["jenispengguna"]){
    case "pelajar":
      Redirect::redirectWithMsg(PELAJAR_URL."/Profil/profil.php", "Untuk mengakses halaman daftar masuk, sila log keluar terlebih dahulu.");
    break;
    case "pentadbir":
      Redirect::redirectWithMsg(PENTADBIR_URL."/Profil/profil.php", "Untuk mengakses halaman daftar masuk, sila log keluar terlebih dahulu.");
    break;
    case "guru":
      Redirect::redirectWithMsg(GURU_URL."/Profil/profil.php", "Untuk mengakses halaman daftar masuk, sila log keluar terlebih dahulu.");
    break;
    case "warden":
      Redirect::redirectWithMsg(WARDEN_URL."/Profil/profil.php", "Untuk mengakses halaman daftar masuk, sila log keluar terlebih dahulu.");
    break;
  }
}
?>

<!-- CONTENT BEGIN -->
<?php
// Insansiating verification object to determine whether the passed in name is already in used
$loginModel = new LoginModel($dbObj->getConnection());
$profilModel = new ProfilModel($dbObj->getConnection());
$verificationObj = new Verification(null, $loginModel, $profilModel);

if (isset($_POST['submit'])) {
  // Check whether nama is in used
  if(!$verificationObj->isNameExist($_POST["namapelajar"])){
    //Registering pelajar
    if ($authObj->registerPelajar($_POST["namapelajar"], $_POST["katalaluan"], "")) {
      // Pelajar successfully registered
      // Login pelajar
      $authObj->authPelajar($_POST["namapelajar"], $_POST["katalaluan"]);
      Redirect::redirect(PELAJAR_URL."/Profil/profil.php");
    } else {
      // Pelajar wasn't successfully registered
      Redirect::redirectWithMsg(PELAJAR_URL . "/register.php", "Pendaftaran masuk gagal, tolong maklumkan pentadbir sistem berkaitan isu ini.");
    } 
  } else {
    // Pelajar wasn't successfully registered
    Redirect::redirectWithMsg(PELAJAR_URL . "/register.php", "Sila gunakan nama lain, nama pelajar tersebut sudah terdapat di dalam sistem.");
  }
}
?>
  <section class="gradient-custom">
    <div class="container py-5">
      <div class="row justify-content-center align-items-center">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card  shadow-lg card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <!-- MESSAGE HANDLER BACKEND BEGIN -->
                <!-- Container to display error message -->
                <div id="errorMessageContainer">
                </div>
                <!-- Handle failed login attempt -->
                <div class="col-md-6 mb-4">
                    <?php
                    if (isset($_POST["msg"])) {
                      $message = $_POST["msg"];
                      $messageHandlerObj = new MessageHandler();
                      $messageHandlerObj->addMessage("error", $message);
                    }
                    ?>
                </div>
              <!-- MESSAGE HANDLER BACKEND ENDS -->

              <img src="<?php echo (IMG_URL . "/admin.png"); ?>" class="rounded mx-auto d-block" witdh="200" height="150">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">DAFTAR MASUK PELAJAR</h3>

              <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                  <a href="<?php echo (PELAJAR_URL . "/register.php"); ?>" class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Daftar Masuk</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="<?php echo (PELAJAR_URL . "/login.php"); ?>" class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Log Masuk</a>
                </li>
              </ul>

              <form autocomplete="off" action="register.php" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                  <div class="form-floating">
                    <input type="text" name="namapelajar" class="form-control" placeholder="Nama" />
                    <label for="floatingPassword">Nama</label>
                  </div>
                </div>


                <!-- Kata Laluan input -->
                <div class="form-outline mb-4">
                  <div class="form-floating">
                    <input type="password" id="password" name="katalaluan" class="form-control" placeholder="Kata Laluan " />
                    <label class="form-label" for="katalaluan">Kata Laluan</label>
                    <label for="floatingPassword">Kata Laluan</label>
                    <div class="mt-3">
                      <input type="checkbox" onclick="myFunction()">&nbsp;Tunjuk Kata Laluan
                    </div>
                  </div>
                </div>
                <div class="mb-3">

                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Daftar </button>
                <div class="mt-3">

                </div>

              </form>
              Kembali&nbsp;<a href='<?php echo(SITE_URL."/index.php")?>'>Halaman Utama</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
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

<!-- MESSAGE HANDLER FRONTEND BEGIN -->
<script>
    let messageHandlerObj = '<?php echo($messageHandlerObj->getMessagesJSON());?>'||null;
    if(messageHandlerObj!=null){
      let messageHandlerJSON = new MessageHandlerJSON(messageHandlerObj);
      messageHandlerJSON.displayMessages("errorMessageContainer");
    }
  </script>
<!-- MESSAGE HANDLER FRONTEND END -->
<!-- CONTENT END -->

<?php
  require_once(COMPONENTS_DIR . "/footer.php");
?>