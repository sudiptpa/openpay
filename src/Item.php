<?php

namespace Omnipay\Openpay;

use Omnipay\Common\Helper;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Cart Item.
 *
 * This class defines a single cart item in the Omnipay system.
 *
 * @see ItemInterface
 */
class Item implements ItemInterface
{
    /**
     * @var \Symfony\Component\HttpFoundation\ParameterBag
     */
    protected $parameters;

    /**
     * Create a new item with the specified parameters.
     *
     * @param array|null $parameters An array of parameters to set on the new object
     */
    public function __construct($parameters = null)
    {
        $this->initialize($parameters);
    }

    /**
     * Initialize this item with the specified parameters.
     *
     * @param array|null $parameters An array of parameters to set on this object
     *
     * @return $this Item
     */
    public function initialize($parameters = null)
    {
        $this->parameters = new ParameterBag();

        Helper::initialize($this, $parameters);

        return $this;
    }

    public function getParameters()
    {
        return $this->parameters->all();
    }

    protected function getParameter($key)
    {
        return $this->parameters->get($key);
    }

    protected function setParameter($key, $value)
    {
        $this->parameters->set($key, $value);

        return $this;
    }

    public function getName()
    {
        return $this->getParameter('name');
    }

    public function setName($value)
    {
        return $this->setParameter('name', $value);
    }

    public function getDescription()
    {
        return $this->getParameter('description');
    }

    public function setDescription($value)
    {
        return $this->setParameter('description', $value);
    }

    public function getQuantity()
    {
        return $this->getParameter('quantity');
    }

    public function setQuantity($value)
    {
        return $this->setParameter('quantity', $value);
    }

    public function getPrice()
    {
        return $this->getParameter('price');
    }

    public function setPrice($value)
    {
        return $this->setParameter('price', $value);
    }

    public function getItemGroup()
    {
        return $this->getParameter('itemGroup');
    }

    public function setItemGroup($value)
    {
        return $this->setParameter('itemGroup', $value);
    }

    public function getItemCode()
    {
        return $this->getParameter('itemCode');
    }

    public function setItemCode($value)
    {
        return $this->setParameter('itemCode', $value);
    }

    public function getItemGroupCode()
    {
        return $this->getParameter('itemGroupCode');
    }

    public function setItemGroupCode($value)
    {
        return $this->setParameter('itemGroupCode', $value);
    }

    public function getItemRetailUnitPrice()
    {
        return $this->getParameter('itemRetailUnitPrice');
    }

    public function setItemRetailUnitPrice($value)
    {
        return $this->setParameter('itemRetailUnitPrice', $value);
    }

    public function getItemRetailCharge()
    {
        return $this->getParameter('itemRetailCharge');
    }

    public function setItemRetailCharge($value)
    {
        return $this->setParameter('itemRetailCharge', $value);
    }
}
