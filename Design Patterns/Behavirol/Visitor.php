<?php
interface Visitor
{
    public function visit(Visitable $Visitable);
}
interface Visitable
{
    public function accept(Visitor $Visitor);
}
class ConcreteVisitable implements Visitable
{
    public $items = array();

    public function addItem($item)
    {
        $this->items[] = $item;
    }

    public function accept(Visitor $Visitor)
    {
        $Visitor->visit($this);
    }
}
class ConcreteVisitor implements Visitor
{
    protected $info;

    public function visit(Visitable $Visitable)
    {
        echo "Object: ", get_class($Visitable), "\n";
        $items = get_object_vars($Visitable)['items'];

        foreach ($items as $index => $value) {
            echo $index . " : ", $value, "\n";
        }
    }
}

$ConcreteVisitable = new ConcreteVisitable();
$ConcreteVisitor = new ConcreteVisitor();
$ConcreteVisitable->addItem('Mobile');
$ConcreteVisitable->addItem('Laptop');
$ConcreteVisitable->addItem('Macbook');
$ConcreteVisitable->accept($ConcreteVisitor);
?>