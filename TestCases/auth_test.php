<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
// Import auth component
require_once(COMPONENTS_DIR . "/auth.php");

<<<<<<< Updated upstream
$dbObj = new Database();
$authObj = new Auth($dbObj->getConnection());

// Check whether the user has already login
if($authObj->isAuth()){
    d($_SESSION["Auth"]);
}
?>
<h2>Login Pengguna</h2>
<form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="POST">
    <input type="text" name="nama">
    <input type="text" name="password">
    <select name="jenispengguna">
        <option selected value="pelajar">Pelajar</option>
        <br>
        <option value="guru">Guru</option>
        <br>
        <option value="warden">Warden</option>
        <br>
        <option value="pentadbir">Pentadbir</option>
        <br>
    </select>
    <button type="submit" name="submit_login">Login</button>
</form>
<!-- Clear session variables button(NOT RELATED TO auth COMPONENT, PLEASE IGNORE) -->
<button id="clearSessionBtn">Clear Session</button><br>
<?php
// Login user
if (isset($_POST["submit_login"])) {
    switch($_POST["jenispengguna"]){
        case "pelajar":
                if ($authObj->authPelajar($_POST["nama"], $_POST["password"])) {
                    // Mesej untuk user yang dah login
                    d($_SESSION["Auth"]); // OK
                    echo ("BERJAYA LOG MASUK");
                } else {
                    // Mesej untuk user yang x berjaya login
                echo ("PASSWORD ANDA SALAH");
                }
        break;
        case "guru":
                if ($authObj->authGuru($_POST["nama"], $_POST["password"])) {
                    // Mesej untuk user yang dah login
                    d($_SESSION["Auth"]); // OK
                    echo ("BERJAYA LOG MASUK");
                } else {
                    // Mesej untuk user yang x berjaya login
                echo ("PASSWORD ANDA SALAH");
                }
        break;
        case "warden":
                if ($authObj->authWarden($_POST["nama"], $_POST["password"])) {
                    // Mesej untuk user yang dah login
                    d($_SESSION["Auth"]); // OK
                    echo ("BERJAYA LOG MASUK");
                } else {
                    // Mesej untuk user yang x berjaya login
                echo ("PASSWORD ANDA SALAH");
                }
        break;
        case "pentadbir":
                if ($authObj->authPentadbir($_POST["nama"], $_POST["password"])) {
                    // Mesej untuk user yang dah login
                    d($_SESSION["Auth"]); // OK
                    echo ("BERJAYA LOG MASUK");
                } else {
                    // Mesej untuk user yang x berjaya login
                echo ("PASSWORD ANDA SALAH");
                }
        break;
    }
}
?>
<script>
    // CLEAR SESSION BUTTON, PLEASE IGNORE
    function clearSession() {
        $.ajax({
            url: 'clear_session.php',
            type: 'GET',
            success: function() {
                console.log("Session cleared");
            },
            error: function() {
                console.error("Failed to clear session");
            }
        });
    }
    
    // Runs clearSession() once Clear Session button is clicked
    $(document).ready(function(){
        $("#clearSessionBtn").on("click", function(){
            console.log("Clearing session");
            clearSession();
        })
    })
    // END CLEAR SESSION BUTTON, PLEASE IGNORE
</script>
<?php
// Erase all session variables PS: do this only on logout
// session_unset();
=======
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
        }
    }
?>
<?php
    // Erase all session variables PS: do this only on logout
    session_unset();
>>>>>>> Stashed changes
?>