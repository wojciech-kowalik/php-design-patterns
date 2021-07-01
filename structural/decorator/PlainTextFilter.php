<?php

namespace DesignPatterns\Structural\Decorator;

use DesignPatterns\Structural\Decorator\TextFormatDecorator;

/**
 * Concrete decorator class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Decorator
 */
class PlainTextFilter extends TextFormatDecorator
{
    /**
     * @inheritDoc
     */
    public function formatText(string $text): string
    {
        $text = parent::formatText($text);
        return strip_tags($text);
    }

}
