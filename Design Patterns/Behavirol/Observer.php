<?php

interface Observer
{
    public function addPrice(Price $price);
}
interface Price
{
    public function update();
    public function getPrice();
}

class PriceSimulator implements Observer
{
    private $price;

    public function __construct()
    {
        $this->price = array();
    }

    public function addPrice(Price $price)
    {
        array_push($this->price, $price);
    }

    public function updatePrice()
    {
        foreach ($this->price as $price) {
            $price->update();
        }
    }
}

class TShirt implements Price
{
    private $price;

    public function __construct($price)
    {
        $this->price = $price;
        echo "\nT-Shirt Original Price : $this->price";
    }

    public function update()
    {
        $this->price = $this->getPrice();
        echo "\nT-Shirt Updated Price : $this->price";
    }

    public function getPrice()
    {
        $updatedPrice = $this->price + (rand(1, 10) * 10);
        return $updatedPrice;
    }
}

class Hoodie implements Price
{
    private $price;

    public function __construct($price)
    {
        $this->price = $price;
        echo "\nHoodie Original Price : $this->price";
    }

    public function update()
    {
        $this->price = $this->getPrice();
        echo "\nHoodie Updated Price : $this->price";
    }

    public function getPrice()
    {
        $updatedPrice = $this->price + (rand(1, 10) * 10);
        return $updatedPrice;
    }
}

$priceSimulator = new PriceSimulator();

$tShirt = new TShirt(500);
$hoodie = new Hoodie(1000);

$priceSimulator->addPrice($tShirt);
$priceSimulator->addPrice($hoodie);
echo "\n\nUpdating Prices 1st Time ";
$priceSimulator->updatePrice();
echo "\n\nUpdating Prices 2nd Time ";
$priceSimulator->updatePrice();
