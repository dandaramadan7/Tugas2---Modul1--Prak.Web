<?php
namespace VehicleManagement;

abstract class Vehicle {
    protected $make;
    protected $model;

    public function __construct($make, $model) {
        $this->make = $make;
        $this->model = $model;
    }

    abstract public function startEngine();

    public function getDetails() {
        return [
            "Make" => $this->make,
            "Model" => $this->model
        ];
    }
}

trait FuelType {
    protected $fuelType;

    public function setFuelType($fuelType) {
        $this->fuelType = $fuelType;
    }

    public function getFuelType() {
        return $this->fuelType;
    }
}

class Car extends Vehicle {
    use FuelType;

    public function __construct($make, $model, $fuelType) {
        parent::__construct($make, $model);
        $this->setFuelType($fuelType);
    }

    public function startEngine() {
        return "The car's engine has started.";
    }

    public function displayInfo() {
        $details = $this->getDetails();
        return "Car Details:\n" .
               "Make: " . $details['Make'] . "\n" .
               "Model: " . $details['Model'] . "\n" .
               "Fuel Type: " . $this->getFuelType() . "\n" .
               $this->startEngine();
    }
}

class Motorcycle extends Vehicle {
    private $engineCapacity;

    public function __construct($make, $model, $engineCapacity) {
        parent::__construct($make, $model);
        $this->engineCapacity = $engineCapacity;
    }

    public function startEngine() {
        return "The motorcycle's engine has started.";
    }

    public function getEngineCapacity() {
        return $this->engineCapacity;
    }

    public function displayInfo() {
        $details = $this->getDetails();
        return "Motorcycle Details:\n" .
               "Make: " . $details['Make'] . "\n" .
               "Model: " . $details['Model'] . "\n" .
               "Engine Capacity: " . $this->getEngineCapacity() . "cc\n" .
               $this->startEngine();
    }
}

// Main program
$car = new Car("Hino Motors", "Hino Dutro", "Biodiesel");
echo $car->displayInfo() . "\n\n";

$motorcycle = new Motorcycle("Yamaha", "GT", "1500");
echo $motorcycle->displayInfo() . "\n";
?>
