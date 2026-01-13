<?php 
session_start();
require '../config/database.php';
header('Content-Type: application/json');
 $id = (int) $_POST['ids'];
 $action = $_POST['action'];
 if($action == "plus"){
    $sql = "UPDATE card SET quantity = quantity + 1  WHERE card_id=$id"; 
 } 
 else if($action =="minus"){
    $sql = "UPDATE card SET quantity = quantity - 1 WHERE card_id=$id";
 }
 else {
    echo json_encode([
     "status" => "failed",
    ]);
    exit;
 }
 
mysqli_query($conn,$sql);
$sql = "SELECT ofprice,quantity FROM card ";
$result = mysqli_query($conn,$sql);
$totalprice = 0;
  while($row = $result->fetch_assoc()){
    $totalprice += $row['ofprice']*$row['quantity']; 
  }
$sql = "SELECT * FROM card WHERE card_id=$id";
$result = mysqli_query($conn,$sql);
$row = $result->fetch_assoc();
$quantity = (int) $row['quantity'];
echo json_encode([
    "status" => $quantity ,
    "price" => $totalprice
]);
exit;