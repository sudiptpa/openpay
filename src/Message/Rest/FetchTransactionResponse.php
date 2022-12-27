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
        return isset($this->data['orderId']) ? $this->data['orderId'] : null;
    }

    public function getOrderStatus()
    {
        return isset($this->data['orderStatus']) ? $this->data['orderStatus'] : null;
    }

    public function isApproved()
    {
        return in_array($this->getOrderStatus(), ['Approved']);
    }

    public function getPlanStatus()
    {
        return isset($this->data['planStatus']) ? $this->data['planStatus'] : null;
    }

    public function getPurchasePrice()
    {
        return isset($this->data['purchasePrice']) ? $this->data['purchasePrice'] : null;
    }

    public function getRetailerAmount()
    {
        return isset($this->data['retailerAmount']) ? $this->data['retailerAmount'] : null;
    }
}
