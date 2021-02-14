<?php

require __DIR__.'/vendor/autoload.php';

use Omnipay\Omnipay;

$gateway = Omnipay::create('Openpay_Shared');

// Replace xxxx with our own keys

$gateway->setMerchantId('xxxxx|xxxx-xxxx-xxxx-xxxx-xxxxx');
$gateway->setAuthToken('xxxx-xxx-xxxx-xxxx-xxxx');

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
