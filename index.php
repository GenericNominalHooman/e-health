<?php
// SITE CONFIG BEGIN
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php");
require_once(E_HEALTH_DIR."/site_config.php");
require_once(COMPONENTS_DIR."/login_header.php");
// SITE CONFIG ENDS
?>
<?php
// Instansiating DB connection
$dbObj = new Database();
$conn = $dbObj->getConnection();

// Fetch student appointment data from the database
$sql = "SELECT nama, nomatrik, program, tahun, waktu, tarikh, sebab, status FROM janjitemu";
$result = $conn->query($sql);
require_once(TEMPLATES_DIR . "/sidebar_guest.php"); // Guest sidebar

?>
<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  th,
  td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
  }
</style>
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify content align-items-center h-100">
      <!--<div class="col col-xl-10">-->
      <div class="card shadow-lg p-3 mb-5 row">
        <div class="row g-0 justify-center">
          <div class="col-md-6 col-lg-12 d-none d-md-block container-fluid">
            <div class="container py-3 my-3 col-lg-12">
              <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid d-flex justify-content-center align-items-center">
                  <h2 class="text-center">Daftar Masuk Pengguna</h2>
                </div>
              </nav>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <div class="card card text-center mb-3  img-fluid rounded">
                <div class="card-body ">
                  <h5 class="card-title">PENTADBIR</h5>
                  <img src="img/admin.png" width="90" height="100">
                  <p class="card-text"></p>
                  <a href="Admin/login3.php" class="btn btn-primary">LOG MASUK</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card card text-center mb-3">
                <div class="card-body">
                  <h5 class="card-title">PENSYARAH/WARDEN</h5>
                  <img src="img/gururemove.png" width="95" height="100">
                  <p class="card-text"></p>
                  <a href="GuruBertugas/login3.php" class="btn btn-primary">LOG MASUK</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card card text-center mb-3 ">
                <div class="card-body">
                  <h5 class="card-title">PELAJAR</h5>
                  <img src="img/pelajar2remove.png" width="95" height="100">
                  <p class="card-text"></p>

                  <a href="Pelajar/login3.php" class="btn btn-primary">LOG MASUK</a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row p-4 shadow-lg">
        <div class="mb-4 text-center">
          <h2>Senarai Janji Temu Pelajar</h2>
          <table>
            <tr>
              <th>Nama</th>
              <th>No Kad Pengenalan</th>
              <th>Program</th>
              <th>Tahun</th>
              <th>Waktu</th>
              <th>Tarikh</th>
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
                echo "<td>" . $row["sebab"] . "</td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='6'>No data available</td></tr>";
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
// Close the database connection
$conn->close();
?>
<?php require_once(COMPONENTS_DIR . "/footer.php"); ?>
