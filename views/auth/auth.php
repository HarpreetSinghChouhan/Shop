<?php

 function isLoggedin(){
    return isset($_SESSION['user_id']);
 }
  
  function requireAuth(){
    if(!isLoggedin()){
        header("Location: /harpreet%20Singh/Shop/public/login.php");
        exit;
    }
  }

?>