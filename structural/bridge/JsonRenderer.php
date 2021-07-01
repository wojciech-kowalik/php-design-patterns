<?php

namespace DesignPatterns\Structural\Bridge;

use DesignPatterns\Structural\Bridge\IRenderer;

/**
 * The Concrete Implementation
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Bridge
 */
class JsonRenderer implements IRenderer
{
    /**
     * @inheritDoc
     */
    public function renderTitle(string $title): string
    {
        return '"title": "' . $title . '"';
    }

    /**
     * @inheritDoc
     */
    public function renderTextBlock(string $text): string
    {
        return '"text": "' . $text . '"';
    }

    /**
     * @inheritDoc
     */
    public function renderImage(string $url): string
    {
        return '"img": "' . $url . '"';
    }

    /**
     * @inheritDoc
     */
    public function renderLink(string $url, string $title): string
    {
        return '"link": {"href": "' . $title . '", "title": "' . $title . '""}';
    }

    /**
     * @inheritDoc
     */
    public function renderHeader(): string
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function renderFooter(): string
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function renderParts(array $parts): string
    {
        return "{\n" . implode(",\n", array_filter($parts)) . "\n}";
    }
}
