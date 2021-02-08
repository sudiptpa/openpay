<?php

namespace Omnipay\Openpay\Message;

/**
 * Class RestPriceLimitResponse.
 */
class RestPriceLimitResponse extends AbstractRestResponse
{
    public function isSuccessful()
    {
        $statusCode = $this->getStatusCode();

        return $statusCode >= 200 && $statusCode <= 399;
    }

    public function getMinPrice()
    {
        return isset($this->data['minPrice']) ? $this->data['minPrice'] : null;
    }

    public function getMaxPrice()
    {
        return isset($this->data['maxPrice']) ? $this->data['maxPrice'] : null;
    }
}
