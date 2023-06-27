<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health/site_config.php");
require_once(COMPONENTS_DIR."/profile_image_manager.php");
require_once("auth_register_test.php");
require_once("auth_test.php");
?>
<br>
<h2>Upload gambar profil</h2>
<br>
<form action="<?php echo($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <input type="file" name="profileImage" placeholder="Upload Profile Image Here">
    <button type="submit" name="submit">Submit</button>
</form>
<?php
$dbObj = new Database();
$loginModel = new LoginModel($dbObj->getConnection());
$profileImageManagerObj = new ProfileImageManager($loginModel);
if(isset($_POST["submit"])){
    d($_POST);
    d($_FILES);
    $profileImageManagerObj->uploadProfileImage("pelajar", $_SESSION["Auth"]["id"], $_FILES["profileImage"]);
}
?>