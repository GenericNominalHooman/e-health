<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php");
require_once(E_HEALTH_DIR."/site_config.php");

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-HEALTH</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--LOGO-->
    <?php
    echo('<link rel="shortcut icon" href="'.IMG_DIR.'/logo2remove.png" type="image/x-icon">');
    ?>

    <style>
      body {
        background-color:aliceblue;
      }
      ul {
        margin: 50px;
        list-style: none;
    }
    ul li {
        margin: 10px;
        display: inline-block;
    }
    ul li a {
        padding: 5px;
        display: inline-block;      
        border: 1px solid #f2f2f2;
    }
    ul li a img {
        width: 125px;
        height: 125px;
        display: block;
    }
    ul li a:hover img {
        transform: scale(1.5);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }
    .img2 {
      display: flex;
      justify-content: center;
      display: block;
      width: 60%;
      margin-left: auto;
      margin-right: auto;
    }
    </style>
</head>