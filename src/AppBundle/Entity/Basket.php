<?php
namespace AppBundle\Entity;

class Basket
{
    protected $description;
    protected $products;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Basket
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return array Products
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Product $product
     * @return Basket //$this
     */
    public function addProduct(Product $product)
    {
        $this->products[] = $product;
        return $this;
    }

    /**
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        $this->products->removeElement($product);
    }
}
