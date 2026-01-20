<?php
include '../views/layouts/headhtml.php';
include '../views/layouts/action.php';
include '../app/config/database.php';
include '../app/models/product.php';
//  echo "Hello Every One ";
$product_id = $_GET['id'];
$product = Product::findmyProduct($product_id, $conn);
// print_r($product);
$sql = "SELECT * FROM productsapp ORDER BY productid DESC";
$result = mysqli_query($conn, $sql);
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        "id" => $row['productid'],
        "product_name" => substr($row['product_name'], 0, 50),
        "ofprice" => $row['product_ofprice'],
        "price" => $row['product_tprice'],
        "stock" => $row['stock_quantity'],
        "discription" => $row['description'],
        "image" => "data:image/jpeg;base64," . base64_encode($row['product_image']),

    ];
}

?>
<main class="p-3 mb-4">
    <div class="container ">
        <div class="row">
            <div class="col-md-4 ">
                <div><img src="<?php echo "data:images/jpeg;base64," . base64_encode($product['product_image']) ?>" alt="" width="100%" class="img-fluid"></div>
            </div>
            <div class="col-md-8 ">
                <div class="mb-3">
                    <?php echo substr($product['description'], 0, 200) . "..." ?>
                </div>
                <div>
                    <div>
                        <b>
                            Limited time Price : ₹<?php echo $product['product_ofprice'] ?>
                        </b>
                    </div>
                    <div>
                        <b>Price :<del> ₹<?php echo $product['product_tprice'] ?></del></b>
                    </div>
                    <div>
                        inclusive of All taxes
                    </div>
                  
                    <div>

                        <figure class="figure mx-1">
                            <img src="https://m.media-amazon.com/images/G/31/A2I-Convert/mobile/IconFarm/trust_icon_free_shipping_81px._CB562549966_.png" alt="free delivery" class="figure-img img-fluid">
                            <figcaption class="figure-caption">free Delivery</figcaption>
                        </figure>
                        <figure class="figure mx-1">
                            <img src="https://m.media-amazon.com/images/G/31/A2I-Convert/mobile/IconFarm/icon-returns._CB562506492_.png" alt="" class="figure-img img-fluid ms-3">
                            <figcaption class="figure-caption"> 10 day replacement</figcaption>
                        </figure>
                        <figure class="figure mx-1">
                            <img src="https://m.media-amazon.com/images/G/31/A2I-Convert/mobile/IconFarm/icon-amazon-delivered._CB562550117_.png" alt="" class="figure-img img-fluid">

                            <figcaption class="figure-caption">Home Delivery </figcaption>
                        </figure>
                        <figure class="figure mx-1">
                            <img src="https://m.media-amazon.com/images/G/31/A2I-Convert/mobile/IconFarm/icon-cod._CB562506657_.png" alt="" class="figure-img img-fluid">
                            <figcaption class="figure-caption"> Pay On Delivery</figcaption>
                        </figure>
                        <figure class="figure">
                            <img src="https://m.media-amazon.com/images/G/31/A2I-Convert/mobile/IconFarm/Secure-payment._CB650126890_.png" alt="" class="figure-img img-fluid">
                            <figcaption class="figure-caption">Scure transaction</figcaption>
                        </figure>
                    </div>
                    <div>
                        <ul>
                            <li>
                                <?php echo substr($product['description'], 0, 100) ?>
                            </li>
                            <li>
                                <?php echo substr($product['description'], 100, 200) ?>
                            </li>
                            <li>
                                <?php echo substr($product['description'], 200, 300) ?>
                            </li>
                        </ul>
                    </div>
                       <div>
                          <button class="btn btn-primary AddToCart" id="<?php echo $row['productid']  ?>" > ADD TO CARD </button>
                     </div>
                </div>

            </div>
        </div>
        <div class="mt-5 fs-2 mb-2" >
            <b>
                Retaited All Products : -- 
            </b> 
        </div>
        <div class="carousel slide carousel-fade P-2 bg-info mb-4" id="carouselslide">
            <div class="carousel-inner">

                <?php
                $chunks = array_chunk($data, 3);
                foreach ($chunks as $index => $products): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <div class="container">
                            <div class="row">

                                <?php foreach ($products as $item): ?>
                                    <div class="col-md-4">
                                        <div class="card mb-3">
                                           <a href="description.php?id=<?php echo $item['id'] ?>"> <img src="<?= $item['image'] ?>" id="imageCAROUSEL"  height="390" alt="<?= htmlspecialchars($item['product_name']) ?>"></a>
                                            <div class="card-body">
                                                <h5 class="card-title"><?= htmlspecialchars($item['product_name']) ?></h5>
                                                <p class="card-text">
                                                    <del>₹<?= $item['ofprice'] ?></del>
                                                    <strong> ₹<?= $item['price'] ?></strong>
                                                </p>
                                                <p class="card-text small">
                                                    Stock: <?= $item['stock'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="button" class="carousel-control-prev" data-bs-target="#carouselslide" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" ></span>
                <span class="visually-hidden"></span>

            </button>
            <button type="button" class="carousel-control-next" data-bs-target="#carouselslide" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden"></span></button>
        </div>
    </div>
</main>

<?php
include '../views/layouts/footer.php';
?>