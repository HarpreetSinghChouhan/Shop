<?php 
include '../views/layouts/headhtml.php';
include '../views/layouts/action.php';

?>
<main class="p-5">
<div class="container"  >
<form action="../app/controllers/tokencreatecontroller.php" method="post" class="form border me-auto ms-auto p-3" style="width:clamp(300px,90vw,800px)" >
    <!-- <label for="">Token :</label>
    <input type="text" name="Token" placeholder="Click on Create Token. Token are Createsd" id="Token" readonly class="form-control mt-3 mb-3"> -->
    <label for="Discount"> Discount Type</label>
    <select name="Discount_Type" id="Discount_Type" class="form-control my-3">
        <option value="Percentage">Percentage</option>
        <option value="Price">price</option>
    </select>
    <label for="Discount_Value">Discount Value</label>
    <input type="number" name="Discount_Value" id="Discount_Value" placeholder="Enter Value Accoundding to Discount Type" class="form-control my-3" required>
    <div class="text-end">
        <input type="submit" value="Create Token" class="btn btn-primary">
        
    </div>
</form>

</div>
</main>
<?php  
include '../views/layouts/footer.php';


?>



