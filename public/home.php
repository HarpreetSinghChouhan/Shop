<?php
require '../views/layouts/headhtml.php';
require_once '../views/layouts/action.php';
require '../app/config/database.php';
$limit = 6; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = ($page < 1) ? 1 : $page;
$offset = ($page - 1) * $limit;
$totalQuery = "SELECT COUNT(*) AS total FROM productsapp";
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalProducts = $totalRow['total'];
$totalPages = ceil($totalProducts / $limit);
$sql = "SELECT * FROM productsapp LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $sql);
?>
<main class="flex-grow-1 flex-shrink-0 mb-5 ">
    <div class="container mb-4">
        <div class="row mt-4">
            <div class="col-12">
                <nav>
                    <ul class="pagination pagination-lg justify-content-center">
                        <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
                            <a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a>
                        </li>
                        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                            <li class="page-item <?php if ($page == $i) echo 'active'; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="page-item <?php if ($page >= $totalPages) echo 'disabled'; ?>">
                            <a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row">
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <div class="col-md-6 col-xl-4 mt-3 ">
                    <div class="card p-3">
                       <a href="../public/description/<?php echo $row['productid'] ?>"> <img src="<?php echo "data:" . $row['ptype_image'] . ";base64," . base64_encode($row['product_image']) ?>" height="350" class="card-img-top"></a>
                        <div class="card-text">
                            <?php echo substr($row['description'], 0, 250) . "...<br> "; ?>
                            <b>
                                <?php echo "OFFER PRICE ₹" . $row['product_ofprice'] . "/ <del>₹" . $row['product_tprice'] . " </del>" ?>
                            </b>
                            <p>
                                Stock Quantity : <?php echo "<b>" . $row['stock_quantity'] . "</b>" ?>
                            </p>
                        </div>
                        <button class="btn btn-primary AddToCart" id="<?php echo $row['productid']  ?>" > ADD TO CARD </button>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</main>



<?php
include '../views/layouts/footer.php'
?>