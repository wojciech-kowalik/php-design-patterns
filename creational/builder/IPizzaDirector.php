<?php

namespace DesignPatterns\Creational\Builder;

use DesignPatterns\Creational\Builder\Pizza;

/**
 * Director interface
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\Builder
 */
interface IPizzaDirector
{
    /**
     * @return void
     */
    public function prepare(): void;

    /**
     * @return Pizza
     */
    public function getPizza(): Pizza;
}
