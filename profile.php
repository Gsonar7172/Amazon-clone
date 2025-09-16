<?php
session_start();
require 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: Amazon.html"); // Redirect if not logged in
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch user info from DB
$sql = "SELECT first_name, last_name, email, phone, city, pincode FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Profile</title>
  <style>
    body {
      font-family: Arial;
      padding: 20px;
      background-color: #f4f4f4;
    }
    .profile-card {
      background: #fff;
      padding: 30px;
      max-width: 400px;
      margin: 0 auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 8px;
    }
    h2 {
      text-align: center;
    }
    .profile-field {
      margin-bottom: 15px;
    }
    .profile-field label {
      font-weight: bold;
    }
  </style>
</head>
<body>

<div class="profile-card">
  <h2>Your Profile</h2>
  <div class="profile-field"><label>Name: </label> <?php echo $user['first_name'] . " " . $user['last_name']; ?></div>
  <div class="profile-field"><label>Email: </label> <?php echo $user['email']; ?></div>
  <div class="profile-field"><label>Phone: </label> <?php echo $user['phone']; ?></div>
  <div class="profile-field"><label>City: </label> <?php echo $user['city']; ?></div>
  <div class="profile-field"><label>Pincode: </label> <?php echo $user['pincode']; ?></div>

  <div style="text-align: center; margin-top: 20px;">
    <a href="edit-profile.php">✏️ Edit Profile</a> |
    <a href="logout.php" style="color: red;">🚪 Logout</a>
  </div>
</div>

</body>
</html>
