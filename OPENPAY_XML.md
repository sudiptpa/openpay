# Omnipay: Openpay XML API

## Usage

```php
    use Omnipay\Omnipay;

    $gateway = Omnipay::create('Openpay_Shared');

    $gateway->setMerchantId('xxxxxxx|xxxxxxx-xxx-xxxx');
    $gateway->setAuthToken('xxxxxxxx');

    $gateway->setTestMode(true);

    try {
        $response = $gateway->order([
            'purchasePrice' => '409.50',
        ])->send();

        $planID = $response->getPlanID();

        $response = $gateway->purchase([
            'firstName' => 'Sujip',
            'lastName' => 'Thapa',
            'returnUrl' => 'https://example.com/payment/1/complete',
            'cancelUrl' => 'https://example.com/payment/1/cancel',
            'failedUrl' => 'https://example.com/payment/1/failed',
            'retailerOrderNo' => '145000112',
            'email' => 'buy@example.com',
            'postCode' => '1234',
            'city' => 'Test',
            'address1' => 'Test City',
            'state' => 'ABCD',
            'phone' => '99987765555',
            'purchasePrice' => '409.50',
            'planID' => $planID,
        ])->send();

        if ($response->isRedirect()) {
            $response->redirect();
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
```

After redirecting back from Openpay portal, you need to now verify the transaction with Plan ID.

```php

    $response = $gateway->orderStatus([
        'planID' => $planID,
    ])->send();

    if ($response->isApproved()) {
        // success
    }

    // failure
```
