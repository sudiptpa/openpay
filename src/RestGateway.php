<?php

namespace Omnipay\Openpay;

use Omnipay\Common\AbstractGateway;
use Omnipay\Openpay\Message\RestAuthorizeRequest;

/**
 * Class RestGateway.
 */
class RestGateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Openpay Rest';
    }

    /**
     * @return array
     */
    public function getDefaultParameters()
    {
        return [
            'apiKey'   => '',
            'apiToken' => '',
            'testMode' => true,
        ];
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    /**
     * @param $value
     *
     * @return string
     */
    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    /**
     * @return string
     */
    public function getApiToken()
    {
        return $this->getParameter('apiToken');
    }

    /**
     * @param $value
     *
     * @return string
     */
    public function setApiToken($value)
    {
        return $this->setParameter('apiToken', $value);
    }

    /**
     * @param array $parameters
     *
     * @return Message\RestPingRequest
     */
    public function ping(array $parameters = [])
    {
        return $this->createRequest(Message\RestPingRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\RestPriceLimitRequest
     */
    public function priceLimit(array $parameters = [])
    {
        return $this->createRequest(Message\RestPriceLimitRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return RestAuthorizeRequest
     */
    public function authorize(array $parameters = [])
    {
        return $this->createRequest(Message\RestAuthorizeRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\RestCaptureRequest
     */
    public function capture(array $parameters = [])
    {
        return $this->createRequest(Message\RestCaptureRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\RestFetchTransactionRequest
     */
    public function fetchTransaction(array $parameters = [])
    {
        return $this->createRequest(Message\RestFetchTransactionRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\RestDispatchRequest
     */
    public function dispatch(array $parameters = [])
    {
        return $this->createRequest(Message\RestDispatchRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\RestCancelRequest
     */
    public function void(array $parameters = [])
    {
        return $this->createRequest(Message\RestCancelRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Openpay\Message\RestRefundRequest
     */
    public function refund(array $parameters = [])
    {
        return $this->createRequest(Message\RestRefundRequest::class, $parameters);
    }
}
