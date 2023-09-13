<!DOCTYPE html>
<html>
<head>
  <title>Student Hospital Visit - Summary</title>
</head>
<body>
  <h1>Student Hospital Visit - Summary</h1>
  
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reasons = $_POST["reasons"];
    $time = $_POST["time"];
    $customTime = $_POST["custom-time"];

    echo "<p><strong>Reason:</strong> $reasons</p>";
    echo "<p><strong>Time:</strong> $time</p>";
    if ($time === "custom") {
      echo "<p><strong>Custom Time:</strong> $customTime</p>";
    }
  }
  ?>
</body>
</html>
