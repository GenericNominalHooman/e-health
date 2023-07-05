<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");

?>
<?php
// Import header
require_once(COMPONENTS_DIR . "/header.php");
// Import sidebar(Please uncomment the appropiate user sidebar for your page)
// require_once(TEMPLATE_DIR . "/sidebar2_guest.php"); // Guest sidebar
require_once(TEMPLATE_DIR . "/sidebar2_pelajar.php"); // Pelajar sidebar
// require_once(TEMPLATE_DIR . "/sidebar2_pentadbir.php"); // Pentadbir sidebar
// require_once(TEMPLATE_DIR . "/sidebar2_warden.php"); // Warden sidebar
// require_once(TEMPLATE_DIR . "/sidebar2_guru.php"); // Guru sidebar

// Retrieve status from the database (Assuming you have a table named 'appointment' with a 'status' column)
$conn = mysqli_connect("localhost", "root", "", "e-health");
$query = "SELECT status FROM janjitemupelajar WHERE id_pelajar = ".$_SESSION['Auth']['id']; // Replace '1' with the actual appointment ID
$query = "SELECT * FROM janjitemupelajar WHERE id_pelajar = ".$_SESSION['Auth']['id'];
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$status = isset($row['status']) ? $row['status'] : null;
mysqli_close($conn);
?>
<html>
    <head>

    </head>

    <body>

<!-- CONTENT HERE -->
<div class="row justify-content-center align-items-center h-100">
    <div class="col-12 col-lg-9 col-xl-7">
      <div class="card shadow-2-strong card-registration" style="border-radius: 15px; border-color:skyblue;">
        <div class="card-body p-4 p-md-5">
            <div class="container">
                <div class="box">
                    <i class="icon">Icon</i>
                </div>
                <div class="box">
                    <?php
                    if ($status == "Proses") {
                        echo "Sedang Diproses";
                    } elseif ($status == "Accepted") {
                        echo "Approved Status";
                    } elseif ($status == "Rejected") {
                        echo "Rejected Status";
                    } else {
                        echo "Unknown Status";
                    }
                    ?>
                    </div>
                    <div class="box">
                        <button class="button">Cancel</button>
                    </div>
                    <div class="box">
                        <button class="button">Upload MC Slip</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3">
    <h1 class="display-4">Senarai Janji Temu</h1>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <table id="janjitemupelajar" class="table table-striped" width="100%">
                <thead>
                    <th>Bil</th>
                    <th>Tarikh Janji Temu</th>
                    <th>Masa Janji Temu</th>
                    <th>Status Janji Temu</th>
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
                            echo "<td>{$cnt}</td>";                        
                            echo "<td>{$row['waktujtpelajar']}</td>";
                            echo "<td>{$row['waktujtpelajar']}</td>";
                            echo "<td id='status{$row['id_pelajar']}'>{$row['status']}</td>";
                            echo "</tr>";

                            $cnt++; // Increment $cnt after each iteration
                        }
                    }
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
                </tbody>

</div>


<!-- END CONTENT -->

    </body>
</html>

<?php
// Import header
require_once(COMPONENTS_DIR . "/footer.php");
?>
