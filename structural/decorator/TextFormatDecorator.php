<?php

namespace DesignPatterns\Structural\Decorator;

use DesignPatterns\Structural\Decorator\IFormat;

/**
 * The Decorator class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Decorator
 */
class TextFormatDecorator implements IFormat
{
    /**
     * @var IFormat
     */
    protected $format;

    /**
     * @param \DesignPatterns\Structural\Decorator\IFormat $format
     */
    public function __construct(IFormat $format)
    {
        $this->format = $format;
    }

    /**
     * @inheritDoc
     */
    public function formatText(string $text): string
    {
        return $this->format->formatText($text);
    }

}
