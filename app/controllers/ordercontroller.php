<?php 
require_once '../config/database.php';
include_once '../models/card.php';
session_start();

$order_id = "ORD". time().rand(100,999);
$user = $_SESSION['auth'];
$user_id = $_SESSION['user_id'];
$carddata = card::foundusercard($user_id,$conn);
$product_id = 2;
$product_id =  $carddata['product_id'];
$productname = $carddata['product_name'];
$ordertime = date("y:m:d h:i:s");
$productname = "safgd";
$Shippingtime = date("y:m:d h:i:s", strtotime("+3days") ) ;
 	// id 	oderid 	productid 	productname 	ordertime 	shippingtime 	orderstatus 	paymentstatus 	cash on delivery 	created_at 	
$sql1 = "INSERT INTO `order` (user_id,user_name,oderid,productid,productname,ordertime,shippingtime)
VALUES(?,?,?,?,?,?,?)";
$stmt = $conn->prepare($sql1);
$stmt->bind_param("ississs",$user_id,$user,$order_id,$product_id,$productname,$ordertime,$Shippingtime);
$stmt->execute();
$amount = $_POST['paytm_amount'];
echo "<br> $amount <br> ";
print_r($_SESSION);