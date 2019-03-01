<?php

namespace Omnipay\Openpay;

use Omnipay\Common\AbstractGateway;

/**
 * Class WebSalesGateway.
 */
class WebSalesGateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Openpay';
    }

    /**
     * @return array
     */
    public function getDefaultParameters()
    {
        return [
            'merchantId' => '',
            'workingKey' => '',
            'testMode'   => false,
        ];
    }

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
    public function getWorkingKey()
    {
        return $this->getParameter('workingKey');
    }

    /**
     * @param $value
     */
    public function setWorkingKey($value)
    {
        return $this->setParameter('workingKey', $value);
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

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\PurchaseRequest
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Openpay\Message\PurchaseRequest', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\OrderRequest
     */
    public function order(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Openpay\Message\OrderRequest', $parameters);
    }
}
