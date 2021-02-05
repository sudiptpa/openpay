<?php

namespace Omnipay\Openpay;

/**
 * Cart Item.
 *
 * This class defines a single cart item in the Omnipay system.
 *
 * @see ItemInterface
 */
class RestItem extends \Omnipay\Common\Item implements \Omnipay\Common\ItemInterface, RestItemInterface
{
    public function getItemGroup()
    {
        return $this->parameters->get('itemGroup');
    }

    public function setItemGroup($v)
    {
        $this->parameters->set('itemGroup', $v);
    }

    public function getItemCode()
    {
        return $this->parameters->get('itemCode');
    }

    public function setItemCode($v)
    {
        $this->parameters->set('itemCode', $v);
    }

    public function getItemGroupCode()
    {
        return $this->parameters->get('itemGroupCod');
    }

    public function setItemGroupCode($v)
    {
        $this->parameters->set('itemGroupCod', $v);
    }

    public function getTotalPrice()
    {
        return $this->parameters->get('totalPrice');
    }

    public function setTotalPrice($v)
    {
        $this->parameters->set('totalPrice', $v);
    }
}
