<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
require_once(COMPONENTS_DIR . "/header.php");
// Import pelajar sidebar template
require_once(TEMPLATE_DIR . "/sidebar2_pelajar.php");
$conn = mysqli_connect("localhost", "root", "", "e-health");
d($_SESSION["Auth"]);
// Initialize variables
$notification = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the submitted values
  $sebabjt = $_POST["reasons"];
  $waktujtpelajar = $_POST["time"];

  // Create the SQL query to insert into the database
  $query = "INSERT INTO janjitemupelajar (sebabjt, waktujtpelajar, id_pelajar, ".'status'.") VALUES ('$sebabjt', '$waktujtpelajar','".$_SESSION["Auth"]["id"]."','Proses')";
d($query);
  

  // Execute the query
  if (mysqli_query($conn, $query)) {
    // Set success notification
    $notification = "Data updated successfully.";
    // Clear form values
    $sebabjt = "";
    $waktujtpelajar = "";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}
?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    /* Your CSS styles here */
  </style>

  <!-- JavaScript for redirecting after form submission -->
  <script>
    function redirectToProfile() {
      window.location.href = "/e-health/Pelajar/Profil/profil.php";
    }
  </script>
</head>

<body style="background-color:white;">
  <div class="row justify-content-center align-items-center h-100">
    <div class="col-12 col-lg-9 col-xl-7">
      <div class="card shadow-2-strong card-registration" style="border-radius: 15px; border-color:skyblue;">
        <div class="card-body p-4 p-md-5">
          <?php if (!empty($notification)): ?>
            <div class="notification"><?php echo $notification; ?></div>
            <script>setTimeout(redirectToProfile, 2000);</script>
          <?php endif; ?>
          
          <form action="" method="post">
          <h2>Sebab</h2>
            <div class="sebab">
              <select id="form-type-sebab" name="reasons" class="w-100" required>
                <option value="Demam">Demam</option>
                <option value="Selesema">Selesema</option>
                <option value="Keracunan">Keracunan</option>
                <!-- Add a custom option -->
                <option value="custom">Lain-lain</option>
              </select>
              <br><br>
              <div class="sebab">
                <label for="custom-input-field-sebab"><h2>Lain-Lain</h2> Nyatakan Sebab:</label>
                <input type="text" id="custom-input-field-sebab" name="custom-reason">
              </div>
            </div>
            <br>
            <h2>Masa Ke Hospital</h2>
            <div class="masa">
            <input type="datetime-local" id="custom-datetime" name="time" required>
              </select>
              <br>
              <br>
            <div class="button">
              <input type="submit" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
