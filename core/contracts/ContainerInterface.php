<?php

namespace mikepros\homework5\core\contracts;

interface ContainerInterface {
    /**
     * @return mixed
     */
    public function get(): mixed;
    
    /**
     * @return mixed
     */
    public function has(): mixed;
}
