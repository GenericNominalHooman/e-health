<?php
// SITE CONFIG BEGIN
require_once($_SERVER["DOCUMENT_ROOT"] . "/projects_config.php");
require_once(E_HEALTH_DIR . "/site_config.php");
require_once(COMPONENTS_DIR . "/login_header.php");
// SITE CONFIG ENDS
?>
<?php
// IMPORT BEGIN
require_once(COMPONENTS_DIR . "/config.php");
// IMPORT ENDS

// Instansiating DB connection
$dbObj = new Database();
$conn = $dbObj->getConnection();

// Fetch student appointment data from the database
$sql = "SELECT nama, nokp, nomatrik, program, tahun, waktu, tarikh, sebab, status FROM janjitemu";
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

<!-- CONTENT BEGIN -->
<section class="container-fluid">

  <!-- CAROUSEL JADUAL BEGIN -->
  <div class="row m-md-5 mt-4 p-md-4 shadow-lg card">
    <div class="col-12 p-4 card-body">
      <div class="card-title text-center h2 p-4">Jadual Guru / Warden / Pemandu</div>
      <div class="card-text">
        <div id="slideshow">
          <div><img data-lazy="https://res.cloudinary.com/dxfq3iotg/image/upload/v1565190720/gallery/preview/02_o_car.jpg"></div>
          <div><img data-lazy="https://res.cloudinary.com/dxfq3iotg/image/upload/v1565190715/gallery/preview/03_r_car.jpg"></div>
          <div><img data-lazy="https://res.cloudinary.com/dxfq3iotg/image/upload/v1565190714/gallery/preview/04_g_car.jpg"></div>
          <div><img data-lazy="https://res.cloudinary.com/dxfq3iotg/image/upload/v1565190714/gallery/preview/04_g_car.jpg"></div>
          <div><img data-lazy="https://res.cloudinary.com/dxfq3iotg/image/upload/v1565190714/gallery/preview/04_g_car.jpg"></div>
          <div><img data-lazy="https://res.cloudinary.com/dxfq3iotg/image/upload/v1565190714/gallery/preview/04_g_car.jpg"></div>
          <div><img data-lazy="https://res.cloudinary.com/dxfq3iotg/image/upload/v1565190714/gallery/preview/04_g_car.jpg"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- CAROUSEL JADUAL ENDS -->

  <div class="row m-md-5 mt-4 p-md-4 shadow-lg card">
    <div class="col-12 p-4 card-body">
      <div class="card-title text-center h2 p-4">Title</div>
      <div class="card-text">
        Body
      </div>
    </div>
  </div>

  <!-- JT TABLE BEGIN -->
  <div class="row m-md-5 mt-4 p-md-4 shadow-lg card">
    <div class="col-12 p-4 card-body">
      <div class="card-title text-center h2 p-4">Senarai Janji Temu Pelajar Terkini</div>
      <div class="card-text p-4 overflow-auto">
        <table id="janjiTemuTable">
          <thead>
            <tr>
              <th>Nama</th>
              <th>No Kad Pengenalan</th>
              <th>Program</th>
              <th>Tahun</th>
              <th>Waktu</th>
              <th>Tarikh</th>
              <th>Sebab</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
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
                echo "<td>" . $row["status"] . "</td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='6'>No data available</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- JT TABLE ENDS -->

</section>

<script>
  // JT TABLE BEGIN
  $(document).ready(function() {
    $("#janjiTemuTable").DataTable();
  })
  // JT TABLE ENDS
</script>

<script>
  // <!-- CAROUSEL JADUAL BEGIN -->
  $(document).ready(function() {
    $('#slideshow').slick({
      infinite: true,
      lazyLoad: 'ondemand',
      slidesToShow: 1,
      slidesToScroll: 1
    });
  });
  // <!-- CAROUSEL JADUAL ENDS -->
</script>

<!-- CONTENT ENDS -->

<?php
// Close the database connection
$conn->close();
?>
<?php require_once(COMPONENTS_DIR . "/footer.php"); ?>