<?php

namespace DesignPatterns\Creational\Builder;

/**
 * Concrete builder class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\Builder
 */
class HawaiianPizzaBuilder extends PizzaBuilder
{
    /**
     * @inheritDoc
     */
    public function buildDough(): void
    {
        $this->pizza->setDough("cross");
    }

    /**
     * @inheritDoc
     */
    public function buildSauce(): void
    {
        $this->pizza->setSauce("spicy");
    }

    /**
     * @inheritDoc
     */
    public function buildTopping(): void
    {
        $this->pizza->setTopping("ham+pineapple");
    }

}
