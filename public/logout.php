<?php 
session_start();
$_SESSION = []; 
 $hell = session_destroy();
require '../views/auth/auth.php';

requireAuth();
   header("Location : harpreet%20Singh/Shop/public/login.php");
// exit;
?>

