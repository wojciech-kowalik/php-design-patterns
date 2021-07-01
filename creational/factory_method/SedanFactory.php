<?php

namespace DesignPatterns\Creational\FactoryMethod;

use DesignPatterns\Creational\FactoryMethod\CarFactory;
use DesignPatterns\Creational\FactoryMethod\ICar;
use DesignPatterns\Creational\FactoryMethod\Sedan;

/**
 * Concrete factory class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\FactoryMethod
 */
class SedanFactory extends CarFactory
{
    /**
     * @inheritDoc
     * @return \DesignPatterns\Creational\FactoryMethod\ICar
     */
    public function makeCar(): ICar
    {
        return new Sedan();
    }
}
