<?php

namespace Omnipay\Openpay\Message;

/**
 * Class RestCaptureRequest.
 */
class RestCaptureRequest extends AbstractRestRequest
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
        return parent::getEndpoint().vsprintf('orders/%s/capture', [$this->getOrderId()]);
    }

    /**
     * @param $data
     * @param array $headers
     * @param $status
     *
     * @return \Omnipay\Openpay\Message\RestCaptureResponse
     */
    protected function createResponse($data, $headers = [], $status = 404)
    {
        return $this->response = new RestCaptureResponse($this, $data, $headers, $status);
    }
}
