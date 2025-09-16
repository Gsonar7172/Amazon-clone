<?php
// Database connection variables
$host = "localhost";       // Default host
$user = "root";            // Default user for XAMPP
$password = "";            // Leave blank for XAMPP
$dbname = "amazon_clone";  // The database we created

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
