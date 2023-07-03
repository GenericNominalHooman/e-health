<?php
session_start();
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
require_once(COMPONENTS_DIR . "/models.php");
require_once(COMPONENTS_DIR . "/redirect.php");
require_once(COMPONENTS_DIR . "/verification.php");
require_once(COMPONENTS_DIR . "/message_handler.php");
require_once(COMPONENTS_DIR . "/profile_image_manager.php");
$dbObj = new Database();
$modelObj = new Models($dbObj->getConnection());
$loginModelObj = new LoginModel($dbObj->getConnection());
$profilModelObj = new ProfilModel($dbObj->getConnection());

print_r($_POST["profile_data_old"]);
print_r($_POST);
print_r($_FILES["gambar_profil_baru"]);

// Main
$profileManagerObj = new ProfileManager($loginModelObj, $profilModelObj);
if (isset($_POST["nama"]) && isset($_POST["profile_data_old"]["id_profil"])) { // Update profile
    print_r("Updating profile");
    $profileManagerObj->updateProfile();
} else if(isset($_POST["nama"])){ // Add new profile
    $profileManagerObj->addProfile();
} else { // Invalid profile action
    Redirect::redirectWithMsg(PELAJAR_URL."/Profil/profil.php","Aksi profil yang tidak sah, sila cuba sekali lagi.");
}
// End main

class ProfileManager
{
    private $loginModelObj;
    private $profilModelObj;

    public function __construct($loginModelObj, $profilModelObj)
    {
        $this->loginModelObj = $loginModelObj;
        $this->profilModelObj = $profilModelObj;
    }

    public function updateProfile()
    {
        $profileDataOld = json_decode($_POST["profile_data_old"], true);

        // Create verification object for checking nokp and nama field
        $messageHandler = new MessageHandler($this->loginModelObj);
        $verificationObj = new Verification($messageHandler, $this->loginModelObj, $this->profilModelObj);

        // Ignore update if new profile data is the same as old profile data for nama field
        if ($_POST["nama"] != $profileDataOld["nama"]) {
            // Prevent updating of nama when there's other record with the same nama
            if (!$verificationObj->isNameExist($_POST["nama"])) {
                $this->loginModelObj->updateUser("loginpelajar", "id", $profileDataOld["id"], ["namapelajar" => $_POST["nama"]]);

                // Update Auth array to reflect DB changes for nama
                $_SESSION["Auth"]["nama"] = $_POST["nama"];
            }
        }

        // Ignore update if new profile data is empty for gambar_profil_baru
        if (!empty($_FILES["gambar_profil_baru"])) {
            $profilImageManager = new ProfileImageManager($this->loginModelObj);
            // Upload profile image
            $profilImageManager->uploadProfileImage("pelajar", $profileDataOld["id_login"], $_FILES["gambar_profil_baru"]);

            // Update Auth array to reflect DB changes for gambarprofil
            $_SESSION["Auth"]["gambarprofilpelajar"] = $profilImageManager->getProfileImage("pelajar", $profileDataOld["id_login"]);
        }

        // Ignore update if new profile data is the same as old profile data for nokp 
        if ($_POST["no_kad_pengenalan"] != $profileDataOld["nokp"]) {
            // Prevent updating of nokp when there's other record with the same nokp
            if (!$verificationObj->isKPExist($_POST["no_kad_pengenlan"])) {
                $this->profilModelObj->updateUser("profilpelajar", "id", $profileDataOld["id_profil"], ["nokp" => $_POST["no_kad_pengenalan"]]);
            }
        }

        // Ignore update if new profile data is the same as old profile data for nomatrik field
        if ($_POST["no_matrik"] != $profileDataOld["nomatrikpelajar"]) {
            $this->profilModelObj->updateUser("profilpelajar", "id", $profileDataOld["id_profil"], ["nomatrikpelajar" => $_POST["no_matrik"]]);
        }

        // Ignore update if new profile data is the same as old profile data for dorm 
        if ($_POST["dorm"] != $profileDataOld["dorm"]) {
            $this->profilModelObj->updateUser("profilpelajar", "id", $profileDataOld["id_profil"], ["dorm" => $_POST["dorm"]]);
        }

        // Ignore update if new profile data is the same as old profile data for notelpelajar 
        if ($_POST["no_telefon"] != $profileDataOld["notelpelajar"]) {
            $this->profilModelObj->updateUser("profilpelajar", "id", $profileDataOld["id_profil"], ["notelpelajar" => $_POST["no_telefon"]]);
        }

        // Ignore update if new profile data is the same as old profile data for namabapapelajar 
        if ($_POST["bapa"] != $profileDataOld["namabapapelajar"]) {
            $this->profilModelObj->updateUser("profilpelajar", "id", $profileDataOld["id_profil"], ["namabapapelajar" => $_POST["bapa"]]);
        }

        // Ignore update if new profile data is the same as old profile data for notelbapapelajar 
        if ($_POST["no_telefon_bapa"] != $profileDataOld["notelbapapelajar"]) {
            $this->profilModelObj->updateUser("profilpelajar", "id", $profileDataOld["id_profil"], ["notelbapapelajar" => $_POST["no_telefon_bapa"]]);
        }

        // Ignore update if new profile data is the same as old profile data for namaibupelajar 
        if ($_POST["ibu"] != $profileDataOld["namaibupelajar"]) {
            $this->profilModelObj->updateUser("profilpelajar", "id", $profileDataOld["id_profil"], ["namaibupelajar" => $_POST["ibu"]]);
        }

        // Ignore update if new profile data is the same as old profile data for notelibupelajar 
        if ($_POST["no_telefon_ibu"] != $profileDataOld["notelibupelajar"]) {
            $this->profilModelObj->updateUser("profilpelajar", "id", $profileDataOld["id_profil"], ["notelibupelajar" => $_POST["no_telefon_ibu"]]);
        }

        // Ignore update if new profile data is the same as old profile data for penyakitpelajar 
        if ($_POST["penyakit"] != $profileDataOld["penyakitpelajar"]) {
            $this->profilModelObj->updateUser("profilpelajar", "id", $profileDataOld["id_profil"], ["penyakitpelajar" => $_POST["penyakit"]]);
        }

        // Ignore update if new profile data is the same as old profile data for penyakitpelajar 
        if ($_POST["alamat_rumah"] != $profileDataOld["alamatpelajar"]) {
            $this->profilModelObj->updateUser("profilpelajar", "id", $profileDataOld["id_profil"], ["alamatpelajar" => $_POST["alamat_rumah"]]);
        }

        // Ignore update if new profile data is the same as old profile data for alahan 
        if ($_POST["alahan"] != $profileDataOld["alahan"]) {
            $this->profilModelObj->updateUser("profilpelajar", "id", $profileDataOld["id_profil"], ["alahan" => $_POST["alahan"]]);
        }
    }

