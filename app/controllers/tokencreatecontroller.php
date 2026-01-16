<?php
include '../config/database.php';
function  genratecoupon($length = 10)
{
  return strtoupper(bin2hex(random_bytes($length / 2)));
}
$token = genratecoupon();
$discount_type = $_POST['Discount_Type'];
$discount_value = $_POST['Discount_Value'];
$usable_token = $_POST['Usable_token']; 
if ($discount_type  == "percent") {
  if ($discount_value > 99 || $discount_value < 0) {
    echo json_encode([
      "status" => "Error",
      "message" => "Enter Correct Discount Value Accounding to Percent"
    ]);
    exit;
  } else {
  
  }
}


$expires_at = date("y-m-d H-i-s", strtotime("+1 day"));
$sql = "INSERT INTO discount (token,discount_type,discount_value,usable_token,expires_at)
  value(?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param(
  "ssdis",
  $token,
  $discount_type,
  $discount_value,
  $usable_token,
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