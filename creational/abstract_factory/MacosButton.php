<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * Concrete button class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\AbstractFactory
 */
class MacosButton implements IButton
{
    /**
     * @inheritDoc
     */
    public function paint(): string
    {
        return "Macos button painted";
    }
}
