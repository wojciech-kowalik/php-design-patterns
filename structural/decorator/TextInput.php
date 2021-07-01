<?php

namespace DesignPatterns\Structural\Decorator;

use DesignPatterns\Structural\Decorator\IFormat;

/**
 * Concrete component class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Decorator
 */
class TextInput implements IFormat
{
    /**
     * @inheritDoc
     */
    public function formatText(string $text): string
    {
        return $text;
    }

}
