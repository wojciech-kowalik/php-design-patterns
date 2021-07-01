<?php

namespace DesignPatterns\Creational\Builder;

use DesignPatterns\Creational\Builder\IPizzaDirector;
use DesignPatterns\Creational\Builder\Pizza;
use DesignPatterns\Creational\Builder\PizzaBuilder;

/**
 * Concrete director class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\Builder
 */
class Cook implements IPizzaDirector
{
    private $pizzaBuilder;

    /**
     * @param PizzaBuilder $pizzaBuilder
     * @return void
     */
    public function setPizzaBuilder(PizzaBuilder $pizzaBuilder): void
    {
        $this->pizzaBuilder = $pizzaBuilder;
    }

    /**
     * @return Pizza
     */
    public function getPizza(): Pizza
    {
        return $this->pizzaBuilder->getPizza();
    }

    /**
     * @inheritDoc
     */
    public function prepare(): void
    {
        $this->pizzaBuilder->reset();
        $this->pizzaBuilder->buildDough();
        $this->pizzaBuilder->buildSauce();
        $this->pizzaBuilder->buildTopping();
    }

}
