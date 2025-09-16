<?php
session_start();
session_destroy();
header("Location: Amazon.html"); // Back to home page
exit();
?>
