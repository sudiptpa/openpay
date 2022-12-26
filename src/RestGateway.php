<?php

namespace Omnipay\Openpay;

use Omnipay\Common\AbstractGateway;

/**
 * Class RestGateway.
 */
class RestGateway extends AbstractGateway
{
    public function getName()
    {
        return 'Openpay Rest';
    }

    public function getDefaultParameters()
    {
        return [
            'apiKey'   => '',
            'apiToken' => '',
            'testMode' => true,
        ];
    }

    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    public function getApiToken()
    {
        return $this->getParameter('apiToken');
    }

    public function setApiToken($value)
    {
        return $this->setParameter('apiToken', $value);
    }

    public function getApiVersion()
    {
        return $this->getParameter('apiVersion');
    }

    public function setApiVersion($value)
    {
        return $this->setParameter('apiVersion', $value);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\RestPingRequest
     */
    public function ping(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Openpay\Message\RestPingRequest', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\RestPriceLimitRequest
     */
    public function priceLimit(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Openpay\Message\RestPriceLimitRequest', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\RestAuthorizeRequest
     */
    public function authorize(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Openpay\Message\RestAuthorizeRequest', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\RestCaptureRequest
     */
    public function capture(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Openpay\Message\RestCaptureRequest', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\RestFetchTransactionRequest
     */
    public function fetchTransaction(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Openpay\Message\RestFetchTransactionRequest', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\RestDispatchRequest
     */
    public function dispatch(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Openpay\Message\RestDispatchRequest', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\RestCancelRequest
     */
    public function void(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Openpay\Message\RestCancelRequest', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\RestRefundRequest
     */
    public function refund(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Openpay\Message\RestRefundRequest', $parameters);
    }
}
