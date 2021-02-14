<?php

namespace Omnipay\Openpay\Message;

/**
 * Class RestCancelRequest.
 */
class RestCancelRequest extends AbstractRestRequest
{
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

        $response = $this->httpClient->post($url, $headers, json_encode($data))->send();

        $data = json_decode($response->getBody(), true);

        return $this->createResponse($data, $response->getHeaders(), $response->getStatusCode());
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return parent::getEndpoint().vsprintf('orders/%s/cancel', [$this->getOrderId()]);
    }

    /**
     * @param $data
     * @param array $headers
     * @param $status
     *
     * @return \Omnipay\Openpay\Message\RestCancelResponse
     */
    protected function createResponse($data, $headers = [], $status = 404)
    {
        return $this->response = new RestCancelResponse($this, $data, $headers, $status);
    }
}
