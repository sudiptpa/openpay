<?php

namespace Omnipay\Openpay\Message;

/**
 * Class AbstractRequest
 * @package Omnipay\Openpay\Message
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    /**
     * @var string
     */
    protected $liveEndpoint = 'https://retailer.myopenpay.com.au/WebSalesLive/';

    /**
     * @var string
     */
    protected $testEndpoint = 'https://retailer.myopenpay.com.au/WebSalesTraining/';

    /**
     * @return string
     */
    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    /**
     * @param $value
     */
    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }

    /**
     * @return string
     */
    public function getAuthToken()
    {
        return $this->getParameter('authToken');
    }

    /**
     * @param $value
     */
    public function setAuthToken($value)
    {
        return $this->setParameter('authToken', $value);
    }

    /**
     * @param $value
     */
    public function setPurchasePrice($value)
    {
        return $this->setParameter('purchasePrice', $value);
    }

    /**
     * @return string
     */
    public function getPurchasePrice()
    {
        return $this->getParameter('purchasePrice');
    }
}