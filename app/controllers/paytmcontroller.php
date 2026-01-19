<?php
session_start();
include '../config/paymentcon.php';
include '../../lib/PaytmChecksum.php';

$user_id = $_SESSION['user_id'] ?? 0;
$amount = $_POST['paytm_amount'] ?? 0;
// $amount = number_format((float)$amount, 2, '.', '');

if ($amount <= 0) {
    die("Invalid payment amount");
}
$order_id = "ORD" . time() . rand(100, 999);
$paytmParams = [
    "MID" => PAYTM_MID,
    "ORDER_ID" => $order_id,
    "CUST_ID" => "USER_" . $user_id,
    "TXN_AMOUNT" => $amount,
    "CURRENCY" => "INR",
    "CHANNEL_ID" => "WEB",
    "WEBSITE" => PAYTM_WEBSITE, 
    "CALLBACK_URL" => "http://localhost/harpreet_Singh/Shop/app/controllers/callbackcontroller.php",
];

error_log("Paytm Params: " . print_r($paytmParams, true));


$checksum = PaytmChecksum::generateSignature(
    $paytmParams,
    PAYTM_MERCHANT_KEY
);
error_log("Paytm Params: " . print_r($paytmParams, true));
error_log("Paytm Checksum: " . $checksum);
?>

<form method="post" action="<?= PAYTM_TXN_URL ?>" name="paytm_form">
<?php
foreach ($paytmParams as $key => $value) {
    echo '<input type="hidden" name="' . $key . '" value="' .$value . '">';
}
?>
<input type="hidden" name="CHECKSUMHASH" value="<?= $checksum ?>">
</form>

<script >
    document.addEventListener('DOMContentLoaded', function() {
        document.paytm_form.submit();
    });
</script>