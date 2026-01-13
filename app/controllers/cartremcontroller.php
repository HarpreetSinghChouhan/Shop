<?php
session_start();
require '../config/database.php';
header("Content-type:application/json");
$id = $_POST['id'];
$sql = "DELETE FROM card WHERE card_id=$id";
 mysqli_query($conn,$sql);
 $sql = "SELECT ofprice,quantity FROM card ";
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