    public function addProfile()
    {
        $profileDataOld = json_decode($_POST["profile_data_old"], true);
        print_r($profileDataOld);
        $newProfileData = [];

        // Update newProfileData for each inputted entries
        // Create verification object for checking nokp and nama field
        $messageHandler = new MessageHandler($this->loginModelObj);
        $verificationObj = new Verification($messageHandler, $this->loginModelObj, $this->profilModelObj);

        // Ignore update if new profile data is the same as old profile data for nama field
        if ($_POST["nama"] != $profileDataOld["nama"]) {
            // Prevent updating of nama when there's other record with the same nama
            if (!$verificationObj->isNameExist($_POST["nama"])) {
                $this->loginModelObj->updateUser("loginpelajar", "id", $profileDataOld["id"], ["namapelajar" => $_POST["nama"]]);

                // Update Auth array to reflect DB changes for nama
                $_SESSION["Auth"]["nama"] = $_POST["nama"];
            }
        }

        // Ignore update if new profile data is empty for gambar_profil_baru
        if (!empty($_FILES["gambar_profil_baru"])) {
            $profilImageManager = new ProfileImageManager($this->loginModelObj);
            // Upload profile image
            $profilImageManager->uploadProfileImage("pelajar", $profileDataOld["id_login"], $_FILES["gambar_profil_baru"]);

            // Update Auth array to reflect DB changes for gambarprofil
            $_SESSION["Auth"]["gambarprofilpelajar"] = $profilImageManager->getProfileImage("pelajar", $profileDataOld["id_login"]);
        }

        // Ignore update if new profile data is the same as old profile data for nokp 
        if ($_POST["no_kad_pengenalan"] != $profileDataOld["nokp"]) {
            // Prevent updating of nokp when there's other record with the same nokp
            if (!$verificationObj->isKPExist($_POST["no_kad_pengenlan"])) {
                $newProfileData["nokp"] = $_POST["no_kad_pengenlan"];
            }
        }

        // Ignore update if new profile data is the same as old profile data for nomatrik field
        if ($_POST["no_matrik"] != $profileDataOld["nomatrikpelajar"]) {
            $newProfileData["nomatrikpelajar"] = $_POST["no_matrik"];
        }

        // Ignore update if new profile data is the same as old profile data for dorm 
        if ($_POST["dorm"] != $profileDataOld["dorm"]) {
            $newProfileData["dorm"] = $_POST["dorm"];
        }

        // Ignore update if new profile data is the same as old profile data for notelpelajar 
        if ($_POST["no_telefon"] != $profileDataOld["notelpelajar"]) {
            $newProfileData["notelpelajar"] = $_POST["no_telefon"];
        }

        // Ignore update if new profile data is the same as old profile data for namabapapelajar 
        if ($_POST["bapa"] != $profileDataOld["namabapapelajar"]) {
            $newProfileData["namabapapelajar"] = $_POST["bapa"];
        }

        // Ignore update if new profile data is the same as old profile data for notelbapapelajar 
        if ($_POST["no_telefon_bapa"] != $profileDataOld["notelbapapelajar"]) {
            $newProfileData["notelbapapelajar"] = $_POST["no_telefon_bapa"];
        }

        // Ignore update if new profile data is the same as old profile data for namaibupelajar 
        if ($_POST["ibu"] != $profileDataOld["namaibupelajar"]) {
            $newProfileData["namaibupelajar"] = $_POST["ibu"];
        }

        // Ignore update if new profile data is the same as old profile data for notelibupelajar 
        if ($_POST["no_telefon_ibu"] != $profileDataOld["notelibupelajar"]) {
            $newProfileData["notelibupelajar"] = $_POST["no_telefon_ibu"];
        }

        // Ignore update if new profile data is the same as old profile data for penyakitpelajar 
        if ($_POST["penyakit"] != $profileDataOld["penyakitpelajar"]) {
            $newProfileData["penyakitpelajar"] = $_POST["penyakit"];
        }

        // Ignore update if new profile data is the same as old profile data for penyakitpelajar 
        if ($_POST["alamat_rumah"] != $profileDataOld["alamatpelajar"]) {
            $newProfileData["alamatpelajar"] = $_POST["alamat_rumah"];
        }

        // Ignore update if new profile data is the same as old profile data for alahan 
        if ($_POST["alahan"] != $profileDataOld["alahan"]) {
            $newProfileData["alahan"] = $_POST["alahan"];
        }

        // Insert new record into profil table
        if (!empty($newProfileData)) {
            $this->profilModelObj->createUser("profilpelajar", $newProfileData);
        }
    }
}
?>