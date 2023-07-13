<<<<<<< Updated upstream
<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");

// Import header
require_once(COMPONENTS_DIR . "/header.php");
// Import sidebar
require_once(TEMPLATE_DIR . "/sidebar2_warden.php"); // Warden sidebar

// Check if the form is submitted and the status is to be updated
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["item"]) && is_array($_POST["item"])) {
        // Get the selected items (checkbox values)
        $selectedItems = $_POST["item"];

        // Establish a database connection
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check if "Reject" button is clicked
        if (isset($_POST["reject"])) {
            // Update the status to "Rejected" for each selected item
            foreach ($selectedItems as $item) {
                $sql = "UPDATE janjitemupelajar SET status = 'Rejected' WHERE id_pelajar = ? and waktujtpelajar = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "ss", $item);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }

        // Check if "Accept" button is clicked
        if (isset($_POST["accept"])) {
            // Update the status to "Accepted" for each selected item
            foreach ($selectedItems as $item) {
                $sql = "UPDATE janjitemupelajar SET status = 'Accepted' WHERE id_pelajar = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "s", $item);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }

        // Check if "Delete" button is clicked
        if (isset($_POST["delete"])) {
            // Delete each selected item from the database
            foreach ($selectedItems as $item) {
                $sql = "DELETE FROM janjitemupelajar WHERE id_pelajar = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "s", $item);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }

        // Close the database connection
        mysqli_close($conn);
    }
}
?>

<html>
<head>
    <script>
        function updateStatus(id_pelajar, status) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "<?php echo $_SERVER["PHP_SELF"]; ?>", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.status === "success") {
                        const statusCell = document.getElementById(`status${id_pelajar}`);
                        statusCell.textContent = status;
                    } else {
                        console.error("Failed to update status.");
                    }
                }
            };
            const data = "id_pelajar=" + encodeURIComponent(id_pelajar) + "&status=" + encodeURIComponent(status);
            xhr.send(data);
        }

        function rejectApplication(id_pelajar) {
            updateStatus(id_pelajar, "Rejected");
        }

        function acceptApplication(id_pelajar) {
            updateStatus(id_pelajar, "Accepted");
        }

        function deleteApplication(id_pelajar) {
            const row = document.getElementById(`row${id_pelajar}`);
            row.remove();

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "<?php echo $_SERVER["PHP_SELF"]; ?>", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.status === "success") {
                        console.log("Deleted successfully.");
                    } else {
                        console.error("Failed to delete the application.");
                    }
                }
            };
            const data = "id_pelajar=" + encodeURIComponent(id_pelajar) + "&action=delete";
            xhr.send(data);
        }
    </script>
</head>

<body>
    <div class="mt-3">
        <h1 class="display-4">Senarai Janji Temu</h1>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <table id="janjitemupelajar" class="table table-striped" width="100%">
                <thead>
                    <th>Pilih</th>
                    <th>Bil</th>
                    <th>Nama Pelajar</th>
                    <th>Tarikh Janji Temu</th>
                    <th>Masa Janji Temu</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    
                

                <?php
                // Establish a database connection
                $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $query = mysqli_query($conn, "SELECT * FROM janjitemupelajar");
                $numrow = mysqli_num_rows($query);

                if ($query) {
                    if ($numrow != 0) {
                        $cnt = 1;

                        while ($row = mysqli_fetch_assoc($query)) {
                            echo "<tr id='row{$row['id_pelajar']}'>";
                            echo "<td><input type='checkbox' name='item[]' value='{$row['id_pelajar']}'></td>";
                            echo "<td>{$cnt}</td>";
                            echo "<td>{$row['namapelajar']}</td>";
                            echo "<td>{$row['tarikhjtpelajar']}</td>";
                            echo "<td>{$row['waktujtpelajar']}</td>";
                            echo "<td id='status{$row['id_pelajar']}'>{$row['status']}</td>";
                            echo "<td>
                            <button type='button' style='background-color: #a7ebc6;border-color: #a7ebc6;' class='m-2 btn btn-primary' onclick='acceptApplication(\"{$row['id_pelajar']}\")'>Accept</button>
                                    <button type='button' style='background-color: #e4eb14;border-color: #e4eb14;' class='m-2 btn btn-primary' onclick='rejectApplication(\"{$row['id_pelajar']}\")'>Reject</button>
                                    <button type='button' style='background-color: #ff2f16;border-color: #ff2f16;' class='m-2 btn btn-primary' onclick='deleteApplication(\"{$row['id_pelajar']}\")'>Delete</button>
                                </td>";
                            echo "</tr>";

                            $cnt++; // Increment $cnt after each iteration
                        }
                    }
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
                </tbody>
                <tr>
                    <td colspan="7">
                        <input type="submit" name="reject" value="Reject Selected">
                        <input type="submit" name="accept" value="Accept Selected">
                        <input type="submit" name="delete" value="Delete Selected">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
<script>
    $("#janjitemupelajar").ready(function(){
        $("#janjitemupelajar").DataTable();
    });
</script>
</html>
=======


<!DOCTYPE html>
<html>
<head>
    <title>Senarai Pelajar Ke Hospital</title>
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
</head>
<body>
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
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>




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

<body>
<section class="vh-100" style="background-color: aliceblue;">
<div class="container py-5 h-100">
  <div class="row d-flex justify content align-items-center h-100">
    <!--<div class="col col-xl-10">-->
      <div class="card shadow p-3 mb-5" style="border-radius:1rem; background-color: #D4F1F4; border-color:skyblue;">
      <div class="row g-0">
        <div class="col-md-6 col-lg-5 d-none d-md-block">

<div class="d-flex flex-column min-vh-100">
    <div class="container bg-LIGHT py-3 my-3">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
            
              <img src="img/logoremove.png" alt="Logo" width="300" height="100" class=" img2"></li>
              
              
              <img src="img/logo2remove.png" alt="Logo" width="290" height="130" class="rounded"></li>
              

                <!--<a class="navbar-brand" href="#">
                  <center>
                    <img src="img/logoremove.png" alt="Logo" width="300" height="100" class="d-inline-block align-text-top">
                    <img src="img/logo2remove.png" alt="Logo" width="290" height="130" class="d-inline-block align-text-top">
                  </center>-->
                  </a>
                </div>
              </div>
            </div>
          </nav>
    </div>
   
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
<div class="mb-4">
  </div></div></div></div></div></section>
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

</body>

<?php include "footer.php";?>
<?php
// Close the database connection
$conn->close();
?>

</html>
>>>>>>> Stashed changes
