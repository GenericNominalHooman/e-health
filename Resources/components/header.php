<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/hospital/site_config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    // Site name
    echo ("<title>" . SITE_NAME . "</title>");
    // Bootstrap css
    echo ("<link href='" . RESOURCES_URL . "/bootstrap/css/bootstrap.min.css" . "' rel='stylesheet'>");
    // Bootstrap js
    echo ("<script src='" . RESOURCES_URL . "/bootstrap/js/bootstrap.min.js" . "'></script>");
    echo ("<script src='" . RESOURCES_URL . "/bootstrap/js/bootstrap.bundle.min.js" . "'></script>");
    // Jquery
    echo ("<script src='" . COMPONENTS_URL . "/jquery/jquery.min.js" . "'></script>");
    ?>
    <!-- Box icons -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <div class="container-xxl">
        <div class="contianer-fluid text-center">
            <div class="row align-items-center">
                <div class="col-sm p-4">
                    <?php
                    echo ("<a href='".SITE_URL."/index.php"."'><img src='" . IMG_URL . "/logo.png" . "' alt='KVG Logo'></a>");
                    ?>
                </div>
                <div class="col-sm p-4">
                    <?php
                    echo ("<a href='".SITE_URL."/index.php"."'><img src='" . IMG_URL . "/logo2.jpg" . "' alt='e-health logo' height='100em'></a>");
                    ?>
                </div>
            </div>
        </div>
    </div>
</head>
<body id="body-pd">