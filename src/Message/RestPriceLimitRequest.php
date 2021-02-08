<?php

namespace Omnipay\Openpay\Message;

/**
 * Class RestPriceLimitRequest.
 */
class RestPriceLimitRequest extends AbstractRestRequest
{
    public function getHttpMethod()
    {
        return 'GET';
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return parent::getEndpoint().'orders/limits';
    }
}
