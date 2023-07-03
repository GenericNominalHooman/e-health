<?php
    // Import site config
    require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");

    // Auth component is dependent on header and config component
    require_once(COMPONENTS_DIR."/header.php");
    
    require_once(TEMPLATE_DIR . "/sidebar2_guru.php");

?>

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

    <img src="jadual_guru_urus/image.jpg" alt="Uploaded Image">
    </body>
</html>

<?php

    require_once(COMPONENTS_DIR . "/footer.php");
?>
