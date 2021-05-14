<?php

namespace Mikepros\Homework4;

interface MovableInterface {
    /**
     * Вмикає запалювання
     * @return bool
     */
    public function start() : bool;

    /**
     * Вимикає запалювання
     * @return bool
     */
    public function stop() : bool;

    /**
     * Збільшує швидкість руху
     * @param int $speed
     * @return bool
     */
    public function up(int $speed) : bool;

    /**
     * Зменшує швидкість руху
     * @param int $speed
     * @return bool
     */
    public function down(int $speed) : bool;

    /**
     * Видає інформацію про стан
     * @return string
     */
    public function getInfo() : string;

    /**
     * Видає назву
     * @return string
     */
    public function getName() : string;
}
