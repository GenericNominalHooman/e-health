<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
// Starting session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- IMPORT BEGIN -->
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
    <!-- Fontawsome icons -->
    <script src="https://kit.fontawesome.com/c8bcf77590.js" crossorigin="anonymous"></script>
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Data table -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- Color pallete -->
    <link rel="stylesheet" href="<?php echo(RESOURCES_URL."/css/color_pallete.css");?>">
    <!-- IMPORT END -->
    <div class="container-xxl">
        <div class="contianer-fluid text-center">
            <div class="row align-items-center">
                <div class="col-sm p-4">
                    <?php
                    echo ("<a href='" . SITE_URL . "/index.php" . "'><img src='" . IMG_URL . "/logo.png" . "' alt='KVG Logo'></a>");
                    ?>
                </div>
                <div class="col-sm p-4">
                    <?php
                    echo ("<a href='" . SITE_URL . "/index.php" . "'><img src='" . IMG_URL . "/e-health_logo.jpeg" . "' alt='e-health logo' height='175em'></a>");
                    ?>
                </div>
            </div>
        </div>
    </div>
</head>

<body id="body-pd">