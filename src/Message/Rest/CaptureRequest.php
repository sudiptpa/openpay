<?php

namespace Omnipay\Openpay\Message\Rest;

/**
 * Class CaptureRequest.
 */
class CaptureRequest extends AbstractRequest
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
        $response = $this->httpClient->post($this->getEndpoint(), $this->getHeaders(), json_encode($data))->send();

        return $this->createResponse($response->json(), $response->getHeaders(), $response->getStatusCode());
    }

    protected function getEndpoint()
    {
        return parent::getEndpoint().vsprintf('orders/%s/capturepayment', [$this->getOrderId()]);
    }

    protected function createResponse($data, $headers = [], $status = 404)
    {
        return $this->response = new CaptureResponse($this, $data, $headers, $status);
    }
}
