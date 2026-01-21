<?php

require '../config/database.php';
require '../models/product.php';
require '../models/user.php';
if (!isset($_POST['id'])) {
    die("Id Are Not Found");
}
session_start();
$id = (int) $_POST['id'];
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
$sql = "INSERT INTO `card` (product_id,user_id,user_name,product_name,quantity,product_image,ofprice,price)
  VALUES (?,?,?,?,1,?,?,?)
  ON DUPLICATE KEY UPDATE
  quantity = quantity + 1  
  ";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("iisssdd",$product_id,$user_id,$user_name,$product_name,$product_image,$ofprice,$price);
  if($stmt->execute()){
    $sql = "SELECT quantity,product_id FROM `card` WHERE user_id=$UserId";
    $result = mysqli_query($conn,$sql);
    // $result = $result['quantity'];
    $quantity = [];
    while($row = $result->fetch_assoc()){
        $quantity [] = $row['quantity'];
    }
   echo json_encode([
    "status" => "success",
    "message" => "Data Are Saved in Table",
    "quantity" => count($quantity,COUNT_NORMAL),
    "user" => $UserId
   ]);
  }
 else{
    echo "DATA ARE DO NOT SAVE ";
 }
exit;