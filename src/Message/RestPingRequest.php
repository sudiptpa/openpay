<?php

namespace Omnipay\Openpay\Message;

/**
 * Class RestPingRequest.
 */
class RestPingRequest extends AbstractRestRequest
{
    function getHttpMethod()
    {
        return 'GET';
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return parent::getEndpoint().'diagnostics/version';
    }
}
