<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital2";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch student appointment data from the database
$sql = "SELECT nama, nokp, program, tahun, waktu, tarikh, notel, sebab  FROM janjitemu";
$result = $conn->query($sql);
?>

<!DOCTYPE html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-HEALTH</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--LOGO-->
    <link rel="shortcut icon" href="img/logo2remove.png" type="image/x-icon">

   
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>

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
<section class="vh-100" style="background-color: aliceblue;">
<div class="container py-5 h-100">
    <div class="row d-flex justify content align-items-center h-100">
        <!--<div class="col col-xl-10">-->
            <div class="card shadow p-3 mb-5" style="border-radius:1rem; background-color: #D4F1F4; border-color:skyblue;">
            <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">

<body class="d-flex flex-column min-vh-100">
    <section class="vh-100" style="background-color: aliceblue;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify content align-items-center h-100">
            <!--<div class="col col-xl-10">-->
                <div class="card shadow p-3 mb-5" style="border-radius:1rem; background-color: #D4F1F4; border-color:skyblue;">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5 d-none d-md-block">
                        <img src="img/logoremove.png" alt="Logo" width="300" height="100" class=" img2"></li>
                        <img src="img/logo2remove.png" alt="Logo" width="290" height="130" class="rounded"></li>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card card text-center mb-3  img-fluid rounded" style=" border-color:skyblue;" >
                                    <div class="card-body ">
                                        <h5 class="card-title">ADMIN/PENDTADBIR</h5>
                                        <img src="img/admin.png"  width="90" height="100">
                                        <p class="card-text"></p>
                                        <a href="Admin/login3.php" class="btn btn-primary">LOG MASUK/LOG IN</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card card text-center mb-3" style="border-color:skyblue;">
                                <div class="card-body">
                                    <h5 class="card-title">GURU BERTUGAS</h5>
                                    <img src="img/gururemove.png" width="95" height="100">
                                    <p class="card-text"></p>
                                    <a href="GuruBertugas/index2.php" class="btn btn-primary">LOG IN/LOG MASUK</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card card text-center mb-3 " style="border-color:skyblue;">
                            <div class="card-body">
                                <h5 class="card-title">PELAJAR</h5>
                                <img src="img/pelajar2remove.png" width="95" height="100">
                                <p class="card-text"></p>
                                <a href="Pelajar/login3.php" class="btn btn-primary">LOG IN/LOG MASUK</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<h2>Senarai Pelajar Ke Hospital</h2>
<table>
    <tr>
        <th>Nama</th>
        <th>No Kad Pengenalan No</th>
        <th>Program</th>
        <th>Tahun</th>
        <th>Waktu</th>
        <th>Tarikh</th>
        <th>No Telefon</th>
        <th>Sebab</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nama"] . "</td>";
            echo "<td>" . $row["nokp"] . "</td>";
            echo "<td>" . $row["program"] . "</td>";
            echo "<td>" . $row["tahun"] . "</td>";
            echo "<td>" . $row["waktu"] . "</td>";
            echo "<td>" . $row["tarikh"] . "</td>";
            echo "<td>" . $row["notel"] . "</td>";
            echo "<td>" . $row["sebab"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No data available</td></tr>";
    }
    ?>
    </table>
</section>

</body>
<?php
// Close the database connection
$conn->close();
?>
<?php include "footer.php";?>

</html>