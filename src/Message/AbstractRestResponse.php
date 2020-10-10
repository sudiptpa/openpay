<?php

namespace Omnipay\Openpay\Message;

use Omnipay\Common\Message\RequestInterface;

/**
 * Class AbstractRestResponse.
 */
class AbstractRestResponse extends \Omnipay\Common\Message\AbstractResponse
{
    /**
     * @param RequestInterface $request
     * @param $data
     * @param $headers
     * @param $status
     */
    public function __construct(RequestInterface $request, $data, $headers, $status)
    {
        $this->request = $request;
        $this->data = $data;
        $this->headers = $headers;
        $this->status = $status;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getStatusCode()
    {
        return $this->status;
    }

    public function isSuccessful()
    {
        return false;
    }

    public function isRedirect()
    {
        return false;
    }
}
