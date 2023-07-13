<?php
// IMPORT SITE CONFIG BEGIN
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php");
require_once(E_HEALTH_DIR."/site_config.php");
// IMPORT SITE CONFIG ENDS
?>

<?php
// IMPORT BEGIN
require_once(COMPONENTS_DIR."/auth_pelajar.php");
require_once(COMPONENTS_DIR . "/header.php");
// Import header
// Import sidebar(Please uncomment the appropiate user sidebar for your page)
// require_once(TEMPLATE_DIR . "/sidebar2_guest.php"); // Guest sidebar
// require_once(TEMPLATE_DIR . "/sidebar2_pentadbir.php"); // Pentadbir sidebar
// require_once(TEMPLATE_DIR . "/sidebar2_warden.php"); // Warden sidebar
// require_once(TEMPLATE_DIR . "/sidebar2_guru.php"); // Guru sidebar
require_once(TEMPLATES_DIR . "/sidebar_pelajar.php"); // Pelajar sidebar
// IMPORT ENDS

// DECLARING GLOBAL VARIABLE BEGIN
$id_pelajar = $_SESSION['id_pelajar'];
// DECLARING GLOBAL VARIABLE ENDS
?>

<?php
// Retrieve status from the database (Assuming you have a table named 'appointment' with a 'status' column)
d($_SESSION);
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$query = "SELECT * FROM janjitemu WHERE nokp = '" . $_SESSION['nokp'] . "' ORDER BY tarikh DESC LIMIT 1"; // Replace '1' with the actual appointment ID
d($query);
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
d($row);
$status = isset($row['status']) ? $row['status'] : null;
$waktu = $row['waktu'];
$tarikh = $row['tarikh'];
$id = $row['id_janjitemu'];
mysqli_close($conn);
                        
if(!empty($query)){ // User has made a janjitemu
    echo
    <<<EOT
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
            <div id="janjitemuUrusForm" class="card shadow-2-strong card-registration" style="border-radius: 15px; border-color:#172065;">
    EOT;
                echo('<div  row-id="'.$id.'" class="card-body p-4 p-md-5 d-flex justify-content-center align-items-center">');
                    echo('<div class="container col-md-4 text-center">
                            <i class="fa-solid fa-list"></i>    
                            </div>
                        <div class="container col-md-8">');
                    // STATUS FIELD BEGIN
                    echo("<div class='row'>".
                            "<h3>".
                                $status.
                            "</h3>".
                        "</div>"
                    );
                    echo("<div class='container row'>".
                            "<div class='col-md-6'>".
                                $waktu.
                            "</div>".
                            "<div class='col-md-6 text-end'>".
                                $tarikh.
                            "</div>".
                        "</div>"
                    );
                    echo('<div class="row">
                            <button id="cancelBtn" class="button col-md-6">Cancel</button>
                            <button id="uploadBtn" class="button col-md-6">Upload MC Slip</button>
                    </div>');
                    // STATUS FIELD END
                    echo("</div>");
    echo <<<EOT
                </div>
            </div>
        </div>
    </div>
    EOT;
}


?>

<!-- CONTENT HERE -->
<?php

?>
<div class="mt-3 overflow-auto">
    <h1 class="display-4">Senarai Janji Temu</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <table id="janjitemupelajar" class="table table-striped" width="100%">
            <thead>
                <th>Bil</th>
                <th>No Kad Pengenalan</th>
                <th>Nama</th>
                <th>Program</th>
                <th>Tahun</th>
                <th>Waktu</th>
                <th>No Telefon Pelajar</th>
                <th>Alamat</th>
                <th>Jantina</th>
                <th>Sebab</th>
                <th>Status Janji Temu</th>
            </thead>
            <tbody>
                <?php
                // Establish a database connection
                $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $query = mysqli_query($conn, "SELECT * FROM janjitemu WHERE nokp='".$_SESSION["nokp"]."'");
                $numrow = mysqli_num_rows($query);

                if ($query) {
                    if ($numrow != 0) {
                        $cnt = 1;

                        while ($row = mysqli_fetch_assoc($query)) {
                            echo "<td>{$cnt}</td>";
                            echo "<td>{$row['nokp']}</td>";
                            echo "<td>{$row['nama']}</td>";
                            echo "<td>{$row['program']}</td>";
                            echo "<td>{$row['tahun']}</td>";
                            echo "<td>{$row['waktu']}</td>";
                            echo "<td>{$row['notelpen']}</td>";
                            echo "<td>{$row['alamat']}</td>";
                            echo "<td>{$row['jantina']}</td>";
                            echo "<td>{$row['sebab']}</td>";
                            echo "<td>{$row['status']}</td>";
                            echo "</tr>";

                            $cnt++; // Increment $cnt after each iteration
                        }
                    }
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
                <script>
                    // Applying Data table to the table
                    $("#janjitemupelajar").DataTable();
                </script>
            </tbody>
        </table>
    </form>
</div>
<!-- END CONTENT -->
<script>
    $(document).ready(function(){
        $("#janjitemuUrusForm").on("click", function(){
            
        })
    });
</script>
<?php
// Import footer
require_once(COMPONENTS_DIR . "/footer.php");
?>