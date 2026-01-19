<?php
include_once '../config/database.php';
include_once '../models/user.php';
$email = $_POST['email'];
$user = User::findByEmail($email, $conn);
print_r($user);
if ($user) {
    header("location: /harpreet_Singh/Shop/public/register.php?error=val");
} else {
    $username = $_POST['Name'];
    $file = $_FILES['FileUpload'];
    //  print_r($file); 
    $nfile = $file['name'];
    $pfile = $file['tmp_name'];
    $path = "uploads/" . basename($nfile);

    if ($nfile === "") {
        header("location: /harpreet_Singh/Shop/public/register.php?error=vali");
    } else {
        move_uploaded_file($pfile, "../../public/$path");
        $sql = "INSERT INTO users (name,email,password1,profile_image,FilePath) value(?,?,?,?,?)";

        $passs = $_POST['password'];
        $password = password_hash($passs, PASSWORD_DEFAULT);
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $username, $email, $password, $nfile, $path);
        if ($stmt->execute()) {
            header("location: /harpreet_Singh/Shop/public/login.php");
        }
    }
}
