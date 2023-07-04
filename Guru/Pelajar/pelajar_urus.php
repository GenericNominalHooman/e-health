<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health2/site_config.php");

// Import header
require_once(COMPONENTS_DIR . "/header.php");

// Import sidebar
require_once(TEMPLATE_DIR . "/sidebar2_guru.php");

// Check if the form is submitted and the status is to be updated
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["item"]) && is_array($_POST["item"])) {
        // Get the selected items (checkbox values)
        $selectedItems = $_POST["item"];

        // Establish a database connection
        $conn = mysqli_connect("localhost", "root", "", "e-health2");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check if "Delete" button is clicked
        if (isset($_POST["delete"])) {
            // Delete each selected item from the database
            foreach ($selectedItems as $item) {
                $sql = "DELETE FROM profilpelajar WHERE id = ?";
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

<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#profilpelajar").DataTable();
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
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Establish a database connection
                    $conn = mysqli_connect("localhost", "root", "", "e-health");
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

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
                                echo "</tr>";

                                $cnt++; // Increment $cnt after each iteration
                            }
                        }
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="12">
                            <button type="button" onclick="deleteApplication()">Delete Selected</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <?php
                    d($_POST);
                    d($query);

            ?>
        </form>
    </div>
</body>
</html>
