<?php

namespace Omnipay\Openpay\Message;

/**
 * Class PurchaseRequest
 * @package Omnipay\Openpay\Message
 */
class PurchaseRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $liveEndpoint = 'https://retailer.myopenpay.com.au/WebSalesLive/';

    /**
     * @var string
     */
    protected $testEndpoint = 'https://retailer.myopenpay.com.au/WebSalesTraining/';
}
