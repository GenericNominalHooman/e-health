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
