<?php

require __DIR__ . '/vendor/autoload.php';

use Omnipay\Omnipay;
use Omnipay\Openpay\Enums\OriginType;

$gateway = Omnipay::create('Openpay_Rest');

$gateway->setApiKey('3-373');
$gateway->setApiToken('180D731A-F9C8-437B-8FC0-8341196D9CF0');
$gateway->setApiVersion('1.20210320');
$gateway->setTestMode(true);

$response = $gateway->orderLimit([
    'origin' => OriginType::QUERY_ORIGIN_ONLINE,
])->send();

var_dump($response->getData());
exit();
