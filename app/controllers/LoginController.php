<?php
 include '../config/database.php';
  include '../models/user.php';
  session_start();
  $email = trim($_POST['email'])??'';
  $pass = trim($_POST['password'])??'';
  $user1 = User::findByEmail($email,$conn);
//    $stmt 
//   print_r($user1);
  if($user1){
      if(password_verify($pass,$user1['password1'])){
        session_regenerate_id(true);
         $_SESSION['user_id'] = $user1['id'];
         $_SESSION['auth'] = $user1['name']; 
  
        header("location: /harpreet_Singh/Shop/public/index.php");
    }
    else{
     header("location: /harpreet_Singh/Shop/public/login.php?error=db");
    }
  }
   else{
     header("location: /harpreet_Singh/Shop/public/login.php?error=db");
   }
?>