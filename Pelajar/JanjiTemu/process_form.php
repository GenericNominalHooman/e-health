<?php
// Database connection configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "e-health";

// Create a new MySQLi instance
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve form data
$sebabjt = $_POST['reason'];
$waktujtpelajar = $_POST['time_slot'];


// Prepare and execute the SQL query
$stmt = $mysqli->prepare("INSERT INTO janjitemupelajar (sebabjt, waktujtpelajar) VALUES (?, ?)");
$stmt->bind_param("sssi", $sebabjt, $waktujtpelajar);
$stmt->execute();

// Check if the data was inserted successfully
if ($stmt->affected_rows > 0) {
    echo "Appointment submitted successfully!";
} else {
    echo "Error submitting the appointment. Please try again.";
}

// Close statement and database connection
$stmt->close();
$mysqli->close();
?>
