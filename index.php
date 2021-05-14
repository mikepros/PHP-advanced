<?php
require_once 'vendor/autoload.php';

use Mikepros\Homework4\Car;
use Mikepros\Homework4\Fuel;

$car = new Car('Tesla', ['gas', 'petrol'], 200);

$car->start();

$fuel = $car->getRequiredFuel();
$car->refuel(new Fuel($fuel[0]));

$car->start();
$car->up(100);
$car->up(100);
$car->up(100);

$car->stop();
$car->down(100);

echo $car->getInfo();
echo "Кількість пального в баку у {$car->getName()}: {$car->getFuelValue()}\n"; 

$car->down(30);
$car->up(10);
$car->up(10);

$car->refuel(new Fuel('C2H5OH'));

$car->start();
$car->up(30);

echo $car->getInfo();