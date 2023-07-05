<?php
// Establish a database connection
$conn = mysqli_connect("localhost", "root", "", "e-health");
 // Import site config
 require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
 // Import peljar sidebar template
                 require_once(TEMPLATE_DIR . "/sidebar2_pelajar.php");
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the submitted values
  $sebabjt = $_POST["reasons"];
  $waktujtpelajar = $_POST["time"];
  $customTime = "";

  // If custom time is selected, assign the custom time value
  if ($waktujtpelajar == "custom") {
    $customTime = $_POST["custom-time"];
  }

  // Create the SQL query to update the database
  $query = "INSERT INTO janjitemupelajar (sebab, time) VALUES ('$sebabjt', '$waktujtpelajar')";

  // If custom time is selected, update the query with the custom time value
  if ($waktujtpelajar == "custom") {
    $query = "INSERT INTO janjitemupelajar (sebab, time) VALUES ('$sebabjt', '$customTime')";
  }

  // Execute the query
  if (mysqli_query($conn, $query)) {
    echo "Data updated successfully.";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}
?>


<!-- HTML form to capture student appointment details -->
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
    <form action="" method="post">
      <label for="reasons">Reason:</label>
      <textarea id="reasons" name="reasons" rows="5" cols="30"></textarea>
      <br><br>
      <label for="time">Time to go:</label>
      <select id="form-type" name="time">
        <option value="9.00 am">9.00 AM</option>
        <option value="3.00 pm">3.00 PM</option>
        <option value="custom">Custom</option>
      </select>
      <br><br>
      <div class="custom-input">
        <label for="custom-time">Custom Time (Emergency):</label>
        <input type="text" id="custom-time" name="time">
      </div>
      <br><br>
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
