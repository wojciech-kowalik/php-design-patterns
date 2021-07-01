<?php

namespace DesignPatterns\Creational\Builder;

/**
 * Product interface
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\Builder
 */
interface IPizza
{
    /**
     * @param string $dough
     * @return void
     */
    public function setDough(string $dough): void;

    /**
     * @param string $sauce
     * @return void
     */
    public function setSauce(string $sauce): void;

    /**
     * @param string $topping
     * @return void
     */
    public function setTopping(string $topping): void;
}
