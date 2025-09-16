<?php
require 'db.php';  // include database connection

// Get data from POST request
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password

// Prepare SQL query
$sql = "INSERT INTO users (first_name, last_name, phone, city, pincode, email, password)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $firstName, $lastName, $phone, $city, $pincode, $email, $password);

// Execute and send response
if ($stmt->execute()) {
    echo "success";
} else {
    echo "error: " . $stmt->error;
}
?>
