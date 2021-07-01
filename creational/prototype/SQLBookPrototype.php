<?php

namespace DesignPatterns\Creational\Prototype;

use DesignPatterns\Creational\Prototype\BookPrototype;

/**
 * Concrete class based on prototype
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\Prototype
 */

class SQLBookPrototype extends BookPrototype
{
    public function __construct()
    {
        $this->topic = 'SQL';
    }

    public function __clone()
    {}

}
