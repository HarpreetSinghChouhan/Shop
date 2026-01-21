<?php
require_once '../config/database.php';
include_once '../models/card.php';
session_start();

$order_id = "ORD" . time() . rand(100, 999);
$user = $_SESSION['auth'];
$user_id = $_SESSION['user_id'];
$carddata1 = card::foundusercard($user_id, $conn);
$product_id = 2;
$product_id =  $carddata1['product_id'];
$productname = $carddata1['product_name'];
$ordertime = date("y:m:d h:i:s");
$productname = "safgd";
$Shippingtime = date("y:m:d h:i:s", strtotime("+3days"));
// item_id 	order_id 	product_id 	user_id 	product_name 	user_name 	ofprice 	total_price 	created_at 	
$sql = "SELECT * FROM `card` WHERE user_id = $user_id ORDER BY card_id ASC";
$result = mysqli_query($conn, $sql);
$firstskip = true;
while ($row = $result->fetch_assoc()) {
	if ($firstskip == true) {
		$firstskip = false;
		continue;
	}
	$product_id = $row['product_id'];
	$productname = $row['product_name'];
	$ofprice = $row['ofprice'];
	$quantity  =  $row['quantity'];
	$totalprice = 0;
	$totalprice = $ofprice * $quantity;
	$insert = "INSERT INTO `order_item` (order_id,product_id,user_id,product_name,user_name,ofprice,quantity,total_price) VALUES(
	 '$order_id','$product_id','$user_id','$productname','$user','$ofprice','$quantity','$totalprice') ";
	mysqli_query($conn, $insert);
}
// id 	oderid 	productid 	productname 	ordertime 	shippingtime 	orderstatus 	paymentstatus 	cash on delivery 	created_at 	
$sql1 = "INSERT INTO `orders` (user_id,user_name,orderid,productid,productname,ordertime,shippingtime)
VALUES(?,?,?,?,?,?,?)";
$stmt = $conn->prepare($sql1);
$stmt->bind_param("ississs", $user_id, $user, $order_id, $product_id, $productname, $ordertime, $Shippingtime);
$stmt->execute();

$delete = "DELETE FROM `card` WHERE user_id= $user_id";
mysqli_query($conn,$delete);
// $amount = $_POST['paytm_amount'];
// echo "<br> $amount <br> ";
// print_r($_SESSION);
echo json_encode([
  "status" => "success",
  "message" => "Data Are SAve In DataBase ",
]);
header("location: /harpreet_Singh/Shop/public/index.php");
exit;