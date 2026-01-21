<?php
require_once '../app/config/database.php';

$url = $_GET['url'] ?? '';
$url = trim($url, '/');
$parts = explode('/', $url);

switch ($parts[0]) {

    case '':
    case 'home':
        require 'home.php';
        break;

    case 'products':
        require 'products.php';
        break;

    case 'coupon':
        require 'coupon.php';
        break;

    case 'users':
        require 'users.php';
        break;

    case 'userdata':
        require 'userdata.php';
        break;
    case 'edituser':
        if(isset($parts[1])){
            $_GET['id'] = (int)$parts[1];
            require 'edituser.php';
        }
        else{
            http_response_code(400);
            echo "USER ID ARE missing";
        }
        break;
    case 'vuecoupon':
        require 'vuecoupon.php';
        break;

    case 'product':
        require 'product.php';
        break;

    case 'checkout':
        require 'checkout.php';
        break;

    case 'description':
        if (isset($parts[1])) {
            $_GET['id'] = (int)$parts[1];
            require 'description.php';
        } else {
            http_response_code(400);
            echo "Product ID missing";
        }
        break;

    case 'login':
        require 'login.php';
        break;

    case 'logout':
        session_destroy();
        header("Location: login");
        exit;

    default:
        http_response_code(404);
        echo "<h1>404 Page Not Found</h1>";
}
