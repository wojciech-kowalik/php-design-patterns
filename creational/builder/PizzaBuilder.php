<?php

namespace DesignPatterns\Creational\Builder;

use DesignPatterns\Creational\Builder\Pizza;

/**
 * Abstract builder
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\Builder
 */
abstract class PizzaBuilder
{
    /**
     * @var Pizza
     */
    protected $pizza;

    /**
     * @return void
     */
    public function reset(): void
    {
        $this->pizza = new Pizza();
    }

    /**
     * @return \DesignPatterns\Creational\Builder\Pizza
     */
    public function getPizza(): Pizza
    {
        return $this->pizza;
    }

    abstract public function buildDough(): void;
    abstract public function buildSauce(): void;
    abstract public function buildTopping(): void;
}
