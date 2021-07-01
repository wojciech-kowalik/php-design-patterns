<?php

namespace DesignPatterns\Creational\Builder;

/**
 * Concrete builder class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\Builder
 */
class MargheritaPizzaBuilder extends PizzaBuilder
{
    /**
     * @inheritDoc
     */
    public function buildDough(): void
    {
        $this->pizza->setDough("thin");
    }

    /**
     * @inheritDoc
     */
    public function buildSauce(): void
    {
        $this->pizza->setSauce("mild");
    }

    /**
     * @inheritDoc
     */
    public function buildTopping(): void
    {
        $this->pizza->setTopping("tomato+cheese");
    }

}
