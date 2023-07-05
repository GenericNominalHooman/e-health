<?php
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health/site_config.php");
// Import verification
require_once(COMPONENTS_DIR . "/verification.php");
// Import header
require_once(COMPONENTS_DIR . "/header.php");
// Import profile image manager
require_once(COMPONENTS_DIR . "/profile_image_manager.php");
// Import models
require_once(COMPONENTS_DIR . "/models.php");
// Import message handler
require_once(COMPONENTS_DIR . "/message_handler.php");
// Import config
require_once(COMPONENTS_DIR . "/config.php");
// Import warden sidebar template
require_once(TEMPLATE_DIR . "/sidebar2_warden.php");

$databaseObj = new Database();
$conn = $databaseObj->getConnection();

$nokp = isset($_GET['nokp']) ? $_GET['nokp'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <title>E - HEALTH</title>
    <style>
        .book-details{
            background-color:#f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Senarai Pelajar</h1>
            <div>
                <a href="pelajar_urus.php" class="btn btn-primary d-print-none">Back</a>
                <button class="btn btn-outline-primary d-print-none" onclick="window.print()"><i class="fa-solid fa-print"></i>&nbsp;Cetak</button>
            </div>
        </header>
        <div class="book-details p-5 my-4">
            <?php

$conn = mysqli_connect("localhost", "root", "", "e-health");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

global $row;
            if ($id) {
                $query = "SELECT profilpelajar.*, loginpelajar.namapelajar, loginpelajar.id FROM profilpelajar INNER JOIN loginpelajar ON profilpelajar.id_login = loginpelajar.id WHERE profilpelajar.nokp = '$nokp'";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <h5>Nama Pelajar:</h5>
                    <p><?php echo $row["namapelajar"]; ?></p>
                    <h5>No Kad Pengenalan:</h5>
                    <p><?php echo $row["nokp"]; ?></p>
                    <h5>No Matrik Pelajar:</h5>
                    <p><?php echo $row["nomatrikpelajar"]; ?></p>
                    <h5>Dorm:</h5>
                    <p><?php echo $row["dorm"]; ?></p>
                    <h5>No Telefon Pelajar:</h5>
                    <p><?php echo $row["notelpelajar"]; ?></p>
                    <h5>Nama Bapa:</h5>
                    <p><?php echo $row["namabapapelajar"]; ?></p>
                    <h5>Nama Ibu:</h5>
                    <p><?php echo $row["namaibupelajar"]; ?></p>
                    <h5>Alamat:</h5>
                    <p><?php echo $row["alamatpelajar"]; ?></p>
                    <?php
                } else {
                    echo "<h3>Tiada dalam rekod</h3>";
                }
            } else {
                echo "<h3>Tiada dalam rekod</h3>";
            }
            ?>
        </div>
    </div>
</body>
</html>
