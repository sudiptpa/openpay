# Omnipay: Openpay REST API

## Basic Usage

    ```php
        use Omnipay\Omnipay;
        use Omnipay\Openpay\Item;

        $gateway = Omnipay::create('Openpay_Rest');

        $gateway->setApiKey(xxxx.xxxx);
        $gateway->setApiToken(xxxxxxx.xxxxxxx.xxx.xxxx);
        $gateway->setApiVersion('1.20210320');

        $gateway->setTestMode(true);

        try {
            $card = [
            'firstName' => 'Example',
            'lastName' => 'User',
            'email' => 'customer@gmail.com',
            'phone' => '0400123123',
            'billingAddress1' => '123 Billing St',
            'billingAddress2' => 'Billsville',
            'billingCity' => 'Billstown',
            'billingPostcode' => '3133',
            'billingState' => 'VIC',
            'billingCountry' => 'AU',
            'billingPhone' => '0400 123 123',
            'shippingAddress1' => '123 Shipping St',
            'shippingAddress2' => 'Shipsville',
            'shippingCity' => 'Shipstown',
            'shippingPostcode' => '3000',
            'shippingState' => 'VIC',
            'shippingCountry' => 'AU',
            'shippingPhone' => '03 8500 0000',
        ];

        $response = $gateway->authorize([
            'amount' => '200.00',
            'card' => $card,
            'returnUrl' => 'https://example.com/return',
            'cancelUrl' => 'https://example.com/cancel',
            'failedUrl' => 'https://example.com/fail',
            'retailerOrderNo' => 'abc123',
            'items' => [
                new Item([
                    'name' => 'Item 1',
                    'itemCode' => '12345',
                    'quantity' => 3,
                    'price' => '30.00',
                    'totalPrice' => '90.00',
                ]),
                new Item([
                    'name' => 'Shipping',
                    'itemCode' => '-',
                    'quantity' => 1,
                    'price' => '110.00',
                    'totalPrice' => '110.00',
                ]),
            ],
        ])->send();


        if($response->isSuccessful()) {
            $planID = $response->getPlanID();
            $orderID = $response->getOrderId();

            // save them to database.

            if ($response->isRedirect()) {
                $response->redirect();
            }

            // takes you to the Openpay protal to enter account details, you card details etc.
        }
        } catch (Exception $e) {
            // catch error
        }
    ```

    After redirecting back from Openpay portal, you need to now verify the transaction with Plan ID.

    // https://example.com/return?status=SUCCESS&planid=3000000071848&orderid=abc123

    Capture after user completed plan registration via return URL

    ```php

        $response = $gateway->capture([
            'orderId' => $orderID,
        ])->send();

        if ($response->isSuccessful()) {
            //
        }

        $response = $gateway->fetchTransaction(['orderId' => $orderID])->send();

        $plan = $response->getPlanStatus(); // Active

        $order = $response->getOrderStatus(); // Pending | Approved
    ```

