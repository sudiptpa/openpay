<?php

namespace Omnipay\Openpay\Message;

/**
 * Class RestPingResponse.
 */
class RestPingResponse extends AbstractRestResponse
{
    public function isSuccessful()
    {
        return $this->getStatusCode() == 200;
    }
}
