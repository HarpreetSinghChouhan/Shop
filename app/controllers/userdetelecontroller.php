<?php 
 require '../config/database.php';

if(!isset($_GET['id'])){
  die("User Id are Missing");
}
$id = (int) $_GET['id'];
$sql= "DELETE FROM users WHERE id=$id";
if (mysqli_query($conn, $sql)) {
    header("Location: /harpreet%20Singh/Shop/public/userdata.php");
    exit;
} else {
    echo "Delete failed: " . mysqli_error($conn);
}
?>