<?php

namespace Omnipay\Openpay\Message;

/**
 * Class RestCaptureRequest.
 */
class RestFetchTransactionRequest extends AbstractRestRequest
{
    public function getHttpMethod()
    {
        return 'GET';
    }

    public function getData()
    {
        $this->validate('orderId');

        return [
            'orderId' => $this->getOrderId(),
        ];
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return parent::getEndpoint().vsprintf('orders/%s', [$this->getOrderId()]);
    }
}
