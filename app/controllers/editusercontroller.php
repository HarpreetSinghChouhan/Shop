<?php
require '../config/database.php';
require '../models/user.php';
$email = $_POST['Email'];
$user = User::findByEmail($email, $conn);
$name = trim($_POST['UserName']);
$file = $_FILES['UploadFile'];
$fname = $file['name'];
if($name == ""){
    header("location: harpreet%20Singh/Shop/public/edituser.php?id=$email error=nm");
    // exit;
}
if ($fname === "") {
    $fname = $user['profile_image'];
    $pfile = "uploads/". basename($fname);
}
else{
    $pfile = "uploads/" . basename($fname);
    move_uploaded_file($file['tmp_name'],"../../public/".$pfile);
}
$sql = "UPDATE users set name='$name' ,profile_image='$fname', FilePath='$pfile' WHERE email='$email'";
 mysqli_query($conn,$sql);
 header("location: /harpreet%20Singh/Shop/public/edituser.php?id=$email");

?>