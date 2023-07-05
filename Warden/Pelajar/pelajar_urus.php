<?php
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
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

?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#profilpelajar').DataTable(); // Updated selector to use ID (#profilpelajar)
        });


        function deleteApplication() {
            const selectedItems = Array.from(document.querySelectorAll('input[name="item[]"]:checked')).map(checkbox => checkbox.value);
            if (selectedItems.length === 0) {
                alert("Please select at least one item to delete.");
                return;
            }

            if (!confirm("Are you sure you want to delete the selected item(s)?")) {
                return;
            }

            const tableBody = document.querySelector("#profilpelajar tbody");

            selectedItems.forEach(item => {
                const row = document.querySelector(`tr[data-id="${item}"]`);
                if (row) {
                    tableBody.removeChild(row);
                }
            });

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "<?php echo $_SERVER["PHP_SELF"]; ?>", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.status === "success") {
                        window.alert(xhr.response);
                        console.log("Deleted successfully.");
                    } else {
                        console.error("Failed to delete the application.");
                    }
                }
            };
            const data = "item[]=" + encodeURIComponent(JSON.stringify(selectedItems)) + "&delete=delete";
            xhr.send(data);
        }
    </script>
</head>

<body>
    <div class="mt-3">
        <h1 class="display-4">Senarai Pelajar</h1>
        <div class="overflow-x-scroll">
            <form method="POST" action="<?php echo(WARDEN_URL."/Pelajar/pelajar_urus_individu.php"); ?>">
                <table id="profilpelajar" class="table table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>Pilih</th>
                            <th>Bil</th>
                            <th>Nama Pelajar</th>
                            <th>Nombor KP</th>
                            <th>Nombor Matrik Pelajar</th>
                            <th>Dorm</th>
                            <th>Nombor Telefon Pelajar</th>
                            <th>Nama Bapa Pelajar</th>
                            <th>Nombor Telefon Bapa Pelajar</th>
                            <th>Nama Ibu Pelajar</th>
                            <th>Nombor Telefon Ibu Pelajar</th>
                            <th>Alamat Pelajar</th>
                            <th>Butang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Establish a database connection
                        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
    
                        global $row;
                        $query = mysqli_query($conn, "SELECT profilpelajar.*, loginpelajar.namapelajar, loginpelajar.id FROM profilpelajar INNER JOIN loginpelajar ON profilpelajar.id_login = loginpelajar.id");
                        $numrows = mysqli_num_rows($query);
    
                        if ($query) {
                            if ($numrows != 0) {
                                $cnt = 1;
    
                                while ($row = mysqli_fetch_assoc($query)) {
                                    echo "<tr data-id='{$row['id']}'>";
                                    echo "<td><input type='checkbox' name='item[]' value='{$row['id']}'></td>";
                                    echo "<td>{$cnt}</td>";
                                    echo "<td>{$row['namapelajar']}</td>";
                                    echo "<td>{$row['nokp']}</td>";
                                    echo "<td>{$row['nomatrikpelajar']}</td>";
                                    echo "<td>{$row['dorm']}</td>";
                                    echo "<td>{$row['notelpelajar']}</td>";
                                    echo "<td>{$row['namabapapelajar']}</td>";
                                    echo "<td>{$row['notelbapapelajar']}</td>";
                                    echo "<td>{$row['namaibupelajar']}</td>";
                                    echo "<td>{$row['notelibupelajar']}</td>";
                                    echo "<td>{$row['alamatpelajar']}</td>";
                                    echo "<td>";
                                    echo "<a href=\"pelajar_urus_individu.php?id={$row['id']}\"><button class='btn btn-sm btn-outline-primary' ><i class='fa-solid fa-eye'></i>&nbsp;Lihat</button></a>";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<a href=\"delete.php?id={$row['id']}\"><button class=' btn btn-sm btn-outline-danger' ><i class='fa-solid fa-trash'></i>&nbsp;Buang</button></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
    
                                $cnt++; // Increment $cnt after each iteration
                            }
                        }
    
    
                        // Close the database connection
                        mysqli_close($conn);
                        ?>
                    </tbody>
    
                </table>
            </form>
        </div>
    </div>
<?php
// Import footer
require_once(COMPONENTS_DIR . "/footer.php");
?>
</html>