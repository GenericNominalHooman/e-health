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
            <h1>Maklumat Janji Temu Pelajar</h1>
            <div>
            <a href="dashboard.php" class="btn btn-primary d-print-none">Back</a>
            <button class="btn btn-outline-primary d-print-none" onclick="window.print()"><i class="fa-solid fa-print"></i>&nbsp;Cetak</button>
            </div>
        </header>
        <div class="book-details p-5 my-4">
            <?php
            include("config.php");
            $id_janjitemu = $_GET['id_janjitemu'];
            if ($id_janjitemu) {
                $sql = "SELECT * FROM janjitemu WHERE id_janjitemu = $id_janjitemu";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                 ?>
                 <h5>Nama:</h5>
                 <p><?php echo $row["nama"]; ?></p>
                 <h5>No Kad Pengenalan:</h5>
                 <p><?php echo $row["nokp"]; ?></p>
                 <h5>Program:</h5>
                 <p><?php echo $row["program"]; ?></p>
                 <h5>Tahun:</h5>
                 <p><?php echo $row["tahun"]; ?></p>
                 <h5>Waktu:</h3>
                 <p><?php echo $row["waktu"]; ?></p>
                 <h5>Tarikh:</h5>
                 <p><?php echo $row["tarikh"]; ?></p>
                 <h5>No Telefon Pelajar:</h5>
                 <p><?php echo $row["notel"]; ?></p>
                 <h5>No Telefon Penjaga:</h5>
                 <p><?php echo $row["notelpen"]; ?></p>
                 <h5>Alamat:</h5>
                 <p><?php echo $row["alamat"]; ?></p>
                 <h5>Jantina:</h5>
                 <p><?php echo $row["jantina"]; ?></p>
                 <h5>Sebab:</h5>
                 <p><?php echo $row["sebab"]; ?></p>
                 <h5>Status:</h5>
                 <p><?php echo $row["status"]; ?></p>
                
                
                 <?php
                }
            }
            else{
                echo "<h3>Tiada dalam rekod</h3>";
            }
            ?>
            
        </div>
    </div>
</body>
</html>