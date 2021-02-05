<?php

namespace Omnipay\Openpay\Message;

use Omnipay\Openpay\RestItemInterface;

/**
 * Class RestAuthorizeRequest.
 */
class RestAuthorizeRequest extends AbstractRestRequest
{
    public function getHttpMethod()
    {
        return 'POST';
    }

    public function getOrigin()
    {
        return $this->getParameter('origin');
    }

    public function setOrigin($value)
    {
        return $this->setParameter('origin', $value);
    }

    public function getFailedUrl()
    {
        return $this->getParameter('failedUrl');
    }

    public function setFailedUrl($value)
    {
        return $this->setParameter('failedUrl', $value);
    }

    public function getPickup()
    {
        return (bool) $this->getParameter('pickup');
    }

    public function setPickup($value)
    {
        return $this->setParameter('pickup', (bool) $value);
    }

    public function getDateOfBirth()
    {
        return $this->getParameter('dateOfBirth');
    }

    public function setDateOfBirth($value)
    {
        return $this->setParameter('dateOfBirth', $value);
    }

    public function getDeliveryAddress()
    {
        $c = $this->getCard();

        return [
            'line1'    => $c->getShippingAddress1(),
            'line2'    => $c->getShippingAddress2(),
            'suburb'   => $c->getShippingCity(),
            'state'    => $c->getShippingState(),
            'postCode' => $c->getShippingPostcode(),
        ];
    }

    public function getResidentialAddress()
    {
        $c = $this->getCard();
        if (!$c->getBillingAddress1()) {
            return null;
        }

        return [
            'line1'    => $c->getBillingAddress1(),
            'line2'    => $c->getBillingAddress2(),
            'suburb'   => $c->getBillingCity(),
            'state'    => $c->getBillingState(),
            'postCode' => $c->getBillingPostcode(),
        ];
    }

    public function setItems($items)
    {
        if ($items && !$items instanceof \Omnipay\Common\ItemBag) {
            $items = new \Omnipay\Common\ItemBag($items);
        }

        return $this->setParameter('items', $items);
    }

    public function getGoodsDescription()
    {
        return $this->getParameter('goodsDescription');
    }

    public function setGoodsDescription($value)
    {
        return $this->setParameter('goodsDescription', $value);
    }

    public function getRetailerOrderNo()
    {
        return $this->getParameter('retailerOrderNo');
    }

    public function setRetailerOrderNo($value)
    {
        return $this->setParameter('retailerOrderNo', $value);
    }

    public function getData()
    {
        $this->validate('card', 'returnUrl', 'cancelUrl', 'failedUrl', 'amount');

        return [
            'customerJourney' => [
                'origin' => 'Online',
                'online' => [
                    'callbackUrl'      => $this->getReturnUrl(),
                    'cancelUrl'        => $this->getCancelUrl(),
                    'failUrl'          => $this->getFailedUrl(),
                    'planCreationType' => 'pending',
                    'deliveryMethod'   => $this->getPickup() ? 'Pickup' : 'Delivery',
                    'customerDetails'  => [
                        'firstName'          => $this->getCard()->getFirstName(),
                        'familyName'         => $this->getCard()->getLastName(),
                        'email'              => $this->getCard()->getEmail(),
                        'dateOfBirth'        => $this->getDateOfBirth(),
                        'gender'             => $this->getCard()->getGender(),
                        'phoneNumber'        => $this->getCard()->getPhone(),
                        'deliveryAddress'    => $this->getDeliveryAddress(),
                        'residentialAddress' => $this->getResidentialAddress(),
                    ],
                ],
            ],
            'purchasePrice'    => self::dollarsToCents($this->getAmount()),
            'retailerOrderNo'  => $this->getRetailerOrderNo(),
            'goodsDescription' => $this->getGoodsDescription(),
            'cart'             => array_map(function (RestItemInterface $item) {
                return [
                    'itemName'            => $item->getName(),
                    'itemGroup'           => $item->getItemGroup(),
                    'itemCode'            => $item->getItemCode(),
                    'itemGroupCode'       => $item->getItemGroupCode(),
                    'itemRetailUnitPrice' => self::dollarsToCents($item->getPrice()),
                    'itemQty'             => $item->getQuantity(),
                    'itemRetailCharge'    => self::dollarsToCents($item->getTotalPrice()),
                ];
            }, $this->getItems() ? $this->getItems()->all() : []),
        ];
    }

    public static function dollarsToCents($dollars)
    {
        return (int) bcmul('100', $dollars, 0);
    }

    protected function getEndpoint()
    {
        return parent::getEndpoint().'orders';
    }
}
