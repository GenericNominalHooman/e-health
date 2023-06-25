<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
require_once(COMPONENTS_DIR."/message_handler.php");
require_once(COMPONENTS_DIR."/models.php");
require_once(COMPONENTS_DIR."/config.php");
?>
<?php
class Verification {
    private $messageHandler;
    private $loginModel;
    private $profilModel;

    public function __construct(MessageHandler $messageHandler, LoginModel $loginModel=null, ProfilModel $profilModel=null) {
        $this->messageHandler = $messageHandler;
        $this->loginModel = $loginModel;
        $this->profilModel = $profilModel;
    }

    public function sanitize($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    public function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function validateURL($url) {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    public function validateInt($integer) {
        return filter_var($integer, FILTER_VALIDATE_INT);
    }

    public function escapeOutput($output) {
        return htmlspecialchars($output, ENT_QUOTES, 'UTF-8');
    }

    public function validateImage($file) {
        $imageInfo = @getimagesize($file);
        return $imageInfo !== false;
    }

    public function handleError($errorMsg) {
        $this->messageHandler->addMessage('error', $errorMsg);
    }

    public function isNameExist($name) {
        $admins = $this->loginModel->getAllAdminWhere('namapentadbir', $name);
        $guruBertugas = $this->loginModel->getAllGuruBertugasWhere('namaguru', $name);
        $wardens = $this->loginModel->getAllWardenWhere('namawarden', $name);
        $pelajars = $this->loginModel->getAllPelajarWhere('namapelajar', $name);

        return !empty($admins) || !empty($guruBertugas) || !empty($wardens) || !empty($pelajars);
    }

    public function isKPExist($nokp) {
        $guruBertugas = $this->profilModel->getAllGuruBertugasWhere('nokp', $nokp);
        $wardens = $this->profilModel->getAllWardenWhere('nokp', $nokp);
        $pelajars = $this->profilModel->getAllPelajarWhere('nokp', $nokp);

        return !empty($guruBertugas) || !empty($wardens) || !empty($pelajars);
    }
}
?>