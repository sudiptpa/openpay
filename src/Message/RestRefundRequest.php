<?php

namespace Omnipay\Openpay\Message;

/**
 * Class RestRefundRequest.
 */
class RestRefundRequest extends AbstractRestRequest
{
    public function getFullRefund()
    {
        return $this->getParameter('fullRefund');
    }

    public function setFullRefund($value)
    {
        return $this->setParameter('fullRefund', $value);
    }

    public function getReducePriceBy()
    {
        return $this->getParameter('reducePriceBy');
    }

    public function setReducePriceBy($value)
    {
        return $this->setParameter('reducePriceBy', $value);
    }

    public function getData()
    {
        $this->validate('fullRefund', 'reducePriceBy');

        return [
            'fullRefund'    => $this->getOrderId(),
            'reducePriceBy' => $this->getReducePriceBy() * 100,
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
        return parent::getEndpoint().vsprintf('orders/%s/refund', [$this->getOrderId()]);
    }

    /**
     * @param $data
     * @param array $headers
     * @param $status
     *
     * @return \Omnipay\Openpay\Message\RestRefundResponse
     */
    protected function createResponse($data, $headers = [], $status = 404)
    {
        return $this->response = new RestRefundResponse($this, $data, $headers, $status);
    }
}
