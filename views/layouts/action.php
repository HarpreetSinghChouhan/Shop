 <?php
    require '../views/auth/auth.php';
    session_start();
    requireAuth();
    require '../app/config/database.php';
    $user = $_SESSION['user_id'];
    $sql = "SELECT * FROM card WHERE user_id=$user";
    $result = mysqli_query($conn, $sql);
    //   echo "<pre>";
    //   print_r($result->fetch_assoc());
    //    echo "</pre>"
    //  count($result ,COUNT_NORMAL);
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            "id" => $row['card_id'],
            "productname" => $row['product_name'],
            "quantity" => $row['quantity'],
            "product_image" => "data:image/jpeg;base64," . base64_encode($row['product_image']),
            "ofprice" => $row['ofprice'],
            "price" => $row['price']
        ];
    }
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    $totalc = count($data, COUNT_NORMAL);
    ?>

 <header class="sticky-top ">
     <div class="p-4" id="NavBarId">
         <div class="container row me-auto ms-auto">
             <div class="col-md-2">
                 <img src="uploads/shopping-nest-horizontal-logo_1.webp" alt="" width="100px">
             </div>
             <div class="col-md-8">
                 <div class="d-flex">
                     <ul class="nav">
                         <li class="nav-item"><a href="index.php" class="nav-link">
                                 <div class="dropdown">
                                     PRODUCTS
                                 </div>
                             </a></li>
                         <li class="nav-item"><a href="userdata.php" class="nav-link">USERS</a></li>
                         <li class="nav-item"><a href="" class="nav-link">Hello</a></li>
                         <li class="nav-item"><a href="../public/logout.php" onclick="return confirm('Are you Want logout')" class="nav-link">LOG OUT</a></li>
                         <li class="nav-item"><a href="" class="nav-link">Hello</a></li>
                         <li class="nav-item"><a href="Product.php" class="nav-link">ADD NEW PRODUCT</a></li>
                     </ul>
                 </div>
             </div>
             <div class="col-md-2">
                 <button class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#myModal"> Cart
                     <span id="Cartn">
                         <?php

                            echo $totalc ?>
                     </span>
                 </button>
             </div>
         </div>
     </div>
 </header>
 <div class="modal" id="myModal">
     <div class="modal-dialog modal-xl ">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Product List</h4>
                 <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
             </div>
             <div class="modal-body">
                 <div id="carditem">
                     <?php
                        if ($totalc > 0) {
                            $totalprice = 0;
                            foreach ($data as $key => $value) { ?>
                             <div class="card"  id="card-<?php echo $data[$key]['id']; ?>" >
                                 <div class="d-flex justify-content-between">
                                     <div class="d-flex">
                                         <div><img src="<?php echo $data[$key]['product_image'] ?>" height="50px" alt="hello"></div>
                                         <div>
                                             <div> <?php echo $data[$key]['productname'] ?></div>
                                             <div>₹ <?php echo $data[$key]['ofprice'] ?> / <del> ₹<?php echo $data[$key]['price'] ?></del></div>
                                         </div>
                                     </div>
                                     <div class="mt-1 me-2"><button class="btn btn-primary qtn-btn" data-action="minus" id="min1-<?php echo $data[$key]['id']; ?>" data-id="<?php echo $data[$key]['id']; ?>" >-</button>
                                         <span id="qtn-<?php echo $data[$key]['id']; ?>"  ><?php echo $data[$key]['quantity'] ?></span> <button  class="btn btn-primary qtn-btn" data-id="<?php echo $data[$key]['id']; ?>"  data-action="plus" >+</button>
                                         <button type="button" class="btn btn-danger qtn-rem"  data-id="<?php echo $data[$key]['id']; ?>" >Remove</button>
                                     </div>
                                 </div>
                             </div>
                           
                           <?php  
                           $totalprice += $data[$key]['ofprice'] * $data[$key]['quantity'];
                            }
                             echo  "<div class='text-end' >Total price : ₹ <span id='totalprice' >".
                             $totalprice ."</span></div>";
                        } else {

                            echo "<h5> <b> ADD Item In Card <b></h5>";
                        }

                        ?>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                 <a href="checkout.php"><button type="button" class="btn btn-primary" >Check Out</button></a>
             </div>
         </div>
     </div>
 </div>