<?php

 function isLoggedin(){
    return isset($_SESSION['user_id']);
 }
  
  function requireAuth(){
    if(!isLoggedin()){
        header("Location: /harpreet_Singh/Shop/public/login.php");
        exit;
    }
  }

?>