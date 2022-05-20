<?php
interface FoodItem
{
    public function cost();
}

class Burger implements FoodItem
{
    public function cost () {
        return 40;
    }
}
class Cheese implements FoodItem
{
    private $item;
    public function __construct (FoodItem $item) {
        $this->item = $item;
    }
    public function cost () {
        return $this->item->cost() + 10;
    }
}

class Combo implements FoodItem 
{
    private $item;
    public function __construct (FoodItem $item) {
        $this->item = $item;
    }
    public function cost () {
        return $this->item->cost() + 40;
    }
}
$burger = new Burger();
$cheese = new Cheese($burger); 
$combo = new Combo($burger);

echo "Burger cost is " .$burger->cost(); 
echo "\nCheese burger cost is " .$cheese->cost();
echo "\nCombo cost is " .$combo->Cost();

?>