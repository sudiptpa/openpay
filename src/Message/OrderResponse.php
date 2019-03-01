<?php

namespace Omnipay\Openpay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

/**
 * Class OrderResponse.
 */
class OrderResponse extends AbstractResponse
{
    /**
     * @param RequestInterface $request
     * @param $data
     */
    public function __construct(RequestInterface $request, $data)
    {
        $this->request = $request;
        $this->data = $data;
    }

    public function getStatus()
    {
        return (string) $this->data->status;
    }

    public function getPlanID()
    {
        return (string) $this->data->PlanID;
    }

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->getStatus() > 0 && $this->getPlanID();
    }

    public function getMessage()
    {
        return (string) $this->data->reason;
    }
}
