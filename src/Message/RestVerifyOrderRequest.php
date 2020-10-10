<?php

namespace Omnipay\Openpay\Message;

/**
 * Class RestVerifyOrderRequest.
 */
class RestVerifyOrderRequest extends AbstractRestRequest
{
    public function getOrderId()
    {
        return $this->getParameter('orderId');
    }

    public function setOrderId($value)
    {
        return $this->setParameter('orderId', $value);
    }

    public function getData()
    {
        $this->validate('orderId');

        return [
            'orderId' => $this->getOrderId(),
        ];
    }

    public function sendData($data = [])
    {
        $headers = $this->getHeaders();

        $url = $this->getEndpoint();

        $response = $this->httpClient->get($url, $headers, $data)->send();

        $data = json_decode($response->getBody(), true);

        return $this->createResponse($data, $response->getHeaders(), $response->getStatusCode());
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return parent::getEndpoint() . vsprintf('orders/%s', [$this->getOrderId()]);
    }

    /**
     * @param $data
     * @param array $headers
     * @param $status
     *
     * @return \Omnipay\Openpay\Message\RestVerifyOrderResponse
     */
    protected function createResponse($data, $headers = [], $status = 404)
    {
        return $this->response = new RestVerifyOrderResponse($this, $data, $headers, $status);
    }
}
