<?php 
 require '../config/database.php';

if(!isset($_POST['id'])){
  die("User Id are Missing");
}
$id = (int) $_POST['id'];
$sql= "DELETE FROM users WHERE id=$id";
if (mysqli_query($conn, $sql)) {
    echo json_encode([
        "status" => "success",
         "message" => "User Are Deleted"
    ]);
    
} else {
  echo json_encode([
    "status" => "Error",
    "message" => "User Are Not Deleted"
  ]);
 
}
 exit;