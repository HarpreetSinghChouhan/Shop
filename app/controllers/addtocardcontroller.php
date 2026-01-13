<?php

require '../config/database.php';
require '../models/product.php';
require '../models/user.php';
if (!isset($_GET['id'])) {
    die("Id Are Not Found");
}
session_start();
$id = (int) $_GET['id'];
$UserId = (int) $_SESSION['user_id'];
$product = Product::findmyProduct($id, $conn);
$User = User::findByUserId($UserId, $conn);
 $product_id = $product['productid'];
 $product_name = $product['product_name'];
 $product_image = $product['product_image'];
 $ofprice = $product['product_ofprice'];
 $price = $product['product_tprice'];
 $user_id = $User['id'];
 $user_name = $User['name'];
$sql = "INSERT INTO card (product_id,user_id,user_name,product_name,quantity,product_image,ofprice,price)
  VALUES (?,?,?,?,1,?,?,?)
  ON DUPLICATE KEY UPDATE
  quantity = quantity + 1  
  ";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("iisssdd",$product_id,$user_id,$user_name,$product_name,$product_image,$ofprice,$price);
  if($stmt->execute()){
    header("Location: /harpreet%20Singh/Shop/public/index.php");
    exit;
  }
 else{
    echo "DATA ARE DO NOT SAVE ";
 }
?>