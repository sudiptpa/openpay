<?php

require __DIR__.'/vendor/autoload.php';

use Omnipay\Omnipay;

$gateway = Omnipay::create('Openpay_Shared');

// Replace xxxx with our own keys

$gateway->setMerchantId('30000000000000977|526d44c3-1bff-4fb1-861b-f0788c1c9c22');
$gateway->setAuthToken('526d44c3-1bff-4fb1-861b-f0788c1c9c22');

$gateway->setTestMode(true);

$response = $gateway->order([
    'purchasePrice' => '122.00',
])->send();

$message = sprintf(
    'Plain ID  (%s) - %s',
    $response->getPlanID(),
    $response->getMessage()
);

var_dump($message);
exit();
