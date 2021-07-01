<?php

namespace DesignPatterns\Structural\Facade;

/**
 * Class represents complicated logic
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Facade
 */
class SolidStateDrive
{
    /**
     * @return void
     */
    public function read(string $lba, string $size): string
    {
        return "Some data from sector {$lba} with size {$size}";
    }

}
