<?php 
include '../views/layouts/headhtml.php';
include '../views/layouts/action.php';
?>
<main class="mb-5 pb-5 flex-grow-1" >
<div class="container" >
            <form action="../app/controllers/addproduct.php" class="border p-4 mt-5 me-auto ms-auto rounded" method="post" enctype="multipart/form-data"
                style="width:clamp(300px,80vw,800px);">
                <div>
                <span class="mdi mdi-api"></span> ADD PRODUCT
            </div>
            <hr>
                <div class="row">
                    <div class="col-md-8 mb-2">
                        <label for="ProductName" class="form-label">Product Name :</label>
                        <input type="text" name="ProductName" id="ProductName" placeholder="Enter Product Name"
                            class="form-control " required>
                    </div>

                    <div class="col-md-4 mb-2 "><label for="OfferPrice" class="form-label"> Offer Price
                            ₹Rs:</label>
                        <input type="number" name="OfferPrice" id="OfferPrice" placeholder="Enter Offer Price"
                            class="form-control " min="0" required>
                        
                    </div>
                    <!-- <input type="number" name="" id=""> -->
                    <div class="col-md-8 mb-2 ">
                        <label for="UploadImage" class="form-label">Product Image : </label>
                        <input type="file" name="UploadImage" id="UploadImage" class="form-control" required >
                    </div>
                    <div class="col-md-4 mb-2 "><label for="Price" class="form-label">Price ₹Rs:</label>
                        <input type="number" name="Price" id="Price" placeholder="Enter Normal Price"
                            class="form-control" required> 
                    </div>
                    <div class="col-md-12 mb-2"><label for="ProductDiscription" class="form-label">Product Discription
                            :</label>
                        <textarea  rows="5" name="ProductDiscription" id="ProductDiscription" class="form-control"
                            placeholder="Product Discription "></textarea>
                    </div>
                    <div class="col-md-4 mb-2 ">
                        <label for="StockQuantity" class="form-label">Stock Qt :</label>
                        <input type="number" name="StockQuantity" id="StockQuantity" placeholder="Product Stock"
                            class="form-control">
                    </div>
                    <div class="col-md-4 ">
                        <label for="Category" class="form-label">Category :</label>
                        <select name="Category" id="Category" placeholder="Select" class="form-select">
                            <option value="PVC">PVC</option>
                            <option value="PolyStone">PolyStone</option>

                            <option value="ABS">ABS</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="Show"class="form-label" >Status :</label>
                        <select name="Status" id="Status" class="form-select" >
                            <option value="Enable">Enable</option>
                            <option value="Disable">Disable</option>
                        </select>
                    </div>
                    <span id="Error" ></span>
                    <div class="col-md-12 text-end">
                        <input type="Submit" value="ADD PRODUCT" class="btn btn-primary" >
                    </div>
                </div>
            </form>
        </div>
</main>
<?php 
include '../views/layouts/footer.php';
?>