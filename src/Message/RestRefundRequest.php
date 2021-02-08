<?php

namespace Omnipay\Openpay\Message;

/**
 * Class RestRefundRequest.
 */
class RestRefundRequest extends AbstractRestRequest
{
    public function getHttpMethod()
    {
        return 'POST';
    }

    public function getFullRefund()
    {
        return $this->getParameter('fullRefund');
    }

    public function setFullRefund($value)
    {
        return $this->setParameter('fullRefund', $value);
    }

    public function getReducePriceBy()
    {
        return $this->getParameter('reducePriceBy');
    }

    public function setReducePriceBy($value)
    {
        return $this->setParameter('reducePriceBy', $value);
    }

    public function getData()
    {
        $this->validate('fullRefund', 'reducePriceBy');

        return [
            'fullRefund'    => $this->getFullRefund(),
            'reducePriceBy' => $this->getReducePriceBy() * 100,
        ];
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return parent::getEndpoint().vsprintf('orders/%s/refund', [$this->getOrderId()]);
    }
}
