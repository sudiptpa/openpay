<?php

namespace Omnipay\Openpay\Message;

use GuzzleHttp\Psr7\Message;

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
        $class = str_replace('Request', 'Response', get_class($this));
        return $this->response = new $class($this, $data, $headers, $status);
    }

    /** @return string */
    abstract function getHttpMethod();

    public function getData()
    {
        return [];
    }


    public function sendData($data = [])
    {
        $trace = false;
        if ($trace) {
            var_dump(json_encode($this->getData(), JSON_PRETTY_PRINT));
        }
        $response = $this->httpClient->request(
            $this->getHttpMethod(),
            $this->getEndpoint(),
            $this->getHeaders(),
            $this->getHttpMethod() === 'POST' ? json_encode($this->getData()) : null
        );

        $body  =$response->getBody()->getContents();
        $data = json_decode($body, true);

        if ($trace) {
            echo "\n";
            echo Message::toString($response);
            echo "\n";
        }

        return $this->createResponse($data, $response->getHeaders(), $response->getStatusCode());
    }
}
