<?php
    // Import site config
    require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>

<?php
// IMPORT BEGIN
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
require_once(COMPONENTS_DIR . "/header.php");
require_once(TEMPLATE_DIR . "/sidebar2.php");
// IMPORT ENDS
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        h1 {
            text-align: center;
            margin-top: 1em;
        }
    </style>
</head>

<body>
<h1 class="centered-text">Jadual Urus Guru</h1>

<?php
// Check if the uploaded image path is set in the session
if (isset($_SESSION["uploaded_image"])) {
    $uploaded_image = $_SESSION["uploaded_image"];
    echo "<img src='$uploaded_image' alt='Uploaded Image'>";
} else {
    echo "No image uploaded.";
}
?>

</body>
</html>

<?php
require_once(COMPONENTS_DIR . "/footer.php");
?>
