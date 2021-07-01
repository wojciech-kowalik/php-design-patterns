<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * Concrete button class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\AbstractFactory
 */
class WindowsButton implements IButton
{
    /**
     * @inheritDoc
     */
    public function paint(): string
    {
        return "Windows button painted";
    }
}
