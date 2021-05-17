<?php

namespace Mikepros\Homework4;

interface IFuelable {
    /**
     * Заправляє повний бак
     * @param Fuel $fuel
     */
    public function refuel(Fuel $fuel);
    
    /**
     * Повертає масив допустимого пального для машини
     * @return string
     */
    public function getRequiredFuel() : array;
    
    /**
     * Повертає кількість пального, що залишилось 
     * @return int
     */
    public function getFuelValue() : int;
}
