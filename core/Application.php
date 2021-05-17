<?php

namespace mikepros\homework5\core;

class Application implements contracts\ContainerInterface, contracts\RunnableInterface {
    
    public function get(): mixed {}

    public function has(): mixed {}

    public function run(): void {
        echo '<b>' .__METHOD__. '</b> method called.';
    }

}