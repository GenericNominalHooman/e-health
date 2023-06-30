 <?php
    // Import site config

use SebastianBergmann\Environment\Console;

    require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
    ?>
 <?php
    // Import header
    require_once(COMPONENTS_DIR . "/header.php");
    // Message handler
    require_once(COMPONENTS_DIR . "/message_handler.php");
    // Redirect
    require_once(COMPONENTS_DIR . "/redirect.php");
    // Model
    require_once(COMPONENTS_DIR . "/models.php");
    // Verirfication
    require_once(COMPONENTS_DIR . "/verification.php");
    // Import sidebar(Please uncomment the appropiate user sidebar for your page)
    // require_once(TEMPLATE_DIR . "/sidebar2_guest.php"); // Guest sidebar
    require_once(TEMPLATE_DIR . "/sidebar2_pelajar.php"); // Pelajar sidebar
    // require_once(TEMPLATE_DIR . "/sidebar2_pentadbir.php"); // Pentadbir sidebar
    // require_once(TEMPLATE_DIR . "/sidebar2_warden.php"); // Warden sidebar
    // require_once(TEMPLATE_DIR . "/sidebar2_guru.php"); // Guru sidebar
    ?>

 <!-- CONTENT HERE -->
 <div id="#errorMessageContainer"></div>
 <form action="<?php echo($_SERVER["PHP_SELF"])?>" autocomplete="off" method="post">
     <!-- No K/P input -->
     <div class="form-outline mb-4">
         <div class="form-floating">
             <input type="text" name="kata_laluan_lama" class="form-control" placeholder="Kata Laluan Lama">
             <label for="floatingPassword">Kata Laluan Lama</label>
         </div>
     </div>

     <!-- Password input -->
     <div class="form-outline mb-4">
         <div class="form-floating">
             <input type="password" id="password" name="kata_laluan_baharu" class="form-control" placeholder="Kata Laluan Baharu">
             <label class="form-label" for="password">Kata Laluan Baharu</label>
             <label for="floatingPassword">Kata Laluan Baharu</label>
             <div class="mt-3">
                 <input type="checkbox" onclick="myFunction()">&nbsp;Tunjuk Kata Laluan
             </div>
         </div>
     </div>

     <!-- Submit button -->
     <div class="form-outline mb-4">
         <button type="submit" name="submit_tukar_kata_laluan" class="btn bg-secondary-custom primary-custom btn-lg btn-block border border-blue-500">Tukar Kata Laluan</button>
     </div>
     Kembali&nbsp;<a href="<?php echo (SITE_URL . "/index.php"); ?>" class="secondary-custom">Halaman Utama</a>
 </form>
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

<?php
    // Backend: Handling user attempt to change password
    $messageHandlerObj = new MessageHandler();
    $dbObj = new Database();
    $loginModel = new LoginModel($dbObj->getConnection());
    $profilModel = new ProfilModel($dbObj->getConnection());
    $verificationObj = new Verification($messageHandlerObj, $loginModel, $profilModel);
    
    $validInput = true;
    if($_SESSION["Auth"]){
        if(isset($_POST["submit_tukar_kata_laluan"])){
            $kataLaluanLama = $verificationObj->escapeOutput($_POST["kata_laluan_lama"]);
            $kataLaluanLamaDB = $loginModel->getAllPelajarWhere("id", $_SESSION["Auth"]["id"])[0]["katalaluanpelajar"];
            d($kataLaluanLamaDB);
            d($kataLaluanLama);
            d(password_hash($kataLaluanLama, PASSWORD_BCRYPT));
            $kataLaluanBaharu = $verificationObj->escapeOutput($_POST["kata_laluan_baharu"]);
            
            // Check whether kata laluan lama is correct
            if(!empty(($kataLaluanLama))){
                if(!password_verify($kataLaluanLama, $kataLaluanLamaDB)){
                    $verificationObj->handleError("Kata laluan lama yang anda masukkan adalah salah.");
                    $validInput = false;
                }
            }

            // Check whether both kata laluan baru & lama is the same
            if($kataLaluanLama == $kataLaluanBaharu){
                $verificationObj->handleError("Kata laluan lama anda adalah sama dengan kata laluan baharu anda.");
                $validInput = false;
            }
            
            // Check whether the new kata laluan is shorter than 6 character
            if(strlen($kataLaluanBaharu)<6){
                $verificationObj->handleError("Kata laluan baharu anda mestilah melebihi 6 huruf.");
                $validInput = false;
            }

            // Update login model
            if($validInput){
                $loginModel->updateUser("loginpelajar", "id", $_SESSION["Auth"]["id"], [
                    "katalaluanpelajar" => password_hash($kataLaluanBaharu, PASSWORD_BCRYPT),
                ]);
                d("Updating user");
                $messageHandlerObj->addMessage("help", "Berjaya tukar kata laluan.");
            }
        }
    }else{
        Redirect::redirectWithMsg(SITE_URL."/index.php", "Sila log masuk terdahulu.");
    }
        ?>
<script>
    // Frontend: Handling error message from failed password change attempt
    let verificationJSON = new MessageHandlerJSON('<?php echo($messageHandlerObj->getMessagesJSON());?>');
    verificationJSON.displayMessages("#errorMessageContainer");
</script>
 <!-- END CONTENT -->

 <?php
    // Import header
    require_once(COMPONENTS_DIR . "/footer.php");
    ?>