<?php

namespace Mikepros\Homework4;

class Fuel
{
    public function __construct(private string $type) {}

    /**
     * Повертає заданий тип палива
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }
}
