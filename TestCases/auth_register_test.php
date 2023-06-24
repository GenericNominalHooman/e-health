<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
// Import auth component
require_once(COMPONENTS_DIR . "/auth.php");

$dbObj = new Database();
$authObj = new Auth($dbObj->getConnection());

// Check whether the current user is currently authenthicated by checking whether the sesion key Auth has been set(Set = True, X Set = False)
if ($authObj->isAuth()) {
    echo ("<br>Hello I'm an authenthicated user and this is a message for authenthicated user<br>This is my user information<br>");
    d($_SESSION["Auth"]);
} else {
    echo ("<br>Hello I'm a guest, I'm not yet authenthicated<br>");
}
?>
<div>
    <!-- User registeration form -->
    <form action="<?php echo ($_SERVER["PHP_SELF"]) ?>" method="POST">
        <div class="inputField"><input type="text" name="nama" placeholder="nama"><br></div>
        <div class="inputField"><input type="text" name="katalaluan" placeholder="katalaluan"><br></div>
        <div class="inputField"><input type="text" name="gambarprofil" placeholder="gambarprofil path"><br></div>
        <div class="inputField">
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
            <br>
        </div>
        <div class="inputField"><button type="submit">Register</button><br></div>
    </form>

    <!-- Clear session variables button(NOT RELATED TO auth COMPONENT, PLEASE IGNORE) -->
    <button id="clearSessionBtn">Clear Session</button><br>
</div>
<?php
// Handle user registeration attempt
// Only allow guest to register
if (!$authObj->isAuth()) {
    // Determine whether user has submit a registeration request
    if (isset($_POST["jenispengguna"])) {
        // Determine user type to register
        switch ($_POST["jenispengguna"]) {
            case "pelajar": // Register as pelajar
                if ($authObj->registerPelajar($_POST["nama"], $_POST["katalaluan"], $_POST["gambarprofil"])) { // PS ideally sanitize each field first before parssed into here
                    // User successfully registered as pelajar
                    $authObj->authPelajar($_POST["nama"], $_POST["katalaluan"]); // Login user as pelajar
                } else {
                    // Error occured while registeration
                    echo ("Error occured while registering pelajar");
                }
                break;
            case "guru": // Register as guru
                if ($authObj->registerGuru($_POST["nama"], $_POST["katalaluan"], $_POST["gambarprofil"])) { // PS ideally sanitize each field first before parssed into here
                    // User successfully registered as guru
                    $authObj->authGuru($_POST["nama"], $_POST["katalaluan"]); // Login user as guru
                } else {
                    // Error occured while registeration
                    echo ("Error occured while registering guru");
                }
                break;
            case "warden": // Register as warden
                if ($authObj->registerWarden($_POST["nama"], $_POST["katalaluan"], $_POST["gambarprofil"])) { // PS ideally sanitize each field first before parssed into here
                    // User successfully registered as warden
                    $authObj->authWarden($_POST["nama"], $_POST["katalaluan"]); // Login user as warden
                } else {
                    // Error occured while registeration
                    echo ("Error occured while registering warden");
                }
                break;
            case "pentadbir": // Register as pentadbir
                if ($authObj->registerPentadbir($_POST["nama"], $_POST["katalaluan"], $_POST["gambarprofil"])) { // PS ideally sanitize each field first before parssed into here
                    // User successfully registered as pentadbir
                    $authObj->authPentadbir($_POST["nama"], $_POST["katalaluan"]); // Login user as pentadbir
                } else {
                    // Error occured while registeration
                    echo ("Error occured while registering pentadbir");
                }
                break;
        }
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
            clearSession();
        })
    })
    // END CLEAR SESSION BUTTON, PLEASE IGNORE
</script>
<?php
// Check whether the current user is currently authenthicated by checking whether the sesion key Auth has been set(Set = True, X Set = False)
if ($authObj->isAuth()) {
    echo ("<br>Hello I'm an authenthicated user and this is a message for authenthicated user<br>This is my user information<br>");
    d($_SESSION["Auth"]);
} else {
    echo ("<br>Hello I'm a guest, I'm not yet authenthicated<br>");
}
?>