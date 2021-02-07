<?php

namespace Omnipay\Openpay\Message;

/**
 * Class RestCaptureResponse.
 */
class RestFetchTransactionResponse extends AbstractRestResponse
{
    /**
     * @return string|null
     */
    public function getOrderId()
    {
        return isset($this->data['orderId']) ? (string) $this->data['orderId'] : null;
    }
    /**
     * @return string|null
     */
    public function getOrderStatus()
    {
        return isset($this->data['orderStatus']) ? (string) $this->data['orderStatus'] : null;
    }
    /**
     * @return string|null
     */
    public function getPlanStatus()
    {
        return isset($this->data['planStatus']) ? (string) $this->data['planStatus'] : null;
    }

    /**
     * @return int|null
     */
    public function getPurchasePrice()
    {
        return isset($this->data['purchasePrice']) ? (int) $this->data['purchasePrice'] : null;
    }

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        $statusCode = $this->getStatusCode();

        return $statusCode >= 200 && $statusCode <= 399;
    }
}
