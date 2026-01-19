<?php
session_start();
require '../config/database.php';
header("Content-type:application/json");
$id = $_POST['id'];
$user_id = $_SESSION['user_id'];
$sql = "DELETE FROM card WHERE card_id=$id";
 mysqli_query($conn,$sql);
 $sql = "SELECT ofprice,quantity FROM card WHERE user_id=$user_id ";
$result = mysqli_query($conn,$sql);
$totalprice = 0;
  while($row = $result->fetch_assoc()){
    $totalprice += $row['ofprice']*$row['quantity']; 
  }
 echo json_encode([
    "status" => "success",
    "price" => $totalprice
 ]);

exit;