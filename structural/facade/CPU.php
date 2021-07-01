<?php

namespace DesignPatterns\Structural\Facade;

/**
 * Class represents complicated logic
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Facade
 */
class CPU
{
    /**
     * @return void
     */
    public function freeze()
    {
        print("Freezing processor\n");
    }

    /**
     * @param string $postion
     * @return void
     */
    public function jump(string $position)
    {
        print("Jumping to: {$position}\n");
    }

    /**
     * @return void
     */
    public function execute()
    {
        print("Executing processor\n");
    }
}
