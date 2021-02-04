<?php
namespace Omnipay\Openpay;


use Omnipay\Omnipay;
use Omnipay\Openpay\Message\RestPingResponse;

class TestRestGateway extends \Omnipay\Tests\TestCase
{
    /** @var SharedGateway  */
    protected $gateway;

    public function setUp()
    {
        parent::setUp();

        $this->gateway = new RestGateway($this->getHttpClient(), $this->getHttpRequest());
//        $this->gateway = Omnipay::create('Openpay_Rest');
        $this->gateway->initialize([
            'apiKey' => '3-373',
            'apiToken' => '180D731A-F9C8-437B-8FC0-8341196D9CF0',
            'testMode' => true,
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

}