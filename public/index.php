<?php
require '../views/layouts/headhtml.php';
require_once '../views/layouts/action.php';
require '../app/config/database.php';
?>
<main class="flex-grow-1 flex-shrink-0 mb-5 ">
    <div class="container mb-4">
        <div class="row">
            <?php
            $sql = "SELECT * FROM productsapp WHERE productid  BETWEEN 1 AND 10 ";
            $result = mysqli_query($conn, $sql);
            while ($row = $result->fetch_assoc()) {
            ?>
                <div class="col-md-6 col-xl-4 mt-3 ">
                    <div class="card p-3">
                        <img src="<?php echo "data:" . $row['ptype_image'] . ";base64," . base64_encode($row['product_image']) ?>" height="350" class="card-img-top">
                        <div class="card-text">
                            <?php echo substr($row['description'], 0, 250) . "...<br> ";?>
                            <b>
                                <?php echo "OFFER PRICE ₹".$row['product_ofprice']."/ <del>₹".$row['product_tprice'] ." </del>"?>
                            </b>
                            <p>
                                Stock Quantity : <?php echo "<b>". $row['stock_quantity'] ."</b>" ?>
                            </p>
                        </div>
                         <a href="../app/controllers/addtocardcontroller.php?id=<?php echo $row['productid'] ?>"><button  class="btn btn-primary" >ADD TO CARD </button></a>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</main>



<?php
include '../views/layouts/footer.php'
?>