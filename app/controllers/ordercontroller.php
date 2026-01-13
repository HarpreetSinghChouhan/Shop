<?php 
require_once '../config/database.php';
session_status();
$userId = $_SESSION['user_id'];
$userName = $_SESSION['auth'];
// echo "Hello Every One";
echo json_encode([
    "status" => "success",
]);
$conn->close();
exit;