<?php
include '../config/database.php';
// header("application")
print_r($conn);
$pname = trim($_POST['ProductName']) ?? '';
$pofprice = $_POST['OfferPrice'];
$pnprice = $_POST['Price'];
$pfile = $_FILES['UploadImage'];
$file = file_get_contents($pfile['tmp_name']);
$pdescription = $_POST['ProductDiscription'];
$pstock = $_POST['StockQuantity'];
$pCategory = $_POST['Category'];
$pstatus = $_POST['Status'];
$pofprice = (int) $pofprice;
$pnprice = (int) $pnprice;
$ptimage = $pfile['type'];
if ($pname === "") {
  echo json_encode([
    "status" => "Error",
    "message" => "Name Are Empty Please Fill Name"
  ]);
  exit;
}
if ($pdescription === "") {
  echo json_encode([
    "status" => "Error",
    "message" => "Description Are Empty Please Fill Description"
  ]);
  exit;
}
if ($pofprice > $pnprice) {
  echo json_encode([
    "status" => "Error",
    "message" => "Number Error Offer Price Are Bigger then Price"
  ]);
  exit;
}
$sql = "INSERT INTO productsapp (product_name,product_ofprice,product_tprice,product_image,ptype_image,description,stock_quantity,p_status,p_category) VALUES(?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sddsssiss", $pname, $pofprice, $pnprice, $file, $ptimage, $pdescription, $pstock, $pstatus, $pCategory);
if ($stmt->execute()) {
  header("location: /harpreet_Singh/Shop/public/index");
  exit;
} else {
  header("location: /harpreet_Singh/Shop/public/product.php?error=db");
  exit;
}
$stmt->close();
$conn->close();
?>
