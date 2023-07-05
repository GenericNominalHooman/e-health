<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
// Import peljar sidebar template
require_once(TEMPLATE_DIR . "/sidebar2_pelajar.php");
$conn = mysqli_connect("localhost", "root", "", "e-health");

// Fetch the appointment status from the database
$query = "SELECT status FROM janjitemupelajar ORDER BY waktujtpelajar DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$status = $row['status'];

// Rest of the code...

// Check if the form is submitted for uploading MC slip
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Handle the file upload logic here

  // Example code to move the uploaded file to a directory
  $targetDir = "uploads/";
  $fileName = basename($_FILES["mc_slip"]["name"]);
  $targetFilePath = $targetDir . $fileName;
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

  // Check if the file is an image
  if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["mc_slip"]["tmp_name"]);
    if ($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check if file already exists
  if (file_exists($targetFilePath)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Upload the file if everything is ok
  if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["mc_slip"]["tmp_name"], $targetFilePath)) {
      // Save the MC slip details in the "mcslip" table
      $id = $_SESSION['student_id']; // Assuming you have the student ID stored in the session
      $mcslip = $fileName;
      
      $query = "INSERT INTO mcslip (id, mcslip) VALUES ('$id', '$mcslip')";
      if (mysqli_query($conn, $query)) {
        echo "The file " . basename($_FILES["mc_slip"]["name"]) . " has been uploaded successfully.";
      } else {
        echo "Error: " . mysqli_error($conn);
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
?>

<!-- Rest of the code remains the same -->
