<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php");
require_once(E_HEALTH_DIR."/site_config.php");

?>
<?php
class Redirect{
    public function redirectToWithError($page, $errorMsg){
        header("Location: $page?error=<div class='alert alert-dark' role='alert'>$errorMsg</div>");
        exit();
    }

    public function redirect($page){
        header("Location: $page");
        exit();
    }
}
?>