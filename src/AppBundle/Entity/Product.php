<?php
namespace AppBundle\Entity;

class Product
{
    /**
     * @var string
     * @param $name
     *
     */
    private $name;

    /**
     * @var int
     * @param $quantity
     */
    private $quantity;

    /**
     * @var
     * @param $price
     */
    private $price;

    /**
     * Total price of product without tax
     * @var
     * @param $totalProduct
     */
    private $totalProduct;

    /**
     * Total price of product with tax
     * @var
     * @param $totalProductTaxed
     */
    private $totalProductTaxed;

    /**
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return Product
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @param mixed $totalProduct
     * @return Product
     */
    public function setTotal($totalProduct)
    {
        $this->totalProduct = $totalProduct;
        return $this;
    }

    /**
     * @param mixed $totalProductTaxed
     * @return Product
     */
    public function setTotalTaxed($totalProductTaxed)
    {
        $this->totalProductTaxed = $totalProductTaxed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalProduct()
    {
        return $this->totalProduct;
    }

    /**
     * @return mixed
     */
    public function getTotalProductTaxed()
    {
        return $this->totalProductTaxed;
    }
}
