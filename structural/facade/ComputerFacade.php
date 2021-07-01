<?php

namespace DesignPatterns\Structural\Facade;

use DesignPatterns\Structural\Facade\CPU;
use DesignPatterns\Structural\Facade\Memory;
use DesignPatterns\Structural\Facade\SolidStateDrive;

/**
 * The Facade class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Facade
 */
class ComputerFacade
{
    /**
     * @var CPU
     */
    protected $cpu;

    /**
     * @var Memory
     */
    protected $memory;

    /**
     * @var SolidStateDrive
     */
    protected $ssd;

    public function __construct()
    {
        $this->cpu    = new CPU();
        $this->memory = new Memory();
        $this->ssd    = new SolidStateDrive();
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->cpu->freeze();
        $this->memory->load("0x00", $this->ssd->read("100", "1024"));
        $this->cpu->jump("0x00");
        $this->cpu->execute();

    }
}
