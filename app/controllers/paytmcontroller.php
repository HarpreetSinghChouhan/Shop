
<?php
session_start();

include '../config/paymentcon.php';
include '../../lib/PaytmChecksum.php';

$user_id = $_SESSION['user_id'] ?? 0;

// amount from frontend
$amount = $_POST['paytm_amount'] ?? 0;
$amount = number_format((float)$amount, 2, '.', '');

if ($amount <= 0) {
    die("Invalid payment amount");
}

// unique order id
$order_id = "ORD" . time() . rand(100, 999);

// Paytm params (DO NOT CHANGE ORDER / VALUES)
$paytmParams = [
    "MID" => PAYTM_MID,
    "ORDER_ID" => $order_id,
    "CUST_ID" => "USER_" . $user_id,
    "TXN_AMOUNT" => $amount,
    "CHANNEL_ID" => "WEB",
    "WEBSITE" => "WEBSTAGING",
    "CALLBACK_URL" =>
        "http://localhost/harpreet%20Singh/Shop/app/controllers/callbackcontroller.php"
];

// generate checksum
$checksum = PaytmChecksum::generateSignature(
    $paytmParams,
    PAYTM_MERCHANT_KEY
);
?>

<form method="post" action="<?= PAYTM_TXN_URL ?>" name="paytm_form">
<?php
foreach ($paytmParams as $key => $value) {
    echo "<input type='hidden' name='$key' value='$value'>";
}
?>
<input type="hidden" name="CHECKSUMHASH" value="<?= $checksum ?>">
</form>

<script>
document.paytm_form.submit();
</script>
