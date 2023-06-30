<?php
// Import site config

use SebastianBergmann\Environment\Console;

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
            return $users[0][("gambarprofil".strtolower($userType))];
        } else {
            return null;
        }
    }

    public function uploadProfileImage($userType, $id, $image) {
        $tableName = "login" . strtolower($userType);
        $idColumnName = 'id';

        // Upload the image to the "/uploads" directory
        $uploadsDir = UPLOADS_DIR."/profile_images";
        $imageName = $userType . '_' . $id . '_' . basename($image["name"]);
        $uploadPath = $uploadsDir . '/' . $imageName;

        if (move_uploaded_file($image["tmp_name"], $uploadPath)) {
            // Update the user's "gambarprofil" value in the database
            $data = ['gambarprofilpelajar' => $imageName];
            return $this->loginModel->updateUser($tableName, $idColumnName, $id, $data);
        } else {
            return false;
        }
    }
}
?>