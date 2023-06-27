<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health/site_config.php");
require_once(COMPONENTS_DIR."/models.php");
?>
<?php
class ProfileImageManager {
    private $loginModel;

    public function __construct($loginModel) {
        $this->loginModel = $loginModel;
    }

    public function getProfileImage($userType, $id) {
        $methodName = "getAll" . ucfirst($userType) . "Where";
        $users = $this->loginModel->$methodName('id', $id);

        if (count($users) > 0) {
            return UPLOADS_DIR . $users[0]["gambarprofil"];
        } else {
            return null;
        }
    }

    public function uploadProfileImage($userType, $id, $image) {
        $tableName = "login" . strtolower($userType);
        $idColumnName = 'id';

        d($image["name"]);
        // Upload the image to the "/uploads" directory
        $uploadsDir = UPLOADS_DIR;
        $imageName = $userType . '_' . $id . '_' . basename($image["name"]);
        $uploadPath = $uploadsDir . '/' . $imageName;

        d(dirname($uploadsDir));
        d(is_writeable("/usr/share/nginx/html"));

        if (move_uploaded_file($image["tmp_name"], $uploadPath)) {
            // Update the user's "gambarprofil" value in the database
            $data = ['gambarprofil' => $imageName];
            return $this->loginModel->updateUser($tableName, $idColumnName, $id, $data);
        } else {
            return false;
        }
    }
}
?>