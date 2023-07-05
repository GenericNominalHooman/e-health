<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health/site_config.php");
?>
<?php
require_once(COMPONENTS_DIR."/sanitize.php");
require_once(COMPONENTS_DIR."/models.php");

class Verify{
    public static function verifyNama($nama){
        $sanitizedNama = Sanitize::sanitize($nama);
        // nama verification check
        if(preg_match('/^[a-zA-Z0-9-_]{5,20}$/', $sanitizedNama)){
            // Check whether the specified nama is already used in db
            $modelsFactory = new ModelsFactory();
            $userModel = $modelsFactory->createUserModel();
            if(!$userModel->getPelajarWhere('nama', $nama)){ 
                return true;
            }
        }
        return false;
    }

    public static function verifyPassword($password){
        $sanitizedPassword = Sanitize::sanitize($password);
        // Password verification check
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/', $sanitizedPassword) ? true : false;
    }

    public static function verifyNOKP($nokp){
        $sanitizedNOKP = Sanitize::sanitize($nokp);
        // NOKP verification check
        if (preg_match('/^[0-9]{12}$/', $sanitizedNOKP)) {
            // Check whether the specified NOKP is already used in db
            $modelsFactory = new ModelsFactory();
            $userModel = $modelsFactory->createUserModel();
            if(!$userModel->getPelajarWhere('nokp', $nokp)){ 
                return true;
            }
        };
        return false;
    }
}
?>