<?php
include '../views/layouts/headhtml.php';
require_once '../views/layouts/action.php';
require '../app/config/database.php';
require '../app/models/user.php';

?>
<main class=" min-vh-75 p-4">
    <div class="container-md">
        <?php
        $email = $_GET['id'];
        $user = User::findByUserId($email, $conn);
        // print_r($user) ?>
        <div style="width:clamp(300px,90vw,700px)" class="me-auto ms-auto" >
            <div class="text-center" > <img src="/harpreet_Singh/Shop/public/<?php echo $user['FilePath']; ?>" class="rounded-circle " width="150" height="150" alt=""></div>
            <form action="../app/controllers/editusercontroller.php" class="p-4 border rounded mt-4" method="post" enctype="multipart/form-data">
                <input type="text" name="UserName" id="UserName" class="form-control mt-3 mb-3" value="<?php echo $user['name']; ?>" required>
                <input type="email" name="Email" id="Email" class="form-control mt-3 mb-3" value="<?php echo $user['email'] ?>" readonly>
                <input type="file" name="UploadFile" id="UploadFile" class="form-control mt-3 mb-3" >
                <div class="text-end" >
                   <a href="../public/userdata" class="" ><button type="button" class="btn btn-warning text-white">Back</button></a>  <input type="submit" name="button" id="button" class="btn btn-primary mt-3 mb-3" value="submit">
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include '../views/layouts/footer.php';

?>