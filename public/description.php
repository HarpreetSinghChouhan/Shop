<?php 
include '../views/layouts/headhtml.php';
include '../views/layouts/action.php';
include '../app/config/database.php';
include '../app/models/product.php';
//  echo "Hello Every One ";
$product_id = $_GET['id'];
$product = Product::findmyProduct($product_id,$conn);
// print_r($product);
?>
<?php 
include '../views/layouts/footer.php';
?>
