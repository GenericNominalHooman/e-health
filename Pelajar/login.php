<?php
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health2/site_config.php");
require_once(COMPONENTS_DIR . "/config.php");
require_once(COMPONENTS_DIR . "/redirect.php");
require_once(COMPONENTS_DIR . "/auth.php");
require_once(COMPONENTS_DIR . "/message_handler.php");
require_once(TEMPLATE_DIR . "/sidebar2_guest.php");
require_once(COMPONENTS_DIR . "/header.php");
?>

<?php
// Declaring Global Variables
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

<!-- CONTENT START -->
<?php
// Login pelajar
if (isset($_POST["submit"])) {
  //auth perlu ditukar
  if ($authObj->authPelajar($_POST["namapelajar"], $_POST["katalaluanpelajar"])) {
    // Redirect user to the profile page
    Redirect::redirect(PELAJAR_URL . "/Profil/profil.php");
  } else {
    Redirect::redirectWithMsg(PELAJAR_URL . "/login.php", "Kombinasi nama pengguna atau kata laluan yang digunakan adalah salah.");
  }
}
?>

  <section class="gradient-custom">
    <div class="container py-5">
      <div class="row justify-content-center align-items-center">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-lg card-registration" style="border-radius: 15px;">
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

              <div class="container-xxl justify-content-center align-items-center text-center">
                <div class="row">
                  <div class="col-12 p-4">
                    <i class="fa-5x fa-solid fa-graduation-cap"></i>
                  </div>
                </div>
              </div>
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">LOG MASUK PELAJAR</h3>

              <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                  <a href="<?php echo (PELAJAR_URL . "/register.php"); ?>" class="nav-link" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Daftar Masuk</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="<?php echo (PELAJAR_URL . "/login.php"); ?>" class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Log Masuk</a>
                </li>
              </ul>

              <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="POST">                

                <!-- No K/P input -->

                <div class="form-outline mb-4">
                  <div class="form-floating">
                    <input type="text" autocomplete="off" name="namapelajar" class="form-control" placeholder="Nama">
                    <label for="floatingPassword">Nama</label>
                  </div>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <div class="form-floating">
                    <input type="password" id="password" name="katalaluanpelajar" class="form-control" placeholder="Kata Laluan">
                    <label class="form-label" for="password">Kata Laluan</label>
                    <label for="floatingPassword">Kata Laluan</label>
                    <div class="mt-3">
                      <input type="checkbox" onclick="myFunction()">&nbsp;Tunjuk Kata Laluan
                    </div>
                  </div>
                </div>




                <!-- Submit button -->
                <div class="form-outline mb-4">
                  <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Log Masuk</button>
                </div>
                Kembali&nbsp;<a href='<?php echo(SITE_URL."/index.php")?>'>Halaman Utama</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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
