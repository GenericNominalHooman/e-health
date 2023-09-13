<?php
session_start();
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
require_once(COMPONENTS_DIR."/models.php");
require_once(COMPONENTS_DIR."/redirect.php");
require_once(COMPONENTS_DIR."/verification.php");
require_once(COMPONENTS_DIR."/profile_image_manager.php");
$profileDataOld = json_decode($_POST["profile_data_old"], true);
$dbObj = new Database();
$modelObj = new Models($dbObj->getConnection());
$loginModelObj = new LoginModel($dbObj->getConnection());
$profilModelObj = new ProfilModel($dbObj->getConnection());
print_r($_POST);

// Check POST profile data 
if(isset($_POST["nama"])){ // User has registered
    // Create verification object for checking nokp and nama field
    $messageHandler = new MessageHandler($loginModelObj);
    $verificationObj = new Verification($messageHandler, $loginModelObj, $profilModelObj);    
    
    // Ignore update if new profile data is the same as old profile data for nama field
    if($_POST["nama"] != $profileDataOld["nama"]){
        // Prevent updating of nama when there's other record with the same nama
        if(!$verificationObj->isNameExist($_POST["nama"])){
            $loginModelObj->updateUser("loginpentadbir", "id", $profileDataOld["id_login"], ["namapentadbir"=>$_POST["nama"]]);

            // Update Auth array to reflect DB changes for nama
            $_SESSION["Auth"]["nama"] = $_POST["nama"];
        }

    }


    // Ignore update if new profile data is empty for gambar_profil_baru
    if(!empty($_FILES["gambar_profil_baru"])){
        $profilImageManager = new ProfileImageManager($loginModelObj);
        // Upload profile image
        $profilImageManager->uploadProfileImage("pentadbir", $profileDataOld["id_login"], $_FILES["gambar_profil_baru"]);

        // Update Auth array to reflect DB changes for gambarprofil
        $_SESSION["Auth"]["gambarprofilpentadbir"] = $profilImageManager->getProfileImage("pentadbir", $profileDataOld["id_login"]);
    }
}else{ // User access through GET method or illegal profile action
    Redirect::redirectWithMsg("Location: ".PENTADBIR_URL, "Sila login dahulu.");
}
?>