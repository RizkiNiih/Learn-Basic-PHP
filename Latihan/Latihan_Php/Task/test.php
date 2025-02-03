<?php

class Vehicle {
    public $brand;
    public $type;

    public function __construct($brand, $type)
    {
        $this->brand = $brand;
        $this->type = $type;
    }


    public function getInfo() {
        return "Kendaraan ini adalah {$this->type} dengan merek {$this->brand}";
    }

}


class Car extends Vehicle{
    public $numDoors;

    public function __construct($brand, $numDoors)
    {
        parent::__construct($brand, "Mobil");
        $this->numDoors = $numDoors;
    }

    public function getInfo()
    {
        return "Mobil merek {$this->brand} memiliki {$this->numDoors} pintu";   
    }
    
}


class Motorcycle extends Vehicle {
    public $engineType;

    public function __construct($brand, $engineType)
    {
        parent::__construct($brand, "Motor");
        $this->engineType = $engineType;
    }

    public function getInfo()
    {
        return "Motor merek {$this->brand} memiliki mesin {$this->engineType}";
    }
    
}

//Mobil
$toyotaCar = new Car("Toyota", 4);
echo $toyotaCar->getInfo();

echo "<br>";

//Motor
$yamahaMotorcycle = new Motorcycle("Yamaha", "4 tak");
echo $yamahaMotorcycle->getInfo();
