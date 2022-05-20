<?php
class Bike
{

    private $vehicleMaker;
    private $vehicleModel;

    public function __construct($maker, $model)
    {

        $this->vehicleMaker = $maker;
        $this->vehicleModel = $model;
    }
    public function getMakerAndModel()
    {

        return "The Bike Company is " . $this->vehicleMaker . "  and  Model is " . $this->vehicleModel . "\n";
    }
}
class Factory
{
    public static function create($maker, $model)
    {
        return new Bike($maker, $model);
    }
}
$gixer = Factory::create("Suzuki", "Gixer");
echo $gixer->getMakerAndModel();

?>