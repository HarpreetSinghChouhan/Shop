<?php
session_start();
$user_id = $_SESSION['user_id'];
include '../config/database.php';
include '../models/coupon.php';
$sql = "SELECT * FROM card WHERE user_id=$user_id";
$result = mysqli_query($conn, $sql);
$totalprice = 0;
while ($row = $result->fetch_assoc()) {
  $totalprice += $row['ofprice'] * $row['quantity'];
}
$token = trim($_POST['Token']);
if ($token == "") {
  echo json_encode([
    "status" => "Error",
    "message" => "Coupon are Empty"
  ]);
  exit;
}
$coupon = coupon::findCoupon($token, $conn);
  $datenow = time();
  $usable = $coupon['usable_token'];
  $is_used = $coupon['is_used'];
   if($is_used == $usable){
    echo json_encode([
      "status" => "Error",
      "message" => "Sorry You Later all token are Used"
    ]);
    exit;
   }
  $expiresdate =  strtotime($coupon['expires_at']);
  if ($datenow > $expiresdate) {
    echo json_encode([
      "status" => "Error",
      "message" => "You are Token Are Expire"
    ]);
    exit;
  }
  $total = 0;
  if ($coupon['discount_type'] === "percent") {
    $value =  $coupon['discount_value'];
    $total = $totalprice * $value / 100;
    $total = $totalprice - $total;
  }
  else {
     $value = $coupon['discount_value'];
    if ($value < $totalprice) {
      echo json_encode([
         "status" => "Error",
         "message" => "add more product coupon are working"
      ]);
      exit;
    } else {
      $total = $totalprice - $value;
    }
  }
  $id = $coupon['id'];
    $sql = "UPDATE `discount` SET is_used = is_used + 1 WHERE id=$id";
  mysqli_query($conn,$sql);
  echo json_encode([
    "status" => "success",
    "price" => $total
  ]);
exit;