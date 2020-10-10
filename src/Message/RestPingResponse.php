<?php

namespace Omnipay\Openpay\Message;

/**
 * Class RestPingResponse.
 */
class RestPingResponse extends AbstractRestResponse
{
    public function isSuccessful()
    {
        $statusCode = $this->getStatusCode();

        return $statusCode >= 200 && $statusCode <= 399;
    }
}
