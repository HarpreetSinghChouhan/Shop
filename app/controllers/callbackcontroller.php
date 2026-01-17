<?php
session_start();

include '../config/paymentcon.php';
include '../../lib/PaytmChecksum.php';

$paytmParams = $_POST;
$paytmChecksum = $_POST['CHECKSUMHASH'] ?? '';
$isValidChecksum = PaytmChecksum::verifySignature(
    $paytmParams,
    PAYTM_MERCHANT_KEY,
    $paytmChecksum
);
print_r($_POST);
if ($isValidChecksum === true) {

    if ($_POST['STATUS'] === 'TXN_SUCCESS') {

        echo "✅ Payment Successful<br>";
        echo "Order ID: " . $_POST['ORDERID'] . "<br>";
        echo "Transaction ID: " . $_POST['TXNID'] . "<br>";
        echo "Amount: " . $_POST['TXNAMOUNT'];

    } else {

        echo "❌ Payment Failed<br>";
        echo "Reason: " . ($_POST['RESPMSG'] ?? 'Unknown');

    }

} else {
   
exit;
    echo "❌ Checksum Mismatch 🚫";
}