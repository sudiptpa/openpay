<?php
namespace Omnipay\Openpay;


use Omnipay\Omnipay;
use Omnipay\Openpay\Message\RestPingResponse;
use Omnipay\Openpay\Message\RestPriceLimitResponse;

class TestRestGateway extends \Omnipay\Tests\GatewayTestCase
{
    /** @var SharedGateway  */
    protected $gateway;

    public function getApiKey() {
        return '3-373';
    }

    public function getApiToken() {
        return '180D731A-F9C8-437B-8FC0-8341196D9CF0';
    }

    public function getTestMode() {
        return true;
    }


    public function setUp()
    {
        parent::setUp();

        $this->gateway = new RestGateway($this->getHttpClient(), $this->getHttpRequest());
//        $this->gateway = Omnipay::create('Openpay_Rest');
        $this->gateway->initialize([
            'apiKey' => $this->getApiKey(),
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

    public function testPriceLimit() {

        $this->setMockHttpResponse('RestPriceLimitResponse.txt');

        /** @var RestPriceLimitResponse $o */
        $o = $this->gateway->priceLimit()->send();
        $this->assertInstanceOf(RestPriceLimitResponse::class, $o);
        $this->assertTrue($o->isSuccessful());
        $this->assertEquals(5000, $o->getMinPrice());
        $this->assertEquals(500000, $o->getMaxPrice());
    }

}