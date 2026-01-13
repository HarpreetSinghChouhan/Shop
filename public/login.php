<?php
include '../views/layouts/headhtml.php';
  if($_GET['error']??'' === "db"){
    $error = " PLEASE ENTER CORRECT LOGIN DETAIL";
  }
  else{
    $error ="";
    
  }
// 
?>
<header class="bg-secondary p-4 min-vw-100 position-fixed sticky-top ">
    <div class="container d-flex justify-content-end ">
        <div>
            <a href="register.php" class="text-warning text-decoration-none me-3 ms-3"> Register Page</a>
        </div>
        <div>
            <a href="login.php" class="text-warning text-decoration-none ms-3 me-3">Login Page</a>
        </div>


    </div>

</header>
<main id="body1w" class="min-vh-100 p-5">

    <div class="container align-item-center">
        <div class="text-center"> <img src="uploads/urichi_image.jpg" alt="" class="image-fluid rounded-circle mt-5 mb-5 " width="200" height="200"></div>
        <form id="DivForm" action="../app/controllers/LoginController.php" method="post" style="width: clamp(300px,100vw,750px);" class="me-auto ms-auto border p-3 rounded">
            <label for="email" class="form-label mb-2">User Email : </label>
            <input type="email" name="email" id="email" placeholder="Enter Your Email" class="form-control " required>
            <label for="password" class="form-label mt-4 "> User Pass :</label>
            <input type="password" name="password" id="password" placeholder="Enter Your Password" class="form-control mb-3" required>
          <span class="text-danger" >
            <?php if($error){
                echo "PLEASE ENTER CORRECT LOGIN DETAIL";
            }  ?>
          </span>
            <div class="text-end" ><button type="submit" class="btn btn-primary mt-4 btn-lg pe-4 ps-4 ">Login</button></div>
        </form>
    </div>
</main>
<?php
include '../views/layouts/footer.php'
?>