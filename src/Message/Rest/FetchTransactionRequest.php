<?php

namespace Omnipay\Openpay\Message\Rest;

/**
 * Class FetchTransactionRequest.
 */
class FetchTransactionRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('orderId');

        return [
            'OrderId' => $this->getOrderId(),
        ];
    }

    public function sendData($data = [])
    {
        $response = $this->httpClient->get($this->getEndpoint(), $this->getHeaders(), $data)->send();

        return $this->createResponse($response->json(), $response->getHeaders(), $response->getStatusCode());
    }

    protected function getEndpoint()
    {
        return parent::getEndpoint().vsprintf('orders/%s', [$this->getOrderId()]);
    }

    protected function createResponse($data, $headers = [], $status = 404)
    {
        return $this->response = new FetchTransactionResponse($this, $data, $headers, $status);
    }
}
