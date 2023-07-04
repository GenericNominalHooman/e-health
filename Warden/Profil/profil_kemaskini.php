<?php
session_start();
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health2/site_config.php");
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
if(isset($_POST["nama"]) && isset($profileDataOld["id_profil"])){ // User has registered and filled in profile page information
    // Create verification object for checking no_kp and nama field
    $messageHandler = new MessageHandler($loginModelObj);
    $verificationObj = new Verification($messageHandler, $loginModelObj, $profilModelObj);    
    
    // Ignore update if new profile data is the same as old profile data for nama field
    if($_POST["nama"] != $profileDataOld["nama"]){
        // Prevent updating of nama when there's other record with the same nama
        if(!$verificationObj->isNameExist($_POST["nama"])){
            $loginModelObj->updateUser("loginwarden", "id", $profileDataOld["id"], ["namawarden"=>$_POST["nama"]]);

            // Update Auth array to reflect DB changes for nama
            $_SESSION["Auth"]["nama"] = $_POST["nama"];
        }

    }

    // Ignore update if new profile data is empty for gambar_profil_baru
    if(!empty($_FILES["gambar_profil_baru"])){
        $profilImageManager = new ProfileImageManager($loginModelObj);
        // Upload profile image
        $profilImageManager->uploadProfileImage("warden", $profileDataOld["id_login"], $_FILES["gambar_profil_baru"]);

        // Update Auth array to reflect DB changes for gambarprofil
        $_SESSION["Auth"]["gambarprofilwarden"] = $profilImageManager->getProfileImage("warden", $profileDataOld["id_login"]);
    }
    
    // Ignore update if new profile data is the same as old profile data for no_kp 
    if($_POST["no_kad_pengenalan"] != $profileDataOld["nokp"]){
        // Prevent updating of no_kp when there's other record with the same no_kp
        if(!$verificationObj->isKPExist($_POST["no_kad_pengenlan"])){
            $profilModelObj->updateUser("profilwarden", "id", $profileDataOld["id_profil"], ["nokp"=>$_POST["no_kad_pengenalan"]]);
        }
    }
    
    // Ignore update if new profile data is the same as old profile data for notelwarden 
    if($_POST["no_telefon"] != $profileDataOld["notelwarden"]){
        $profilModelObj->updateUser("profilwarden", "id", $profileDataOld["id_profil"], ["notelwarden"=>$_POST["no_telefon"]]);
    }

    // Ignore update if new profile data is the same as old profile data for notelwarden 
    if($_POST["no_plat"] != $profileDataOld["noplatwarden"]){
        $profilModelObj->updateUser("profilwarden", "id", $profileDataOld["id_profil"], ["noplatwarden"=>$_POST["no_plat"]]);
    }
}else if(isset($_POST["nama"])){ // User has registered but not yet filled in profile page information
    // Create verification object for checking no_kp and nama field
    $messageHandler = new MessageHandler($loginModelObj);
    $verificationObj = new Verification($messageHandler, $loginModelObj, $profilModelObj);   
    $newProfileData = []; 
    $validInput = true; 
    $newProfileData["id"] = null;
    $newProfileData["id_login"] = $profileDataOld["id_login"];

    // Ignore update if new profile data is the same as old profile data for nama field
    if($_POST["nama"] != $profileDataOld["nama"]){
        // Prevent updating of nama when there's other record with the same nama
        if(!$verificationObj->isNameExist($_POST["nama"])){
            $loginModelObj->updateUser("loginwarden", "id", $profileDataOld["id"], ["namawarden"=>$_POST["nama"]]);

            // Update Auth array to reflect DB changes for nama
            $_SESSION["Auth"]["nama"] = $_POST["nama"];
        }

    }

    // Ignore update if new profile data is empty for gambar_profil_baru
    if(!empty($_FILES["gambar_profil_baru"])){
        $profilImageManager = new ProfileImageManager($loginModelObj);
        // Upload profile image
        $profilImageManager->uploadProfileImage("warden", $profileDataOld["id_login"], $_FILES["gambar_profil_baru"]);

        // Update Auth array to reflect DB changes for gambarprofil
        $_SESSION["Auth"]["gambarprofilwarden"] = $profilImageManager->getProfileImage("warden", $profileDataOld["id_login"]);
    }
    
    // Prevent updating of no_kp when there's other record with the same no_kp
    if(!$verificationObj->isKPExist($_POST["no_kad_pengenalan"])){
        $newProfileData["nokp"] = $_POST["no_kad_pengenalan"];
    }
    
    // Prevent updating of no_kp when there's other record with the same no_kp
    $newProfileData["notelwarden"] = $_POST["no_telefon"];
    
    $newProfileData["noplatwarden"] = $_POST["no_plat"];

    // Create new profile entry from $newProfileData
    $profilModelObj->createUser("profilwarden", $newProfileData);
}
else{ // User access through GET method or illegal profile action
    Redirect::redirectWithMsg("Location: ".WARDEN_URL, "Sila login dahulu.");
}
?>