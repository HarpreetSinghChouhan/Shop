<?php
require_once __DIR__ . "/lib/PaytmChecksum.php";

$params = [
    "MID" => "TESTMID",
    "ORDER_ID" => "ORDER123"
];

$key = "TESTKEY";

$checksum = PaytmChecksum::generateSignature($params, $key);
echo "Checksum: " . $checksum;
?>