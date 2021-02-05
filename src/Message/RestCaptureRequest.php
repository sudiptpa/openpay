<?php

namespace Omnipay\Openpay\Message;

/**
 * Class RestCaptureRequest.
 */
class RestCaptureRequest extends AbstractRestRequest
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

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return parent::getEndpoint().vsprintf('orders/%s/capture', [$this->getOrderId()]);
    }
}
