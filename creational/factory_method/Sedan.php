<?php

namespace DesignPatterns\Creational\FactoryMethod;

use DesignPatterns\Creational\FactoryMethod\ICar;

/**
 * Concrete product class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\FactoryMethod
 */
class Sedan implements ICar
{
    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return 'Sedan';
    }
}
