<?php
// Define the database host 
$host = "bumyeq411ieo9yiyglqf-mysql.services.clever-cloud.com";

// Define the database username 
$user = "ui00xo5mtrqn5rc2";

// Define the database password
$pass = "1ER3G41Nz33xo9HVur0H";

// Define the name of the database to connect to
$db = "bumyeq411ieo9yiyglqf";

// Create a new MySQLi connection object using the provided credentials
$conn = new mysqli($host, $user, $pass, $db);

// Check if the connection to the database failed
if ($conn->connect_error) {
    // Terminate the script and display an error message if the connection fails
    die("Connection failed: " . $conn->connect_error);
}
?>