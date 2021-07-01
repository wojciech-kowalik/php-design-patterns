<?php

namespace DesignPatterns\Creational\FactoryMethod;

use DesignPatterns\Creational\FactoryMethod\ICar;

/**
 * Abstract factory
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\FactoryMethod
 */
abstract class CarFactory
{
    /**
     * Abstract factory method
     * @return \DesignPatterns\Creational\FactoryMethod\ICar
     */
    abstract public function makeCar(): ICar;
}
