<?php
session_start();
require 'db.php'; // Include your database connection

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Not logged in.";
    exit();
}

$userId = $_SESSION['user_id'];

// Get updated data from form
$firstName = $_POST['first_name'];
$lastName  = $_POST['last_name'];
$phone     = $_POST['phone'];
$city      = $_POST['city'];
$pincode   = $_POST['pincode'];
$email     = $_POST['email'];

// Prepare update SQL query
$sql = "UPDATE users SET first_name = ?, last_name = ?, phone = ?, city = ?, pincode = ?, email = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssi", $firstName, $lastName, $phone, $city, $pincode, $email, $userId);

// Execute the query
if ($stmt->execute()) {
    echo "Profile updated successfully. <a href='profile.php'>Go back to profile</a>";
} else {
    echo "Error updating profile: " . $stmt->error;
}
?>
