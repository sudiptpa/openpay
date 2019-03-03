<?php

namespace Omnipay\Openpay\Message;

use Omnipay\Common\Message\RequestInterface;

/**
 * Class OrderStatusResponse.
 */
class OrderStatusResponse extends AbstractResponse
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

    public function getPlanID()
    {
        return (string) $this->data->PlanID;
    }

    public function getOrderStatus()
    {
        return (string) $this->data->OrderStatus;
    }

    public function getPlanStatus()
    {
        return (string) $this->data->PlanStatus;
    }

    public function isPlanActive()
    {
        return in_array($this->getPlanStatus(), ['Active']);
    }

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return in_array($this->getOrderStatus(), ['Approved']);
    }
}
