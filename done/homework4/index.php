<?php

use Mikepros\Homework4\{Car, Fuel};

require_once 'vendor/autoload.php';

$car = new Car('Tesla', ['gas', 'petrol'], 200);

$car->start();

$fuel = $car->getRequiredFuel();
$car->refuel(new Fuel($fuel[0]));

$car->start();
$car->up(100000);
$car->down(10);
$car->down(10);
$car->down(10);

$car->stop();
$car->down(100);

echo "Кількість пального в баку у {$car->getName()}: {$car->getFuelValue()}\n";

$car->down(30);
$car->up(10);
$car->up(10);

$car->refuel(new Fuel('C2H5OH'));

$car->start();
$car->up(30);