
# Omnipay: Openpay

**Openpay driver for the Omnipay PHP payment processing library**
[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP. This package implements Openpay support for Omnipay.
[![StyleCI](https://github.styleci.io/repos/173117409/shield?branch=master&style=flat)](https://github.styleci.io/repos/173117409)
[![Latest Stable Version](https://poser.pugx.org/sudiptpa/omnipay-openpay/v/stable)](https://packagist.org/packages/sudiptpa/omnipay-openpay)
[![Total Downloads](https://poser.pugx.org/sudiptpa/omnipay-openpay/downloads)](https://packagist.org/packages/sudiptpa/omnipay-openpay)
[![License](https://poser.pugx.org/sudiptpa/omnipay-openpay/license)](https://packagist.org/packages/sudiptpa/omnipay-openpay)

## Installation
Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply add it
to your `composer.json` file:
```json
{
    "require": {
        "sudiptpa/omnipay-openpay": "~2.0"
    }
}
```

And run composer to update your dependencies:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar update

## Basic Usage (XML Api)

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

### Basic Usage (Rest API)

```php
    use Omnipay\Omnipay;
    use Omnipay\Openpay\RestItem;

    $gateway = Omnipay::create('Openpay_Rest');

    $gateway->setApiKey('xxxx'); // API Username
    $gateway->setApiToken('xxxxxxxx-xxxx-xxxx-xxxxxxxxxxxx'); //API Password

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
            'shippingPhone' => '03 8500 0000'
        ];
  
        /** @var \Omnipay\Openpay\Message\RestAuthorizeResponse $authResp */
        $authResp = $gateway->authorize([
           'amount' => '200.00',
            'card' => $card,
            'returnUrl' => 'https://example.com/return',
            'cancelUrl' => 'https://example.com/cancel',
            'failedUrl' => 'https://example.com/fail',
            'retailerOrderNo' => 'abc123',
            'items' => [
                new RestItem([
                    'name' => 'Item 1',
                    'itemCode' => '12345',
                    'quantity' => 3,
                    'price' => '30.00',
                    'totalPrice' => '90.00'
                ]),
                new RestItem([
                    'name' => 'Shipping',
                    'itemCode' => '-',
                    'quantity' => 1,
                    'price' => '110.00',
                    'totalPrice' => '110.00'
                ])
            ],
        ])->send();
        
        if($authResp->isSuccessful()) {
          saveOrderId($authResp->getOrderId());
          echo $authResp->getHiddenForm();
          echo '<script>document.forms[0].submit()</script>';
        } else {
          reportPaymentFailure('Open pay did not accept your order',$authResp->getData());
        }
        
        
        // Capture after user completed plan registration via return URL
        
        /** @var \Omnipay\Openpay\Message\RestCaptureResponse $capResp */
        $capResp = $gateway->capture([
            'orderId' => loadOrderId(),
        ])->send();

        if($capResp->isSuccessful()) {
            markPaymentComplete($capResp->getOrderId(), $capResp->getPurchasePrice());
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }

```

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.

## Contributing

Contributions are **welcome** and will be fully **credited**.

Contributions can be made via a Pull Request on [Github](https://github.com/sudiptpa/openpay).

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release anouncements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/sudiptpa/openpay/issues),
or better yet, fork the library and submit a pull request.
