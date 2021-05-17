<?php

namespace Mikepros\Homework4;

class Car implements MovableInterface, IFuelable {
    
    private bool $isOn = false;
    private int $fuelPercentage = 0, $speed = 0;
    private string $log = ''; 
    private Fuel $fuel;

    public function __construct(
        private string $name,
        private array $requiredFuel,
        private int $maxSpeed
    ) {}

    public function start() : bool
    {
        if ($this->isOn or !$this->useFuel())
            $this->message('Не можу завести авто.');

        else {
            $this->isOn = true;
            $this->message('Авто заведено...');
        }

        return $this->isOn;
    }

    public function stop() : bool
    {
        if ($this->isOn) {
            $this->isOn = false;

            $this->message('Авто заглушено.');
            $this->down($this->maxSpeed);
        }

        return !$this->isOn;
    }

    public function up(int $speed) : bool
    {
        $result = false;
        if (!$this->isOn or !$this->useFuel())
            $this->message('Не можу набрати швидкість.');

        else if (($this->speed += $speed) > $this->maxSpeed) {
            $this->speed = $this->maxSpeed;
            $this->message('Набрана максимальна швидкість: ' . $this->maxSpeed);
        }

        else {
            $this->message('Швидкість збільшено до ' . $this->speed);
            $result = true;
        }

        return $result;
    }

    public function down(int $speed): bool
    {
        $result = false;
        if (
            !$this->isOn or
            !$this->useFuel() or
            ($this->speed -= $speed) < 0
        ) {
            $this->speed = 0;
            $this->message('Авто зупинено.');
        }

        else {
            $this->message('Швидкість зменшено до ' . $this->speed);
            $result = true;
        }

        return $result;
    }
    
    public function refuel(Fuel $fuel) : bool
    {
        if ($this->fuelPercentage)
            $this->message('Бак не порожній');

        else {
            $this->fuelPercentage = 100;
            $this->fuel = $fuel;
            $this->message('Авто заправлено.');
        }

        return $this->getFuelValue() === 100;
    }

    public function getRequiredFuel() : array
    {
        return $this->requiredFuel;
    }

    public function getFuelValue() : int
    {
        return $this->fuelPercentage;
    }

    /**
     * Використати наявне пальне. 
     * @return bool
     */
    private function useFuel() : bool
    {
        $result = false;

        if (!$this->fuelPercentage)
            $this->message('Порожній бак!');

        else if (!in_array($this->fuel->getType(), $this->getRequiredFuel()))
            $this->message('Залито погане пальне.');

        else {
            $this->fuelPercentage -= 10;
            $result = true;
        }

        if (!$result) $this->stop();

        return $result;
    }

    /**
     * Додати повідомлення до інформації про стан автомобіля
     * @param string $message
     * @return void
     */
    private function message(string $message) : void
    {
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        $method = array_pop($trace)['function']; // Публічний метод, який був викликаний
        $this->log .= "({$this->getName()}) $method: $message" . PHP_EOL;
    }

    public function getInfo() : string
    {
        $result = $this->log;

        if ($this->log === '')
            $result = 'Нічого не змінилось.';

        else  {
            $this->log = ''; // Очистити буфер
            return $result;
        }
    }

    public function getName() : string
    {
        return $this->name;
    }
}
