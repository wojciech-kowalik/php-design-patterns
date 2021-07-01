<?php

namespace DesignPatterns\Structural\Adapter;

/**
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Adapter
 */
interface IPDFTemplate
{
    public function renderTop(): string;
    public function renderMiddle(): string;
    public function renderBottom(): string;
}
