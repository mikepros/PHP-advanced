<?php

require_once 'vendor/autoload.php';

echo
    (new Mikepros\Shapes\Rectangle(15, 10))
        ->getArea();
