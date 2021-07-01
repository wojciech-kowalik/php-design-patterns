<?php

namespace DesignPatterns\Structural\Decorator;

/**
 * The Component interface
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Decorator
 */
interface IFormat
{
    /**
     * @param string $text
     * @return string
     */
    public function formatText(string $text): string;
}
