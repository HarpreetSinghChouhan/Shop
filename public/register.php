<?php
include '../views/layouts/headhtml.php';
if($_GET['error']??''==="val"){
$error =  "val";
}// echo "$error";
if($_GET['error']??''==="vali"){
$error =  "vali";
}
else{
    $error="";
}
?>
<header class="bg-secondary p-4 ">
    <div class="container d-flex justify-content-end">
        <div>
            <a href="register.php" class="text-warning text-decoration-none me-3 ms-3"> Register Page</a>
        </div>
        <div>
            <a href="login.php" class="text-warning text-decoration-none ms-3 me-3">Login Page</a>
        </div>


    </div>

</header>
   <main class="min-vh-100" id="body1w" >
         <div class="container pt-5 " >
            <div class="ms-auto me-auto border p-4 rounded" id="DivForm" >
              <!-- action="RegisterMan.php"  -->
                <form action="../app/controllers/registrationController.php" method="post" enctype="multipart/form-data" >
                    <label for="Name" class="" >Name : </label>
                 <input  type="text" name="Name" placeholder="Enter Your Name" id="Name" class="form-control mb-3" required>
                 <label for="email">Email : </label>
                 <input type="email" name="email" id="email" placeholder="Enter Your Email"  class="form-control mb-3" required>
                 <label for="password">Password :</label>
                 <input type="password" name="password" id="password" placeholder="Enter Your Password" minlength="6" class="form-control mb-3" required  >
                  <!-- <div class="text-end" > -->
                    <input type="file" name="FileUpload" id="FileUpload" placeholder="Upload File" class="form-control mb-1" >
                    <!-- <br> -->
                 <span   class="text-danger mb-2 d-block" >  
                    <?php if($error==="val"){
                        echo "Email Are Allreaddy Used";
                    }
                    if($error === "vali"){
                        echo "ALL Field are required "; 
                      }
                    ?>
                 </span>
                  
                  <button type="submit" class="btn btn-primary form-control">Submit</button>
                </form>
                
            </div>
         </div>
        </main>

<?php 
include '../views/layouts/footer.php'
?>


