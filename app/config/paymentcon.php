<?php

define('PAYTM_ENV', 'STAGING');
define('PAYTM_MID', 'AaFnxc50750412350415');
define('PAYTM_MERCHANT_KEY', 'WIL6afKKkPgxzh3G');

// Paytm Settings
define('PAYTM_WEBSITE', 'WEBSTAGING');
define('PAYTM_CHANNEL_ID', 'WEB');

// Transaction URL (STAGING)
// define(
//     'PAYTM_TXN_URL',
//     'https://securegw-stage.paytm.in/theia/processTransaction'
// );
define('PAYTM_ENVIRONMENT', 'TEST'); 
define('PAYTM_TXN_URL', 
    (PAYTM_ENVIRONMENT == 'TEST') 
    ? 'https://securegw-stage.paytm.in/theia/processTransaction' 
    : 'https://securegw.paytm.in/theia/processTransaction'
);

?>