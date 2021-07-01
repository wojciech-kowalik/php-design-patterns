<?php

namespace DesignPatterns\Creational\AbstractFactory;

use DesignPatterns\Creational\AbstractFactory\GUIFactory;
use DesignPatterns\Creational\AbstractFactory\IButton;
use DesignPatterns\Creational\AbstractFactory\MacosButton;

/**
 * Concrete factory class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\AbstractFactory
 */
class MacosFactory extends GUIFactory
{
    /**
     * @inheritDoc
     */
    public function createButton(): IButton
    {
        return new MacosButton();
    }
}
