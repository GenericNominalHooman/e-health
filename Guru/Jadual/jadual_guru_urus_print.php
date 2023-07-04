<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health2/site_config.php");

// Auth component is dependent on header and config component
require_once(COMPONENTS_DIR . "/header.php");

require_once(TEMPLATE_DIR . "/sidebar2_guru.php");

// Start the session
session_start();
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
    echo "<img id='uploadedImage' src='$uploaded_image' alt='Uploaded Image'>";
    echo "<button onclick='printImage()'>Print</button>"; // Add the print button
} else {
    echo "No image uploaded.";
}
?>

<script>
    function printImage() {
        var image = document.getElementById("uploadedImage");
        var printWindow = window.open("", "_blank");
        printWindow.document.write("<html><head><title>Print</title></head><body><img src='" + image.src + "'></body></html>");
        printWindow.document.close();
        printWindow.print();
    }
</script>

</body>
</html>


<?php
require_once(COMPONENTS_DIR . "/footer.php");
?>
