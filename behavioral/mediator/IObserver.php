<?php

namespace DesignPatterns\Behavioral\Mediator;

use DesignPatterns\Behavioral\Mediator\IObserver;

/**
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Mediator;
 */
interface IObserver
{
    /**
     * @param string $event
     * @param $emitter
     * @param [type] $data
     * @return void
     */
    public function update(string $event, $emitter, $data = null);
}
