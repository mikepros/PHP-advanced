<?php

namespace mikepros\homework5\core\contracts;

interface RunnableInterface {
    /**
     * Виводить повідомлення
     * @return void
     */
    public function run() : void;
}
