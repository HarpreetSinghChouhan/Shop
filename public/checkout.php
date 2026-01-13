<?php
require_once '../views/layouts/headhtml.php';
require_once '../views/layouts/action.php';
require '../app/config/database.php';
$userId = $_SESSION['user_id'];
$sql = "SELECT * FROM card WHERE user_id=$userId";
?>
<main class="p-5 ">
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
                                <div><img src="<?php echo $data[$key]['product_image'] ?>" height="70px" alt="hello"  class="me-3" ></div>
                                <div>
                                    <div> <?php echo $data[$key]['productname'] ?></div>
                                    <div>₹ <?php echo $data[$key]['ofprice'] ?> / <del> ₹<?php echo $data[$key]['price'] ?></del></div>
                                </div>
                            </div>
                            <div class="mt-1 me-2"><button class="btn btn-primary qtn-btn" data-action="minus" data-id="<?php echo $data[$key]['id']; ?>">-</button>
                                <span id="qtnt-<?php echo $data[$key]['id']; ?>"><?php echo $data[$key]['quantity'] ?></span> <button class="btn btn-primary qtn-btn" data-id="<?php echo $data[$key]['id']; ?>" data-action="plus">+</button>
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
            <button type="button"  class="btn btn-primary place-order">Order Place</button></div>
        </div>
        
    </div>
</main>
<?php
require_once '../views/layouts/footer.php'; ?>