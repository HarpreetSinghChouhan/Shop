<?php 
 $hostname = "localhost";
 $user = "root";
 $pass = "";
 $dbname = "happy_app_db";
 
 $conn = mysqli_connect($hostname,$user,$pass,$dbname);
 if(!$conn){
     echo "Connection Error";
 }
