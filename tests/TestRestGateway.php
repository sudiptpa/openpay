<?php

namespace Omnipay\Openpay;

use Omnipay\Omnipay;
use Omnipay\Openpay\Message\RestAuthorizeResponse;
use Omnipay\Openpay\Message\RestPingResponse;
use Omnipay\Openpay\Message\RestPriceLimitResponse;

class TestRestGateway extends \Omnipay\Tests\GatewayTestCase
{
    /** @var RestGateway */
    protected $gateway;

    public function getApiKey()
    {
        return '3-373';
    }

    public function getApiToken()
    {
        return '180D731A-F9C8-437B-8FC0-8341196D9CF0';
    }

    public function getTestMode()
    {
        return true;
    }

    public function setUp()
    {
        parent::setUp();

        $this->gateway = new RestGateway($this->getHttpClient(), $this->getHttpRequest());
//        $this->gateway = Omnipay::create('Openpay_Rest');
        $this->gateway->initialize([
            'apiKey'   => $this->getApiKey(),
            'apiToken' => $this->getApiToken(),
            'testMode' => $this->getTestMode(),
        ]);
    }

    public function testPing()
    {
        $this->setMockHttpResponse('RestPingResponse.txt');

        /** @var RestPingResponse $o */
        $o = $this->gateway->ping()->send();
        $this->assertInstanceOf(RestPingResponse::class, $o);
        $this->assertEquals('TrainingAU', $o->getEnvironmentName());
    }

    public function testPriceLimit()
    {
        $this->setMockHttpResponse('RestPriceLimitResponse.txt');

        /** @var RestPriceLimitResponse $o */
        $o = $this->gateway->priceLimit()->send();
        $this->assertInstanceOf(RestPriceLimitResponse::class, $o);
        $this->assertTrue($o->isSuccessful());
        $this->assertEquals(5000, $o->getMinPrice());
        $this->assertEquals(500000, $o->getMaxPrice());
    }

    public function testAuthorize()
    {
        $this->setMockHttpResponse('RestAuthorizeResponse.txt');

        /** @var RestAuthorizeResponse $o */
        $o = $this->gateway->authorize($this->getOptionsForAuthorize())->send();
        $this->assertInstanceOf(RestAuthorizeResponse::class, $o);
        $this->assertTrue($o->isSuccessful());
        $this->assertNotEmpty($o->getOrderId());
        $this->assertEquals('<form action="https://retailer.myopenpay.com.au/websalestraining/" method="POST"><input type="hidden" name="JamCallbackURL" value="https://example.com/return" /><input type="hidden" name="JamCancelURL" value="https://example.com/cancel" /><input type="hidden" name="JamFailURL" value="https://example.com/fail" /><input type="hidden" name="TransactionToken" value="Al5dE65ZExKP8jDF53iQKmFKocB24McXntfc3c4iJI21uQjH6YAK%2BGFnH4Npi7coFvf%2BMYGgXr4WwrCoDFS%2FHoqLtu9Ulbe2G4%2F0cly%2BBeI%3D" /><input type="hidden" name="JamPlanID" value="3000000068423" /></form>', $o->getHiddenForm());
    }

    public function getOptionsForAuthorize()
    {
        return [
            'amount'          => '200.00',
            'card'            => $this->getValidAUCard(),
            'returnUrl'       => 'https://example.com/return',
            'cancelUrl'       => 'https://example.com/cancel',
            'failedUrl'       => 'https://example.com/fail',
            'retailerOrderNo' => (string) rand(10000, 99999),
            'items'           => [
                new RestItem([
                    'name'       => 'Item 1',
                    'itemCode'   => '12345',
                    'quantity'   => 3,
                    'price'      => '30.00',
                    'totalPrice' => '90.00',
                ]),
                new RestItem([
                    'name'       => 'Shipping',
                    'itemCode'   => '-',
                    'quantity'   => 1,
                    'price'      => '110.00',
                    'totalPrice' => '110.00',
                ]),
            ],
        ];
    }

    public function getValidAUCard()
    {
        return [
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
    }
}
