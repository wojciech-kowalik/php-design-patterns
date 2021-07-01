<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * Button interface
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\AbstractFactory
 */
interface IButton
{
    /**
     * @return string
     */
    public function paint(): string;
}
