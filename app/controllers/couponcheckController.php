<?php 
 include '../config/database.php';
 include '../models/coupon.php';
 $sql = "SELECT * FROM card";
 $result = mysqli_query($conn,$sql);
  $totalprice = 0;
 while($row = $result->fetch_assoc()){
    $totalprice += $row['ofprice']* $row['quantity'];
    }
  $token = $_POST['Token'];
 echo json_encode([
    "status" => $token,
  ]);
  $coupon = coupon ::findCoupon($token,$conn);
  echo "<BR>$token <BR>";
  
  if($coupon == "" ){
    echo "Hello Every One";
  }
  else{
     $datenow = time();
     echo $datenow ."<br>" ; 
    $expiresdate =  strtotime($coupon['expires_at']);  
    echo $expiresdate . "<br>";
    if($datenow > $expiresdate){
        echo json_encode([
            "status" => "Error",
            "Message" => "date Are Not Matched"
        ]);
        exit;
    }
$total = 0;
  print_r($coupon);
  echo "<br>" . $coupon['discount_type'];
   if($coupon['discount_type'] === "percent"){
     $value =  $coupon['discount_value'];
     $total = $totalprice*$value/100;
     $total = $totalprice-$total;
     echo "<br> $total"; 
   }
   else {
    $value = $coupon['discount_value'];
    if($value < $totalprice){
       echo json_encode([
        "status" => "Error",
       ]);
       exit;
    } 
    $total = $totalprice - $value;
   }
  }
exit;