<?php

namespace DesignPatterns\Structural\Facade;

/**
 * Class represents complicated logic
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Facade
 */
class Memory
{
    /**
     * @return void
     */
    public function load(string $position, string $data)
    {
        print("Loading from {$position} with data {$data}\n");
    }

}
