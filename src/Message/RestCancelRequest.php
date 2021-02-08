<?php

namespace Omnipay\Openpay\Message;

/**
 * Class RestCancelRequest.
 */
class RestCancelRequest extends AbstractRestRequest
{
    public function getHttpMethod()
    {
        return 'POST';
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

        $response = $this->httpClient->post($url, $headers, $data)->send();

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
}
