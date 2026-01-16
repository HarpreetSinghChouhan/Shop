<?php
require_once '../views/layouts/headhtml.php';
require_once '../views/layouts/action.php';
require '../app/config/database.php';
$userId = $_SESSION['user_id'];
$sql = "SELECT * FROM card WHERE user_id=$userId";
?>
<main >
    <div class="container mt-3">
        <?php

        // print_r($data); 
        ?>
        <div id="carditem" class="border p-5">
            <?php
            if ($totalc > 0) {
                $totalprice = 0;
                echo "<div class='border p-3' >";
                foreach ($data as $key => $value) { ?>
                    <div class="card p-3 mb-4" id="card1-<?php echo $data[$key]['id']; ?>">
                        <div class="d-flex justify-content-between ">
                            <div class="d-flex">
                                <div><img src="<?php echo $data[$key]['product_image'] ?>" height="70px" width="70px" alt="hello" class="me-3"></div>
                                <div>
                                    <div> <?php echo $data[$key]['productname'] ?></div>
                                    <div>₹<?php echo $data[$key]['ofprice'] ?> / <del> ₹<?php echo $data[$key]['price'] ?></del></div>
                                </div>
                            </div>
                            <div class="mt-1 me-2"><button class="btn btn-primary qtn-btn" data-action="minus" data-id="<?php echo $data[$key]['id']; ?>" id="min1-<?php echo $data[$key]['id']; ?>">-</button>
                                <span id="qtnt-<?php echo $data[$key]['id']; ?>"><?php echo $data[$key]['quantity'] ?></span> <button class="btn btn-primary qtn-btn" data-id="<?php echo $data[$key]['id']; ?>" data-action="plus" id="plus-<?php echo $data[$key]['id']; ?>">+</button>
                                <button type="button" class="btn btn-danger qtn-rem" data-id="<?php echo $data[$key]['id']; ?>">Remove</button>
                            </div>
                        </div>
                    </div>

            <?php
                    $totalprice += $data[$key]['ofprice'] * $data[$key]['quantity'];
                }

                echo  "</div> <div class='text-end mt-3' ><b> Total price : ₹<span id='totalprice1' >" .
                    $totalprice . "</span> </b></div>";
            } else {
                echo "<h5> <b> ADD Item In Card <b></h5>";
            }

            ?>


            <div class="mt-4 text-end">
                <a href="../public/index.php"><button type="button" class="btn btn-secondary">Add More product</button></a>
                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#tokencheckmodel"> Order Place</button>
            </div>
        </div>
        <div>
            <div class="modal" id="tokencheckmodel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">TOKEN CHECK</h4>
                            <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body border">
                            <div id="">
                                <form id="checkToken" class="ms-auto" method="post">
                                    <label for="" class="from-label mb-2">Coupon :</label>
                                    <input type="text" name="Token" id="Token" placeholder="Enter Valid Token Coupon" class="form-control" required>
                                    <div id="error" class="text-danger">

                                    </div>
                                    <div class="text-end mt-3">
                                        <input type="submit" value="Check Token" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>

                            <div class="b">
                                <div>
                                    <div id="withtoken" >Price Without Token </div>
                                    <b>Price ₹<span id="totalp"><?php echo $totalprice ?></span> </b>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" value="back to checkout" class="btn btn-warning" data-bs-dismiss="modal">
                            <input type="button" value="order" class="btn btn-primary">
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</main>
<?php
require_once '../views/layouts/footer.php'; ?>