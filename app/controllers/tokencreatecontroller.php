<?php
include '../config/database.php';
function  genratecoupon($length = 10)
{
  return strtoupper(bin2hex(random_bytes($length / 2)));
}
$token = genratecoupon();
$discount_type = $_POST['Discount_Type'];
$discount_value = $_POST['Discount_Value'];
if ($discount_type  == "percent") {
  if ($discount_value > 99 || $discount_value < 0) {
    echo json_encode([
      "status" => "Error",
      "message" => "Enter Correct Value"
    ]);
    exit;
  } else {
    // echo "Hello Every One <br>";
  }
}
// $date = date_create();

$expires_at = date("y-m-d   H-i-s", strtotime("+1 day"));
$sql = "INSERT INTO discount (token,discount_type,discount_value,expires_at)
  value(?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param(
  "ssds",
  $token,
  $discount_type,
  $discount_value,
  $expires_at,
);
if ($stmt->execute()) {
  echo json_encode([
    "status" => "success",
    "message" => "Token Are Created p"
  ]);
}
 else{
  echo json_encode([
    "status" => "Error",
    "message" => "Token Are Not Created"
  ]);
 }
exit;