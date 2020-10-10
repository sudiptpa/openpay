<?php

namespace Omnipay\Openpay\Message;

/**
 * Class AbstractRestRequest.
 */
abstract class AbstractRestRequest extends \Omnipay\Common\Message\AbstractRequest
{
    /**
     * @var string
     */
    protected $liveEndpoint = 'https://api.myopenpay.com.au/v1/merchant/';

    /**
     * @var string
     */
    protected $testEndpoint = 'https://api.training.myopenpay.com.au/v1/merchant/';

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

    public function getOrderId()
    {
        return $this->getParameter('orderId');
    }

    public function setOrderId($value)
    {
        return $this->setParameter('orderId', $value);
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode("{$this->getApiKey()}:{$this->getApiToken()}"),
            'Cache-Control' => 'no-cache',
            'Connection' => 'close',
        ];
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    /**
     * @param $data
     * @param array $headers
     * @param $status
     *
     * @return \Omnipay\Openpay\Message\AbstractResponse
     */
    protected function createResponse($data, $headers = [], $status = 404)
    {
        return $this->response = new AbstractResponse($this, $data, $headers, $status);
    }
}
