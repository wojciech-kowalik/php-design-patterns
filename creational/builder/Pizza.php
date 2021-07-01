<?php

namespace DesignPatterns\Creational\Builder;

use DesignPatterns\Creational\Builder\IPizza;

/**
 * Concrete product class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\Builder
 */
class Pizza implements IPizza
{
    public $dough   = "";
    public $sauce   = "";
    public $topping = "";

    /**
     * @inheritDoc
     */
    public function setDough(string $dough): void
    {
        $this->dough = $dough;
    }

    /**
     * @inheritDoc
     */
    public function setSauce(string $sauce): void
    {
        $this->sauce = $sauce;
    }

    /**
     * @inheritDoc
     */
    public function setTopping(string $topping): void
    {
        $this->topping = $topping;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return "Pizza with dough: {$this->dough}, sauce: {$this->sauce}, topping: {$this->topping}\n";
    }

}
