<?php

namespace Omnipay\Openpay\Message;

/**
 * Class RestCaptureResponse.
 */
class RestCaptureResponse extends AbstractRestResponse
{
    public function getOrderId()
    {
        return isset($this->data['orderId']) ? $this->data['orderId'] : null;
    }

    public function isSuccessful()
    {
        $statusCode = $this->getStatusCode();

        return $statusCode >= 200 && $statusCode <= 399;
    }
}
