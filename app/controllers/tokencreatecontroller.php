<?php 
include '../config/database.php';
 function  genratecoupon($length = 16){
return strtoupper(bin2hex(random_bytes($length / 2) ));

 }                                                     
  $token =  "Disc-". genratecoupon();
  $discount_type = $_POST['Discount_Type'];
  $discount_value = $_POST['Discount_Value'];
  if($discount_type  == "Percentage"){
    if($discount_value >99 || $discount_value <0){
    echo json_encode([
        "status" => "Error",
        "message" => "Enter Correct Value"
      ]);
      exit;  
    }
    else{
          echo "Hello Every One <br>";
    }
  }
  $expires_at = date()
  $sql ="INSERT INTO discount (token,discount_type,discount_value,expires_at)
  value(?,?,?,?)";
  // $stmt = $conn->prepare($sql);
  // $stmt->bind_param("ssds",
  // $token,
  // $discount_type,
  // $discount_value,
  // $expires_at,);
  echo $discount_value . "<br>";
  echo $discount_type . "<br>";

  // echo json_encode([
  //   "status" => "$token",
  //   "message" => "Message 1"
  // ]);
exit;