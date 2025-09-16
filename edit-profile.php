<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: Amazon.html");
    exit();
}

$userId = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>
    <h2>Edit Your Profile</h2>
    <form action="update-profile.php" method="POST">
        <input type="text" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required><br><br>
        <input type="text" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required><br><br>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required><br><br>
        <input type="text" name="city" value="<?php echo htmlspecialchars($user['city']); ?>" required><br><br>
        <input type="text" name="pincode" value="<?php echo htmlspecialchars($user['pincode']); ?>" required><br><br>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br><br>
        <button type="submit">Update</button>
    </form>
    <br>
    <a href="profile.php">Back to Profile</a>
</body>
</html>
