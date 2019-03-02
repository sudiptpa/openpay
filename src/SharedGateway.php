<?php

namespace Omnipay\Openpay;

use Omnipay\Common\AbstractGateway;

/**
 * Class SharedGateway.
 */
class SharedGateway extends AbstractGateway
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
            'authToken' => '',
            'testMode' => false,
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

    /**
     * @return string
     */
    public function getPlanID()
    {
        return $this->getParameter('planID');
    }

    /**
     * @param $value
     */
    public function setPlanID($value)
    {
        return $this->setParameter('planID', $value);
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->getParameter('firstName');
    }

    /**
     * @param $value
     */
    public function setFirstName($value)
    {
        return $this->setParameter('firstName', $value);
    }

    /**
     * @return string
     */
    public function getMiddleName()
    {
        return $this->getParameter('middleName');
    }

    /**
     * @param $value
     */
    public function setMiddleName($value)
    {
        return $this->setParameter('middleName', $value);
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->getParameter('lastName');
    }

    /**
     * @param $value
     */
    public function setLastName($value)
    {
        return $this->setParameter('lastName', $value);
    }

    /**
     * @return string
     */
    public function getAddress1()
    {
        return $this->getParameter('address1');
    }

    /**
     * @param string $value
     */
    public function setAddress1($value)
    {
        return $this->setParameter('address1', $value);
    }

    /**
     * Get the billing address, line 2.
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->getParameter('address2');
    }

    /**
     * @param string $value
     */
    public function setAddress2($value)
    {
        return $this->setParameter('address2', $value);
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->getParameter('city');
    }

    /**
     * @param string $value
     */
    public function setCity($value)
    {
        return $this->setParameter('city', $value);
    }

    /**
     * @return string
     */
    public function getPostCode()
    {
        return $this->getParameter('postCode');
    }

    /**
     * @param string $value
     */
    public function setPostCode($value)
    {
        return $this->setParameter('postCode', $value);
    }

    /**
     * Get the billing state.
     *
     * @return string
     */
    public function getState()
    {
        return $this->getParameter('state');
    }

    /**
     * @param string $value
     */
    public function setState($value)
    {
        return $this->setParameter('state', $value);
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getParameter('email');
    }

    /**
     * @param string $value
     */
    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->getParameter('phone');
    }

    /**
     * @param $value
     */
    public function setPhone($value)
    {
        return $this->setParameter('phone', $value);
    }

    /**
     * @return string
     */
    public function getRetailerOrderNo()
    {
        return $this->getParameter('retailerOrderNo');
    }

    /**
     * @param $value
     */
    public function setRetailerOrderNo($value)
    {
        return $this->setParameter('retailerOrderNo', $value);
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
     * @return \Omnipay\Openpay\Message\RefundRequest
     */
    public function refund(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Openpay\Message\RefundRequest', $parameters);
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
