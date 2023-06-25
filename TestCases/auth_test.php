<?php
    // Import site config
    require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
    // Import auth component
    require_once(COMPONENTS_DIR . "/auth.php");

    $dbObj = new Database();
    $authObj = new Auth($dbObj->getConnection());
?>
<h2>Login Pelajar</h2>
<form action="<?php echo($_SERVER["PHP_SELF"]);?>" method="POST">
    <input type="text" name="nama">
    <input type="text" name="password">
    <button type="submit" name="submit">Submit</button>
</form>
<?php
    // Login pelajar
    if(isset($_POST["submit"])){

        if($authObj->authPelajar($_POST["nama"], $_POST["password"])){
            // Mesej untuk user yang dah login
            d($_SESSION["Auth"]); // OK
            echo("BERJAYA LOG MASUK");
        }else{
            // Mesej untuk user yang x berjaya login
            echo("PASSWORD ANDA SALAH");
        }
    }
?>
<?php
    // Erase all session variables PS: do this only on logout
    session_unset();
?>