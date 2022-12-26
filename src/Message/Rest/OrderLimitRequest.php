<?php

namespace Omnipay\Openpay\Message\Rest;

/**
 * Class OrderLimitRequest.
 */
class OrderLimitRequest extends AbstractRequest
{
    public function getData()
    {
        return [];
    }

    public function sendData($data = [])
    {
        $response = $this->httpClient->get($this->getEndpoint(), $this->getHeaders(), $data)->send();

        return $this->createResponse($response->json(), $response->getHeaders(), $response->getStatusCode());
    }

    protected function getEndpoint()
    {
        return parent::getEndpoint().'orders/limits';
    }

    protected function createResponse($data, $headers = [], $status = 404)
    {
        return $this->response = new OrderLimitResponse($this, $data, $headers, $status);
    }
}
