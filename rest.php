<?php

require __DIR__.'/vendor/autoload.php';

use Omnipay\Omnipay;
use Omnipay\Openpay\Item;

$gateway = Omnipay::create('Openpay_Rest');

// Replace xxxx with our own keys

$gateway->setApiKey('3-798');
$gateway->setApiToken('12F274AC-D069-4475-BA48-A194A3039728');

$gateway->setTestMode(true);

// $response = $gateway->capture([
//     'orderId' => 123456789
// ])->send();

// $response = $gateway->priceLimit()->send();

try {
    $card = [
        'firstName'        => 'Example',
        'lastName'         => 'User',
        'email'            => 'customer@gmail.com',
        'phone'            => '0400123123',
        'billingAddress1'  => '123 Billing St',
        'billingAddress2'  => 'Billsville',
        'billingCity'      => 'Billstown',
        'billingPostcode'  => '3133',
        'billingState'     => 'VIC',
        'billingCountry'   => 'AU',
        'billingPhone'     => '0400 123 123',
        'shippingAddress1' => '123 Shipping St',
        'shippingAddress2' => 'Shipsville',
        'shippingCity'     => 'Shipstown',
        'shippingPostcode' => '3000',
        'shippingState'    => 'VIC',
        'shippingCountry'  => 'AU',
        'shippingPhone'    => '03 8500 0000',
    ];

    $response = $gateway->authorize([
        'amount'          => '200.00',
        'card'            => $card,
        'returnUrl'       => 'https://example.com/return',
        'cancelUrl'       => 'https://example.com/cancel',
        'failedUrl'       => 'https://example.com/fail',
        'retailerOrderNo' => 'abc123',
        'items'           => [
            new Item([
                'name'       => 'Item 1',
                'itemCode'   => '12345',
                'quantity'   => 3,
                'price'      => '30.00',
                'totalPrice' => '90.00',
            ]),
            new Item([
                'name'       => 'Shipping',
                'itemCode'   => '-',
                'quantity'   => 1,
                'price'      => '110.00',
                'totalPrice' => '110.00',
            ]),
        ],
    ])->send();

    var_dump($response->isRedirect());

    var_dump($response->getRedirectUrl());

    var_dump($response->getData());

    // https://example.com/return?status=SUCCESS&planid=3000000071848&orderid=abc123

    exit();

    // Capture after user completed plan registration via return URL

    // $capResp = $gateway->capture([
    //     'orderId' => $_REQUEST['planid'],
    // ])->send();

    // if ($capResp->isSuccessful()) {
    //     //
    // }

    // $tx = $gateway->fetchTransaction(['orderId' => $_REQUEST['planid']])->send();

    // $plan = $tx->getPlanStatus(); // Active

    // $order = $tx->getOrderStatus(); // Pending | Approved
} catch (Exception $e) {
    var_dump($e->getMessage());
    exit();
}

var_dump($response->getData());

exit();

// https://documenter.getpostman.com/view/8573154/SVtYRmc5

// https://developer.openpay.com.au/online
