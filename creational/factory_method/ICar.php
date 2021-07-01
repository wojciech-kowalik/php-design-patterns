<?php

namespace DesignPatterns\Creational\FactoryMethod;

/**
 * Product interface
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\FactoryMethod
 */
interface ICar
{
    /**
     * @return string
     */
    public function getType(): string;
}
