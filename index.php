<?php

require_once 'vendor/autoload.php';

echo 
    (new \GuzzleHttp\Client())
        ->request('GET', 'https://itea.ua')
        ->getBody();