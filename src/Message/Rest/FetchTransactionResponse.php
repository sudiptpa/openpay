<?php

namespace Omnipay\Openpay\Message\Rest;

/**
 * Class CaptureResponse.
 */
class FetchTransactionResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        $statusCode = $this->getStatusCode();

        return $statusCode >= 200 && $statusCode <= 399;
    }

    public function getOrderId()
    {
        return isset($this->data['orderId']) ? (string) $this->data['orderId'] : null;
    }

    public function getOrderStatus()
    {
        return isset($this->data['orderStatus']) ? (string) $this->data['orderStatus'] : null;
    }

    public function getPlanStatus()
    {
        return isset($this->data['planStatus']) ? (string) $this->data['planStatus'] : null;
    }

    public function getPurchasePrice()
    {
        return isset($this->data['purchasePrice']) ? (int) $this->data['purchasePrice'] : null;
    }
}
