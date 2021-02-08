<?php

namespace Omnipay\Openpay\Message;

/**
 * Class RestCaptureRequest.
 *
 * @method \Omnipay\Openpay\Message\RestFetchTransactionResponse send() Send Response
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
