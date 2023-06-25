<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health/site_config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>
        <?php echo(SITE_NAME);?>
    </title>
    <div class="contianer-fluid text-center">
        <div class="row align-items-center">
            <div class="col-sm p-4">
                <?php
                    echo("<a href=''><img src='".IMG_URL."/logo.png"."' alt='KVG Logo'></a>");
                ?>
            </div>
            <div class="col-sm p-4">
                <?php
                    echo("<a href=''><img src='".IMG_URL."/logo2.jpg"."' alt='e-health logo' height='100em'></a>");
                ?>
            </div>
        </div>
    </div>
</head>
<body>
    <?php
    require_once(COMPONENTS_DIR."/sidebar.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c8bcf77590.js" crossorigin="anonymous"></script>
</body>
<footer class="row text-center text-lg-start">
    <div class="container ">
        <div class="text-center text-dark p-3"><small>&copy; <?= date("Y"); ?> Kolej Vokasional Gerik BY Athirah & Sofia Balqis </small></div>
    </div>
</footer>