<?php

namespace DesignPatterns\Structural\Flyweight;

use DesignPatterns\Structural\Flyweight\CatVariation;

/**
 * The Context class, external state (extrinsic state)
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Flyweight
 */
class Cat
{
    public $name;
    public $age;
    public $owner;

    /**
     * @var CatVariation
     */
    private $variation;

    public function __construct($name, $age, $owner, CatVariation $variation)
    {
        $this->name      = $name;
        $this->age       = $age;
        $this->owner     = $owner;
        $this->variation = $variation;
    }

    /**
     * @param $query
     * @return boolean
     */
    public function matches($query): bool
    {
        foreach ($query as $key => $value) {
            if (property_exists($this, $key)) {
                if ($this->$key != $value) {
                    return false;
                }
            } elseif (property_exists($this->variation, $key)) {
                if ($this->variation->$key != $value) {
                    return false;
                }
            } else {
                return false;
            }
        }

        return true;
    }

    /**
     * @return void
     */
    public function render()
    {
        $this->variation->renderProfile($this->name, $this->age, $this->owner);
    }

}
