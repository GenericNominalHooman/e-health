<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/hospital/site_config.php");
?>
<?php
require_once(COMPONENTS_DIR."/verify_overhaul.php");
echo("
<form action='".$_SERVER["PHP_SELF"]."' method='post'>
    <input placeholder='name' type='text' name='username' id='username'>
    <input placeholder='number' type='number' name='nokp' id='username'>
    <input placeholder='password' type='text' name='password' id='username'>
    <input placeholder='password_confirm' type='text' name='password_confirm' id='username'>
    <button type='submit'>Submit</button>    
</form>
");
?>
<?php
$usernameVal = isset($_POST["username"]) ? d(Verify::verifyUsername($_POST["username"])) : "Username hasnt been setted";
$usernameVal = isset($_POST["nokp"]) ? d(Verify::verifyNOKP($_POST["nokp"])) : "NOKP hasnt been setted";
$usernameVal = isset($_POST["password"]) ? d(Verify::verifyNOKP($_POST["password"])) : "Password hasnt been setted";
?>